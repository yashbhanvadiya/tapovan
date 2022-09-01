@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <section class="users">
            <div class="row text-right align-items-center">
                <div class="col-6 text-left">
                    <h3 class="mb-0">Users Data</h3>
                </div>
                <div class="col-6">
                    <input type="search" name="search" placeholder="search" id="livesearch" />
                    <select class="filter-main" name="user_role" id="usersRoleFilter">
                        <option value="">Show All</option>
                        <option value="1">Super Admin</option>
                        <option value="2">Doctors</option>
                        <option value="3">Nurse</option>
                        <option value="4">Reception</option>
                        <option value="5">Kitchen</option>
                        <option value="6">Supervisor</option>
                    </select>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add User
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-3">
                                <div class="text-right">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-left">
                                    <form class="add-users" id="add_users" method="post" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First name</label>
                                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name">
                                                    <input type="hidden" name="userid" id="userid">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle name</label>
                                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="middlename">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last name</label>
                                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile">
                                        </div>

                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="">-- Select --</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">Doctors</option>
                                                <option value="3">Nurse</option>
                                                <option value="4">Reception</option>
                                                <option value="5">Kitchen</option>
                                                <option value="6">Supervisor</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="controls" id="status">
                                                <label class="mr-3">
                                                <input type="radio" id="activeCheck" name="status" value="0">
                                                Active</label>
                                                <label class="mr-3">
                                                <input type="radio" id="inactiveCheck" name="status" value="1">
                                                Inactive</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="view-users">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" id="user_table">

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')

<script>
    // Edit User
    $(document).on('click','.edituser', function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: 'users/' + id + '/edit',
            dataType: 'json',
            success: function (data) {
                if(data.status == 'true') {
                    var userData = data.data
                    $('#userid').val(userData.id);
                    $('#firstname').val(userData.firstname);
                    $('#middlename').val(userData.middlename);
                    $('#lastname').val(userData.lastname);
                    $('#email').val(userData.email);
                    $('#mobile').val(userData.mobile);
                    $('#role').val(userData.role);
                    if(userData.status==0) {
                        $('#activeCheck').prop("checked", true);
                    }else{
                        $('#inactiveCheck').prop("checked", true);
                    }
                }
            },
        });
    });

    // Users Search
    var search = '';
    var role = '';
    var qstring = 'searchuser=';
    getUserData(qstring);
    $(document).on('keyup','#livesearch',function(){
        search = $(this).val();
        qstring = 'search='+ search + '&role='+ role;
        getUserData(qstring);
        var query = $(this).val();
    });

    // User Filter
    $(document).on('change', '#usersRoleFilter', function(){
        role = $(this).val();
        qstring = 'search='+ search + '&role='+ role;
        getUserData(qstring);
    });

    function getUserData(qstring)
    {
        $.ajax({
            url: 'users?'+qstring,
            type: 'GET',
            dataType:'json',
            success:function(data)
            {
                $('#user_table').html(data.data);
            },
            error: function(e) {
            }
        });
    }

    // Users Delete
    $(document).on('click', '#deleteUsers', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: 'Are you sure want to delete this User?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        })
        .then((Done) => {
            if(Done){
                usersDelete(id);
            }
        });
    });

    function usersDelete(id){
        let url = "{{ route('users.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: url,
            success: function(data) {
                if(data.status == 200){
                    getUserData(qstring);
                    swal({
                        title: "User deleted succsessfully",
                        icon: "success",
                        timer: 1500
                    });
                }
            }
        });
    };

</script>

@endsection
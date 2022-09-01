@extends('layouts.layout')  
@section('content')    

    <div class="content-wrapper">
        <section class="patients">
            <div class="row text-right align-items-center">
                <div class="col-6 text-left">
                    <h3 class="mb-0">Patients Data</h3>
                </div>
                <div class="col-6">
                    <input type="search" name="search" placeholder="search" id="livesearch" />
                    <select class="filter-main" name="patient-filter" id="patientStatusFilter">
                        <option value="0">Show All</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Patients
                    </button>
                
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content p-3">
                                <div class="text-right">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-left">
                                    <form class="add-patients" id="add_patients" method="post" action="{{ route('patients.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name<span>*</span></label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname">
                                                    <input type="hidden" name="patientid" id="patientid">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name<span>*</span></label>
                                                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="middlename">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name<span>*</span></label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birthdate<span>*</span></label>
                                                    <input type="text" class="form-control" id="birthdate" name="birthdate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sex<span>*</span></label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="gender" id="male" value="1">
                                                        Male</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="gender" id="female" value="2">
                                                        Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Address<span>*</span></label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="address">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City<span>*</span></label>
                                                    <select name="city" id="city" class="form-control">
                                                        <option value="">-- Select City --</option>
                                                        @foreach($cities as $City)
                                                            <option value="{{ $City->id }}">{{ $City->city}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="pincode">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select name="state" id="state" class="form-control">
                                                        <option value="">-- Select State --</option>
                                                        @foreach($states as $State)
                                                            <option value="{{ $State->id }}">{{ $State->state}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile<span>*</span></label>
                                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="mobile">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Alternative Mobile Number</label>
                                                    <input type="number" class="form-control" id="othermobile" name="othermobile" placeholder="alternative contact number">
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Maritial Status<span>*</span></label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" id="unmarried" value="1" checked>
                                                        Unmarried</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" id="married" value="2">
                                                        Married</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" id="divorced" value="3">
                                                        Divorced</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" id="widow" value="4">
                                                        Widow</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Occupation<span>*</span></label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" id="student" value="1" checked>
                                                        Student</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" id="service" value="2">
                                                        Service</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" id="business" value="3">
                                                        Business</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" id="housewife" value="4">
                                                        Housewife</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" id="retired" value="5">
                                                        Retired</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Usertype<span>*</span></label>
                                                    <select name="designation" id="designation" class="form-control">
                                                        <option value="">-- Select --</option>
                                                        <option value="1">Super Admin</option>
                                                        <option value="2">Doctors</option>
                                                        <option value="3">Nurse</option>
                                                        <option value="4">Reception</option>
                                                        <option value="5">Kitchen</option>
                                                        <option value="6">Supervisor</option>
                                                        <option value="7" selected>Patient</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type="text" class="form-control" id="company" name="company" placeholder="company">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <input type="text" class="form-control" id="remark" name="remarks" placeholder="remarks">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Patient Photo</label>
                                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Patient Added By</label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="patientadded" id="canada" value="1">
                                                        Canada</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="patientadded" id="india" value="2" checked>
                                                        India</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="patientadded" id="uae" value="3">
                                                        UAE</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Add Diseases</label>
                                                    <select name="disease[]" id="disease" class="form-control disease" multiple="multiple">
                                                        @foreach($diseases as $Disease)
                                                            <option value="{{ $Disease->id }}" id="{{ 'disease'.$Disease->id }}">{{ $Disease->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Start Date<span>*</span></label>
                                                    <input type="text" class="form-control" id="startdate" name="startdate">
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>End Date<span>*</span></label>
                                                    <input type="text" class="form-control" id="enddate" name="enddate">
                                                </div>
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

        <section class="view-patients">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" id="patient_table">
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        $("#startdate").flatpickr(
        {
            dateFormat: "d/m/Y",
            disableMobile: "true",
            minDate: new Date(),
        });

        $("#enddate").flatpickr(
        {
            dateFormat: "d/m/Y",
            disableMobile: "true",
            minDate: new Date(),
        });

        $("#birthdate").flatpickr(
        {
            dateFormat: "d/m/Y",
            disableMobile: "true",
        });
    });

    // Patient Search
    var search = '';
    var status = '';
    var qstring = 'searchpatient=';
    getPatientData(qstring);
    $(document).on('keyup','#livesearch',function(){
        search = $(this).val();
        qstring = 'search='+ search + '&status='+ status;
        getPatientData(qstring);
        var query = $(this).val();
    });

    // Patient Filter
    $(document).on('change', '#patientStatusFilter', function(){
        status = $(this).val();
        qstring = 'search='+ search + '&status='+ status;
        getPatientData(qstring);
    });

    function getPatientData(qstring)
    {
        $.ajax({
            url: 'patients?'+qstring,
            type: 'GET',
            dataType:'json',
            success:function(data)
            {
                $('#patient_table').html(data.data);
            },
            error: function(e) {
            }
        });
    }

    // Patient Delete
    $(document).on('click', '#deletePatient', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: 'Are you sure want to delete this patient?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        })
        .then((Done) => {
            if(Done) {
                patientDelete(id);
            }
        });
    }); 

    function patientDelete(id){
        let url = "{{route('patients.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: url,
            success: function(data){
                if(data.status == 200){
                    getPatientData(qstring);
                    swal({
                        title: "Patient deleted succsessfully",
                        icon: "success",
                        timer: 1500
                    });
                }
            }         
        });
    };

</script>

@endsection
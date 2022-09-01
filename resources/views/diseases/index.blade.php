@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <section class="disease">
            <div class="row text-right align-items-center">
                <div class="col-6 text-left">
                    <h3 class="mb-0">Disease Data</h3>
                </div>
                <div class="col-6">
                    <input type="search" name="search" placeholder="search" id="livesearch" />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Disease
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-3">
                                <div class="text-right">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-left">
                                    <form class="add-disease" id="add_disease" method="post" action="{{ route('diseases.store') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                            <input type="hidden" name="diseaseid" id="diseaseid">
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

        <section class="view-disease">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" id="disease_table">

                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

@section('js')

<script>
    // Edit Disease
    $(document).on('click','.editdisease', function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: 'diseases/' + id + '/edit',
            dataType: 'json',
            success: function (data) {
                if(data.status == 'true') {
                    var diseaseData = data.data
                    $('#diseaseid').val(diseaseData.id);
                    $('#name').val(diseaseData.name);
                }
            },
        });
    });

    // Diseases Search
    var qstring = 'searchdisease=';
    getDiseaseData(qstring);
    $(document).on('keyup','#livesearch',function(){
        search = $(this).val();
        qstring = 'search='+ search;
        getDiseaseData(qstring);
        var query = $(this).val();

    });

    function getDiseaseData(qstring)
    {
        $.ajax({
            url: 'diseases?'+qstring,
            type: 'GET',
            dataType:'json',
            success:function(data)
            {
                $('#disease_table').html(data.data);
            },
            error: function(e) {
            }
        });
    }

    // Delete Disease
    $(document).on('click', '#deleteDisease', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: 'Are you sure want to delete this Disease?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        })
        .then((Done) => {
            if(Done){
                diseaseDelete(id);
            }
        });
    });

    function diseaseDelete(id) {
        let url = "{{ route('diseases.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: url,
            success: function(data) {
                getDiseaseData(qstring);
                if(data.status == 200){
                    swal({
                        title: "Disease deleted succsessfully",
                        icon: "success",
                        timer: 1500
                    });
                }
            }
        });
    };

</script>

@endsection
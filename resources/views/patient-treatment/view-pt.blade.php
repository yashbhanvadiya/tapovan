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
                    <a href="{{ route('patient-treatments.create') }}" class="btn btn-primary">Add Patient Treatments</a>
                </div>
            </div>
        </section>

        <section class="view-treatment">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" id="treatment_table">
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

@section('js')

<script>
    // PT Search
    var search = '';
    var qstring = 'searchpt=';
    getPTData(qstring);
    $(document).on('keyup','#livesearch',function(){
        search = $(this).val();
        qstring = 'search='+ search;
        getPTData(qstring);
        var query = $(this).val();
    });

    function getPTData(qstring)
    {
        $.ajax({
            url: 'patient-treatments?'+qstring,
            type: 'GET',
            dataType:'json',
            success:function(data)
            {
                $('#treatment_table').html(data.data);
            },
            error: function(e) {
            }
        });
    }

    // PT Delete
    $(document).on('click', '#deletePT', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: 'Are you sure want to delete this patient treatment?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        })
        .then((Done) => {
            if(Done) {
                ptDelete(id);
            }
        });
    }); 

    function ptDelete(id){
        let url = "{{route('patient-treatments.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: url,
            success: function(data){
                if(data.status == 200){
                    getPTData(qstring);
                    swal({
                        title: "Patient treatment deleted succsessfully",
                        icon: "success",
                        timer: 1500
                    });
                }
            }         
        });
    };

</script>

@endsection
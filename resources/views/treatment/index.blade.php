@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <section class="users">
            <div class="row text-right align-items-center">
                <div class="col-6 text-left">
                    <h3 class="mb-0">Treatment Data</h3>
                </div>
                <div class="col-6">
                    <input type="search" name="search" placeholder="search" id="livesearch" />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Treatment
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-3">
                                <div class="text-right">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-left">
                                    <form class="add-treatment" id="add_treatment" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                            <span class="name-error-msg form-error"></span>
                                            <input type="hidden" name="treatmentid" id="treatmentid">
                                        </div>

                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <input type="text" class="form-control" id="starttime" name="starttime" placeholder="start time">
                                        </div>

                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="text" class="form-control" id="endtime" name="endtime" placeholder="end time">
                                        </div>

                                        <div class="form-group">
                                            <label>Start Break</label>
                                            <input type="text" class="form-control" id="startbreak" name="startbreak" placeholder="start break">
                                        </div>

                                        <div class="form-group">
                                            <label>End Break</label>
                                            <input type="text" class="form-control" id="endbreak" name="endbreak" placeholder="end break">
                                        </div>

                                        <div class="form-group">
                                            <label>Treatment Duration</label>
                                            <input type="number" class="form-control" id="treatmentDuration" name="treatment_duration" placeholder="20">
                                        </div>

                                        <button type="submit" class="btn btn-primary save-treatment">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    $(document).ready(function () {
        $("#starttime").flatpickr(
        {
            "enableTime":true, 
            "allowInput":true,
            "noCalendar": true,
            "dateFormat": "h:i K"
        });

        $("#endtime").flatpickr(
        {
            "enableTime":true, 
            "allowInput":true,
            "noCalendar": true,
            "dateFormat": "h:i K"
        });

        $("#startbreak").flatpickr(
        {
            "enableTime":true, 
            "allowInput":true,
            "noCalendar": true,
            "dateFormat": "h:i K"
        });

        $("#endbreak").flatpickr(
        {
            "enableTime":true, 
            "allowInput":true,
            "noCalendar": true,
            "dateFormat": "h:i K"
        });
    });

    // Add Treatment
    $(document).on('submit', '#add_treatment', function(e){
        e.preventDefault();
        // var name = $('#name').val();
        // var treatmentid = $('#treatmentid').val();
        var data = $(this).serialize();
        var url = "{{ route('treatment.store') }}";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                if(data.status == 200) {
                    location.reload();
                }
                else{
                    $('.name-error-msg').text(data.msg);
                    return false;
                }
            },
        });
    });

    // Edit Treatment
    $(document).on('click','.edittreatment', function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: 'treatment/' + id + '/edit',
            data: {name:name},
            dataType: 'json',
            success: function (data) {
                if(data.status == 'true') {
                    var treatmentData = data.data
                    console.log(treatmentData);
                    $('#treatmentid').val(treatmentData.id);
                    $('#name').val(treatmentData.name);
                    $('#starttime').val(treatmentData.start_time);
                    $('#endtime').val(treatmentData.end_time);
                    $('#startbreak').val(treatmentData.start_break);
                    $('#endbreak').val(treatmentData.end_break);
                    $('#treatmentDuration').val(treatmentData.duration);
                }
            },
        });
    });

    // Treatment Search
    var qstring = 'searchtreatment=';
    getTreatmentData(qstring);
    $(document).on('keyup','#livesearch',function(){
        search = $(this).val();
        qstring = 'search='+ search;
        getTreatmentData(qstring);
        var query = $(this).val();

    });

    function getTreatmentData(qstring)
    {
        $.ajax({
            url: 'treatment?'+qstring,
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

    // Delete Treatment
    $(document).on('click', '#deleteTreatment', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: 'Are you sure want to delete this Treatment?',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        })
        .then((Done) => {
            if(Done){
                treatmentDelete(id);
            }
        });
    });

    function treatmentDelete(id) {
        let url = "{{ route('treatment.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: url,
            success: function(data) {
                if(data.status == 200){
                    getTreatmentData(qstring);
                    swal({
                        title: "Treatment deleted succsessfully",
                        icon: "success",
                        timer: 1500
                    });
                }
            }
        });
    };

</script>

@endsection
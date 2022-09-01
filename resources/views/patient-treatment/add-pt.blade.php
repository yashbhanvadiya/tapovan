@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <section class="patient-treatment-main">
            <div class="row text-right align-items-center">
                <div class="col-6 text-left">
                    <h3 class="mb-4">Add Patient Treatments</h3>
                </div>
                <div class="col-6">
                    <a href="{{ route('patient-treatments.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="add-patient-treatment" id="add_patient_treatment" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            {{ Form::select('patient_id', $patient, "", ['class' => 'form-control', 'id' => 'patientId', 'placeholder' => '-- Select --']) }}
                        </div>
                        <span class="name-error-msg form-error"></span>

                        <div class="form-group">
                            <label>Treatment Start Date</label>
                            <input type="text" class="form-control" name="startdate" id="startdate">
                        </div>
                        
                        <div class="form-group">
                            <label>Treatment End Date</label>
                            <input type="text" class="form-control" name="enddate" id="enddate">
                        </div>

                        <div class="form-group">
                            <label>Treatments</label>
                            <div class="controls">
                                @foreach($treatment as $treatmentName)
                                    <label>
                                        <input class="treatment-checkbox" type="checkbox" name="treatmentname" data-type="treatment{{ $treatmentName->id }}" value="{{ $treatmentName->id }}">
                                        <h5>{{ $treatmentName->name }}</h5>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            @foreach($treatment as $treatmentName)
                                <div class="treatment-group d-none treatment{{ $treatmentName->id }}">
                                    <span>{{ $treatmentName->name }} : </span>
                                    <input type="text" class="form-control select-treatment" name="data[{{ str_replace(' ', '_',$treatmentName->name) }}][date]" placeholder="Select Treatment">
                                    <input type="text" class="form-control mr-0" name="data[{{ str_replace(' ', '_',$treatmentName->name) }}][desc]" placeholder="Enter Description">
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary save-treatment">Submit</button>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        </section>
    </div>


@endsection

@section('js')

<script>
    $(document).ready(function () {
        $(".select-treatment").flatpickr(
        {
            disableMobile: "true",
            minDate: new Date(),
            enableTime: true,
            dateFormat: 'd/m/Y h:i K',
            minuteIncrement: 1
        });

        $("#startdate").flatpickr(
        {
            minDate: new Date(),
            dateFormat: "d M Y",
        });

        $(document).on('change', '#startdate', function(){
            var startDate = new Date($(this).val());
            var nextStartDate = moment(startDate).add(14,'d').format('DD-MMM-YYYY');

            $("#enddate").flatpickr(
            {
                minDate: new Date(),
                dateFormat: "d M Y",
                defaultDate: nextStartDate
            });
        });

        $("#startdate").flatpickr(
        {
            minDate: new Date(),
            dateFormat: "d M Y",
        });


    });

    // Select Name Using Select2
    $("#patientId").select2({
        //
    });

    // Add Patient Treatment
    $(document).on('submit', '#add_patient_treatment', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var url = "{{ route('patient-treatments.store') }}";
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

    $(document).on('click','.treatment-checkbox', function(){
        var dataType = $(this).data('type');
        $('.'+dataType).addClass('d-none')
        if($(this).prop('checked') == true){
            $('.'+dataType).removeClass('d-none').css('display', 'flex')
        }
    });

    // Get Time Slots
    $(document).on('change', '.treatment-checkbox', function(){
        var treatmentId = $(this).val();
        var url = "{{ route('treatment-slots') }}";
        var checked = [];
        $('.treatment-checkbox:checked').each(function ()
        {
            checked.push(parseInt($(this).val()));
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: {checked:checked},
            dataType: 'json',
            success: function(data) {
                if(data.status == 200) {
                    // location.reload();
                }
                else{
                    return false;
                }
            },
        });
    });
</script>

@endsection
@extends('layouts.layout')
@section('content')

    <div class="content-wrapper">
        <section class="patient-treatment-main">
            <div class="row text-right align-items-center">
                <div class="col-6 text-left">
                    <h3 class="mb-4">{{ $result->getPatientName['firstname'] .' '. $result->getPatientName['middlename'] .' '. $result->getPatientName['lastname'] }}</h3>
                </div>
                <div class="col-6"> 
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="add-patient-treatment" id="add_patient_treatment" method="post" action="{{ route('patient-treatments.store')}}">
                        @csrf

                        <input type="hidden" name="ptid" id="ptid" value="{{ $result->id }}">
                        <input type="hidden" name="patient_id" value="{{ $result->patient_id }}">

                        <div class="form-group">
                            <label>Treatments</label>
                            <div class="controls">
                                @foreach($treatment as $treatmentName)
                                    @php
                                        $treatment_name = str_replace(' ', '_',$treatmentName->name);
                                        $ptDate = !empty($patientTreatments[$treatment_name]['date']) ? $patientTreatments[$treatment_name]['date'] :'';
                                        $ptDesc = !empty($patientTreatments[$treatment_name]['desc']) ? $patientTreatments[$treatment_name]['desc'] :'';
                                    @endphp
                                    <label>
                                        <input class="treatment-checkbox" type="checkbox" data-type="treatment{{ $treatmentName->id }}" {{($ptDate != '') ? 'checked' : ''}}>
                                        <h5>{{ $treatmentName->name }}</h5>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            @foreach($treatment as $treatmentName)
                                @php
                                    $treatment_name = str_replace(' ', '_',$treatmentName->name);
                                    $ptDate = !empty($patientTreatments[$treatment_name]['date']) ? $patientTreatments[$treatment_name]['date'] :'';
                                    $ptDesc = !empty($patientTreatments[$treatment_name]['desc']) ? $patientTreatments[$treatment_name]['desc'] :'';
                                @endphp
                                <div class="treatment-group {{($ptDate != '') ? 'd-flex' : 'd-none'}} treatment{{ $treatmentName->id }}">
                                    <span>{{ $treatmentName->name }} : </span>
                                    <input type="text" class="form-control select-treatment select-date-treatment{{ $treatmentName->id }}" name="data[{{ str_replace(' ', '_',$treatmentName->name) }}][date]" value="{{ $ptDate }}" placeholder="Select Treatment" >
                                    <input type="text" class="form-control mr-0 select-desc-treatment{{ $treatmentName->id }}" name="data[{{ str_replace(' ', '_',$treatmentName->name) }}][desc]" value="{{ $ptDesc }}" placeholder="Enter Description">
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
    });

    // select name using select2
    $("#patientId").select2({
        //
    });

    $(document).on('click','.treatment-checkbox', function(){
        var dataType = $(this).data('type');
        $('.'+dataType).addClass('d-none')
        if($(this).prop('checked') == true){
            $('.'+dataType).removeClass('d-none').css('display', 'flex')
        }else{
            $('.'+dataType).removeClass('d-flex').css('display', 'none')
            $('.select-date-'+dataType).val('');
            $('.select-desc-'+dataType).val('');
        }
    });
</script>

@endsection
@extends('layouts.layout')  
@section('content')    

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 text-right">        
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


            <button type="button" class="edit-btn btn btn-primary editpatients" data-bs-toggle="modal" data-bs-target="#exampleModal" data-page='view' data-id="{{ encrypt($result->id) }}">Edit</button>
        </div>
    </div>

    @php
        $sex = ['1' => 'male', '2' => 'female'];
        $maritialstatus = ['1' => 'unmarried', '2' => 'married', '3' => 'divorced', '4' => 'widow'];
        $occupation = ['1' => 'student', '2' => 'service', '3' => 'business', '4' => 'housewife', '5' => 'retired'];
        $designation = ['1' => 'super admin', '2' => 'doctors', '3' => 'nurse', '4' => 'reception', '5' => 'kitchen', '6' => 'supervisor', '7' => 'patient'];
        $patientadded = ['1' => 'canada', '2' => 'india', '3' => 'UAE'];
    @endphp

    <div class="patient-view">
        <div class="row">
            <div class="col-md-6">
                <div class="patient-info">
                    <h2 class="mb-5">{{ ucfirst($result->firstname) }} {{ ucfirst($result->middlename) }} {{ ucfirst($result->lastname) }}</h2>
                    <div class="patient-contact mb-5">
                        <h4>Contact Information</h4>
                        <div class="d-flex">
                            <b>Email :</b>
                            <p>{{ $result->email }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Mobile :</b>
                            <p>{{ $result->mobile }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Other Mobile :</b>
                            <p>{{ !empty($result->other_mobile) ? $result->other_mobile : '-' }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Address :</b>
                            <p>{{ $result->address }}, {{ $result->cities['city'] }}, {{ !empty($result->pincode) ? $result->pincode : '' }}</p>
                        </div>
                    </div>
                    <div class="patient-contact mt-4">
                        <h4>Basic Information</h4>
                        <div class="d-flex">
                            <b>Birthdate :</b>
                            <p>{{ date('d-m-Y', strtotime($result->birthdate)) }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Age :</b>
                            <p>{{ Carbon\Carbon::parse($result->birthdate)->diff(Carbon\Carbon::now())->y }} Year</p>
                        </div>
                        <div class="d-flex">
                            <b>Sex :</b>
                            <p>{{ !empty($result->sex) ? $sex[$result->sex] : '-' }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Maritial Status :</b>
                            <p>{{ !empty($result->maritial_status) ? $maritialstatus[$result->maritial_status] : '-' }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Occupation :</b>
                            <p>{{ !empty($result->occupation) ? $occupation[$result->occupation] : '-' }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Role :</b>
                            <p>{{ !empty($result->designation) ? $designation[$result->designation] : '-' }}</p>
                        </div>
                        <div class="d-flex">
                            <b>Company :</b>
                            <p>{{ !empty($result->company) ? $result->company : '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="patient-img mb-5">
                    <img src="{{ asset('/images/user/'.$result->image) }}" alt="Patient Image">
                </div>
                <div class="patient-contact patient-info mt-4">
                    <h4>Medical Information</h4>
                    <div class="d-flex">
                        <b>Remarks :</b>
                        <p>{{ !empty($result->notes) ? $result->notes : '-' }}</p>
                    </div>
                    <div class="d-flex">
                        <b>Patient Added By :</b>
                        <p>{{ $patientadded[$result->patient_added_by] }}</p>
                    </div>
                    <div class="d-flex">
                        <b>Diseases :</b>
                        <p>
                            @php 
                                $disea = []; 
                                foreach($result->getPatientDisease as $row){
                                    $disea[] = $row->getDisease['name'];
                                }
                            @endphp
                            {{!empty($disea) ? implode(', ',$disea) : '-' }}
                        </p>
                    </div>
                    <div class="d-flex">
                        <b>Start Date :</b>
                        <p>{{ date('d-m-Y', strtotime($result->startdate)) }}</p>
                    </div>
                    <div class="d-flex">
                        <b>End Date :</b>
                        <p>{{ date('d-m-Y', strtotime($result->enddate)) }}</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
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

    // Edit Patients
    $(document).on('click','.editpatients', function () {
        var id = $(this).data('id');
        var page = $(this).data('page');
        var url = 'patients/' + id + '/edit';
        if(page && page=='view')
        {
            var url =  id + '/edit';
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                if(data.status == 'true') {
                    var patientData = data.data
                    // console.log(patientData);
                    $('#patientid').val(patientData.id);
                    $('#firstname').val(patientData.firstname);
                    $('#middlename').val(patientData.middlename);
                    $('#lastname').val(patientData.lastname);
                    $('#birthdate').val(moment(patientData.birthdate).format('MM/DD/YYYY'));
                    if(patientData.sex == 0){
                        $('#male').prop("checked", true);
                    }else{
                        $('#female').prop("checked", true);
                    }
                    $('#address').val(patientData.address);
                    $('#city').val(patientData.city);
                    $('#pincode').val(patientData.pincode);
                    $('#state').val(patientData.state);
                    $('#mobile').val(patientData.mobile);
                    $('#othermobile').val(patientData.other_mobile);
                    $('#email').val(patientData.email);
                    if(patientData.maritial_status == 1){
                        $('#unmarried').prop("checked", true);
                    }
                    else if(patientData.maritial_status == 2){
                        $('#married').prop("checked", true);
                    }
                    else if(patientData.maritial_status == 3){
                        $('#divorced').prop("checked", true);
                    }
                    else if(patientData.maritial_status == 4){
                        $('#widow').prop("checked", true);
                    }
                    if(patientData.occupation == 1){
                        $('#student').prop("checked", true);
                    }
                    else if(patientData.occupation == 2){
                        $('#service').prop("checked", true);
                    }
                    else if(patientData.occupation == 3){
                        $('#business').prop("checked", true);
                    }
                    else if(patientData.occupation == 4){
                        $('#housewife').prop("checked", true);
                    }
                    else if(patientData.occupation == 5){
                        $('#retired').prop("checked", true);
                    }
                    $('#designation').val(patientData.designation);
                    $('#company').val(patientData.company);
                    $('#remark').val(patientData.notes);
                    if(patientData.patient_added_by == 1){
                        $('#canada').prop("checked", true);
                    }
                    else if(patientData.patient_added_by == 2){
                        $('#india').prop("checked", true);
                    }
                    else if(patientData.patient_added_by == 3){
                        $('#uae').prop("checked", true);
                    }
                    var disease = patientData.disease;
                    for(var i = 0; i < disease.length; i++){
                        $("#add_patients .disease").select2("trigger", "select", {
                            data: { id: disease[i] }
                        });
                    }
                    $('#startdate').val(moment(patientData.startdate).format('MM/DD/YYYY'));
                    $('#enddate').val(moment(patientData.enddate).format('MM/DD/YYYY'));
                }
            },
        });
    });
</script>

@endsection
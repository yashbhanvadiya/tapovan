@extends('layouts.layout')  
@section('content')    

    <div class="content-wrapper">
        <section class="patients">
            <div class="row text-right">
                <div class="col-12">
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
                                    <form class="add-patients" id="add_patients" method="post" action="{{ url('add-patients') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First n  ame</label>
                                                    <input type="text" class="form-control" name="surname" placeholder="surname">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="name">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="lastname" placeholder="lastname">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="number" class="form-control" name="age" placeholder="age">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="gender" value="male">
                                                        Male</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="gender" value="female">
                                                        Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="address">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <select name="city" class="form-control">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="number" class="form-control" name="pincode" placeholder="pincode">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select name="state" class="form-control">
                                                        @foreach($states as $State)
                                                            <option value="{{ $State->id }}">{{ $State->state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="number" class="form-control" name="mobile" placeholder="mobile">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Other Mobile</label>
                                                    <input type="number" class="form-control" name="othermobile" placeholder="other mobile">
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="email">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Maritial Status</label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" value="unmarried">
                                                        Unmarried</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" value="married">
                                                        Married</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" value="divorced">
                                                        Divorced</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="maritialstatus" value="widow">
                                                        Widow</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Occupation</label>
                                                    <div class="controls">
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" value="student">
                                                        Student</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" value="service">
                                                        Service</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" value="business">
                                                        Business</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" value="housewife">
                                                        Housewife</label>
                                                        <label class="mr-3">
                                                        <input type="radio" name="occupation" value="retired">
                                                        Retired</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <select name="designation" class="form-control">
                                                        <option value="">-- Select --</option>
                                                        <option value="1">Super Admin</option>
                                                        <option value="2">Doctors</option>
                                                        <option value="3">Nurse</option>
                                                        <option value="4">Reception</option>
                                                        <option value="5">Kitchen</option>
                                                        <option value="6">Supervisor</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type="text" class="form-control" name="company" placeholder="company">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Patient Photo</label>
                                                    <input type="file" class="form-control" name="company" placeholder="company">
                                                </div>
                                            </div>
                                        </div>
                                        
                
                                        <button type="submit" class="btn btn-primary">Add Patients</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="patient-form">
            <form class="" action="">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Referred By</label>
                            <input type="text" class="form-control" name="referred" placeholder="Referred">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Payment</label>
                            <input type="number" class="form-control" name="name" placeholder="Payment">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Type</label>
                            <select name="roomtype" id="roomtype" class="form-control">
                                <option value="">-- Select --</option>
                                <option value="1">Genral</option>
                                <option value="2">Ac</option>
                                <option value="3">Non Ac</option>
                                <option value="4">Deluxe</option>
                                <option value="5">Semi Deluxe</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="text" class="form-control" name="roomnumber" placeholder="Room Number">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Date & Time</label>
                            <input type="datetime-local" class="form-control" name="startdate">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Discharge Date & Time</label>
                            <input type="datetime-local" class="form-control" name="enddate">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Reports</label>
                            <input type="file" class="form-control" name="reports" placeholder="Reports">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Select Topics</label>
                        <select name="skills" multiple="" class="label ui selection fluid dropdown">
                            <option value="">All</option>
                            <option value="1">Change Methodology</option>
                            <option value="2">Cognitive Computing & AI</option>
                            <option value="3">Connectivity & Collaboration</option>
                            <option value="4">Culture in Action</option>
                            <option value="5">Future of Work</option>
                            <option value="6">HR Transformation</option>
                            <option value="7">Human-centered Design</option>
                            <option value="8">Machine Learning & AI</option>
                            <option value="9">Operational Effectiveness</option>
                            <option value="10">Operational Excellence</option>
                            <option value="11">Organizational Change</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Patient Cost</label>
                            <input type="text" class="form-control" name="cost" placeholder="Patient Cost">
                        </div>
                    </div>
                </div>
            </form>
        </section>

        {{-- <section class="view-patients">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered patients-table">
                            <thead>
                                <tr>    
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $viewPatients)
                                    <tr>
                                        <td>{{ ((($patients->currentPage() - 1 ) * $patients->perPage() ) + $loop->iteration) . '.' }}</td>
                                        <td>{{ $viewPatients->name}}</td>
                                        <td>{{ $viewPatients->createdBy['firstname'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {!! $patients->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

    </div>

@endsection
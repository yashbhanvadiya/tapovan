<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use View;
use Hash;
use Auth;
use Log;
use Exception;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if($request->ajax()){
                $result = $this->patient;
                if(!empty($request->search))
                {
                    $result = $result->where('firstname','like','%'.$request->search.'%')
                        ->orWhere('middlename','like','%'.$request->search.'%')->orWhere('lastname','like','%'.$request->search.'%')
                        ->orWhere('sex','like','%'.$request->search.'%')->orWhere('mobile','like','%'.$request->search.'%')
                        ->orWhere('email','like','%'.$request->search.'%');
                }
                if(!empty($request->status))
                {
                    $result = $result->where('status', $request->status);
                }
                $result = $result->paginate(50);
                $get_diseases = $this->disease::pluck('name','id');
                $data = View::make('patients.data', compact('result','get_diseases'))->render();

                return response()->json(['data' => $data]);
            }
            $cities = $this->city::all();
            $states = $this->state::all();
            $diseases = $this->disease::all();
            return view('patients.index', compact('cities','states','diseases'));
        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $id = "";
            $patient = $this->patient;
            if($request->patientid != null){
                $patient = $this->patient::find($request->patientid);
            }

            if($request->hasfile('image')){
                $file = $request->file('image');
                $image_name = rand(10000,99999).".".$file->getClientOriginalExtension();
                $file->move(public_path('images/user/'),$image_name);
                if($request->patientid != null){
                    $id = $request->patientid;
                    $FormRec = $this->patient::find($id);
                    if($FormRec->image) {
                        $path = public_path("images/user/$FormRec->image");
                        if(file_exists($path))
                        {
                            unlink($path);
                        }
                    }
                    $patientEditRec['image'] = $image_name;
                }
                $patient->image = $image_name;
            }

            $status = 0;
            $todayDate = Carbon::now()->format('Y-m-d');
            if($request->startdate == $todayDate)
            {
                $status = 1;
            }
   
            $patient->firstname = strtolower($request->firstname);
            $patient->middlename = strtolower($request->middlename);
            $patient->lastname = strtolower($request->lastname);
            $patient->birthdate = !empty($request->birthdate) ? Carbon::createFromFormat('d/m/Y', $request->birthdate)->format('Y-m-d') : NULL;
            $patient->sex = $request->gender;
            $patient->address = $request->address;
            $patient->city = $request->city;
            $patient->pincode = $request->pincode;
            $patient->state = !empty($request->state) ? $request->state : 1;
            $patient->mobile = $request->mobile;
            $patient->other_mobile = $request->othermobile;
            $patient->email = $request->email;
            $patient->maritial_status = $request->maritialstatus;
            $patient->occupation = $request->occupation;
            $patient->designation = $request->designation;
            $patient->status = $status;
            $patient->company = strtolower($request->company);
            $patient->notes = $request->remarks;  
            $patient->patient_added_by = $request->patientadded;
            $patient->startdate = !empty($request->startdate) ? Carbon::createFromFormat('d/m/Y', $request->startdate)->format('Y-m-d') : NULL;
            $patient->enddate = !empty($request->enddate) ? Carbon::createFromFormat('d/m/Y', $request->enddate)->format('Y-m-d') : NULL;
            $patient->save();

            if(!empty($request->disease)){
                $patientDiseaseData = [];
                $patientDisease = $this->patientDisease::where('patient_id', $patient->id)->delete();
                foreach($request->disease as $disease){
                    $patientDiseaseData[] = [
                        'disease_id' => $disease,
                        'patient_id' => $patient->id,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ];
                }
                $patientDisease = $this->patientDisease::insert($patientDiseaseData);
            }
            return redirect()->back();
        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $id = decrypt($id);
            $result = $this->patient::where('id', $id)->first();
            $cities = $this->city::all();
            $states = $this->state::all();
            $diseases = $this->disease::all();
            $get_diseases = $this->disease::pluck('name','id');
            return view('patients.patient-details', compact('result','cities','states','diseases','get_diseases'));

        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $id = decrypt($id);
            $data = $this->patient->where('id', $id)->first();
            $disea = [];
            foreach($data->getPatientDisease as $row){
                $disea[] = $row->getDisease['id'];
            }
            $data->disease = $disea;
            return [
                'status' => 'true',
                'data' => $data
            ];
        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $id = decrypt($id);
            $this->patient::find($id)->delete();
            return [
                'status' => 200
            ];
        }
        catch(Exception $e){
            abort(500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Hash;
use Auth;
use Log;
use Exception;
use DateTime;
use DateInterval;

class PatientTreatmentsController extends Controller
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
                $treatmentColumn = $this->treatment::pluck('name');
                $treatment = $this->treatment::all();
                // $patientTreatmentsData = $this->patientTreatments::all();
                // $patientTreatments = json_decode($patientTreatmentsData->patient_treatments, true);
                $result = $this->patientTreatments;
                $search = $request->search;
                if($search){
                    $result = $result->where(function($query) use($search){
                        $query->orWhereHas('getPatientName', function($query) use($search) {
                            $query->where('firstname','LIKE','%{$search}%')
                                ->orwhere('lastname','LIKE','%{$search}%')
                                ->orwhere('middlename','LIKE','%{$search}%')
                                ->orwhere(\DB::raw('CONCAT(lastname," ",firstname," ",middlename)'),'LIKE',"%{$search}%" );
                            });
                    });
                }
                $result = $result->paginate(50);
                $data = View::make('patient-treatment.data', compact('result','treatmentColumn','treatment'))->render();
                
                return response()->json(['data' => $data]);
            }
            return view('patient-treatment.view-pt');
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
        try{
            $patient = $this->patient::select('*',\DB::raw('CONCAT(firstname," ",middlename," ",lastname) AS fullname'))->pluck('fullname','id');
            $treatment = $this->treatment::all();
            return view('patient-treatment.add-pt', compact('patient','treatment'));
        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try{
            if($request->ajax()){
                $ptid = $request->ptid;
                $patient_treatments = json_encode($request->data);
                $patientName = $this->patientTreatments::where('patient_id', $ptid)->first();
                if(!empty($patientName)){
                    return response()->json(['msg' => 'Patient Treatment already exists', 'status' => 413]);
                }
                else{
                    $addPT = $this->patientTreatments;
                    $addPT->patient_id = $request->patient_id;
                    $addPT->patient_treatments = $patient_treatments;
                    $addPT->save();
                    return response()->json(['msg' => 'Patient Treatment added successfully', 'status' => 200]);
                }
                
            }
        // }
        // catch(Exception $e)
        // {
        //     abort(500);
        // }
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
            $treatment = $this->treatment::all();
            $patient = $this->patient::select('*',\DB::raw('CONCAT(firstname," ",middlename," ",lastname) AS fullname'))->pluck('fullname','id');
            $result = $this->patientTreatments::where('id', $id)->first();
            $patientTreatments = json_decode($result->patient_treatments, true);
            return view('patient-treatment.pt-details', compact('result','patient','treatment','patientTreatments'));
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
        //
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
        //
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
            $this->patientTreatments::find($id)->delete();
            return [
                'status' => 200
            ];
        }
        catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Get treatment slots
     */
    public function treatmentSlots(Request $request)
    {
        if($request->ajax()){
            $treatment = $this->treatment::whereIn('id', $request->checked)->get();
            foreach($treatment as $treatmentData){
                $duration = $treatmentData->duration;          // how much the is the duration of a time slot
                $start = $treatmentData->start_time;           // start time
                $end = $treatmentData->end_time;               // end time
                $start_break = $treatmentData->start_break;    // start break
                $end_break = $treatmentData->end_break;        // end break
    
                $data = $this->availableSlots($duration, $start, $end, $start_break, $end_break);
                dd($data);
            }

        }
    }

    public function availableSlots($duration, $start, $end, $start_break, $end_break) {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $start_break = new DateTime($start_break);
        $end_break = new DateTime($end_break);
        $interval = new DateInterval("PT" . $duration . "M");
        $periods = array();

        for($intStart = $start; $intStart < $end; $intStart->add($interval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);

            if(strtotime($start_break->format('H:i A')) < strtotime($endPeriod->format('H:i A')) && strtotime($endPeriod->format('H:i A')) < strtotime($end_break->format('H:i A'))){
                $endPeriod = $start_break;
                $periods[] = $intStart->format('H:i A') . ' - ' . $endPeriod->format('H:i A');
                $intStart = $end_break;
                $endPeriod = $end_break;
                $intStart->sub($interval);
            }else{
                $periods[] = $intStart->format('H:i A') . ' - ' . $endPeriod->format('H:i A');
            }
        }


        return $periods;
    }
}

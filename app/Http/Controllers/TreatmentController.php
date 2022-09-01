<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use View;
use Hash;
use Auth;
use Carbon\Carbon;

class TreatmentController extends Controller
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
                $result = $this->treatment;
                if(!empty($request->search))
                {
                    $result = $result->where('name','like','%'.$request->search.'%');
                }
                $result = $result->paginate(50);
                $data = View::make('treatment.data', compact('result'))->render();
    
                return response()->json(['data' => $data]);
            }
            return view('treatment.index');
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
            if($request->ajax()){
                $treatmentId = $request->treatmentid;
                if($treatmentId){
                    $treatmentEditRec = [
                            'name' => strtolower($request->name),
                            'patient_id' => Auth::user()->id,
                            'start_time' => !empty($request->starttime) ? date('H:i', strtotime($request->starttime)) : NULL,
                            'end_time' => !empty($request->endtime) ? date('H:i', strtotime($request->endtime)) : NULL,
                            'start_break' => !empty($request->startbreak) ? date('H:i', strtotime($request->startbreak)) : NULL,
                            'end_break' => !empty($request->endbreak) ? date('H:i', strtotime($request->endbreak)) : NULL,
                            'duration' => $request->treatment_duration
                        ];
                        $this->treatment::where('id', $treatmentId)->update($treatmentEditRec);
                    return response()->json(['msg' => 'Treatment added successfully', 'status' => 200]);
                }
                else{
                    $treatmentName = $this->treatment::where('name', $request->name)->first();
                    $treatment = $this->treatment;
                    if(empty($treatmentName)){
                        $treatment->name =  strtolower($request->name);
                        $treatment->patient_id = Auth::user()->id;
                        $treatment->start_time = !empty($request->starttime) ? date('H:i', strtotime($request->starttime)) : NULL;
                        $treatment->end_time = !empty($request->endtime) ? date('H:i', strtotime($request->endtime)) : NULL;
                        $treatment->start_break = !empty($request->startbreak) ? date('H:i', strtotime($request->startbreak)) : NULL;
                        $treatment->end_break = !empty($request->endbreak) ? date('H:i', strtotime($request->endbreak)) : NULL;
                        $treatment->duration = $request->treatment_duration;
                        $treatment->save();
                        return response()->json(['msg' => 'Treatment added successfully', 'status' => 200]);
                    }
                    return response()->json(['msg' => 'Treatment already exists', 'status' => 413]);
                }
            }
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
        //
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
            $data = $this->treatment->where('id', $id)->first();
            $data['start_time'] = date('h:i A', strtotime($data->start_time));
            $data['end_time'] = date('h:i A', strtotime($data->end_time));
            $data['start_break'] = date('h:i A', strtotime($data->start_break));
            $data['end_break'] = date('h:i A', strtotime($data->end_break));
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
            $this->treatment::find($id)->delete();
            return [
                'status' => 200
            ];
        }
        catch(Exception $e){
            abort(500);
        }
    }
}

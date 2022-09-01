<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use View;
use Hash;
use Auth;

class DiseaseController extends Controller
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
                $result = $this->disease;
                if(!empty($request->search))
                {
                    $result = $result->where('name','like','%'.$request->search.'%');
                }
                $result = $result->paginate(50);
                $data = View::make('diseases.data', compact('result'))->render();
    
                return response()->json(['data' => $data]);
            }
            return view('diseases.index');
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
            if($request->diseaseid != null){
                $diseaseEditRec = [
                    'name' => strtolower($request->name)];
        
                $id = $request->diseaseid;
                $this->disease::where('id', $id)->update($diseaseEditRec);
            }
            else{
                $disease = $this->disease;
                $disease->name =  $request->name;
                $disease->created_by = Auth::user()->id;
                $disease->save();
            }
    
            return redirect('/diseases');
        }
        catch(Exception $e)
        {
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
            $data = $this->disease->where('id', $id)->first();
            return [
                'status' => 'true',
                'data' => $data
            ];
        }
        catch(Exception $e)
        {
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
            $this->disease::find($id)->delete();
            return [
                'status' => 200
            ];
        }
        catch(Exception $e)
        {
            abort(500);
        }
    }
}

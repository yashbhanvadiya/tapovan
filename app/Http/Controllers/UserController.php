<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Hash;
use Auth;

class UserController extends Controller
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
                $result = $this->user;
                if(!empty($request->search))
                {
                    $result = $result->where('firstname','like','%'.$request->search.'%')
                        ->orWhere('middlename','like','%'.$request->search.'%')->orWhere('lastname','like','%'.$request->search.'%')
                        ->orWhere('email','like','%'.$request->search.'%')->orWhere('mobile','like','%'.$request->search.'%')
                        ->orWhere('role','like','%'.$request->search.'%');
                }
                if(!empty($request->role))
                {
                    $result = $result->where('role', $request->role);
                }
                $result = $result->paginate(50);
                $data = View::make('users.data', compact('result'))->render();
    
                return response()->json(['data' => $data]);
            }
            return view('users.index');
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
        $id = "";
        if($request->userid != null){
            $userEditRec = [
                'firstname' => strtolower($request->firstname),
                'middlename' => strtolower($request->middlename),
                'lastname' => strtolower($request->lastname),
                'email' => strtolower($request->email),
                'mobile' => $request->mobile,
                'role' => $request->role,
                'status' => $request->status];

            if($request->password != null){
                $userEditRec['password'] = Hash::make($request->password);
            }
                
            $id = $request->userid;
            $this->user::where('id', $id)->update($userEditRec);
        }
        else{
            $user = $this->user::firstOrNew(array('id' => $id));
            $user->firstname = strtolower($request->firstname);
            $user->middlename = strtolower($request->middlename);
            $user->lastname = strtolower($request->lastname);
            $user->email = strtolower($request->email);
            $user->password = Hash::make($request->password);
            $user->mobile = $request->mobile;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->save();
        }

        return redirect('/users');
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
        $id = decrypt($id);
        $data = $this->user->where('id', $id)->first();
        return [
            'status' => 'true',
            'data' => $data
        ];
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
        $id = decrypt($id);
        $this->user::find($id)->delete();
        return [
            'status' => 200
        ];
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\staff;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class staffcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = staff::orderBy('uid','desc')->paginate(2);
        return view('staff.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('uid' ,$request->uid);
        Session::flash('name' ,$request->name);
        Session::flash('division' ,$request->division);

        $request->validate([
            'uid'=>'required|numeric|unique:staff,uid' ,
            'name'=>'required' ,
            'division'=>'required' ,
        ],[
            'uid.required' => 'You should fill UID section',
            'uid.numeric' => 'You should fill UID section with number',
            'uid.unique' => 'The UID is already in our database',
            'name.required' => 'You should fill NAME section',
            'division.required' => 'You should fill DIVISION section',
        ]) ;
        $data = [
            'uid'=>$request->uid,
            'name'=>$request->name,
            'division'=>$request->division,
        ];
        staff::create($data);
        return redirect()->to('staff')->with('Success','You successfuly update the data ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = staff::where('uid',$id)->first();
        return view('staff.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required' ,
            'division'=>'required' ,
        ],[
            'name.required' => 'You should fill NAME section',
            'division.required' => 'You should fill DIVISION section',
        ]) ;
        $data = [
         
            'name'=>$request->name,
            'division'=>$request->division,
        ];
        staff::where('uid',$id)->update($data);
        return redirect()->to('staff')->with('Success','You successfuly update the data ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       staff::where('uid', $id)->delete();
       return redirect()->to('staff')->with('Success','You successfuly delete the data ');
    }
}

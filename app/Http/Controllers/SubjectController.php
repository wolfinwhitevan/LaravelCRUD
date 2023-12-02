<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subjects::all();
        //$subjects = DB::select('SELECT * FROM subjects');
        //$subjects = DB::table('subjects')->get();
        return view('Users.subjects')->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.subjects_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request,[
            'sub_title'=>'required',
            'sub_room'=>'required'
        ]);

        if(!Subjects::create($validatedData)){
            $msg="error";
        }else{
            $msg="success";
        }
        return redirect('/')->with('store_subject',$msg);
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
    public function edit($id)
    {
        $subject = Subjects::find($id);
        //dd($subject);
        return view('Users.subjects_edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $this->validate($request,[
            'sub_title'=>'required',
            'sub_room'=>'required'
        ]);

        if(!Subjects::whereId($request->id)->update($validatedData)){
            $msg="error";
        }else{
            $msg="success";
        }
        return redirect('/')->with('update_subject',$msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subjects::findOrFail($id);
        $subject->delete();
        return redirect('/');
    }
}

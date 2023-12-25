<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subjects;
use App\Models\User_Subjects;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Displays a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Users.users')->with(compact('users'));
    }

    /**
     * Shows the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.users_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'password' => Hash::make(Str::random(10)),
        ]);
        $validatedData = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!User::create($validatedData)) {
            $msg = "error";
        } else {
            $msg = "success";
        }
        return redirect('/users');
    }

    /**
     * Displays the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Shows the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //dd($subject);
        return view('Users.users_edit', compact('user'));
    }

    /**
     * Updates the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if(!User::whereId($request->id)->update($validatedData)){
            $msg = "error";
        } else {
            $msg = "success";
        }
        return redirect('/users');
    }

    /**
     * Removes the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }

    public function user_subjects($id) {
        $user_subjects = User::with('subjects')->where('id', $id)->get();
        // $subjects = Subjects::with('users')->get();
        return view('Users.user_subjects')->with(compact('user_subjects'));
    }

    public function add_user_subjects($id) {
        $subjects = Subjects::all();
        $user = User::find($id);
        return view('Users.user_subjects_add')->with(compact('subjects', 'user'));
    }


    // This method is responsible for handling the addition of subjects to a user
    public function post_user_subjects(Request $request) {
        $subjects = array_keys($request->all()); // retrieves all the keys from the request
        $add_subjects = array(); // empty array to initialize to store subjects that need to be added
        //$user_id = $request->id;

        $existing = User_Subjects::where('user_id', $request->id)->pluck('subject_id')->toArray(); // queries the db to get existing subject ids associated with the user

        // checks if there are more than 2 subjects in the requests
        if(count($subjects) > 2) {
            for($x = 2; $x < count($subjects); $x++) {
                //$subject_id = $subjects[$x];

        // check and add subjects
                if(!in_array($subjects[$x], $existing)) {
                    array_push($add_subjects, ['user_id' => $request->id, 'subject_id' => $subjects[$x]]);
                }
            }
        }

        if(!empty($add_subjects)) {
            User_Subjects::insert($add_subjects);
        }
        return redirect('/user_subjects/'.$request->id);
    }

    // public function destroyUserSubjects($id) {
    //     $user_subjects = User_Subjects::findOrFail($id);
    //     $user_subjects->delete();
    //     return redirect('/user_subjects');
    // }

    public function destroyUserSubjects($user_id, $subject_id) {
        User_Subjects::where(['user_id' => $user_id, 'subject_id' => $subject_id])->delete();
        return redirect()->back();
    }
}
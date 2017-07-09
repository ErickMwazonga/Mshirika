<?php

namespace App\Http\Controllers;

use App\Institution;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;

class InstitutionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::latest()->get();
//        $institutions = DB::table('institutions')->simplePaginate(15);
        return view('institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::latest()->get();
        return view('institutions.create', compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'status' => 'required',
            'cname' => 'required|string|max:255',
            'phone' => 'required|min:10|numeric',
            'email' => 'required|string|email|max:255|unique:institutions',
        ]);

        $institution = Institution::create([
            'user_id' => auth()->id(),
            'name' => request('name'),
            'cname' => request('cname'),
            'status' => request('status'),
            'phone' => request('phone'),
            'email' => request('email'),
            'assignee' => '',
            'created_at'=>request('created_at')
        ]);

        $institutions = Institution::findOrFail($institution->id);

//        Mail::send('institutions.mails', [ 'institution'=>$institutions ], function ($message2) {
//
//            $message2->from('dianneprinsescah@gmail.com', 'You have successfully created an institution');
//
//            $message2->to('Email@mailtrap.io')->subject('Sending an email once an institution has been made');
//        });

        //sweet alert
        alert()->success('Thank you for creating an institution. To edit the institution, click on the institution name.', 'CRM')->autoclose(2000);

        return redirect('/institutions');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Institution $institution
     */
    public function show($id)
    {
        $institution = Institution::findOrFail($id);

        $users = DB::table('users')
                    ->where('email', 'like', '%cytonn.com')
                    ->pluck('name','name')
                    ->prepend('Select a category', '');

        return view('institutions.show', compact(['institution', 'users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Institution $institution
     */
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        return view ('institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Institution $institution
     */
    public function update(Request $request, $id)
    {
        $institution = Institution::findOrFail($id);
        $institution->update($request->all());
        //sweet alert
        alert()->success('Successfully Updated an Institution', 'CRM')->autoclose(2000);
        return redirect()->route('institutionShow', compact(['institution']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Institution $institution
     */
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();
        //sweet alert
        alert()->success('Successfully Deleted an Institution', 'CRM')->autoclose(2000);
        return redirect('institutions');
    }


    //Assigning employee to an institution

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Institution $institution
     */
    public function assignUpdate(Request $request, $id)
    {
        $institution = Institution::findOrFail($id);
        $institution->update($request->all());
        //sweet alert
        alert()->success('Successfully Assigned Employee to an Institution', 'CRM')->autoclose(2000);
//        return redirect('institutions');
        return redirect()->route('institutionShow', compact(['institution']));
    }
}

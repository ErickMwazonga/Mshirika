<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institution = Institution::get();
        return view('institutions.index', compact('institution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institution = Institution::get();
        return view('institutions.create', compact('institution'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institution = Institution::create($request->all());

        $institutions = Institution::findOrFail($institution->id);

        Mail::send('appointments.mail', [ 'institution'=>$institutions ], function ($message2) {

            $message2->from('dianneprinsescah@gmail.com', 'Change of salon regulations');

            $message2->to('Email@mailtrap.io')->subject('Sending an email once an institution has been made');
        });

        return redirect('/appointments')->with('message', 'Thank you for making the institution. To edit the institution, click on your username.');
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
//        $institution = Institution::findOrFail($id);
        return view('institutions.show', compact('institution'));
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
//        $institution = Institution::findOrFail($id);
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
//        $institution = Institution::findOrFail($id);
//        $institution->update($request->all());
        return redirect('institutions');
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
        return redirect('institutions')->with('message1', 'The appointment has been successfully deleted');
    }
}

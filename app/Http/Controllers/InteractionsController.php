<?php

namespace App\Http\Controllers;

use App\Interaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class InteractionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interactions = Interaction::latest()->get();
        return view('interactions.index', compact(['interactions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interactions = DB::table('interactions')
            ->pluck('name','id')
            ->prepend('Select a interaction', '');

        return view('interactions.create', compact('interactions'));
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
            'type' => 'required',
            'follow_up_items' => 'required|string|max:255',
        ]);

        $interaction = Interaction::create([
            'user_id' => auth()->id(),
            'interaction_id' => request('interaction_id'),
            'type' => request('type'),
            'follow_up_items' => request('follow_up_items'),
            'created_at'=>request('created_at')
        ]);

//        $interactions = Interaction::findOrFail($interaction->id);
//
//        Mail::send('interactions.mails', [ 'interaction'=>$interactions ], function ($message2) {
//
//            $message2->from('dianneprinsescah@gmail.com', 'You have successfully created an interaction');
//
//            $message2->to('Email@mailtrap.io')->subject('Sending an email once an interaction has been made');
//        });


        //sweet alert
        alert()->success('Thank you for creating an interaction', 'CRM')->autoclose(2000);

        return redirect('/interactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interaction = Interaction::findOrFail($id);

        return view('interactions.show', compact(['interaction']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interaction = Interaction::findOrFail($id);
        return view ('interactions.edit', compact('interaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interaction  $interaction
     * @return \Illuminate\Http\Response
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
     * @param  \App\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interaction $interaction)
    {
        //
    }
}

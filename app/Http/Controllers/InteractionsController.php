<?php

namespace App\Http\Controllers;

use App\Institution;
use App\Interaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class InteractionsController extends Controller
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
        $institutions = DB::table('institutions')
            ->paginate(15)
            ->pluck('name','id')
            ->prepend('Select an Institution', '');

        return view('interactions.create', compact('institutions'));
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
            'institution_id' => request('institution_id'),
            'type' => request('type'),
            'follow_up_items' => request('follow_up_items'),
            'created_at'=>request('created_at')
        ]);


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
        $institutions = DB::table('institutions')
            ->pluck('name','id')
            ->prepend('Select an Institution', '');
        return view ('interactions.edit', compact(['interaction', 'institutions']));
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
        $interaction = Interaction::findOrFail($id);
        $interaction->update($request->all());
        //sweet alert
        alert()->success('Successfully Updated an interaction', 'CRM')->autoclose(2000);
        return redirect()->route('interactionShow', compact(['interaction']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interaction = Interaction::findOrFail($id);
        $interaction->delete();
        //sweet alert
        alert()->success('Successfully Deleted an Interaction', 'CRM')->autoclose(2000);
        return redirect('interactions');
    }
}

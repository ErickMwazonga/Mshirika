<?php

namespace App\Http\Controllers;

use App\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealsController extends Controller
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
        $deals = Deal::latest()->get();
        return view('deals.index', compact(['deals']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interactions = DB::table('interactions')
            ->pluck('id','id')
            ->prepend('Select an Interaction ID', '');

        return view('deals.create', compact('interactions'));
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
            'name' => 'required|string|min:10',
            'description' => 'required|string|min:10',
            'company_ratio' => 'required|min:1|numeric',
            'institution_ratio' => 'required|min:1|numeric',
            'interaction_id' => 'required|min:1|numeric',

        ]);

        $deals = Deal::create([
            'name' => request('name'),
            'description' => request('description'),
            'company_ratio' => request('company_ratio'),
            'institution_ratio' => request('institution_ratio'),
            'interaction_id' => request('interaction_id'),
            'created_at'=>request('created_at')
        ]);

        return redirect('/deals');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = Deal::findOrFail($id);

        return view('deals.show', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Deal $id
     * @return \Illuminate\Http\Response
     * @internal param Deal $deal
     */
    public function edit($id)
    {
        $deal = Deal::findOrFail($id);

        $interactions = DB::table('interactions')
            ->pluck('id','id')
            ->prepend('Select an Interaction ID', '');

        return view ('deals.edit', compact(['deal', 'interactions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Deal $id
     * @return \Illuminate\Http\Response
     * @internal param Deal $deal
     */
    public function update(Request $request, $id)
    {
        $deals = Deal::findOrFail($id);
        $deals->update($request->all());
        //sweet alert
        alert()->success('Successfully Updated an interaction', 'CRM')->autoclose(2000);
        return redirect()->route('dealShow', compact(['deals']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deals = Deal::findOrFail($id);
        $deals->delete();
        //sweet alert
        alert()->success('Successfully Deleted a Deal', 'CRM')->autoclose(2000);
        return redirect('deals');
    }
}

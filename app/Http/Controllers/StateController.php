<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class StateController extends Controller
{
    protected $namespace = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = DB::table('states as s')
            ->join('countries as c', 'c.id', '=', 's.country_id')
            ->select('s.id','s.name','s.name_local','c.name as country_name')
            ->get();
            //$data = State::select('id','name','name_local')->get();
            return DataTables::of($data)->make(true);
        }

        $page_title = 'States';
        $page_description = 'This page is to show all the records in state table';

        return view('states.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $page_title = 'Add New State';
        $page_description = 'This page is to add new record in state table';

        //
        return view('states.create', compact('page_title', 'page_description','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'unique:states', 'max:50'],
            'name_local' => ['unique:states', 'max:50'],
            'short_tag' => ['required', 'unique:states', 'max:4'],
            'country_id' => ['required'],
        ]);

        State::create($request->all());

        return redirect()->route('state.index')
                        ->with('success','State created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        $country = Country::find($state->country_id);
        $page_title = 'Show State';
        $page_description = 'This page is to show state details';
        //
        return view('states.show',compact('state', 'page_title', 'page_description', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        $page_title = 'Edit State';
        $page_description = 'This page is to edit record in state table';
        //
        return view('states.edit',compact('state', 'page_title', 'page_description','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
        $request->validate([
            'name' => ['required', Rule::unique('states', 'name')->ignore($state), 'max:50'],
            'name_local' => [Rule::unique('states', 'name_local')->ignore($state), 'max:50'],
            'short_tag' => ['required', Rule::unique('states', 'name_local')->ignore($state), 'max:4'],
            'country_id' => ['required'],
        ]);

        $state->update($request->all());

        return redirect()->route('state.index')
                        ->with('success','State updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = State::where('id',$request->id)->delete();
        return Response()->json($com);
    }

    public function dataAjax(Request $request)
    {
        $search = $request->search;

        if($search == ''){
           $states = State::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $states = State::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($states as $state){
           $response[] = array(
                "id"=>$state->id,
                "text"=>$state->name
           );
        }
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;


class CountryController extends Controller
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
            $data = Country::select('id','name','name_local')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'countries.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $page_title = 'Countries';
        $page_description = 'This page is to show all the records in country table';

        return view('countries.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Country';
        $page_description = 'This page is to add new record in country table';

        //
        return view('countries.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // die();
        //
        $request->validate([
            'iso' => ['required', 'unique:countries', 'max:2'],
            'name' => ['required', 'unique:countries', 'max:50'],
            'name_local' => ['unique:countries', 'max:50'],
            'phone' => ['required', 'unique:countries', 'max:6'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/country/';
            $recordImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
        }

        Country::create($input);

        return redirect()->route('country.index')
                        ->with('success','Country created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $page_title = 'Show Country';
        $page_description = 'This page is to show country details';
        //
        return view('countries.show',compact('country', 'page_title', 'page_description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $page_title = 'Edit Country';
        $page_description = 'This page is to edit record in country table';
        //
        return view('countries.edit',compact('country', 'page_title', 'page_description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        $request->validate([
            'iso' => ['required', Rule::unique('countries', 'iso')->ignore($country), 'max:2'],
            'name' => ['required', Rule::unique('countries', 'name')->ignore($country), 'max:50'],
            'name_local' => [Rule::unique('countries', 'name_local')->ignore($country), 'max:50'],
            'phone' => ['required', Rule::unique('countries', 'phone')->ignore($country), 'max:8'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/country/';
            $recordImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
        }else{
            unset($input['image']);
        }


        $country->update($input);

        return redirect()->route('country.index')
                        ->with('success','Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Country::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}

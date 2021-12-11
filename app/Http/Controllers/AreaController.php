<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
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

            $data = DB::table('areas as aaa')
            ->join('cities as c', 'c.id', '=', 'aaa.city_id')
            ->select('aaa.id','aaa.name','aaa.name_local','c.name as city_name')
            ->get();
            return DataTables::of($data)->make(true);
        }

        $page_title = 'Areas';
        $page_description = 'This page is to show all the records in area table';

        return view('areas.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $page_title = 'Add New Area';
        $page_description = 'This page is to add new record in area table';

        //
        return view('areas.create', compact('page_title', 'page_description','cities'));
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
            'name' => ['required', 'unique:areas', 'max:50'],
            'name_local' => ['unique:areas', 'max:50'],
            'city_id' => ['required'],
        ]);

        Area::create($request->all());

        return redirect()->route('area.index')
                        ->with('success','Area created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        $city = City::find($area->city_id);
        $page_title = 'Show Area';
        $page_description = 'This page is to show area details';
        //
        return view('areas.show',compact('area', 'page_title', 'page_description','city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $city = City::find($area->city_id);
        $page_title = 'Edit Area';
        $page_description = 'This page is to edit record in area table';
        //
        return view('areas.edit',compact('area', 'page_title', 'page_description','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
        $request->validate([
            'name' => ['required', Rule::unique('areas', 'name')->ignore($area), 'max:50'],
            'name_local' => [Rule::unique('areas', 'name_local')->ignore($area), 'max:50'],
            'city_id' => ['required'],
        ]);

        $area->update($request->all());

        return redirect()->route('area.index')
                        ->with('success','Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Area::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appearance;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;


class AppearanceController extends Controller
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
            $data = Appearance::select('id','type')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'appearances.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $page_title = 'Appearances';
        $page_description = 'This page is to show all the records in appearance table';

        return view('appearances.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Appearance';
        $page_description = 'This page is to add new record in appearance table';

        //
        return view('appearances.create', compact('page_title', 'page_description'));
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
            'type' => ['required', 'unique:appearances', 'max:50'],
        ]);

        Appearance::create($request->all());

        return redirect()->route('appearance.index')
                        ->with('success','Appearance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function show(Appearance $appearance)
    {
        $page_title = 'Show Appearance';
        $page_description = 'This page is to show appearance details';
        //
        return view('appearances.show',compact('appearance', 'page_title', 'page_description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function edit(Appearance $appearance)
    {
        $page_title = 'Edit Appearance';
        $page_description = 'This page is to edit record in appearance table';
        //
        return view('appearances.edit',compact('appearance', 'page_title', 'page_description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appearance $appearance)
    {
        //
        $request->validate([
            'type' => ['required', Rule::unique('appearances', 'type')->ignore($appearance), 'max:50'],
        ]);

        $appearance->update($request->all());

        return redirect()->route('appearance.index')
                        ->with('success','Appearance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Appearance::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}

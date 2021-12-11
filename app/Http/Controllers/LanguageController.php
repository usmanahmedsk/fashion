<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;


class LanguageController extends Controller
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
            $data = Language::select('id','name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'languages.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $page_title = 'Languages';
        $page_description = 'This page is to show all the records in language table';

        return view('languages.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Language';
        $page_description = 'This page is to add new record in language table';

        //
        return view('languages.create', compact('page_title', 'page_description'));
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
            'short_code' => ['required', 'unique:languages', 'max:2'],
            'name' => ['required', 'unique:languages', 'max:50'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            // 'name_local' => ['unique:languages', 'max:50'],
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/language/';
            $recordImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
        }

        Language::create($input);

        return redirect()->route('language.index')
                        ->with('success','Language created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        $page_title = 'Show Language';
        $page_description = 'This page is to show language details';
        //
        return view('languages.show',compact('language', 'page_title', 'page_description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $page_title = 'Edit Language';
        $page_description = 'This page is to edit record in language table';
        //
        return view('languages.edit',compact('language', 'page_title', 'page_description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
        $request->validate([
            'short_code' => ['required', Rule::unique('languages', 'short_code')->ignore($language), 'max:2'],
            'name' => ['required', Rule::unique('languages', 'name')->ignore($language), 'max:50'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'name_local' => [Rule::unique('languages', 'name_local')->ignore($language), 'max:50'],
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/language/';
            $recordImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
        }else{
            unset($input['image']);
        }


        $language->update($input);

        return redirect()->route('language.index')
                        ->with('success','Language updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Language::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}

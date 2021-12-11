<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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

            $data = DB::table('categories as table1')
            ->join('categories as table2', 'table2.id', '=', 'table1.parent_id')
            ->select('table1.id','table1.name','table1.name_local','table2.name as parent_name')
            ->get();
            return DataTables::of($data)->make(true);
        }

        $page_title = 'Categories';
        $page_description = 'This page is to show all the records in category table';

        return view('categories.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $page_title = 'Add New Category';
        $page_description = 'This page is to add new record in category table';

        //
        return view('categories.create', compact('page_title', 'page_description','cities'));
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
            'name' => ['required', 'unique:categories', 'max:50'],
            'name_local' => ['unique:categories', 'max:50'],
            'city_id' => ['required'],
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $city = City::find($category->city_id);
        $page_title = 'Show Category';
        $page_description = 'This page is to show category details';
        //
        return view('categories.show',compact('category', 'page_title', 'page_description','city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $city = City::find($category->city_id);
        $page_title = 'Edit Category';
        $page_description = 'This page is to edit record in category table';
        //
        return view('categories.edit',compact('category', 'page_title', 'page_description','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category), 'max:50'],
            'name_local' => [Rule::unique('categories', 'name_local')->ignore($category), 'max:50'],
            'city_id' => ['required'],
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Category::where('id',$request->id)->delete();
        return Response()->json($com);
    }

    public function dataAjax(Request $request)
    {
        $search = $request->search;

        if($search == ''){
           $categories = Category::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $categories = Category::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($categories as $category){
           $response[] = array(
                "id"=>$category->id,
                "text"=>$category->name
           );
        }
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //список все категорий
        $categories = Category::orderBy('id','asc')->get();
        return view('categories.index', compact('categories'));
    }

    public function listMeny()
    {
        $categoriesTaskCount = Task::where('category_id','=','5')->count();
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categories = Category::orderBy('id','asc')->get();
        $tasks = Task::all();
        return view('categories.news', compact('categories','tasks','sortinglist','categoriesTaskCount'));
    }

    public function newsByCategory(Category $category)
    {
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categories = Category::orderBy('id','asc')->get();
        $tasks = Task::orderBy('created_at', 'desc')->get();
        
        return view('categories.categorynews', compact('category','categories','tasks','sortinglist'));
    }

    public function sorting(Request $request)
    {
        //$data = $request->all();
        $data = $request->all();
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categories = Category::orderBy('id','asc')->get();

        if($data['sorting'] == "0") {
            $tasks = Task::all();
        }elseif($data['sorting'] == "1") {
            $tasks = Task::orderBy('updated_at', 'asc')->get();
        }elseif($data['sorting'] == "2") {
            $tasks = Task::orderBy('updated_at', 'desc')->get();
        }elseif($data['sorting'] == "3") {
            $tasks = Task::orderBy('title', 'asc')->get();
        }elseif($data['sorting'] == "4") {
            $tasks = Task::orderBy('title', 'desc')->get();
        }

        return view('categories.news', compact('request','sortinglist','categories','tasks'));
    }

    public function newsByCategorySorting(Category $category,Request $request)
    {
        $data = $request->all();
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categories = Category::orderBy('id','asc')->get();

        if($data['sorting'] == "0") {
            $tasks = Task::all();
        }elseif($data['sorting'] == "1") {
            $tasks = Task::orderBy('updated_at', 'asc')->get();
        }elseif($data['sorting'] == "2") {
            $tasks = Task::orderBy('updated_at', 'desc')->get();
        }elseif($data['sorting'] == "3") {
            $tasks = Task::orderBy('title', 'asc')->get();
        }elseif($data['sorting'] == "4") {
            $tasks = Task::orderBy('title', 'desc')->get();
        }
        
        return view('categories.categorynews', compact('request','category','categories','tasks','sortinglist'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categories = Category::orderBy('id','asc')->get();

        $tasks = Task::where('title','like', '%'.$data['search'].'%')->orWhere('description','like', '%'.$data['search'].'%')->orWhere('updated_at','like', '%'.$data['search'].'%')->get();

        return view('categories.news', compact('request','sortinglist','categories','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Category::create($request->all());
        return redirect('/categorylist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
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
        $request->validate([
            'name' => 'required'
        ]);
        $category->update($request->all());
        return redirect('/categorylist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categorylist');
    }
}

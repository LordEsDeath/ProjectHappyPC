<?php

namespace App\Http\Controllers;

use App\Models\CategoryGames;
use App\Models\Games;
use Illuminate\Http\Request;

class CategoryGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorygames = CategoryGames::orderBy('id','asc')->get();
        return view('categorygames.index', compact('categorygames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorygames.create');
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
            'categoryName' => 'required'
        ]);
        CategoryGames::create($request->all());
        return redirect('/categorygamelist');
    }

      public function listMeny()
    {
      //  $categoriesGamesCount = Games::where('category_id','=','5')->count();,'categoriesGamesCount'
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categoryGames = CategoryGames::orderBy('id','asc')->get();
        $games = Games::all();
        return view('categoryGames.news', compact('categoryGames','games','sortinglist'));
    }

    public function gameByCategory(CategoryGames $categoryGames)
    {
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categoryGames = CategoryGames::orderBy('id','asc')->get();
        $games = Games::orderBy('created_at', 'desc')->get();
        
        return view('category.categoryGames', compact('categoryGames','category','games','sortinglist'));
    }

    public function sorting(Request $request)
    {
        //$data = $request->all();
        $data = $request->all();
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categoryGames = CategoryGames::orderBy('id','asc')->get();

        if($data['sorting'] == "0") {
            $games = Games::all();
        }elseif($data['sorting'] == "1") {
            $games = Games::orderBy('updated_at', 'asc')->get();
        }elseif($data['sorting'] == "2") {
            $games = Games::orderBy('updated_at', 'desc')->get();
        }elseif($data['sorting'] == "3") {
            $games = Games::orderBy('title', 'asc')->get();
        }elseif($data['sorting'] == "4") {
            $games = Games::orderBy('title', 'desc')->get();
        }

        return view('categoryGames.games', compact('request','sortinglist','categoryGames','games'));
    }

    public function gameByCategorySorting(CategoryGames $categoryGames,Request $request)
    {
        $data = $request->all();
        $sortinglist=array('all','date asc','date desc','title asc', 'title desc');
        $categoryGames = CategoryGames::orderBy('id','asc')->get();

        if($data['sorting'] == "0") {
            $games = Games::all();
        }elseif($data['sorting'] == "1") {
            $games = Games::orderBy('updated_at', 'asc')->get();
        }elseif($data['sorting'] == "2") {
            $games = Games::orderBy('updated_at', 'desc')->get();
        }elseif($data['sorting'] == "3") {
            $games = Games::orderBy('title', 'asc')->get();
        }elseif($data['sorting'] == "4") {
            $games = Games::orderBy('title', 'desc')->get();
        }
        
        return view('category.categoryGames', compact('request','categoryGames','category','games','sortinglist'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGames  $categoryGames
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGames $categoryGames)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGames  $categoryGames
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGames $categoryGames)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGames  $categoryGames
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGames $categoryGames)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGames  $categoryGames
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryGames $categoryGames)
    {
        //
    }
}

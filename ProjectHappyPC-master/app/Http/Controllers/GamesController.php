<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\CategoryGames;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorygames = CategoryGames::orderBy('categoryName','asc')->get();
        $games = Games::orderBy('created_at', 'desc')->get();
        return view('games.index', compact('games','categorygames')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gameByCategory(Request $request) {
        //из формы передан id категории
            $data = $request->all();//данные переданы формой
            $categorygames = CategoryGames::orderBy('categoryName','asc')->get();// все категории
            $selectCategory=$data['category_id'];
        //если выбран All - все
        if($data['category_id'] == "0") {
            return redirect('/gamelist');//возврат на полный список товаров
        }else{ //если выбрана категория
            //запрос на выбор по категории
            $games = Games::where('category_id', $data['category_id'])->get();
            return view('games.index', compact('games','categorygames','selectCategory'));
        }
    }
    public function create()
    {
        //Список категорий для выбора
        $categorygames = CategoryGames::orderBy('categoryName', 'asc')->get();
        return view('games.create', compact('categorygames'));
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
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'company' => 'required',
            'datecreate' => 'required',
        ]);
        $data = $request->all();//данные переданы формой
        if (!empty($request->file('image')) ) {
            $filename = $request->file('image')->getClientOriginalName();//имя файла картинки
            $data['image'] = $filename;//записали имя в базу (INSERT)
        }else{
            $data['image'] = "";
        }
        Games::create($data);
        //----------------закачка картинки root/images/
        $file = $request->file('image');//путь исходной картинки
        if(isset($filename)) {
            $file->move('../public/images/',$filename);//загрузка изображения
        }
        return redirect('/games');//возврат к списку новостей
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function edit(Games $games)
    {
        $categorygames = CategoryGames::orderBy('categoryName', 'asc')->get();//list category
        
        return view('games.edit', compact('categorygames','games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
        public function show(games $games)
    {
        //
        $categorygames = CategoryGames::orderBy('categoryName', 'asc')->get();
        return view('games.detail', compact('games','categorygames'));
    }

    public function update(Request $request, Games $games)
    {
        $request->validate([
            
        ]);
        $data = $request->all();//данные переданы формой
        if($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName();//имя файла картинки
            $data['image'] = $filename;//записали имя в базу (INSERT)
            //----------------закачка картинки root/images/
            $file = $request->file('image');//путь исходной картинки
            if($filename) {
                $file->move('../public/images/',$filename);//загрузка изображения
            }
        }
        $games->update($data);
        return redirect('/gamelist');//возврат к списку новостей
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function delete(Games $games)
    {
        $categorygames = CategoryGames::orderBy('categoryName', 'asc')->get();//list category
        
        return view('games.delete', compact('categorygames','games'));
        
    }

    public function destroy(Request $request,Games $games)
    {
        $request->validate([
            
        ]);
        $data = $request->all();//данные переданы формой
        if($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName();//имя файла картинки
            $data['image'] = $filename;//записали имя в базу (INSERT)
            //----------------закачка картинки root/images/
            $file = $request->file('image');//путь исходной картинки
            if($filename) {
                $file->move('../public/images/',$filename);//загрузка изображения
            }
        }
        $games->delete($data);
        return redirect('/gamelist');//возврат к списку новостей
        
    }
}

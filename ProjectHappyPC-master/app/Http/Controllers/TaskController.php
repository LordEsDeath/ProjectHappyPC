<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks','categories'));
    }
    //----------------limit
    public function listLimit()
    {
        $categories = Category::orderBy('name','asc')->get();
        $tasks = Task::orderBy('created_at', 'desc')->take(3)->get();
        return view('startMainPage', compact('tasks','categories'));
    }

    //------------- list task by category
    public function taskByCategory(Request $request) {
        //из формы передан id категории
            $data = $request->all();//данные переданы формой
            $categories = Category::orderBy('name','asc')->get();// все категории
            $selectCategory=$data['category_id'];
        //если выбран All - все
        if($data['category_id'] == "0") {
            return redirect('/productlist');//возврат на полный список товаров
        }else{ //если выбрана категория
            //запрос на выбор по категории
            $tasks = Task::where('category_id', $data['category_id'])->get();
            return view('tasks.index', compact('tasks','categories','selectCategory'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Список категорий для выбора
        $categories = Category::orderBy('name', 'asc')->get();
        return view('tasks.create', compact('categories'));
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
            'category_id' => 'required'
        ]);
        $data = $request->all();//данные переданы формой
        if (!empty($request->file('image')) ) {
            $filename = $request->file('image')->getClientOriginalName();//имя файла картинки
            $data['image'] = $filename;//записали имя в базу (INSERT)
        }else{
            $data['image'] = "";
        }
        Task::create($data);
        //----------------закачка картинки root/images/
        $file = $request->file('image');//путь исходной картинки
        if(isset($filename)) {
            $file->move('../public/images/',$filename);//загрузка изображения
        }
        return redirect('/productlist');//возврат к списку новостей
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        $categories = Category::orderBy('name', 'asc')->get();
        $comments = Comment::orderBy('body', 'asc')->get();
        $users = User::orderBy('name','asc')->get();
        return view('tasks.detail', compact('task','categories','comments','users'));
    }

    public function addcommentary() {
        $comments = Comments::orderBy('body', 'asc')->get();
        return view('comments.addcomment', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)//one record id task
    {
        $categories = Category::orderBy('name', 'asc')->get();//list category
        
        return view('tasks.edit', compact('categories','task'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            // 'title' => 'required',
            // 'description' => 'required',
            // 'category_id' => 'required'
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
        $task->update($data);
        return redirect('/productlist');//возврат к списку новостей
        
    }

    public function delete(Task $task)//one record id task
    {
        $categories = Category::orderBy('name', 'asc')->get();//list category
        
        return view('tasks.delete', compact('categories','task'));
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Task $task)
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
        $task->delete($data);
        return redirect('/productlist');//возврат к списку новостей
    }
}

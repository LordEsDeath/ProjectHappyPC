@extends('layouts.appMain')

@section('content')
<div class="container">

    <form action="{{ url('gamessort') }}" method="POST" >
        @csrf

        <div class="form-group">
            <label> Sorting: </label>
            <select class="form-control input-sm" name="sorting" onChange=submit();>
                @foreach ($sortinglist as $key=>$sorting)
                    <option value="{{ $key }}"
                    
                    > {{ $sorting }} </option>
                @endforeach
            </select>
        </div>

    </form>
    

    <div class="form-group col-md-2" style="width:200px;height:100vh">
        <h2>News Portal</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/news') }}">Все новости</a>
            </li>
            
            @foreach ($categories as $category)
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/categorynews/'.$category->id) }}">{{$category->name}} ({{ count($category->task) }})</a>
                </li>
                
            @endforeach
        </ul>
    </div>

    <div class="box-body">  
        @foreach ($tasks as $task)
        <div class="form-group col-md-6" style="margin-left:50px;margin-top:50px;border:1px solid silver;border-radius:4px;padding:5px;">

            <div class="form-group col-md-4"  style="padding:10px;">
                <img class="img-thumbnail" style="width: 170px;height:auto" src="../images/{{$task->image}}">
            
            </div>
            <h4>{{$task->title}}</h4>
            <p>
                @foreach ($categories as $category)
                    @if($task->category_id == $category->id) 
                        <div value="{{ $category->id }}">
                            <strong>Category</strong> - {{ $category -> name }}
                        </div>
                    @endif
                @endforeach
            </p>
            <p>Date Update - {{$task->updated_at->format('d-m-Y')}}</p>
            <a class="btn btn-warning" href="{{url('show/'.$task->id)}}">Подробнее</a>

            <!-- !!!!!!!!! -->
            <p class="commentscount"><span class="spancomment"> Comments count: </span> {{ count($task->comments) }}</p>
            
        </div>

        @endforeach
    </div>

</div>
@endsection
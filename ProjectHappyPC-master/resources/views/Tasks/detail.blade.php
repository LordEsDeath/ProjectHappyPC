@extends('layouts.appMain')

@section('content')

<div style="border-radius: 30px ;border: 2px solid #F3F3F3; margin-top: 70px; box-shadow: 10px 5px 5px black; background-color: #F3F3F3 " class="box-body" style="padding:50px;">
    
    <h1 style="padding:5px;">{{$task->title}}</h1>

    
        <div class="form-group col-md-4">
            <img class="img-thumbnail" style="width: 40vh;height:auto" src="../images/{{$task->image}}">
        </div>

        
        <div class="form-group col-md-4">
            <p>{{ $task -> description }}</p>

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
        
        </div>
    
</div>

<div class="" style="margin-top:50px;padding-left:50px;">
        
        <a href="/news" class="btn btn-warning" style="font-size: 1.2em;">
            Back to list
            <span class="glyphicon glyphicon-hand-down"></span>
        </a>
        
</div>

<hr>
@if (Auth::check())

    <div class="container">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Comments Add</h4></div>
                <div class="panel-body">
                    <form action="{{url('comments')}}" method="POST">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Comment text <i>(1000 symbols)</i></strong>
                                        <textarea class="form-control" style="height:50px" name="body" required ></textarea>
                                    </div>
                                </div>
                                <!-- Это id новости для комментов -->
                                <input type="hidden" name="taskid" value="{{ $task->id }}" class="form-control" placeholder="newsId" readonly>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Send comment</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

<hr>
<div class="container">
    <h4>Comment List</h4>
    @forelse ($task->comments as $comment)
        <p><i>Author: </i>{{ $comment->user->name }} <br>
            <i>Date created: </i>{{ date('d-m-Y', strtotime($comment->created_at )) }}
        </p>
        <p>
            <span class="spanclass">Commnet: </span> {{ $comment->body }}
        </p>
        <hr>
        @empty
            <p>This post has no commnets</p>
    @endforelse
</div>





@endsection
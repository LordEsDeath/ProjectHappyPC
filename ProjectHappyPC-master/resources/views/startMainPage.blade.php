@extends('layouts.appMain')

@section('content')

    
    <div class="box-body">
        
        @foreach($tasks as $task)

            <div class="form-group col-sm-3">

                <div class="img-thumbnail">
                    <img style="width: 250px;height:150px" src="../images/{{$task->image}}">
                </div>

                <p style="width: 250px;padding:5px;">{{$task->title}}</p>

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

                <a href="{{url('show/'.$task->id)}}">Подробнее</a>
                
            </div>

        @endforeach
    </div>
@endsection


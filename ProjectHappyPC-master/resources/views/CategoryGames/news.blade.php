@extends('layouts.appMain')

@section('content')
<div class="container">

    <form action="{{ url('newssort') }}" method="POST" >
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
        <h2>Games</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/games') }}">Все Игры</a>
            </li>
            
            @foreach ($categoryGames as $category)
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/categoryGames/'.$category->id) }}">{{$category->categoryName}} ({{ count($category->gamess) }})</a>
                </li>
                
            @endforeach
        </ul>
    </div>

    <div class="box-body">  
        @foreach ($games as $game)
        <div class="form-group col-md-6" style="margin-left:50px;margin-top:50px;border:1px solid silver;border-radius:4px;padding:5px;">

            <div class="form-group col-md-4"  style="padding:10px;">
                <img class="img-thumbnail" style="width: 170px;height:auto" src="../images/{{$game->image}}">
            
            </div>
            <h4>{{$game->title}}</h4>
            <p>
                @foreach ($categoryGames as $category)
                    @if($game->category_id == $category->id) 
                        <div value="{{ $category->id }}">
                            <strong>Category</strong> - {{ $category -> categoryName }}
                        </div>
                    @endif
                @endforeach
            </p>
            <p>Date Update - {{$game->updated_at->format('d-m-Y')}}</p>
            <a class="btn btn-warning" href="{{url('showgame/'.$game->id)}}">Подробнее</a>

   
        </div>

        @endforeach
    </div>

</div>
@endsection
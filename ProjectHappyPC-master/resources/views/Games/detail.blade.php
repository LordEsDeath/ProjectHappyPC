@extends('layouts.appMain')

@section('content')

<div class="box-body" style="padding:50px;">
    
    <h1 style="padding:5px;">{{$games->title}}</h1>

    
        <div class="form-group col-md-4">
            <img class="img-thumbnail" style="width: 40vh;height:auto" src="../images/{{$games->image}}">
        </div>

        
        <div class="form-group col-md-4">
            <strong>Описание:</strong>
            <p>{{ $games -> description }}</p>

            <p>
                @foreach ($categorygames as $category)
                    @if($games->category_id == $category->id) 
                        <div value="{{ $category->id }}">
                            <strong>Category</strong> - {{ $category -> categoryName }}
                        </div>
                    @endif
                @endforeach
            </p>
            <p>
            <strong>Компания:</strong>{{$games -> company}}</p>
            <p>
            <strong>Дата создания</strong>{{$games -> datecreate}}</p>

            <p>Date Update - {{$games->updated_at->format('d-m-Y')}}</p>
        
        </div>
    
</div>

<div class="" style="margin-top:50px;padding-left:50px;">
        
        <a href="/games" class="btn btn-warning" style="font-size: 1.2em;">
            Back to game list
            <span class="glyphicon glyphicon-hand-down"></span>
        </a>
        
</div>

<hr>


<footer> 
    <p style="margin-top:150px;text-align:center;">2022 HappyPC News Portal&#169; Main site</p>
</footer>

@endsection
@extends('layouts.app')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title"><strong> Games List manage</strong></h3>
    <div class="add">
        <a href="addgames" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New </a>
    </div>
    <!-- форма список категорий для фильтрации данных -->
    <div class="pull-right">
        <form class="form-inline" action="{{ url('gameByCategory') }}" method="POST">
            @csrf
            <div class="form-group">
                <label> CategoryGame: </label>
                <select class="form-control input-sm" name="category_id" onChange=submit();>
                    <option value="0">All</option>
                    @foreach ($categorygames as $category)
                        <option value="{{ $category->id }}"
                        @if(isset($selectCategory) && $category->id == $selectCategory) selected @endif
                        >{{ $category -> name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>

<div class="box-body">
    @if (count($games ?? '') > 0)
    <table class="table table-bordered">
        <thead>
            <th width=3%>N/#</th>
            <th width="20%">Title</th>
            <th>CategoryGames</th>
            <th>DateCreate</th>
            <th>Company</th>
            <th>Date Update</th>
            <th>Tools</th>
        </thead>
        <tbody>
            @foreach($games as $game)
                <tr>
                    <td> {{ $game->id }} </td>
                    <td> {{ $game->title }} </td>
                    <td> {{ $game->category_id }} - {{ $game->categorygames->categoryName }}</td>
                    <td> {{ $game->datecreate }} </td>
                    <td> {{ $game->company }}</td>
                    <td> {{ $game->updated_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ url('editgame/'.$game -> id) }}" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i>Edit</a>
                        <a href="{{ url('deletegame/'.$game -> id) }}" class="btn btn-danger btn-sm edit btn-flat"><i class="fa fa-edit"></i>Delete</a>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td colspan=4>
                        {{ $game -> description }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Data no found</p>
    @endif
</div>
@endsection
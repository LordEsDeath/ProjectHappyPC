@extends('layouts.app')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title"><strong> News List manage</strong></h3>
    <div class="add">
        <a href="addtask" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New </a>
    </div>
    <!-- форма список категорий для фильтрации данных -->
    <div class="pull-right">
        <form class="form-inline" action="{{ url('productByCategory') }}" method="POST">
            @csrf
            <div class="form-group">
                <label> Category: </label>
                <select class="form-control input-sm" name="category_id" onChange=submit();>
                    <option value="0">All</option>
                    @foreach ($categories as $category)
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
    @if (count($tasks ?? '') > 0)
    <table class="table table-bordered">
        <thead>
            <th width=3%>N/#</th>
            <th width="20%">Title</th>
            <th>Category</th>
            <th>Date Update</th>
            <th>Tools</th>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td> {{ $task->id }} </td>
                    <td> {{ $task->title }} </td>
                    <td> {{ $task->category_id }} - {{ $task->category->name }}</td>
                    <td> {{ $task->updated_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ url('edittask/'.$task -> id) }}" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i>Edit</a>
                        <a href="{{ url('deletetask/'.$task -> id) }}" class="btn btn-danger btn-sm edit btn-flat"><i class="fa fa-edit"></i>Delete</a>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td colspan=4>
                        {{ $task -> description }}
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
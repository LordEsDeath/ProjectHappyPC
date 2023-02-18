@extends('layouts.app')

@section('content')
<!-- content categories list -->
<div class="box-header with-border">
    <h3 class="box-title"><strong>Category Game manage - Add</strong></h3>
</div>
<div class="box-body">
    <div class="add">
        <a href="categorygamelist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back</a>
    </div>
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Category Form -->
        <form action="{{ url('addcategorygame')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Category Name -->
            <div class="form-group">
                <label for="games-name" class="col-sm-3 control-label">Category Game</label>

                <div class="col-sm-6">
                    <input type="text" name="categoryName" id="category-name" class="form-control" value="">
                </div>
            </div>

            <!-- Add Category Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i> Add Category
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
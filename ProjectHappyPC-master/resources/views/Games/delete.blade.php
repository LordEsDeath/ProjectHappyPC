@extends('layouts.app')
@section('content')
<!-- content categories -->
<div class="box-header with-border">
    <h3 class="box-title"><strong> Games manage - Delete</strong></h3>
</div>
<div class="box-body">
    <div class="add">
        <a href="/gamelist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back</a>
    </div>
    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- Category EditForm -->
        <form action="" method="POST" enctype="">
			@csrf			
			         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <div>{{ $games -> title }}</div>
                </div>
            </div>          
            <div class="col-xs-12 col-sm-12 col-md-12">
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CategoryGame:</strong>
                
                    <div>
                        @foreach ($categorygames as $category)
                                @if ($category->id==$games->category_id)
                                {{ $category->categoryName }}
                                @endif
                        @endforeach
                    
                    </div>

                        
                </div>
                <div class="form-group">
                        <strong>Image:</strong>
                </div>
                <img src="../images/{{ $games -> image }}">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Delete Game</button>
                </div>
            </div>
		</form>
    </div>
</div>

@endsection
<!--  -->
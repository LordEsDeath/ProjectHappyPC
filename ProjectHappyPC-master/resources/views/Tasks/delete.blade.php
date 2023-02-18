@extends('layouts.app')
@section('content')
<!-- content categories -->
<div class="box-header with-border">
    <h3 class="box-title"><strong> Categories manage - Delete</strong></h3>
</div>
<div class="box-body">
    <div class="add">
        <a href="/productlist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back</a>
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
					<div>{{ $task -> title }}</div>
				</div>
			</div>			
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Description:</strong>
					<div  style="height:50px" 
						placeholder="Description">{{ $task -> description }}</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Category:</strong>
				
                    <div>
                        @foreach ($categories as $category)
                                @if ($category->id==$task->category_id)
                                {{ $category->name }}
                                @endif
                        @endforeach
                    
                    </div>

                        
                </div>
                <div class="form-group">
                        <strong>Image:</strong>
                </div>
                <img src="../images/{{ $task -> image }}">						
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Delete task</button>
                </div>
            </div>
                		
		</form>
    </div>
</div>
@endsection
<!--  -->
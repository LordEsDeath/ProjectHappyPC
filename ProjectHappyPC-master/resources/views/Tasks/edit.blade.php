@extends('layouts.app')
@section('content')
<!-- content categories -->
<div class="box-header with-border">
    <h3 class="box-title"><strong> Task manage - Edit</strong></h3>
</div>
<div class="box-body">
	<div class="container">
		<div class="add">
			<a href="/productlist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back</a>
		</div>
   
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- Category EditForm -->
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@csrf
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Title</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="title" value="{{ $task -> title }}" class="" placeholder="Title">
					</div>
				</div>
			
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Description</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="" value="{{ $task -> description }}" class="" placeholder="Description">
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Categories</label>
					<div class="col-sm-6">
						<select name="category_id" class="form-control" id="">															
						@foreach ($categories as $category)			
							<option value="{{$category->id}}" 
							@if ($category->id==$task->category_id)
								selected
							@endif
							>{{$category->name}}</option>						
						@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Previous image</label>
					<div class="col-sm-6">
						<img src="../images/{{ $task -> image }}" class="col-sm-6">
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">New image:</label>
					<div class="col-sm-6">
						<input type="file" name=""  class="form-control" value=""> 
					</div>
				</div>
									
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary form-control">Save task</button>
					</div>
				</div>
		</form>
    </div>
</div>

@endsection
<!--  -->
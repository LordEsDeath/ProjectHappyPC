@extends('layouts.app')
@section('content')
<!-- content categories -->
<div class="box-header with-border">
    <h3 class="box-title"><strong> Game manage - Edit</strong></h3>
</div>
<div class="box-body">
	<div class="container">
		<div class="add">
			<a href="/gamelist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back</a>
		</div>
   
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- Category EditForm -->
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
			@csrf
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Title</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="title" value="{{ $games -> title }}" class="" placeholder="Title">
					</div>
				</div>
			
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Description</label>
					<div class="col-sm-6">
						<textarea  class="form-control" style="height:50px" name="" value="{{ $games -> description }}" class="" placeholder="Description"></textarea> 
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">CategoryGame</label>
					<div class="col-sm-6">
						<select name="category_id" class="form-control" id="">															
						@foreach ($categorygames as $category)			
							<option value="{{$category->id}}" 
							@if ($category->id==$games->category_id)
								selected
							@endif
							>{{$category->categoryName}}</option>						
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">
					DateCreate:</label>
					<div class="col-sm-6">
					<input type="date" class="form-control" name="" value="{{ $games -> datecreate }}" class="" placeholder="DateCreate"></div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">
					Company:</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" name="" value="{{ $games -> company }}" class="" placeholder="Company"></div>
				</div>
			</div>

				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Previous image</label>
					<div class="col-sm-6">
						<img src="../images/{{ $games -> image }}" class="col-sm-6">
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
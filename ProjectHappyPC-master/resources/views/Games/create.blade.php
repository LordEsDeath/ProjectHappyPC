@extends('layouts.app')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Games manage - Add task</strong></h3>
	<div class="add">
	<a href="gamelist" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-backward"></i> Back to list</a>
	</div>

</div>

<div class="box-body">
	<div class="container">
        <div class="col-lg-9 margin-tb">
			@if ($errors->any())
				<div class="alert alert-danger">
					<strong>Error!</strong> 
					<ul>
						@foreach ($errors->all() as $error)
							<li></li>
						@endforeach
					</ul>
				</div>
			@endif
		<form action="" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Title:</strong>
					<input type="text" name="title" class="form-control" placeholder="Title">
				</div>
			</div>	

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Description:</strong>
					<textarea class="form-control" style="height:50px" name="description"
						placeholder="Description"></textarea>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>CategoryGames:</strong>
				<select name="category_id" class="form-control" >															
					@foreach ($categorygames as $category) 						
						<option value="{{$category->id}}" >{{$category->categoryName}}</option>						
					@endforeach
					  
				</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>DateCreate:</strong>
					<input type="date" name="datecreate" class="form-control" placeholder="datecreate">
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Company:</strong>
					<input type="text" name="company" class="form-control" placeholder="company">
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Image:</strong>
				  <input type="file" name="image"  class="form-control" value="">  
				</div>
			</div>	

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Save game</button>
			</div>			
		</form>
		</div>
    </div>
</div>

@endsection
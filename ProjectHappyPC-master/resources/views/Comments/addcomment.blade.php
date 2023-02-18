@extends('layouts.appMain')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Comment manage - Add comment</strong></h3>
	<div class="add">
	<a href="productlist" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-backward"></i> Back to list</a>
	</div>

</div>

<form action="" method="POST" >
	@csrf
    
</form>
@endsection
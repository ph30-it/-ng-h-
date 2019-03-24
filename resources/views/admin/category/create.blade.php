@extends('admin.layout.master')
@section('content')

<div class="container">
	
	<form action="{{ route('addcategory')}}" method="POST">
	@csrf
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name">
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@endsection
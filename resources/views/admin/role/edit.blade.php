@extends('admin.layout.master')
@section('content')
<h1>EDIT Role</h1>
<div class="container">
	
	<form action="{{ route('update-role', $role->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	  <div class="form-group">
	    <label for="name">Name :</label>
	    <input type="text" class="form-control" id="name" name="name"  value="{{ $role->name }}" style="width: 300px">
	  </div>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection
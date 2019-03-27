@extends('admin.layout.master')
@section('content')
<h3 style="text-align: center;">Create Role</h3> <br> 
<div class="container" style="margin-left: 400px">
	
	<form action="{{ route('addrole')}}" method="POST" ><!-- ho tro up loat file  muti-->
	@csrf
	  <div class="form-group">
	    <label for="Role" >Role:</label>
	    <input type="text" class="form-control" id="role" name="role" style="width: 300px"><br>
	  </div>
	  </div>
	  <button type="submit" class="btn btn-default" style="margin-left: 470px" >Submit</button>
	</form>
</div>

@endsection
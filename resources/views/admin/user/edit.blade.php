@extends('admin.layout.master')
@section('content')
               
    <div class="container" style="width: 400px">
	
	<form action="{{ route('update-user', $user->id)}}" method="POST">
	@csrf
	@method('PUT')
	  <label for="role_id">Role_id:</label>
	    <select name="role_id" id="role_id">
	    	@foreach ($role as $key => $value)
	    		<option value="{{$key}}" {{ $key == $user->role_id ? 'selected' : '' }}> {{ $value }}</option>
	    	@endforeach
	    </select><br>
	    <button type="submit" class="btn btn-default "  >Submit</button>
	  </div>
	</form>
</div>
@endsection
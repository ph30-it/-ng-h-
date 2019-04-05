@extends('admin.layout.master')
@section('content')
<div style="background: #66CC33;height: 40px">
      <h3 style="text-align: center;color:white " ><i>Chào mừng bạn tới trang Comment </i></h3> <br>  
          </div>
                  @if(session('status'))
                 <div style="background: #66CC33;height: 50px;margin-bottom: -25px ">
                  <p style="text-align: center;color: white"><b>{{session('status')}}</b></p>
                 </div><br>
             @endif 
<div class="container" style="width: 600px">
	
	<form action="{{ route('update-comment', $comment->id)}}" method="POST">
	@csrf
	@method('PUT')
	  <div class="form-group">
	    <label for="title">Tiêu đề :</label>
	    <input type="text" class="form-control" id="title" name="title"  value="{{ $comment->title }}">
	  </div>
	<div class="form-group">
	   <label for="comtent">Nội dung:</label>
	    <input type="text" class="form-control" id="content" name="content" value="{{$comment->content}}">
	  </div>
	    <button type="submit" class="btn btn-default "  >lưu <i class='fas fa-vote-yea'></i></button>
	  </div>
	</form>
</div>
@endsection
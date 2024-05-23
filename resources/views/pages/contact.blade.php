@extends('layouts.app')
@section('content')
<!------ Bao gồm phần trên vào thẻ HEAD của bạn ---------->

<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img class="contact-image" src="{{asset('/images/istockphoto-1271752802-612x612.jpg')}}" alt="hình ảnh"/>
				<h2>Liên hệ với chúng tôi</h2>
				<h4>Chúng tôi rất vui khi được nghe từ bạn!</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">Tên:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Nhập tên" name="fname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Họ:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="lname" placeholder="Nhập họ" name="lname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Bình luận:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Gửi</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div nh-row="oy9e75x" class="bg-breadcrums py-20 mb-20">
	<div class="container">
	   <div class="row ">
		  <div class="col-md-12 col-12">
			 <div nh-block="mz4eo5d" nh-block-cache="false" class="">
				<nav class="breadcrumbs-section">
				   <a href="/">Trang chủ</a>
				   <a href="{{url()->current()}}">Liên Hệ</a>
				</nav>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
<div nh-row="853t1a6" class="">
	<div class="container">
	   <div class="row ">
		  <div class="col-md-12 col-12">
			 <div nh-block="pvjcryf" nh-block-cache="true" class="">
				<div class="row justify-content-center mb-40 align-items-center mt-30">
				   <div class="col-12 col-lg-8">
					  
					  <div class="bg-white p-30 rounded-10 shadow">
						 <form action="{{route('postcontact')}}" method="POST">
							@csrf
							<div class="form-group"><input name="name" id="full_name" type="text" class="form-control bg-white rounded" placeholder="Họ và tên" required></div>
							<div class="form-group"><input name="phone" id="phone" type="text" class="form-control bg-white rounded" placeholder="Số điện thoại" required> </div>
							<div class="form-group"><input name="email" id="title" type="text" class="form-control bg-white rounded" placeholder="Email"></div>
							<div class="form-group"><textarea name="mess" id="content" maxlength="500" class="bg-white rounded border" placeholder="Nội dung"></textarea></div>
							<div class="form-group"><button type="submit" class="bg-red btn btn-1a color-white rounded">Gửi tin nhắn</button></div>
						 </form>
					  </div>
				   </div>
				   <div class="col-12 col-lg-4">
					  <div class="contact-info-website entire-info-website bg-red color-white p-30 rounded-10 shadow mt-20 mt-lg-80">
						 <p class="color-white font-weight-bold fs-lg-17 fs-15 text-uppercase">Bạn cần gặp trực tiếp chúng tôi</p>
						 <address class="mb-0">
							<p><i class="color-white las la-headphones-alt"></i>Địa chỉ: {{$setting->address1}}</p>
							<p><i class="color-white las la-headphones-alt"></i>Hotline: {{$setting->phone1}}</p>
							<p class="mb-0"><i class="color-white las la-envelope-open"></i>Email: {{$setting->email}} </p>
						 </address>
					  </div>
				   </div>
				</div>
			 </div>
			 {!!$setting->iframe_map!!}
		  </div>
	   </div>
	</div>
 </div>
@endsection
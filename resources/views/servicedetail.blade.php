@extends('layouts.main.master')
@section('title')
{{($detail_service->name)}}
@endsection
@section('description')
{{($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
 <section class="page-title page-title-13" id="page-title">
    <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
       <div class="bg-section"><img src="{{url('frontend/images/servicebrem.jpg')}}" alt="Background" /></div>
       <div class="container">
          <div class="row">
             <div class="col-12 col-lg-8 offset-lg-2">
                <div class="title text-center">
                   <h1 class="title-heading">{{($detail_service->name)}} </h1>
                   <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
					  <li class="breadcrumb-item"><a href="">{{$detail_service->cate->name}}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{($detail_service->name)}} </li>
                   </ol>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="blog blog-single" id="blog">
	<div class="container">
	   <div class="row">
		  <div class="col-sm-12 col-md-12 col-lg-8">
			 <div class="blog-entry">
				<div class="entry-content">
				   <div class="entry-title">
					  <h4>{{($detail_service->name)}}</h4>
				   </div>
				   <div class="entry-bio">
					{!!languageName($detail_service->content)!!}
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="col-12 col-lg-4">
			 <div class="sidebar sidebar-blog">
				
				<div class="widget widget-categories">
				   <div class="widget-title">
					  <h5>Danh mục dịch vụ</h5>
				   </div>
				   <div class="widget-content">
					  <ul class="list-unstyled">
						@foreach ($serviceCate as $item)
						<li><a href="{{route('serviceList',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
						@endforeach
						@foreach ($categoryhome as $item)
						<li><a href="{{route('allListProCate',['danhmuc'=>$item->slug])}}">{{languageName($item->name)}}</a></li>
						@endforeach
					  </ul>
				   </div>
				</div>
				<div class="widget widget-recent-posts">
					<div class="widget-title">
					   <h5>Dịch vụ liên quan</h5>
					</div>
					<div class="widget-content">
						@foreach ($servicelq as $item)
						<div class="post">
							<div class="post-img"><img src="{{$item->image}}" alt="post img" /></div>
							<div class="post-content">
							   <div class="post-title"><a href="{{route('serviceDetail',['danhmuc'=>$item->cate_slug,'slug'=>$item->slug])}}">{{$item->name}}</a></div>
							</div>
						 </div>
						@endforeach
					</div>
				 </div>
			 </div>
		  </div>
	   </div>
	</div>
 </section>
 <section class="shop shop-2">
	<div class="container">
	   <div class="row">
		  <div class="col-12">
			 <h5>Sản phẩm liên quan</h5>
		  </div>
	   </div>
	   <div class="row">
		@foreach ($productlq as $item)
		@php
                    $img = json_decode($item->images);
                @endphp
		<div class="col-12 col-md-6 col-lg-3">
			<div class="product-item" data-hover="">
			   <div class="product-img-wrap">
				  <div class="product-img"><img src="{{$img[0]}}" alt="Product"><span class="badge d-none"></span>
				  </div>
			   </div>
			   <div class="product-content">
				  <div class="product-title"><a href="{{route('detailProduct',['cate'=>$item->cate_slug,'type'=>$item->type_slug ? $item->type_slug : 'loai','id'=>$item->slug])}}">pentair controller</a></div>
				  <div class="product-price"><span>{{$item->price > 0 ? number_format($item->price).'đ' : 'Liên hệ'}}</span></div>
			   </div>
			</div>
		 </div>
		@endforeach
	   </div>
	</div>
 </section>
@endsection
@extends('layouts.main.master')
@section('title')

@endsection
@section('description')
{{$detail->name}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<section class="page-title page-title-13" id="page-title">
   <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
      <div class="bg-section"><img src="{{url('frontend/images/13.jpg')}}" alt="Background" /></div>
      <div class="container">
         <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
               <div class="title text-center">
                  <h1 class="title-heading">{{$detail->name}} </h1>
                  <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="{{route('duanTieuBieu')}}">Dự án</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{$detail->name}} </li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="projects projects-grid" id="projects-grid-1">
   <div class="carousel owl-carousel carousel-dots carousel-navs" data-slide="4" data-slide-rs="1" data-center="data-center" data-autoplay="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="800">
    @php
        $img = json_decode($detail->images);
    @endphp
    @foreach ($img as $item)
    <div>
        <div class="project-panel" data-hover="">
            <div class="project-panel-holder">
                <div class="project-img"><a class="link" href="java"></a><img src="{{$item}}" alt="{{$detail->name}}" /></div>
            </div>
        </div>
    </div>
    @endforeach  
    
   </div>
</section>
<section class="about about-2" id="about-2">
   <div class="about-wrapper">
      <div class="video-wrapper">
         <div class="video video-2" id="video-2">
            <div class="bg-section"><img src="{{$img[0]}}" alt="background" /></div>
         </div>
      </div>
      <div class="about-block-wrapper">
         <div class="about-block">
            <div class="heading heading-1">
               <p class="heading-subtitle heading-subtitle-bg">Dự án nổi bật</p>
               <h2 class="heading-title">{{$detail->name}}</h2>
               <div class="advantages-list-holder">
                <div class="row">
                   <div class="col-12 col-md-12">
                      <ul class="list-unstyled advantages-list">
                         <li>Vị trí: {{$detail->location}}</li>
                         <li>Quy mô: {{$detail->scale}}</li>
                         <li>Vận hành: {{$detail->operate}}</li>
                      </ul>
                   </div>
                </div>
             </div>
               <div>
                {!!languageName($detail->content)!!}
               </div>
               
               
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
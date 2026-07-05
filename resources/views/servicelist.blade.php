@extends('layouts.main.master')
@section('title')
{{$cateService->name}}
@endsection
@section('description')
{{$cateService->description}}
@endsection
@section('image')
{{url('frontend/images/12.jpg')}}
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
                  <h1 class="title-heading">{{$cateService->name}} </h1>
                  <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{$cateService->name}} </li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="projects projects-grid projects-grid-3" id="projects-grid-3">
   <div class="container">
      <div class="row" id="projects-all">
         {!!$cateService->content!!}
         @foreach ($list as $item)
         <div class="col-12 col-md-6 col-lg-4 project-item">
            <div class="project-panel" data-hover="">
               <div class="project-panel-holder">
                  <div class="project-img"><a class="link" href="{{route('serviceDetail',['danhmuc'=>$item->cate_slug,'slug'=>$item->slug])}}"></a><img src="{{$item->image}}" alt="{{$item->name}}"/></div>
                  <div class="project-content">
                     <div class="project-title">
                        <h4><a href="{{route('serviceDetail',['danhmuc'=>$item->cate_slug,'slug'=>$item->slug])}}">{{$item->name}}</a></h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         
      </div>
      <div class="row">
         {{$list->links()}}
      </div>
   </div>
</section>
@endsection
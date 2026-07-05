@extends('layouts.main.master')
@section('title')
Dự án tiêu biểu
@endsection
@section('description')
Dự án tiêu biểu
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
                  <h1 class="title-heading">Dự án tiêu biểu </h1>
                  <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Dự án tiêu biểu </li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
 <section class="blog blog-grid blog-grid-5" id="blog">
   <div class="container">
      <div class="row">
         @foreach ($duan as $item)
         @php
             $img = json_decode($item->images);
         @endphp
         <div class="col-12 col-md-6 col-lg-4">
            <div class="blog-entry" data-hover="">
               <div class="entry-content">
                  <div class="entry-title">
                     <h4><a href="{{route('duanTieuBieuDetail',['slug'=>$item->slug])}}">{{$item->name}}</a></h4>
                  </div>
                  <div class="entry-img-wrap">
                     <div class="entry-img">
                        <a href="{{route('duanTieuBieuDetail',['slug'=>$item->slug])}}">
                           <img src="{{$img[0]}}" alt="{{$item->name}}">
                        </a>
                     </div>
                  </div>
                  <div class="entry-bio linea">
                     {!!languageName($item->description)!!}
                  </div><br>
                  <div class="entry-more"> <a class="btn btn--white btn-bordered" href="{{route('duanTieuBieuDetail',['slug'=>$item->slug])}}">Chi tiết <i class="energia-arrow-right"></i></a></div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="row">
         <div class="col-12 text--center">
            {{$duan->links()}}
         </div>
      </div>
   </div>
</section>
 <section class="projects projects-gallery">
    <div class="container">
       <div class="row">
        @foreach ($album as $item)
        <div class="col-12 col-md-6 col-lg-4 team-item ">
            <div class="project-panel">
               <div class="project-panel-holder">
                  <div class="project-img">
                     <img src="{{$item->image}}" alt=" item" />
                     <div class="project-hover">
                        <div class="project-action">
                           <div class="project-zoom"><i class="fa fa-eye"></i><a class="img-gallery-item" href="{{$item->image}}" title="wind generators item"></a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        @endforeach
       </div>
    </div>
 </section>
@endsection


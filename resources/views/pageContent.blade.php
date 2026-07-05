@extends('layouts.main.master')
@section('title')
{{$pagecontentdetail->title}}
@endsection
@section('description')
{{$pagecontentdetail->title}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link rel="preload" as="style" href="{{asset('frontend/css/pagestyle.scss.css')}}" type="text/css">
<link href="{{asset('frontend/css/pagestyle.scss.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('js')
@endsection
@section('content')
<div class="contentWarp ">
   <div class="breadcrumbs bg-white">
      <div class="container position-relative">
         <ul class="breadcrumb align-items-center m-0 pl-0 pr-0 small pt-2 pb-2 bg-white">
            <li class="home">
               <a href="{{route('home')}}" title="Trang chủ">
                  <svg width="12" height="10.633">
                     <use href="#svg-home"></use>
                  </svg>
                  Trang chủ
               </a>
               <span class="slash-divider ml-2 mr-2">/</span>
            </li>
            <li>{{$pagecontentdetail->title}}</li>
         </ul>
      </div>
   </div>
   <div class="com_info">
      <div class="container mt-3 mb-3">
         <div class="rounded p-2 p-md-3 bg-white col-main page-title">
            <h1 class="font-weight-bold pt-2 pt-lg-0 mt-0 mb-3 page_name">
               {{$pagecontentdetail->title}}
            </h1>
            <div class="rte m-auto bg-white d-block">
               {!!$pagecontentdetail->content!!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
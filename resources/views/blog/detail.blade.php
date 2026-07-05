@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
<link rel="preload" as="style"  href="{{asset('frontend/css/mew_blog.scss.css')}}" type="text/css">
<link href="{{asset('frontend/css/mew_blog.scss.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('js')
<script src="//bizweb.dktcdn.net/100/459/533/themes/868331/assets/mew_article.js?1685190419017" defer></script>
<script src="//bizweb.dktcdn.net/100/459/533/themes/868331/assets/mew_content.js?1685190419017" defer></script>
@endsection
@section('content')
<div class="contentWarp ">
   <div class="breadcrumbs bg-white">
      <div class="container position-relative">
         <ul class="breadcrumb align-items-center m-0 pl-0 pr-0 small pt-2 pb-2 bg-white">
            <li class="home">
               <a href="/" title="Trang chủ">
                  <svg width="12" height="10.633">
                     <use href="#svg-home"></use>
                  </svg>
                  Trang chủ
               </a>
               <span class="slash-divider ml-2 mr-2">/</span>
            </li>
            <li>
               <a href="{{route('allListBlog')}}" title="Review công nghê"><span>Review công nghê</span></a>	
               <span class="slash-divider ml-2 mr-2">/</span>
            </li>
            <li>{{languageName($blog_detail->title)}}</li>
         </ul>
      </div>
   </div>
   <section class="col2-right-layout" itemscope="" itemtype="http://schema.org/Article">
      <meta itemprop="mainEntityOfPage" content="{{url()->current()}}">
      <meta itemprop="description" content="">
      <meta itemprop="url" content="{{url()->current()}}">
      <meta itemprop="name" content="{{languageName($blog_detail->title)}}">
      <meta itemprop="headline" content="{{languageName($blog_detail->title)}}">
      <meta itemprop="image" content="{{$blog_detail->image}}">
      <meta itemprop="author" content="Mew Theme">
      <meta itemprop="datePublished" content="09-08-2022">
      <meta itemprop="dateModified" content="09-08-2022">
      <div class="d-none" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
         <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
            <img class="hidden" src="{{$setting->logo}}" alt="Mew Mobile">
            <meta itemprop="url" content="{{$setting->logo}}">
            <meta itemprop="width" content="400">
            <meta itemprop="height" content="60">
         </div>
         <meta itemprop="name" content="Mew Mobile">
      </div>
      <div class="main container blogs">
         <div class="col-main art_container mt-3 mb-3">
            <div class="rounded p-3 bg-white">
               <div class="row">
                  <article class="blog_entry clearfix order-md-2 col-12 col-md-12 col-lg-8 col-xl-9">
                     <h1 class="article-name font-weight-bold mt-1">{{languageName($blog_detail->title)}}</h1>
                     <div class="js-toc table-of-contents w-100 position-relative p-2 rounded mb-3 d-none" data-toc=""></div>
                     <div class="entry-content text-justify rte " data-content="">
                        {!!languageName($blog_detail->content)!!}
                     </div>
                     <div class="main blogs">
                        <h3 class="widget-title title mb-3">
                           <a href="" title="Bài viết liên quan: ">
                           Bài viết liên quan: 
                           </a>
                        </h3>
                        <div class="widget-content latest-blog swiper-container position-relative swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-multirow">
                           <div class="swiper-wrapper" style="width: 2008px; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                              @foreach ($bloglq as $item)
                              <div class="swiper-slide swiper-slide-active" style="width: 482px; margin-right: 20px;">
                                 <article class="blog-item-list clearfix mb-3 row">
                                    <div class="col-4 col-lg-3 pr-0 ">
                                       <a href="{{route('detailBlog',['slug'=>$item->slug])}}" class=" d-block modal-open thumb_img_blog_list thumb rounded" title="{{languageName($item->title)}}"> 
                                       <span class="modal-open position-relative d-block w-100 m-0 ratio3by2 has-edge aspect zoom">
                                       <img src="{{$item->image}}" data-src="{{$item->image}}" decoding="async" alt="{{languageName($item->title)}}" class="lazy d-block img img-cover position-absolute loaded">
                                       </span>
                                       </a>
                                    </div>
                                    <div class="blogs-rights col-8 col-lg-9">
                                       <h3 class="blog-item-name font-weight-bold mb-1 title_blo">
                                          <a class="line_1" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">{{languageName($item->title)}}</a>
                                       </h3>
                                       <div class="sum line_2 h-auto text-justify">
                                          {{languageName($item->description)}}
                                       </div>
                                    </div>
                                 </article>
                              </div>
                              @endforeach
                           </div>
                           <div class="swiper-button-prev mew_latest_blog_prev swiper-button-disabled"></div>
                           <div class="swiper-button-next mew_latest_blog_next"></div>
                        </div>
                     </div>
                  </article>
                  <div class="col-xl-3 col-lg-4 col-md-12 d-none d-lg-block ba_sidebar order-3 order-lg-1">
                     <div class="position-sticky top_20px">
                        <div class="aside-content blog-list">
                           <h3 class="align-items-center article-name d-flex font-weight-bold pt-2 pt-lg-0 mb-3 pb-3 border-bottom">
                              <img class="lazy mr-2 loaded" src="{{url('frontend/images/hot_ico.png')}}" data-src="{{url('frontend/images/hot_ico.png')}}" alt="Chủ đề Hot"> 
                              Chủ đề Hot
                           </h3>
                           <ul class="b_item mb-0 p-0">
                              @foreach ($blogCate as $item)
                              <li class="d-flex align-items-center position-relative mb-2">
                                 <div class="image mr-2 rounded modal-open">
                                    <a href="{{route('listCateBlog',['slug'=>$item->slug])}}" title="{{languageName($item->name)}}">
                                    <img src="{{$item->avatar}}" alt="{{languageName($item->name)}}">
                                    </a>
                                 </div>
                                 <div class="text">
                                    <h4 class="font-weight-bold"><a href="{{route('listCateBlog',['slug'=>$item->slug])}}" title="{{languageName($item->name)}}">{{languageName($item->name)}}</a></h4>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
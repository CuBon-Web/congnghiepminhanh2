@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
Review công nghê
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link rel="preload" as="style"  href="{{asset('frontend/css/mew_blog.scss.css')}}" type="text/css">
<link href="{{asset('frontend/css/mew_blog.scss.css')}}" rel="stylesheet" type="text/css" media="all" />
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
            <li>Review công nghê</li>
         </ul>
      </div>
   </div>
   <section class="blog-layout" itemscope="" itemtype="http://schema.org/Blog">
      <meta itemprop="name" content="Review công nghê">
      <meta itemprop="description" content="
         &nbsp;">
      @if (count($blog) > 0)
      <div class="container mt-3 mb-3 lastest-articles">
         <div class="rounded p-3 bg-white">
            <div class="row">
               @foreach ($blog as $key => $item)
                   @if ($key == 0)
                   <div class="col-md-7 col-12">
                     <div class="position-relative modal-open rounded-10 mb-3 mb-md-0">
                        <picture class="position-relative w-100 m-0 be_opa modal-open ratio3by2 aspect large-article rounded-10 d-block">
                           <source media="(min-width: 1200px)" srcset="{{$item->image}}">
                           <source media="(min-width: 992px)" srcset="{{$item->image}}">
                           <source media="(max-width: 569px)" srcset="{{$item->image}}">
                           <source media="(max-width: 480px)" srcset="{{$item->image}}">
                           <img src="{{$item->image}}" class=" d-block img img-cover position-absolute" alt="{{languageName($item->title)}}">
                        </picture>
                        <div class="position-absolute large-article-info p-0 p-lg-4 p-md-3">
                           <h3 class="title_blo font-weight-bold mt-2 mt-md-0 mb-0 mb-md-3">
                              <a class="line_2" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">{{languageName($item->title)}}</a>
                           </h3>
                           <span class="d-block d-md-none text-gray small mt-1 mb-1">{{date_format($item->created_at,'d/m/Y')}}</span>
                           <span class="d-block line_2">{{languageName($item->description)}}</span>
                        </div>
                     </div>
                  </div>
                  @endif
               @endforeach
               <div class="col-12 col-md-5">
                  @foreach ($blog as $key => $item)
                     @if ($key > 0 && $key < 6)
                        <article class="blog-item-list clearfix mb-3 row">
                           <div class="col-4 col-lg-3 pr-0 pl-md-0">
                              <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}" class=" d-block modal-open thumb_img_blog_list thumb rounded" title="{{languageName($item->title)}}"> 
                              <span class="modal-open position-relative d-block w-100 m-0 ratio3by2 has-edge aspect zoom">
                              <img src="{{url('frontend/images/placeholder_1x1.png')}}" data-src="{{$item->image}}" decoding="async" alt="{{languageName($item->title)}}" class="lazy d-block img img-cover position-absolute loaded">
                              </span>
                              </a>
                           </div>
                           <div class="blogs-rights col-8 col-lg-9">
                              <h3 class="blog-item-name font-weight-bold mb-1 title_blo">
                                 <a class="line_1" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}" title="{{languageName($item->title)}}">{{languageName($item->title)}}</a>
                              </h3>
                              <div class="post-time small">{{date_format($item->created_at,'d/m/Y')}}</div>
                              <div class="sum line_2 h-auto text-justify">{{languageName($item->description)}}</div>
                           </div>
                        </article>
                     @endif
                     @endforeach
               </div>
            </div>
         </div>
      </div>
      <div class="container mt-3 mb-3">
         <div class="blog-list b_mew_cate rounded p-lg-3 pl-2 pr-2 bg-white">
            <h3 class="align-items-center blog-name d-flex font-weight-bold pt-2 pt-lg-0">
               <img class="lazy mr-2 loaded" src="{{url('frontend/images/hot_ico.png')}}" data-src="{{url('frontend/images/hot_ico.png')}}" alt="Chủ đề Hot"> 
               Chủ đề Hot
            </h3>
            <ul class="d-flex b_item flex-wrap mobi_cate mb-0 p-0">
               @foreach ($blogCate as $item)
               <li class="d-flex align-items-center position-relative pr-1 pl-1 pr-lg-3 pl-lg-3 pt-3 pb-3">
                  <div class="image mr-2 mr-lg-3 rounded modal-open">
                     <a href="{{route('listCateBlog',['slug'=>$item->slug])}}" title="{{languageName($item->name)}}">
                     <img src="{{$item->avatar}}" alt="24hCông nghệ">
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
      <div class="container mt-3 mb-3 ">
         <div class="col-main rounded m_white_bg_module p-lg-3 pl-2 pr-2 pt-3 pb-3">
            <h1 class="blog-name font-weight-bold pb-3 pt-2 pt-lg-0">Bài viết mới</h1>
                <article>
                  <div class="grid_article">
                     <div class="row">
                        @foreach ($blog as $key => $item)
                           @if ($key > 5)
                           <div class="col-12 col-sm-6 col-md-6 col-lg-4 its">
                              <div class="custom-article-item border mb-4 modal-open rounded-10">
                                 <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}" class="effect-ming">
                                    <div class="position-relative w-100 m-0 be_opa modal-open ratio3by2 aspect ">
                                       <img src="{{url('frontend/images/placeholder_1x1.png')}}" data-src="{{$item->image}}" class="lazy d-block img img-cover position-absolute" alt="{{languageName($item->title)}}">
                                    </div>
                                 </a>
                                 <div class="custom-article-item_info">
                                    <div class="tags d-flex list-unstyled mb-1">
                                    </div>
                                    <h3 class="title_blo font-weight-bold mb-2"><a class="line_2" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">{{languageName($item->title)}}</a></h3>
                                    <span class="d-block text-gray small">{{date_format($item->created_at,'d/m/Y')}}</span>
                                    <div class="sum line_1 line_2 h-auto text-justify">{{languageName($item->description)}}</div>
                                 </div>
                              </div>
                           </div>
                           @endif
                        @endforeach
                     </div>
                  </div>
               </article>
         </div>
      </div>
      @else 
      <div class="container mt-3 mb-3 lastest-articles">
         <div class="rounded p-3 bg-white">
            <div class="row">
               <div class="col-12">
                  <p class="text-center alert alert-warning mb-0">Hiện tại danh mục không có bài viết</p>
               </div>
            </div>
         </div>
      </div>
      @endif
      

      

   </section>
</div>
@endsection
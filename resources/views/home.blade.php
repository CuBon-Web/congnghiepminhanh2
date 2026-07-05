@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link rel="preload" as="style" href="{{asset('frontend/css/mew_style_index.scss.css?1676652384879')}}" type="text/css">
<link href="{{asset('frontend/css/mew_style_index.scss.css?1676652384879')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('script')
@endsection
@section('content')
<div class="contentWarp ">
   <h1 class="d-none">{{$setting->company}}</h1>
   <section class=" mew_mobile_slide mb-4">
       <div class="home_slide swiper-container position-relative">
           <div class="swiper-wrapper">
            @foreach ($banner as $item)
            <div class="swiper-slide text-center">
                <a class="d-block w-100 h-100 rounded-10 modal-open" href="{{$item->link}}" title="{{$item->title}}">
                    <img class="d-block w-100"
                    src="{{$item->image}}"
                    alt="{{$item->image}}" />
                </a>
            </div>
            @endforeach
           </div>
           <div class="swiper-button-prev msl_prev"></div>
           <div class="swiper-button-next msl_next"></div>
       </div>
       <script rel="dns-prefetch">
           var swiperHomeSlider = new Swiper('.home_slide', {
               spaceBetween: 10,
               navigation: {
                   nextEl: '.msl_next',
                   prevEl: '.msl_prev',
               },
               loop: true,
               speed: 1000,
               autoplay: {
                   delay: 6000,
                   disableOnInteraction: true,
               },
               breakpoints: {
                   0: {
                       slidesPerView: 1,
                       effect: 'fade'
                   },
                   576: {
                       slidesPerView: 1,
                       effect: 'fade'
                   },
                   768: {
                       slidesPerView: 1
                   },
                   992: {
                       slidesPerView: 1
                   },
                   1200: {
                       slidesPerView: 1
                   }
               }
           });
       </script>
       {{-- <div class="container d-none d-md-block">
           <div class="mew_slide swiper-container position-relative">
               <div class="swiper-wrapper">
                @foreach ($BannerAds as $item)
                <div class="swiper-slide text-center">
                    <a class="d-block w-100 h-100 rounded-10 modal-open" href="{{$item->link}}"
                        title="Mew Mobile">
                        <picture class="position-relative w-100 m-0 ratio1by16 d-block aspect">
                            <source media="(min-width: 1200px)"
                                srcset="{{$item->image}}">
                            <source media="(min-width: 992px)"
                                srcset="{{$item->image}}">
                            <source media="(max-width: 569px)"
                                srcset="{{$item->image}}">
                            <source media="(max-width: 480px)"
                                srcset="{{$item->image}}">
                            <img class="d-block img img-cover position-absolute"
                                src="{{$item->image}}"
                                alt="Mew Mobile" />
                        </picture>
                    </a>
                </div>
                @endforeach
               </div>
               <div class="swiper-button-prev msl_prev"></div>
               <div class="swiper-button-next msl_next"></div>
           </div>
       </div> --}}
   </section>
   {{-- <script rel="dns-prefetch">
       var swiperHomeSlider = new Swiper('.mew_slide', {
           spaceBetween: 10,
           navigation: {
               nextEl: '.msl_next',
               prevEl: '.msl_prev',
           },
           loop: true,
           speed: 1000,
           autoplay: {
               delay: 6000,
               disableOnInteraction: true,
           },
           breakpoints: {
               0: {
                   slidesPerView: 2,
                   effect: 'fade'
               },
               576: {
                   slidesPerView: 2,
                   effect: 'fade'
               },
               768: {
                   slidesPerView: 2
               },
               992: {
                   slidesPerView: 2
               },
               1200: {
                   slidesPerView: 4
               }
           }
       });
   </script> --}}
   <section class="product_poli_wrap mt-3 mb-3">
       <div class="container">
           <div class="product_poli m-0">
               <div class="row">
                   <div class="col-6 col-lg-3 mb-3 mb-lg-0">
                       <div style="border: 1px dashed #083c87;"
                           class="item d-flex align-items-center p-2 p-xl-3 bg-white rounded-10 modal-open h-100 ">
                           <div class="mr-2 mr-sm-3">
                               <img src="{{url('frontend/images/img_poli_1.png')}}"
                                   alt="Sản phẩm an toàn" decoding="async">
                           </div>
                           <div class="media-body">
                               Sản phẩm an toàn
                           </div>
                       </div>
                   </div>
                   <div class="col-6 col-lg-3 mb-3 mb-lg-0">
                       <div style="border: 1px dashed #083c87;"
                           class="item d-flex align-items-center p-2 p-xl-3 bg-white rounded-10 modal-open h-100 ">
                           <div class="mr-2 mr-sm-3">
                               <img src="{{url('frontend/images/img_poli_2.png')}}"
                                   alt="Chất lượng cam kết" decoding="async">
                           </div>
                           <div class="media-body">
                               Chất lượng cam kết
                           </div>
                       </div>
                   </div>
                   <div class="col-6 col-lg-3 ">
                       <div style="border: 1px dashed #083c87;"
                           class="item d-flex align-items-center p-2 p-xl-3 bg-white rounded-10 modal-open h-100 ">
                           <div class="mr-2 mr-sm-3">
                               <img src="{{url('frontend/images/img_poli_3.png')}}"
                                   alt="Dịch vụ vượt trội" decoding="async">
                           </div>
                           <div class="media-body">
                               Dịch vụ vượt trội
                           </div>
                       </div>
                   </div>
                   <div class="col-6 col-lg-3 ">
                       <div style="border: 1px dashed #083c87;"
                           class="item d-flex align-items-center p-2 p-xl-3 bg-white rounded-10 modal-open h-100 ">
                           <div class="mr-2 mr-sm-3">
                               <img src="{{url('frontend/images/img_poli_4.png')}}"
                                   alt="Giao hàng nhanh chóng" decoding="async">
                           </div>
                           <div class="media-body">
                               Giao hàng nhanh chóng
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <section id="flash_sale" class="m_product mt-3 mt-lg-4 mb-3 mt-lg-4"
       style="--cl_tit_fl: #ffd641;--bg_fl_1: #0b0045;--bg_fl_2: #f208f3;">
       <div class="container">
           <div class="rounded bg-flash modal-open p-2">
               <div class="time_box row align-items-center">
                   <div class=" col-12 col-lg-9 mb-2 mb-lg-0">
                       <div class="row align-items-center">
                           <div class="col-12 col-lg-12">
                               <h2
                                   class="title text-uppercase font-weight-bold position-relative p-2 m-0 text-center text-lg-left cl_tit_fl">
                                   <a class="position-relative" href="{{route('flashSale')}}" title="FLASH SALE">
                                       <img alt="FLASH SALE"
                                           src="{{url('frontend/images/flash.gif')}}">
                                       SẢN PHẨM NỔI BẬT
                                   </a>
                               </h2>
                           </div>
                       </div>
                   </div>
                   <div class="ml-auto col-12 col-lg-3 text-center text-lg-right">
                       
                   </div>
               </div>
               <div class="row">
                   <div class=" col-12">
                       <div class="b_product">
                           <div class="mew_flash swiper-container p-2 position-relative">
                               <div class="swiper-wrapper">
                                @foreach ($homePro as $pro)
                                <div class="swiper-slide">
                                    @include('layouts.product.item',['pro'=>$pro])
                                </div>
                                @endforeach
                               </div>
                               <div class="swiper-button-prev mf_prev"></div>
                               <div class="swiper-button-next mf_next"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <script rel="dns-prefetch">
       var mew_text_fade = new Swiper('.mew_text_fade', {
           loop: true,
           speed: 800,
           autoplay: {
               delay: 3000,
               disableOnInteraction: true,
           },
           slidesPerView: 1,
           effect: 'fade'
       });

       var swiperProductSaleSlider = new Swiper('.mew_flash', {
           spaceBetween: 18,
           loop: false,
           speed: 1000,
           autoplay: true,
           slidesPerColumnFill: 'row',
           slidesPerColumn: 2,
           navigation: {
               nextEl: '.mf_next',
               prevEl: '.mf_prev',
           },
           breakpoints: {
               320: {
                   slidesPerView: 2
               },
               768: {
                   slidesPerView: 3
               },
               992: {
                   slidesPerView: 3
               },
               1200: {
                   slidesPerView: 5
               }
           }
       });
   </script>
   @foreach ($categoryhome as $key => $item)
   @if (count($item->product) > 0)
   <section id="product_3" class="m_product mt-3 mt-lg-4 mb-3 mt-lg-4">
       <div class="container">
           <div class="rounded bg-white p-2">
               <div
                   class="head_box p-2 d-flex align-items-md-center justify-content-between flex-column flex-md-row">
                   <h2 class="title text-uppercase font-weight-bold position-relative m-0">
                       <a class="position-relative" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" title="{{languageName($item->name)}} NỔI BẬT">
                           {{languageName($item->name)}} NỔI BẬT
                       </a>
                   </h2>
                   @if (count($item->typeCate) > 0 )
                    <div class="list_link_pr d-flex pt-2 pb-2">
                        @foreach ($item->typeCate as $key => $type)
                        @if ($key < 5)
                        <a class="border rounded-10 font-weight-bold js-tab-title"
                            href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug])}}" data-tab="galaxy-ford" data-alias={{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug])}}
                            title="{{languagename($type->name)}}">
                            <div>
                            </div>
                            {{languagename($type->name)}}
                        </a>
                        @endif
                        @endforeach
                        <a class="border rounded-10 font-weight-bold" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}"
                            title="Xem tất cả">
                            Xem tất cả
                        </a>
                    </div>
                   @endif
               </div>
               <div class="row align-items-lg-center">
                   <div class="col-xl-12 col-lg-12 col-12 ">
                       <div class="mew_product_{{$key}} swiper-container p-2 position-relative">
                           <div class="swiper-wrapper">
                            @foreach ($item->product as $pro)
                            <div class="swiper-slide">
                                @include('layouts.product.item',['pro'=>$pro])
                               </div>
                            @endforeach
                               
                           </div>
                           <div class="swiper-button-prev mf_prev"></div>
                           <div class="swiper-button-next mf_next"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <script rel="dns-prefetch">
    var key = {{$key}};
       var swiperProduct3Slider = new Swiper('.mew_product_'+key, {
           spaceBetween: 15,
           loop: false,
           speed: 1000,
           autoplay: false,
           navigation: {
               nextEl: '.mf_next',
               prevEl: '.mf_prev',
           },
           breakpoints: {
               320: {
                   slidesPerView: 2,
               },
               768: {
                   slidesPerView: 2
               },
               992: {
                   slidesPerView: 4,
                   slidesPerColumnFill: 'row',
                   slidesPerColumn: 2
               },
               1200: {
                   slidesPerView: 5,
                   slidesPerColumnFill: 'row',
                   slidesPerColumn: 2
               }
           }
       });
   </script>
   @endif
   @endforeach
   @if (count($video) > 0)
   <section id="video" class="m_blog mt-3 mt-lg-4 mb-3 mb-lg-4">
       <div class="container">
           <div class="rounded bg-white p-3">
               <h2 class="title text-uppercase font-weight-bold position-relative pb-2 pb-lg-3 m-0">
                   <a class="position-relative" href="{{route('videoReview')}}" title="Cùng Mew review">Review Sản Phẩm</a>
               </h2>
               <div class="b_product">
                   <div class="mew_video swiper-container position-relative">
                       <div class="swiper-wrapper">
                        @foreach ($video as $item)
                           <div class="swiper-slide">
                               <div class="item_grid mb-3">
                                   <div class="img_thm position-relative bor-10 modal-open">
                                       <a href="javascript:;" data-video="{{$item->link}}"
                                           class="effect-ming open_video"
                                           title="{{$item->name}}">
                                           <div
                                               class="position-relative w-100 m-0 be_opa modal-open ratio3by2 has-edge aspect">
                                               <img src="{{url('frontend/images/placeholder_1x1.png')}}"
                                                   data-src="{{$item->image}}"
                                                   class="d-block img img-cover position-absolute lazy"
                                                   alt="{{$item->name}}">
                                               <div class="position-absolute w-100 h-100 video_open lazy_bg"
                                                   data-video="{{$item->link}}"
                                                   data-background="url({{url('frontend/images/play-button.png')}})">
                                               </div>
                                           </div>
                                       </a>
                                   </div>
                                   <h3 class="title_blo font-weight-bold mt-2"><a class="line_2"
                                           href=""
                                           title="{{$item->name}}">{{$item->name}}</a></h3>
                               </div>
                           </div>
                        @endforeach
                       </div>
                       <div class="swiper-button-prev mv_prev"></div>
                       <div class="swiper-button-next mv_next"></div>
                   </div>
                   <div
                       class="popup_video position-fixed w-100 h-100 justify-content-center align-items-center d-flex">
                       <div class="position-relative max-100">
                           <a href="javascript:;"
                               class="close_video position-absolute d-flex m_white_bg_module justify-content-center align-items-center"
                               title="Đóng"><img alt="Đóng" class="lazy"
                                   src="{{url('frontend/images/placeholder_1x1.png')}}"
                                   data-src="{{url('frontend/images/close.png')}}"></a>
                           <div class="b_video p-2 p-md-3 m_white_bg_module rounded m-auto"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <script rel="dns-prefetch">
       var swiperVideoSlider = new Swiper('.mew_video', {
           spaceBetween: 15,
           loop: false,
           speed: 1000,
           autoplay: false,
           navigation: {
               nextEl: '.mv_next',
               prevEl: '.mv_prev',
           },
           breakpoints: {
               375: {
                   slidesPerView: 1.2
               },
               768: {
                   slidesPerView: 2.3
               },
               992: {
                   slidesPerView: 3
               },
               1200: {
                   slidesPerView: 4
               }
           }
       });
   </script>
   @endif
   @if (count($viewold) > 0)
   <section id="viewold" class="m_blog mt-3 mt-lg-4 mb-3 mb-lg-4">
       <div class="container">
           <div class="rounded bg-white p-3">
               <h2 class="title text-uppercase font-weight-bold position-relative pb-2 pb-lg-3 m-0">
                   <a class="position-relative" href="javascript:;" title="Sản phẩm vừa xem">Sản phẩm vừa xem</a>
               </h2>
               <div class="b_product">
                   <div class="mew_old_product swiper-container position-relative">
                       <div class="swiper-wrapper">
                        @foreach ($viewold as $item)
                        {{-- {{dd($item)}} --}}
                           <div class="swiper-slide">
                            <div class="product-item position-relative mb-0 p-2 rounded-10 bg-white h-100 box_shadow">
                            @if ($item['discount'] > 0)
                            <div class="sale-label sale-top-right position-absolute font-weight-bold"> Giảm {{100-ceil(($item['discount']/$item['price'])*100)}}% </div>
                            @endif
                            <a href="{{route('detailProduct',['cate'=>$item['cate_slug'],'type'=>$item['type_slug'] ? $item['type_slug'] : 'loai','id'=>$item['slug']])}}" class="thumb d-block modal-open position-relative" title="{{$item['name']}}">
                                <div class="position-relative w-100 m-0 ratio1by1 has-edge aspect zoom">
                                    <img src="{{url('frontend/images/placeholder_1x1.png')}}"
                                        data-src="{{$item['image']}}"
                                        decoding="async"
                                        class="d-block img img-cover position-absolute lazy"
                                        alt="{{$item['name']}}">
                                </div>
                                <span class="label_tag label2 position-absolute d-inline-block pr-2 text-white d-flex align-items-center gap_5 rounded-10">
                                        <img width="20" height="20" alt="label_con_2" src="{{url('frontend/images/label_img_2.png')}}" class="mr-1">Giảm cực sốc
                                    </span>
                            </a>
                            <div class="item-info mt-1 position-relative">
                                <h3 class="item-title font-weight-bold">
                                    <a class="line_1" href="{{route('detailProduct',['cate'=>$item['cate_slug'],'type'=>$item['type_slug'] ? $item['type_slug'] : 'loai','id'=>$item['slug']])}}"
                                        title="{{$item['name']}}">
                                        {{$item['name']}}
                                    </a>
                                </h3>
                                <div class="item-price mb-1">
                                    @if ($item['price'] > 0)
                                        @if ($item['status_variant'] == 1)
                                        <span class="special-price font-weight-bold">{{get_price_variant($item['id'])}}₫</span>
                                        <del class="old-price"> {{number_format($item['price'])}}₫</del>
                                        @else 
                                        <span class="special-price font-weight-bold">{{number_format($item['discount'])}}₫</span>
                                        <del class="old-price"> {{number_format($item['price'])}}₫</del>
                                        @endif
                                    @else
                                    <span
                                        class="special-price font-weight-bold">Liên hệ</span>
                                    @endif
                                </div>
                                <label onclick="compareProduct({{$item['id']}})"
                                    class="compare-label position-relative d-flex align-items-center m-0">
                                    <input type="checkbox" {{checkExistCompare($item['id']) == true ? "checked" : "" }}
                                        class="compare-checkbox d-none"
                                        value="{{$item['id']}}" data-type="{{$item['id']}}">
                                    <span
                                        class="compare-checkbox mr-1 rounded-circle"></span>
                                    So sánh
                                </label>
                            </div>
                            </div>
                           </div>
                        @endforeach
                       </div>
                       <div class="swiper-button-prev mv_prev"></div>
                       <div class="swiper-button-next mv_next"></div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <script rel="dns-prefetch">
       var swiperVideoSlider = new Swiper('.mew_old_product', {
           spaceBetween: 15,
           loop: false,
           speed: 1000,
           autoplay: false,
           navigation: {
               nextEl: '.mv_next',
               prevEl: '.mv_prev',
           },
           breakpoints: {
               375: {
                   slidesPerView: 1.2
               },
               768: {
                   slidesPerView: 2.3
               },
               992: {
                   slidesPerView: 4
               },
               1200: {
                   slidesPerView: 5
               }
           }
       });
   </script>
   @endif
   @if (count($hotnews) > 0)
   <section id="m_blog" class="m_blog mt-3 mt-lg-4 mb-3 mb-lg-4">
       <div class="container">
           <div class="rounded bg-white p-3">
               <h2 class="title text-uppercase font-weight-bold position-relative pb-2 pb-lg-3 m-0">
                   <a class="position-relative" href="{{route('allListBlog')}}" title="Tin Tức & Hoạt Động">
                    Tin Tức & Hoạt Động
                   </a>
               </h2>
               <div class="b_blog row">
                   <div class="col-12 col-md-6">
                       <div class="item_grid mb-3 mb-md-0">
                           <div class="img_thm position-relative modal-open bor-10">
                               <a href="{{route('detailBlog',['slug'=>$hotnews[0]->slug])}}"
                                   title="{{languageName($hotnews[0]->title)}}"
                                   class="effect-ming">
                                   <div
                                       class="position-relative w-100 m-0 be_opa modal-open ratio3by2 has-edge aspect">
                                       <img src="{{url('frontend/images/placeholder_1x1.png')}}"
                                           data-src="{{$hotnews[0]->image}}"
                                           class="lazy d-block img img-cover position-absolute"
                                           alt="{{languageName($hotnews[0]->title)}}">
                                       <div class="position-absolute w-100 h-100 overlay"></div>
                                   </div>
                               </a>
                               <div class="entry-date position-absolute text-center rounded-right">
                                   <p class="day font-weight-bold">
                                      {{date_format($hotnews[0]->created_at,"d")}}
                                   </p>
                                   <p class="yeah">
                                    {{date_format($hotnews[0]->created_at,"m/Y")}}
                                   </p>
                               </div>
                           </div>
                           <div class="cont">
                               <h3 class="title_blo font-weight-bold mt-2"><a class="line_1"
                                       href="{{route('detailBlog',['slug'=>$hotnews[0]->slug])}}"
                                       title="{{languageName($hotnews[0]->title)}}">{{languageName($hotnews[0]->title)}}</a></h3>
                               <div class="sum line_2 h-auto text-justify">
                                   {{languageName($hotnews[0]->description)}}
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-12 col-md-6">
                    @foreach ($hotnews as $key => $item)
                        @if ($key > 0)
                        <article class="blog-item-list clearfix mb-3 row">
                            <div class="col-4 col-lg-3 pr-0 ">
                                <a href="{{route('detailBlog',['slug'=>$item->slug])}}"
                                    class=" d-block modal-open thumb_img_blog_list thumb rounded"
                                    title="{{languageName($item->title)}}">
                                    <span
                                        class="modal-open position-relative d-block w-100 m-0 ratio3by2 has-edge aspect zoom">
                                        <img src="{{url('frontend/images/placeholder_1x1.png')}}"
                                            data-src="{{$item->image}}"
                                            decoding="async"
                                            alt="{{languageName($item->title)}}"
                                            class="lazy d-block img img-cover position-absolute">
                                    </span>
                                </a>
                            </div>
                            <div class="blogs-rights col-8 col-lg-9">
                                <h3 class="blog-item-name font-weight-bold mb-1 title_blo">
                                    <a class="line_1"
                                        href="{{route('detailBlog',['slug'=>$item->slug])}}"
                                        title="{{languageName($item->title)}}">{{languageName($item->title)}}</a>
                                </h3>
                                <div class="post-time small">{{date_format($item->created_at,'d/m/Y')}}</div>
                                <div class="sum line_2 h-auto text-justify">
                                    {{languageName($item->description)}}
                                </div>
                            </div>
                        </article>
                        @endif
                    @endforeach
                    @if (count($hotnews) > 5)
                    <div class="d-block mt-auto text-center">
                        <a href="{{route('allListBlog')}}" title="Xem thêm"
                            class="view_mores box_shadow rounded-10 modal-open d-block py-2 px-3 mt-3 text-center font-weight-bold">Xem
                            thêm</a>
                    </div>
                    @endif
                       
                   </div>
               </div>
           </div>
       </div>
   </section>
   @endif
</div>
@endsection
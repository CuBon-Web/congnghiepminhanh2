@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('js')
<script src="{{asset('frontend/js/filter.js')}}" defer></script>
<script src="{{asset('frontend/js/mew_collection_script.js')}}" defer></script>
@endsection
@section('css')
<link rel="preload" as="style"  href="{{asset('frontend/css/collection_style.scss.css')}}" type="text/css">
<link href="{{asset('frontend/css/collection_style.scss.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
<div class="contentWarp ">
   <div class="opacity_filter"></div>
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
            <li> {{$title}}</li>
         </ul>
      </div>
   </div>
   <section class="collection-layout mt-3 mb-3">
      <div class="container">
         <div class="rounded p-2 p-md-3 bg-white">
            <h1 class="collection-name font-weight-bold mb-lg-3 text-uppercase pb-2 pt-2 mb-2 d-none">
               {{$title}}
            </h1>
            <div class="row">
               <div class="col-12 col-lg-9 order-lg-2 pt-3 pt-lg-0">
                  <div class="sortPagiBar pb-2 border-bottom">
                     <ul class="aside-content filter-vendor list-unstyled mb-0 d-flex align-items-baseline gap-10">
                        <li>
                           <span class="h6 title-head m-0 pt-2 pb-2 font-weight-bold">Sắp xếp theo: </span>
                        </li>
                        <li class="filter-item filter-item--check-box">
                           <label class="d-flex align-items-baseline pt-1 pb-1 m-0">
                           <input type="radio" class="d-none sortby-default" name="sortBy" onclick="sortby()" value="default" checked="checked">
                           <span class="fa2 px-2 py-1 rounded border">Mặc định</span> 
                           </label>
                        </li>
                        <li class="filter-item filter-item--check-box">
                           <label class="d-flex align-items-baseline pt-1 pb-1 m-0">
                           <input type="radio" class="d-none sortby-price-asc" name="sortBy" onclick="sortby()" value="price-asc">
                           <span class="fa2 px-2 py-1 rounded border">Giá tăng dần</span> 
                           </label>
                        </li>
                        <li class="filter-item filter-item--check-box">
                           <label class="d-flex align-items-baseline pt-1 pb-1 m-0">
                           <input type="radio" class="d-none sortby-price-desc" name="sortBy" onclick="sortby()" value="price-desc">
                           <span class="fa2 px-2 py-1 rounded border">Giá giảm dần</span> 
                           </label>
                        </li>
                        <li class="filter-item filter-item--check-box">
                           <label class="d-flex align-items-baseline pt-1 pb-1 m-0">
                           <input type="radio" class="d-none sortby-created-asc" name="sortBy" onclick="sortby()" value="created-asc">
                           <span class="fa2 px-2 py-1 rounded border">Mới nhất </span> 
                           </label>
                        </li>
                     </ul>
                  </div>
                  <div class="collection">
                     <div class="category-products position-relative mt-3 mb-3">
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                           <input type="hidden" id="cate_slug" value="{{$cate_slug}}" />
                           <input type="hidden" id="type_slug" value="{{$type_slug}}" />
                           <input type="hidden" id="type_two_slug" value="{{$type_two_slug}}" />
                        <div class="category-products position-relative mt-4 mb-4 product-list-filter">
                           @if (count($list) > 0)
                           <div class="row slider-items ">
                              @foreach ($list as $item)
                              <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3">
                                 @include('layouts.product.item',['pro'=>$item])
                              </div>
                              @endforeach
                           </div>
                           <div id="pagination_main" style="text-align: center;">
                              {{$list->links()}}
                           </div>
                              @else 
                              <div class="row slider-items ">
                                 <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3">
                                    <h3>Nội dung đang được cập nhật</h3>
                                 </div>
                              </div>
                           @endif
                           
                        </div>
                     </div>
                  </div>
                  <div class="category-gallery pb-3 pt-3">
                     <div class="content_coll position-relative rte">
                        {!!$content!!}
                        <div class="bg_cl position-absolute w-100"></div>
                     </div>
                     @if ($content)
                     <div class="view_mores text-center mb-2">
                        <a href="javascript:;" class="one pt-2 pb-2 pl-4 pr-4 modal-open position-relative btn rounded-10 box_shadow font-weight-bold" title="Xem tất cả">Xem tất cả <img class="m_more" src="//bizweb.dktcdn.net/thumb/pico/100/459/533/themes/868331/assets/sortdown.png?1681892262419" alt="Xem tất cả"></a>
                        <a href="javascript:;" class="two pt-2 pb-2 pl-4 pr-4 modal-open position-relative btn rounded-10 box_shadow font-weight-bold d-none" title="Thu gọn">Thu gọn <img class="m_less" src="//bizweb.dktcdn.net/thumb/pico/100/459/533/themes/868331/assets/sortdown.png?1681892262419" alt="Thu gọn"></a>
                     </div>
                     @endif
                  </div>
               </div>
               <div class="col-12 col-lg-3 order-lg-1">
                  <div class="sidebar sidebar_mobi m-0 p-2 p-lg-0 mt-lg-1 d-flex flex-column">
                     <div class="heading d-none">
                        <div class="h2 title-head font-weight-bold big text-uppercase mt-2 mb-0">
                           Bộ lọc sản phẩm
                        </div>
                        <p class="font-italic pt-2 pb-2 mb-0">Giúp lọc nhanh sản phẩm bạn tìm kiếm</p>
                     </div>
                     <div class="aside-filter mb-3 modal-open w-100 pr-0 pr-md-2 order-lg-3 clearfix">
                        <div class="filter-container row">
                           <aside class="aside-item filter-price mb-3 col-12 col-sm-12 col-lg-12">
                              <div class="h2 title-head m-0 pt-2 pb-2 font-weight-bold">Lọc giá</div>
                              <div class="aside-content filter-group mb-1">
                                 <div class="row">
                                    <div class="col-6 col-lg-12 col-xl-6">
                                       <label class="d-flex align-items-baseline pt-1 pb-1 m-0" for="filter-khoanggia-tu">
                                       <input type="number" id="filter-khoanggia-tu"  onKeyUp="edValueKeyPress()" class="form-control rounded pr-0" value="" placeholder="Giá tối thiểu">
                                       </label>
                                    </div>
                                    <div class="col-6 col-lg-12 col-xl-6">
                                       <label class="d-flex align-items-baseline pt-1 pb-1 m-0" for="filter-khoanggia-den">
                                       <input type="text" id="filter-khoanggia-den" class="form-control rounded pr-0" value="" placeholder="Giá tối đa">
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <a class="btn btn-primary js-filter-pricerange font-weight-bold rounded-10" href="javascript:;" onclick="priceRange()">Áp dụng</a>
                           </aside>
                           @foreach ($filter as $item)
                           <aside class="aside-item filter-vendor mb-3 col-12 col-sm-4 col-lg-12">
                               <div class="h2 title-head m-0 pt-2 pb-2 font-weight-bold">{{$item->name}}</div>
                               <div class="aside-content filter-group">
                                  <ul class="filter-vendor filter-grid list-unstyled m-0">
                                   @foreach ($item->tags as $tag)
                                   <li class="filter-item filter-item--check-box  ">
                                       <label class="d-flex align-items-baseline m-0 {{$tag->slug}}" >
                                       <input type="checkbox" id="filter-{{$tag->slug}}" class="d-none" name="fillter" onclick="toggleFilter(this)"  value="{{$tag->slug.'-'.$item->slug}}">
                                       <span class="fa2 px-2 py-1 rounded border">{{$tag->name}}</span>
                                       </label>
                                    </li>
                                   @endforeach
                                  </ul>
                               </div>
                            </aside>
                           @endforeach
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
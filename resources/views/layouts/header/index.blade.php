@php $total = 0; $qty = 0 ; @endphp
@foreach((array) session('cart') as $id => $details)
      @php 
      $total += ($details['price'] - ($details['price']*($details['discount']/100))) * $details['quantity'] ;
      $qty += $details['quantity'] ;
      @endphp
@endforeach
<div class="menubar w-100 text-center d-lg-none align-items-center scroll_down ">
   <a href="{{route('home')}}" title="{{$setting->company}}">
       <img alt="{{$setting->company}}"
           src="{{$setting->logo}}"
           class="img-fluid" style="max-width:115px;">
   </a>
</div>
<div class="col-left d-flex flex-column pt-2 pb-2 d-none d-lg-block">
   <div class="container position-relative">
       <div class="row align-items-center">
        <div class="col-12 d-lg-none">
            <form action="{{route('search_result')}}" method="get" class="left-search-mobile position-relative mt-4 mt-lg-0 pt-2 pb-2 pt-lg-1 pb-lg-1">
                @csrf
               <input type="text" onkeyup="keyinputsearch()" class="typeahead form-control" placeholder="Nội dung tìm kiếm..." name="keywordsearch" class="rounded form-control pl-2 pl-lg-3 pr-5" required>
               <button type="submit" class="position-relative buttonsearch">
                <img width="25" src="{{url('frontend/images/search.png')}}" alt="">
               </button>
               <div class="w-100 position-absolute rounded searchResult px-2 d-none">
                   <div class="overflow-auto search-result-warpper">
                       <div class="searchResult_products"> </div>
                   </div>
               </div>
           </form>
        </div>
           <div class="col-12 col-lg-4 d-none d-lg-block">
               <a href="{{route('home')}}" title="{{$setting->company}}" class="logo">
                   <img alt="{{$setting->company}}"
                       src="{{$setting->logo}}"
                       class="img-fluid" style="max-width:115px;">
               </a>
           </div>
           <div class="col-12 col-lg-8 d-none d-lg-block">
                <div class="align-items-center position-static pr-menu">
                    <div class="row">
                        <div class="col-lg-11 d-flex">
                            <div class="search-block mr-3">
                                <form action="{{route('search_result')}}" method="get" class=" left-search position-relative mt-4 mt-lg-0 pt-2 pb-2 pt-lg-1 pb-lg-1">
                                     @csrf
                                    <input type="text" onkeyup="keyinputsearch()" class="typeahead form-control" placeholder="Nội dung tìm kiếm..." name="keywordsearch" class="rounded form-control pl-2 pl-lg-3 pr-5" required>
                                    <button type="submit" class="position-relative buttonsearch">
                                        <img width="25" src="{{url('frontend/images/search.png')}}" alt="">
                                    </button>
                                    <div class="w-100 position-absolute rounded searchResult px-2 d-none">
                                        <div class="overflow-auto search-result-warpper">
                                            <div class="searchResult_products"> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="info-block mr-3">
                                <a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}" class="align-items-center d-flex">
                                    <span class="play0 d-none d-xl-block">
                                        <svg width="32" height="32">
                                            <use href="#svg-phone"></use>
                                        </svg>
                                    </span>
                                    <b><small>Gọi mua hàng</small> <br>{{$setting->phone1}}</b>
                                </a>
                            </div>
                            
                            
                        </div>
                        <div class="col-lg-1">
                            <div class="navigation-bottom mt-auto mt-lg-0">
                                <div class="b_use d-none d-lg-flex align-items-stretch">
                                    <a class="p-1 btn-cart position-relative d-inline-flex head_svg justify-content-center align-items-center rounded-10"
                                        title="Giỏ hàng" href="{{route('listCart')}}">
                                        <span
                                            class="b_ico_Cart text-center d-flex justify-content-center align-items-center position-relative">
                                            <svg width="20" height="20">
                                                <use href="#svg-cart" />
                                            </svg>
                                            <span
                                                class="btn-cart-indicator position-absolute font-weight-bold text-center text-white cart_count">{{$qty}}</span>
                                        </span>
                                        <small class="d-none d-xl-block ml-lg-1" style="color:#874c20;">Giỏ hàng</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
   </div>
</div>
<div class="navigation-block mr-lg-auto d-none d-lg-block">
   <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul id="menu_pc" class="p-0 m-0 list-unstyled position-relative d-lg-flex">
                <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                    <a href="{{route('home')}}" title="Smart watch" 
                        class=" d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                        Trang chủ
                    </a>
                </li>
                <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                    <a href="{{route('pagecontent',['slug'=>'gioi-thieu'])}}" title="Smart watch" 
                        class=" d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                        Về chúng tôi
                    </a>
                </li>
                @foreach ($categoryhome as $cate)
                <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                    <a href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}" title="{{languageName($cate->name)}}"
                        class=" d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                        {{languageName($cate->name)}}
                        @if (count($cate->typeCate) > 0)
                        <i class="down_icon align-items-center justify-content-center position-absolute d-none d-lg-block mg"></i>
                        @endif
                    </a>
                    @if (count($cate->typeCate) > 0)
                    <i class="js-submenu down_icon d-flex align-items-center justify-content-center position-absolute d-lg-none"></i>
                    <ul class="lvdiv lv1 list-group p-0 list-unstyled rounded py-lg-2">
                        @foreach ($cate->typeCate as $type)
                        <li class="no level1 pr-lg-3  pl-2 position-relative cls">
							<a href="{{route('allListType',['danhmuc'=>$cate->slug,'loaidanhmuc'=>$type->slug])}}" class="py-1 py-lg-2 pr-5 position-relative  js-checkMenu" title="{{languageName($type->name)}}">
								{{languageName($type->name)}}
							</a>
						</li>
                        @endforeach
					</ul>
                    @endif
                </li>
                @endforeach
                @foreach ($blogCate as $item)
                <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                    <a href="{{route('listCateBlog',['slug'=>$item->slug])}}" title="{{languageName($item->name)}}"
                        class=" d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                        {{languageName($item->name)}}
                        @if (count($item->typeCate) > 0)
                        <i class="down_icon align-items-center justify-content-center position-absolute d-none d-lg-block mg"></i>
                        @endif
                    </a>
                    @if (count($item->typeCate) > 0)
                    <i class="js-submenu down_icon d-flex align-items-center justify-content-center position-absolute d-lg-none"></i>
                    <ul class="lvdiv lv1 list-group p-0 list-unstyled rounded py-lg-2">
                        @foreach ($item->typeCate as $type)
                        <li class="no level1 pr-lg-3  pl-2 position-relative cls">
							<a href="{{route('listTypeBlog',['slug'=>$type->slug])}}" class="py-1 py-lg-2 pr-5 position-relative  js-checkMenu" title="{{languageName($type->name)}}">
								{{languageName($type->name)}}
							</a>
						</li>
                        @endforeach
					</ul>
                    @endif
                </li>
                @endforeach
                <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
                    <a href="{{route('lienHe')}}" title="Smart watch" 
                        class=" d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
                        Liên hệ
                    </a>
                </li>
            </ul>
        </div>
    </div>
   </div>
</div>
<div class="col-left position-fixed d-flex flex-column pt-lg-2 pb-lg-2 pt-0 pb-0 d-lg-none"
   id="col-left-mew">
   <div class="align-items-center menu_mobile h-100 position-relative">
       <ul id="menu-mew" class="p-0 m-0 list-unstyled d-lg-flex justify-content-lg-end">
            <li class="level0 d-block w-100 position-static ">
                
                <ul class="lv1 p-0 list-unstyled position-absolute m_chill m-0 position-relative">
                    <li class="level1 main position-sticky bg-white position-relative">
                        <a href="javascript:;"
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom align-items-center w-100 justify-content-center text-main"
                            title="Chi tiết danh mục">
                           MENU
                        </a>
                    </li>
                    <li class="level1 position-relative">
                        <a href="{{route('home')}}"
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                            title="345">
                            Trang Chủ
                        </a>
                        
                    </li>
                    <li class="level1 position-relative">
                        <a href="{{route('pagecontent',['slug'=>'gioi-thieu'])}}"
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                            title="345">
                            Về Chúng Tôi
                        </a>
                        
                    </li>
                    @foreach ($categoryhome as $item)
                    <li class="level1 position-relative">
                        <a href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}"
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                            title=" {{languageName($item->name)}}">
                            {{languageName($item->name)}}
                        </a>
                        @if (count($cate->typeCate) > 0)
                        <ul class="lv2 d-flex list-unstyled flex-column pl-0">
                            @foreach ($cate->typeCate as $type)
                            <li class="level2 position-relative">
                                <a href="{{route('allListType',['danhmuc'=>$cate->slug,'loaidanhmuc'=>$type->slug])}}"
                                    class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                    title=" {{languageName($type->name)}}">
                                    {{languageName($type->name)}}
                                </a>
                            </li>
                           @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    <li class="level1 position-relative">
                        <a href=""
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                            title=" Trang Sức Vàng ">
                            Trang Sức Vàng
                        </a>
                        <ul class="lv2 d-flex list-unstyled flex-column pl-0">
                            @foreach ($categoryhome as $item)
                            <li class="level2 position-relative">
                                <a href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}"
                                    class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                    title=" {{languageName($item->name)}}">
                                    {{languageName($item->name)}}
                                </a>
                            </li>
                           @endforeach
                        </ul>
                    </li>
                    @foreach ($blogCate as $item)
                    <li class="level1 position-relative">
                        <a href="{{route('listCateBlog',['slug'=>$item->slug])}}"
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                            title="{{languageName($item->name)}}">
                            {{languageName($item->name)}}
                        </a>
                        @if (count($item->typeCate) > 0)
                        <ul class="lv2 d-flex list-unstyled flex-column pl-0">
                            @foreach ($item->typeCate as $type)
                            <li class="level2 position-relative">
                                <a href="{{route('listTypeBlog',['slug'=>$type->slug])}}"
                                    class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                                    title=" {{languageName($type->name)}}">
                                    {{languageName($type->name)}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    <li class="level1 position-relative">
                        <a href="{{route('lienHe')}}"
                            class="font-weight-bold d-flex pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center"
                            title="345">
                            Liên Hệ
                        </a>
                        
                    </li>
                </ul>
            </li>
       
       </ul>
   </div>
</div>

<div class="mew_mobi_bar d-lg-none position-fixed d-flex">
    <a id="js-menu-toggle" href="javascript:;" title="Danh mục"
        class="item align-content-center d-flex flex-column h-100 justify-content-center">
        <img width="20" height="20" src="{{url('frontend/images/menu.png')}}" alt="" style="margin: 0 auto;">
        <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Menu</span>
    </a>
    <a href="https://zalo.me/{{$setting->phone1}}" title="So sánh"
        class="item align-content-center d-flex flex-column h-100 justify-content-center js-notify-container">
        <img width="20" height="20" src="{{url('frontend/images/zalo.png')}}" alt="" style="margin: 0 auto;">
        <span class="tit font-weight-bold d-block text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Zalo</span>
    </a>
    @if ( Route::currentRouteName() == 'allListTags' ||  Route::currentRouteName() == 'allListProCate' || Route::currentRouteName() == 'allListType' || Route::currentRouteName() == 'allListTypeTwo' || Route::currentRouteName() == 'detailProduct')
    <a href="javascript:;" title="Bộ lọc" class="item align-content-center d-flex flex-column h-100 justify-content-center open-filters" id="open-filters">
        <svg width="20" height="20">
            <use href="#svg-filter"></use>
        </svg>
        <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Bộ lọc</span>
    </a>
    @else
    <a href="tel:{{$setting->phone1}}" title="Liên hệ"
        class="item align-content-center d-flex flex-column h-100 justify-content-center"
        id="js-contact-toggle">
        <svg width="20" height="20">
            <use href="#svg-phone" />
        </svg>
        <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Liên hệ</span>
    </a>
    @endif
  
    <a class="item d-flex flex-column p-1 align-items-center justify-content-center btn-cart position-relative  "
        title="Giỏ hàng" href="{{route('listCart')}}">
        <span class="position-relative flex-column d-flex">
            <svg width="20" height="20">
                <use href="#svg-cart" />
            </svg>
            <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Giỏ
                hàng</span>
            <span class="btn-cart-indicator position-absolute text-center">{{$qty}}</span>
        </span>
    </a>
</div>
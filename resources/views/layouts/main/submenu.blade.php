<div class="mainmenu">
    <div class="nav-cate">
       <ul id="menu2017">
         @foreach ($categoryhome as $item)
            @if (count($item->typeCate) > 0 || count($item->tagCate) > 0)
            <li class="dropdown menu-item-count">
               <a class="nd-categories-a" href="{{--{{route('allListProCate',['danhmuc'=>$item->slug])}}--}}" title="{{languageName($item->name)}}">
                  <img width="21" height="21" src="{{$item->avatar}}" alt="{{languageName($item->name)}}" style="margin-right: 10px;">{{languageName($item->name)}} <svg width="10" height="10" class="position-absolute rounded-circle">
                   <use href="#svg-right"></use>
               </svg></a>
               <div class="subcate gd-menu">
                  <div class="nd-cate-list ">
                     @foreach ($item->typeCate as $type)
                     <aside>
                        <a class="nd-categories-main-sub" href="{{--{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug])}}--}}" title="{{languageName($type->name)}}">{{languageName($type->name)}}</a>
                        @if (count($type->typetwo) > 0)
                        <ul class="submenu__list">
                           @foreach ($type->typetwo as $ttwo)
                           @if ($ttwo->status == 1)
                           <li class="submenu__col">
                              <span class="submenu__item submenu__item--main">
                                  <a class="link" href="{{--{{route('allListTypeTwo',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug,'loai2'=>$ttwo->slug])}}--}}" title="{{languageName($ttwo->name)}}">{{languageName($ttwo->name)}}</a>
                              </span>
                          </li>
                           @endif
                           
                           @endforeach
                       </ul>
                        @endif
                     </aside>
                     
                     @endforeach
                   
                  </div>
               </div>
            </li>
            @else 
            <li class="menu-item-count">
               <a class="nd-categories-a" href="{{--{{route('allListProCate',['danhmuc'=>$item->slug])}}--}}" title="{{languageName($item->name)}}"><img style="margin-right: 10px;" width="21" height="21" src="{{$item->avatar}}" alt="{{languageName($item->name)}}"> {{languageName($item->name)}}</a>
            </li>
            @endif
          
          @endforeach
          
       </ul>
    </div>
 </div>
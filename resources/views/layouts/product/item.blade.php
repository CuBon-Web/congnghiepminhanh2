
@php
$img = json_decode($pro->images);
@endphp
<div class="product-item position-relative mb-0 p-2 rounded-10 bg-white h-100 box_shadow">
   @if ($pro->discount > 0)
   <div class="sale-label sale-top-right position-absolute font-weight-bold"> Giảm {{100-ceil(($pro->discount/$pro->price)*100)}}% </div>
   @endif
   <a href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}" class="thumb d-block modal-open position-relative" title="{{languageName($pro->cate->name)}}">
       <div class="position-relative w-100 m-0 ratio1by1 has-edge aspect zoom">
           <img src="{{url('frontend/images/placeholder_1x1.png')}}"
               data-src="{{$img[0]}}"
               decoding="async"
               class="d-block img img-cover position-absolute lazy"
               alt="{{languageName($pro->cate->name)}}">
       </div>
       <span class="label_tag label2 position-absolute d-inline-block pr-2 text-white d-flex align-items-center gap_5 rounded-10">
			<img width="20" height="20" alt="label_con_2" src="{{url('frontend/images/label_img_2.png')}}" class="mr-1">Giảm cực sốc
		</span>
   </a>
   <div class="item-info mt-1 position-relative">
       <h3 class="item-title font-weight-bold">
           <a class="line_1" href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}"
               title="{{languageName($pro->cate->name)}}">
               {{$pro->name}}
           </a>
       </h3>
       <div class="item-price mb-1">
         @if ($pro->price > 0)
            @if ($pro->status_variant == 1)
            <span class="special-price font-weight-bold">{{get_price_variant($pro->id)}}₫</span>
            <del class="old-price"> {{number_format($pro->price)}}₫</del>
            @else 
            <span class="special-price font-weight-bold">{{number_format($pro->discount)}}₫</span>
            <del class="old-price"> {{number_format($pro->price)}}₫</del>
            @endif
            
         @else
         <span
               class="special-price font-weight-bold">Đang cập nhật</span>
         @endif
       </div>
       {{-- <label onclick="compareProduct({{$pro->id}})"
           class="compare-label position-relative d-flex align-items-center m-0">
           <input type="checkbox" {{checkExistCompare($pro->id) == true ? "checked" : "" }}
               class="compare-checkbox d-none"
               value="{{$pro->id}}" data-type="{{$pro->id}}">
           <span
               class="compare-checkbox mr-1 rounded-circle"></span>
           So sánh
       </label> --}}
   </div>
</div>
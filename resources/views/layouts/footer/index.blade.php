<footer class="bg-white pt-5">
   <div class="foo_mid mb-4">
       <div class="container">
           <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 footer-left">
                   <a href="/" title="Mew Mobile" class="logo_foo d-block mb-2">
                       <img alt="Logo Mew Mobile" class="lazy"
                           src="{{url('frontend/images/placeholder_1x1.png')}}"
                           data-src="{{$setting->logo_footer}}">
                   </a>
                   <h4>CÔNG TY TNHH VẬT TƯ NGỌC MINH ANH</h4>
                   <address class="vcard mb-4">
                       <p class="adr"><b>Trụ sở chính: </b>{{$setting->address1}}</p>
                       <p><b>MST: </b><a href="" title="">2301306122</a></p>
                       <p><b>Email: </b><a href="mailto:{{$setting->email}}"
                               title="{{$setting->email}}">{{$setting->email}}</a></p>
                       <p><b>Hotline: </b><a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">{{$setting->phone1}}</a></p>
                       {{-- <p><b>Tên hộ kinh doanh: </b>Hộ Kinh Doanh Huyền My</p> --}}
                       {{-- <p><b>Mã số hộ kinh doanh: </b>8353517037-001</p> --}}
                       {{-- <p><b>Ngày đăng ký: </b>10/8/2023</p> --}}
                   </address>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left">
                   <h3 class="footer-title mb-2 position-relative font-weight-bold">Chính sách</h3>
                   <ul class="links">
                    @foreach ($pageContent as $item)
                        @if ($item->type == 'ho-tro-khanh-hang')
                        <li>
                            <a href="{{--{{route('pagecontent',['slug'=>$item->slug])}}--}}" title="{{$item->title}}">{{$item->title}}</a>
                        </li>
                        @endif
                    
                    @endforeach
                   </ul>
                   <a href="" target="_blank"
                        class="position-relative iso sitdown modal-open d-inline-block lazada mr-1"
                        title="Lazada">
                        <img class="lazy" width="120"
                            src="{{url('frontend/images/placeholder_1x1.png')}}"
                            data-src="{{url('frontend/images/logoSaleNoti.png')}}"
                            alt="Lazada">
                    </a>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left">
                   <h3 class="footer-title mb-2 position-relative font-weight-bold">Vị trí</h3>
                   <div class="social position-relative pb-2">
                       {!!$setting->iframe_map!!}
                       
                   </div>
                   
               </div>
           </div>
       </div>
   </div>
   <div class="foo_bot pt-2 pb-2 border-top">
       <div class="container">
           <div class="row bgk align-items-center">
               <div class="col-12">
                   <div class="coppyright">Bản quyền thuộc về <a rel="nofollow noopener"
                           href="" title="IVII"
                           target="_blank">Minh Anh</a>. Cung cấp bởi <a
                           href=""
                           title="Minh Anh" target="_blank" rel="nofollow noopener">LTA DEV</a>.</div>
               </div>
           </div>
       </div>
   </div>
</footer>
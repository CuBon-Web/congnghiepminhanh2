@extends('layouts.main.master')
@section('title')
Giới thiệu về CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ NĂNG LƯỢNG TÁI TẠO
@endsection
@section('description')
Giới thiệu về CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ NĂNG LƯỢNG TÁI TẠO
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="about about-1" id="about-1">
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-5">
            <div class="about-img">
               <div class="about-img-holder bg-overlay">
                  <div class="bg-section"><img src="{{$gioithieu->image}}" alt="about Image" /></div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-7">
            <div class="heading heading-1">
               <p class="heading-subtitle heading-subtitle-bg">Về chúng tôi</p>
               <h2 class="heading-title">{{$setting->company}}</h2>
            </div>
            <div class="about-block">
               <div class="row">
                  <div class="col-12 col-lg-12">
                     <div class="block-left">
                        {!!$gioithieu->content!!}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="about about-2" id="about-2">
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-4">
            <div class="about-tamnhin">
               <div class="tamnhin-img-holder">
                  <img src="{{url('frontend/images/tamnhin.jpg')}}" alt="about Image" width="100%"/>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-8" style="padding-top: 5%;">
            <div class="heading heading-1">
               <h2 class="heading-title" style="ma">TẦM NHÌN</h2>
            </div>
            <div class="about-block">
               <div class="row">
                  <div class="col-12 col-lg-12">
                     <div class="block-left">
                        <p>Phù hợp với chiến lược đầu tư, hợp tác và phát triển bền vững,
                           RETD nỗ lực trở thành đơn vị hàng đầu và có uy tín tại Việt Nam
                           trong cung cấp giải pháp năng lượng tái tạo - thi công tư vấn
                           vận hành dự án.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="features features-2 bg-overlay bg-overlay-theme2" id="features-2">
   <div class="bg-section"><img src="https://demo.zytheme.com/energia/assets/images/background/2.jpg" alt="background" /></div>
   <div class="container">
   <div class="heading heading-13 text-center">
      <div class="row">
         <div class="col-12 col-lg-6 offset-lg-3">
            <h2 class="heading-title" style="color:white;">Sự khác biệt</h2>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-panel-holder" data-hover="">
               <div class="feature-panel">
                  <div class="feature-icon"><img src="{{url('frontend/images/money.png')}}" alt="" width="100"></div>
                  <div class="feature-content">
                     <h4>PHÒNG R&D</h4>
                     <p>Tạo ra lợi thế cạnh tranh về giá và chất lượng, với đội ngũ cán bộ tài năng,
                        sáng tạo, nhiệt huyết, đặc biệt có kinh nghiệm làm việc tại các tập đoàn lớn trong và ngoài nước
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-panel-holder" data-hover="">
               <div class="feature-panel">
                  <div class="feature-icon"><img src="{{url('frontend/images/school.png')}}" alt="" width="100"></div>
                  <div class="feature-content">
                     <h4>CHƯƠNG TRÌNH INTERNSHIP</h4>
                     <p>Cho các sinh viên xuất sắc các trường đại học lớn, tạo cơ hội cho các sáng tạo trẻ thực nghiệm, trưởng thành và đóng góp cho quy trình phát triển của RETD</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-panel-holder" data-hover="">
               <div class="feature-panel">
                  <div class="feature-icon"><img src="{{url('frontend/images/giamsat.png')}}" alt="" width="100"></div>
                  <div class="feature-content">
                     <h4>QUY TRÌNH GIÁM SÁT</h4>
                     <p>Thi công, vận hành chủ động và sát sao với chủ đầu tư. Đánh giá hồ sơ thiết kế thi công, giám sát từng hạng mục xây dựng, lập báo cáo định kỳ, đảm bảo tiến độ và hiệu quả</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="about about-2" id="about-2">
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-8">
            <div class="heading heading-1">
               <h2 class="heading-title" style="ma">SỨ MỆNH</h2>
            </div>
            <div class="about-block">
               <div class="row">
                  <div class="col-12 col-lg-12">
                     <div class="block-left">
                        <p>Với phương châm “Trên cả sự mong đợi của bạn”. RETD tập
                           trung đầu tư vào phát triển nguồn nhân lực, nghiên cứu để tạo
                           ra các sản phẩm, giải pháp và dịch vụ hiệu quả. Hướng tới mục
                           tiêu chuyển đổi các mái nhà lớn chưa sử dụng tại Việt Nam để
                           tạo ra năng lượng xanh thân thiện với môi trường.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-4">
            <div class="about-tamnhin">
               <div class="tamnhin-img-holder" style="    padding-top: 2%;">
                  <img src="{{url('frontend/images/tamnhin.jpg')}}" alt="about Image" width="100%"/>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="history" id="history">
   <div class="heading heading-13 text-center">
      <div class="row">
         <div class="col-12 col-lg-6 offset-lg-3">
            <h2 class="heading-title" style="color:#6c943e;">Lịch sử hình thành</h2>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <!-- Resize the browser to see the effect -->

<div class="how-it-works">
   <div class="process row text-center mb-5">
     <div class="col content-col">
       <div class="circle-icon-container"><p>2016</p></div>
       <p style="text-align: justify;color: #6c943e;">Công ty TNHH Phát triển công nghệ năng lượng tái
         tạo được thành lập ngày 12/05/2016. Khởi nghiệp
         từ lĩnh vực thi công điện, RETD ngày càng lớn mạnh
         thông qua việc cung cấp các sản phẩm, giải pháp về
         thi công lắp đặt hệ thống điện mặt trời tại Việt Nam.
         Với nội lực mạnh mẽ về tài chính và con người, RETD
         xác định tập trung đầu tư vào lĩnh vực chủ chốt liên
         quan đến cung cấp các thiết bị vật tư, thi công lắp
         đặt, vận hành, bảo trì hệ thống điện năng lượng mặt
         trời với chất lượng và mức giá cạnh tranh.</p>
     </div>
     <div class="col arrow-col">
       <i class="fa"></i>
     </div>
     <div class="col content-col">
       <div class="circle-icon-container"><p>2018</p></div>
       <p style="text-align: justify;color: #6c943e;">Trên con đường khẳng định vị thế của mình, RETD luôn
         hiểu rằng điều kiện kiên quyết tạo nên những thành
         công và gia tăng giá trị của doanh nghiệp đó là sự khác
         biệt. Chính những khác biệt trong tư duy xây dựng hệ
         thống bền vững, lựa chọn lĩnh vực đầu tư kinh doanh
         theo chiều sâu… đã mang đến cho RETD cơ hội đánh
         dấu bước trưởng thành vượt bậc của mình.</p>
     </div>
     <div class="col arrow-col">
       <i class="fas"></i>
     </div>
     <div class="col content-col">
       <div class="circle-icon-container"><p>2020</p></div>
       <p style="text-align: justify;color: #6c943e;">Xác định con người là nhân tố hàng đầu, RETD
         không ngừng tìm kiếm và nuôi dưỡng tài năng,
         mang đến cho thành viên những cơ hội được thể
         hiện giá trị bản thân, đóng góp tích cực cho từng
         giai đoạn phát triển khác nhau của doanh nghiệp.
         Hơn ai hết, tất cả các thành viên đều hiểu điều quan
         trọng nhất cho những bước đột phá là sự đồng lòng
         quyết tâm – ĐOÀN KẾT TẠO NÊN SỨC MẠNH.</p>
     </div>
     <div class="col arrow-col">
      <i class="fas"></i>
    </div>
     <div class="col content-col">
      <div class="circle-icon-container"><p>2022</p></div>
      <p style="text-align: justify;color: #6c943e;">Năm 2022 chính là năm bản lề của công ty, khi
         RETD tập trung nâng cao năng lực tài chính, đầu tư
         trang thiết bị, bổ sung thêm nhân sự cấp cao trong
         hệ thống nhân sự, định vị thương hiệu lên một tầm
         cao mới.</p>
    </div>
   </div>
 </div>
 
 <!-- Text from Corporate Ipsum - http://www.cipsum.com -->
         </div>
      </div>
   </div>
</section>
<style>
   
</style>
@endsection
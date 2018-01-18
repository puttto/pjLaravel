@extends('layouts\app')
@section('content')
  <header class="masthead text-center text-white d-flex">
<div class="container my-auto">
<div class="row">
  <div class="col-lg-10 mx-auto">
    <img src="img/logo.png" alt="">
    <br>
    <h1 class="text-uppercase">
        <strong>บริการดูแลผู้สูงอายุตามบ้าน</strong>
      </h1>
    <hr>
  </div>
  <div class="col-lg-8 mx-auto">

    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">แสดงรายละเอียดเพิ่มเติม</a>
  </div>
</div>
</div>
</header>
  <section class="bg-primary" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="section-heading text-white">เกี่ยวกับเรา</h2>
        <hr class="light my-4">
        <p class="text-faded mb-4" style="font-size: 17px; color:#fff">ทางเรามีการตรวจสอบประวัติพนักงาน และคัดเลือกพนักงานที่มีใจรักงานด้านบริการ มีความอดทนสูงก่อนจัดส่งไปทำงาน พนักงานดูแลผู้ป่วย-ผู้สูงอายุเป็นผู้หญิงอายุตั้งแต่ 18-55ปี ทุกคนในศูนย์ผ่านการอบรมหลักสูตรในการปฏิบัติหน้าที่ โดยผ่านการอบรมจากเนิร์ซเซอรี่ และมีประสบการณ์การทำงานในโรงพยาบาลมีประสบการณ์ด้านการบริบาลอย่างน้อย 2 ปีจนถึง 10 ปี มีใจรักในงานด้านบริบาล มีความอดทนสูง ใจเย็น สุขภาพร่างกายแข็งแรง พร้อมที่จะปฏิบัติหน้าที่ ก่อนจัดส่งพนักงานทางเรามีการอบรมก่อนจัดส่งไปทำงาน</p>
        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
      </div>
    </div>
  </div>
</section>



<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">บริการของเรา</h2>
        <hr class="my-4">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
          <h3 class="mb-3">ประสิทธิภาพ</h3>
          <p class="text-muted mb-0">ผู้ดูแลรู้หน้าที่ของตนเอง มีกิจกรรมกรรมการดูแลอะไรที่ต้องทำอย่างเหมาะสมและครอบคลุม</p>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fa fa-4x fa-heartbeat text-primary mb-3 sr-icons"></i>
          <h3 class="mb-3">สบายใจ</h3>
          <p class="text-muted mb-0">ลูกค้าต้องได้ผู้ดูแลที่ดีที่สุดไป พนักงานต้องมีประสบการณ์มีความสามารถจริง</p>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fa fa-4x fa-check-square-o text-primary mb-3 sr-icons"></i>
          <h3 class="mb-3">มาตราฐาน</h3>
          <p class="text-muted mb-0">การทำงานที่มีการวางแผนการดูแลร่วมกับญาติ มีขอบเขตของงานที่ชัดเจน ควบคุมและตรวจสอบได้</p>
        </div>
      </div>
      {{-- <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box mt-5 mx-auto">
          <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
          <h3 class="mb-3">Up to Date</h3>
          <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
        </div>

    </div> --}}
    </div>
  </div>
</section>

<section class="bg-dark text-white">
  <div class="container text-center">
      <i class="fa fa-search fa-3x mb-3 sr-contact"></i>
    <h2 class="mb-4">เริ่มต้นค้นหาผู้ดูแลกัน!</h2>
    <hr class="light my-4">

    <a class="btn btn-light btn-xl sr-button" href="customer">ค้นหาผู้ดูแล</a>
  </div>
</section>

<section class="p-0" id="portfolio">
  <div class="container-fluid p-0">
    <div class="row no-gutters popup-gallery">
      <div class="col-lg-4 col-sm-6">
        <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  ภาพที่ 1
                </div>
                {{-- <div class="project-name">
                  Project Name
                </div> --}}
              </div>
            </div>
          </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  ภาพที่ 2
                </div>
                {{-- <div class="project-name">
                  Project Name
                </div> --}}
              </div>
            </div>
          </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  ภาพที่ 3
                </div>
                {{-- <div class="project-name">
                  Project Name
                </div> --}}
              </div>
            </div>
          </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  ภาพที่ 4
                </div>
                {{-- <div class="project-name">
                  Project Name
                </div> --}}
              </div>
            </div>
          </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  ภาพที่ 5
                </div>
                {{-- <div class="project-name">
                  Project Name
                </div> --}}
              </div>
            </div>
          </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  ภาพที่ 6
                </div>
                {{-- <div class="project-name">
                  Project Name
                </div> --}}
              </div>
            </div>
          </a>
      </div>
    </div>
  </div>
</section>

{{-- <section class="bg-dark text-white">
  <div class="container text-center">
    <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
    <a class="btn btn-light btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/">Download Now!</a>
  </div>
</section> --}}

<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="section-heading">ติดต่อเรา</h2>
        <hr class="my-4">
        <p class="mb-5" style="font-size: 17px;">เรายินดีให้คำปรึกษา และคำแนะนำโทรหาเราสิ</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 ml-auto text-center">
        <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
        <p>
        <a href="tel:+66614844107">061-4844107</a>
        </p>
      </div>
      <div class="col-lg-4 mr-auto text-center">
        <i class="fa fa-comment-o fa-3x mb-3 sr-contact"></i>
        <p>
          <a>Line-ID: 0614844107</a>
        </p>
      </div>
    </div>
  </div>
</section>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/range.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/fullpage.css')}}">
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;1,200;1,300;1,400&display=swap" rel="stylesheet">
  <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <!-- full page -->
  <title>Web Marketing</title>
</head>

<div id="fullpage">
  <!-- Header -->
  <div class="section fp-auto-height" id="section0">
    <header id="header">
      <!-- Menu destop -->
      <div class="menu fixed-top bg-dark" id="menu">
        <div class="container d-flex justify-content-between">
          <div class="logo">
            <a href="{{url('/')}}" class="d-flex justify-content-start">
              <div class="thum-logo pr-2">
                <img src="{{asset('img/logo/logo-w.png')}}" class="img-fluid logo1" alt="">
                <img src="{{asset('img/logo/logo-b.png')}}" class="img-fluid logo2" alt="">
              </div>
              <h3 class="d-flex align-items-end pb-2">THE DOOR</h3>
            </a>
          </div>
          <div class="left-menu d-flex justify-content-between">
            <div class="search d-none d-sm-block">
                <form class="form-inline my-2 my-lg-0" method="post" action="/p/search">
                    @csrf
                    <input class="form-control mr-sm-2" name="key" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                  </form>
            </div>
            <div class="lang pr-4 d-flex justify-content-start">
              <a href="#">VI</a>
              <span class="pl-2 pr-2">|</span>
              <a href="#">EN</a>
            </div>
            <div class="menu-button mt-1 d-flex flex-column">
              <span class="btn1"></span>
              <span class="btn2"></span>
            </div>
          </div>
        </div>
      </div>
      <!-- Menu mobile -->
      <!-- End menu -->
  
      <div class="tab-menu" id="list-menutab">
        <ul>
          <li><a href="">ABOUT</a></li>
          <li><a href="">CONTACT US</a></li>
          <li><a href="">CUSTOMER</a></li>
          <li><a href="">PRODUCT</a></li>
          <li><a href="/login"><i class="fa fa-sign-in pr-2" aria-hidden="true"></i>LOGIN</a></li>
        </ul>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="img/page/page-1.png" alt="">
      </div>
    </header>
  </div>
  @foreach ($post as $p)
  <div id="detail-content" class="container">
    <h1 class="title-content ml-0 text-center">{{$p->title}}</h1>
    <div class="row container">
        <span><i class="fa fa-user pr-1"></i>{{$p->name}}</span> |
        <span class="pl-2"><i class="fa fa-clock-o pr-1"></i>{{date('F d Y', strtotime($p->updated_at))}}</span>
    </div>
    <div class="main-post container">
        {!!$p->content!!}
    </div>
  </div>
  @endforeach
  
  <!-- End header -->
  {{-- OUrstory --}}
  {{-- Article --}}
  <div class="section fp-auto-height" id="section7">
    <footer id="footer">
      <?php $footer =0; ?>
      @if ($layouts)
      @foreach ($layouts as $l)
      @if($l->offset == 8)
      <?php $footer++; ?>
      @endif
      @endforeach
      @endif
      @if($footer ==0)
      <img src="{{asset('/img/layout/page-8.png')}}" class="bg-about" alt="">
      @else
      @foreach ($layouts as $l)
      @if($l->offset ==8)
      <img class="bg-article" src="{{asset('/storage/img/'.$l->link)}}" alt="">
      @endif
      @endforeach
      @endif

      <div class="container-footer container text-center">
        <div class="title-footer">
          <h3>CONTACT <span class="pl-3">US</span></h3>
        </div>
        <div class="info-contact">
          <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-right">
              <img src="{{asset('/img/footer/home.png')}}" alt="">
            </div>
            <div class="col-6 col-md-6 col-lg-6 text-left d-flex align-items-end">
              <p class="w-50 m-0 pl-1">No. 25, 4/228 Thanh Binh, Quarter 11,
                Mo Lao Ward, Ha Dong, Hanoi.</p>
            </div>
          </div>
          {{-- end row --}}
          <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-right">
              <p>
                contact@thedoor.vn
              </p>

            </div>
            <div class="col-6 col-md-6 col-lg-6 text-left">
              <img src="{{asset('/img/footer/contact.png')}}" alt="">
            </div>
          </div>
          {{-- end row --}}
          <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-right">
              <img src="{{asset('/img/footer/phone.png')}}" alt="">
            </div>
            <div class="col-6 col-md-6 col-lg-6 text-left d-flex align-items-end">
              <p>
                0838.970.828
              </p>

            </div>
          </div>
          {{-- end row --}}
          <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-right">
              <p>0838.970.828</p>
            </div>
            <div class="col-6 col-md-6 col-lg-6 text-left d-flex align-items-end">

              <img src="{{asset('/img/footer/tag.png')}}" alt="">
            </div>
          </div>
          {{-- end row --}}
          <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-right">
              <img src="{{asset('/img/footer/get.png')}}" alt="">
            </div>
            <div class="col-6 col-md-6 col-lg-6 text-left d-flex align-items-end">
              <ul class="d-flex pl-2 justify-content-start footer-social">
                <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
          {{-- end row --}}
          <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-right">
              <p>
                www.thedoor.vn
              </p>

            </div>
            <div class="col-6 col-md-6 col-lg-6 text-left d-flex align-items-end">
              <img src="{{asset('/img/footer/power.png')}}" alt="">
            </div>
          </div>
          {{-- end row --}}
        </div>
        <h3 class="tit">The Door <span>AGENCY</span></h3>
      </div>
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to border-bottom d-flex justify-content-between text-dark">
          <a href="#about-us" class="fa fa-long-arrow-left" aria-hidden="true"></a>
          <span>FOOTER</span>
        </div>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="img/page/page-8.png" alt="">
      </div>
    </footer>
  </div>

</div>
<!-- navigate -->

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/1.js')}}"></script>
<script src="{{asset('js/select.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<!-- Full page -->
{{-- <script src="js/fullpage.js"></script>
<script type="text/javascript">
  var myFullpage = new fullpage('#fullpage', {
        scrollBar: true
      });
</script> --}}
</body>

</html>
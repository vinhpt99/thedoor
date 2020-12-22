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
      <div class="menu fixed-top" id="menu">
        <div class="container-fluid door_header d-flex justify-content-between">
          <div class="logo">
            <a href="{{url('/')}}" class="d-flex justify-content-start">
              <div class="thum-logo pr-2 text-dark">
                <img src="{{asset('img/logo/logo-w.png')}}" class="img-fluid logo1" alt="">
                <img src="{{asset('img/logo/logo-b.png')}}" class="img-fluid logo2" alt="">
              </div>
              <h2 class="d-flex align-items-end pb-2 text-dark font-weight-bold " style="display: block; color: #999;text-shadow: 2px 2px  #fff;">THE DOOR</h2>
            </a>
          </div>
          <div class="left-menu d-flex justify-content-between">
            <div class="search d-none d-sm-block">
              <form class="form-inline my-2 my-lg-0" method="post" action="/p/search">
                @csrf
                <input class="form-control search_input mr-sm-2" name="key" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div>
              <div class="menu_language">
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
        </div>
      </div>
      <!-- Menu mobile -->
      <!-- End menu -->
      <div id="carouselExampleIndicators" class="carousel slide d-none d-sm-block">
        <ol class="carousel-indicators">
          @for($i=0; $i < $count; $i++) @if($i==0) <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
            </li>
            @else
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
            @endif
            @endfor
        </ol>
        <div class="carousel-inner first_page">
          <?php $index = 1; ?>
          @foreach($slide as $k)
          @if($index==1)
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('upload/'.$k->image)}}" alt="{{$k->title}}">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-12 col-md-7">
                  <div class="content-slide text-left">
                    <h2 class="pb-3">{{$k->title}}</h2>
                    <p>{{$k->describe}}</p>
                    <button class="btn btn-secondary d-none d-sm-block">Read More<i class="fa fa-angle-double-right pl-1" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
              <!-- end row -->
              <div class="social_network">
                <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_dark page_dark_1">
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </div>

          @else
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('upload/slides'.$k->image)}}" alt="{{$k->title}}">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-12 col-md-7">
                  <div class="content-slide text-left">
                    <h2 class="pb-3">{{$k->title}}</h2>
                    <p>{{$k->describe}}</p>
                    <button class="btn btn-secondary d-none d-sm-block">Read More<i class="fa fa-angle-double-right pl-1" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
              <!-- end row -->
            </div>
          </div>

          @endif
          <?php $index++; ?>
          @endforeach

        </div>
      </div>
      <div class="carousel-mobile d-block d-sm-none">
        <img src="{{asset('img/mobile/page-1.png')}}" alt="">
        <div class="content-carousel-m">
          <h3 class="title">
            TOUCH THE DOOR, OPEN CREATIVE
          </h3>
          <div class="description">
            Inspired by the doors in life, The Door is the owner of the magical door that brings you to creative lands.
            Besides, there is the motto "Creation or no door". The young team is constantly improving to continue
            collecting creative cultural texts in the world ...
          </div>
          <div class="button-header text-right">
            <a href="" class="btn btn-secondary mt-4 bg-white text-dark border-0">READ MORE</a>
          </div>
        </div>

      </div>

      <!-- navigate -->
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to d-flex justify-content-between text-white">
          <span>HOME</span>
          <a href="#our-story" class="fa fa-long-arrow-right text-white" aria-hidden="true"></a>
        </div>
      </div>
      <div class="tab-menu" id="list-menutab">
        <ul>
          <li><a href="">ABOUT</a></li>
          <li><a href="">CONTACT US</a></li>
          <li><a href="">CUSTOMER</a></li>
          <li><a href="">PRODUCT</a></li>
          <li><a href="{{url('/login')}}"><i class="fa fa-sign-in pr-2" aria-hidden="true"></i>LOGIN</a></li>
        </ul>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="{{asset('img/page/page-1.png')}}" alt="">
      </div>
    </header>
  </div>
  <!-- End header -->
  {{-- OUrstory --}}
  <div class="section fp-auto-height" id="section1">
    <div id="our-story">
      <?php $story = 0; ?>
      @if ($layouts)
      @foreach ($layouts as $l)
      @if($l->offset == 2)
      <?php $story++; ?>
      @endif
      @endforeach
      @endif
      @if($story ==0)
      <img class="about-bg d-none d-sm-block" src="{{asset('img/layout/page-2.png')}}" alt="">
      @else
      @foreach ($layouts as $l)
      @if($l->offset ==2)
      <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
      @endif
      @endforeach
      @endif
      <img class="d-block d-sm-none" src="{{asset('img/mobile/page-2.png')}}" alt="">
      <div class="container story-content">
        <div>
          <video width="677" loop="true" autoplay="autoplay" controls muted>
            <source src="img/movie.mp4" type="video/mp4">
          </video>
        </div>
        <p class="mt-5">
          We are not a traditional ad agency network —we are a radically open creative collective
          The overflow property specifies whether to clip content or to add scrollbars when an element's content is
          too big to fit in a specified
          content or to add scrollbars when an element's content is too big to fit in a specified
        </p>
      </div>
      <!-- navigate -->
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to border-bottom d-flex justify-content-between text-dark">
          <a href="#header" class="fa fa-long-arrow-left" aria-hidden="true"></a>
          <span>OUR STORY</span>
          <a href="#clients" class="fa fa-long-arrow-right" aria-hidden="true"></a>
        </div>
      </div>
      <div class="page-number d-none d-sm-block text-dark">
        <img src="{{asset('img/page/page-2.png')}}" alt="">
      </div>
      <div class="social_network">
        <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_light">
          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>

  </div>
  <!-- clients -->
  <div class="section fp-auto-height" id="section2">
    <div id="clients">
      <?php $clients = 0; ?>
      @if ($layouts)
          @foreach ($layouts as $l)
          @if($l->offset == 3)
          <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
          <?php $clients++; ?>
          @endif
          @endforeach
      @endif
      @if($clients==0)
         <img src="{{asset('img/layout/page-3.png')}}" alt="" class="about-bg d-none d-sm-block">
      @else
      {{-- @foreach ($layouts as $l)
          @if($l->offset ==3)
          <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
          @endif
      @endforeach --}}
      @endif
      <img class="about-bg d-block d-sm-none" src="{{asset('/img/mobile/page-3.png')}}" alt="">
      <div class="content-client">
        <div class="row">
          <div class="col-lg-3">
            <div class="this-spot text-center">
              <div class="row">
                <div class="col-6 col-md-12">
                  <a href="#about-us">THIS SPOT AWAITS YOU</a>
                </div>
              </div>


            </div>
          </div>
          <div class="col-lg-9">
            <div class="show-brand">
              <div class="one-owl owl-carousel owl-theme" id="owl-client">
                @foreach ($customers as $c)
                <div class="item">
                  <a href="#" class="div-brand">
                    <div class="img-brand">
                      <img src="{{asset('upload/'.$c->image)}}" class="img-fluid" alt="">
                    </div>
                    <p class="title-brand text-center">{{$c->customer_name}}</p>
                  </a>
                </div>
                @endforeach
                {{-- item --}}
              </div>

            </div>
            {{-- end show brand --}}
          </div>
        </div>
        <div class="social_network" style="margin-top:200px;">
          <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_dark">
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>

      {{-- end content brand --}}




      <!-- navigate -->
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to d-flex justify-content-between text-white">
          <a href="#our-story" class="fa fa-long-arrow-left text-white" aria-hidden="true"></a>
          <span>CLIENTS</span>
          <a href="#what" class="fa fa-long-arrow-right text-white" aria-hidden="true"></a>
        </div>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="{{asset('img/page/page-3.png')}}" alt="">
      </div>
    </div>
  </div>
  {{-- what --}}
  <div class="section fp-auto-height" id="section3">
    <div id="what">
      <?php $what = 0; ?>
      @if ($layouts)
      @foreach ($layouts as $l)
      @if($l->offset == 4)
      <?php $what++; ?>
      @endif
      @endforeach
      @endif
      @if($what ==0)
      <img src="{{asset('img/layout/page-4.png')}}" alt="" class="about-bg d-none d-sm-block">
      @else
      @foreach ($layouts as $l)
      @if($l->offset ==4)
      <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
      @endif
      @endforeach
      @endif
      <img class="about-bg d-block d-sm-none" src="{{asset('img/mobile/page-4.png')}}" alt="">
      <div class="what-content container">
        <div class="row">
          <div class="col-lg-3">
            <div class="what-left">
              <h3>WHAT ARE WHERE DOING?</h3>
              <p class="d-none d-sm-block"> 
                Ngay từ những ngày đầu thành lập nhóm phát triển đã có những định hướng chiến lược, mục tiêu rõ ràng và quyết tâm nổ lực bền bỉ để đưa Dova Việt Nam thành một công ty lớn mạnh trong tương lai.
                TheDoor là nhà cung cấp dịch vụ CNTT và Giải pháp Digital Marketing hàng đầu Việt Nam. Dova Việt Nam mang đến khách hàng các dịch vụ phát triển website, marketing online, Công nghệ hiện đại nhằm nâng cao năng lực cạnh tranh, khẳng định vị thế trên thị trường.
              </p>
            </div>
          </div>
          {{-- end col 4 --}}
          <div class="col-lg-9">
            <div class="what-right">
              <div class="three-owl owl-carousel owl-theme">
                {{-- item --}}
              @foreach ($products as $key => $product)
                <a href="#" class="item">
                  <div class="brand-box">
                    <img src="{{url('upload/'.$product->image)}}" alt="" class="img-fluid">
                    <div class="info-box text-center">
                      <div class="text-brand">
                        <div class="child-brand">
                          <p class="offset">{{$key + 1}}</p>
                          <p class="title-brand">{{$product->name}}</p>
                        </div>
                        <div class="bg-brand"></div>
                      </div>
                    </div>
                  </div>
                </a>
              @endforeach
           
               
                {{-- item --}}
              </div>
           
              {{-- <div class="nav-what">
                  <div class="navi-btn mt-5">
                    <i class="fa fa-angle-left customNextBtnOne fa-2x pr-2" aria-hidden="true"></i>
                    <i class="fa fa-angle-right customPrevBtnOne fa-2x pl-2" aria-hidden="true"></i>
                  </div>
                </div> --}}
              {{-- custom button --}}
            </div>
          </div>
          {{-- end col 8 --}}
        </div>
      </div>
      {{-- end content what --}}
      <div class="social_network">
        <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_light">
          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      {{-- end content what --}}
      <!-- navigate -->
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to border-bottom d-flex justify-content-between text-dark">
          <a href="#clients" class="fa fa-long-arrow-left" aria-hidden="true"></a>
          <span>WHAT ARE YOU DOING</span>
          <a href="#human-of-the-door" class="fa fa-long-arrow-right" aria-hidden="true"></a>
        </div>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="{{asset('img/page/page-4.png')}}" alt="">
      </div>
    </div>
  </div>
  <!-- human-of-the-door -->
  <div class="section fp-auto-height" id="section4">
    <div id="human-of-the-door">
      <?php $human = 0; ?>
      @if ($layouts)
      @foreach ($layouts as $l)
      @if($l->offset == 5)
      <?php $human++; ?>
      @endif
      @endforeach
      @endif
      @if($human ==0)
      <img src="{{asset('img/layout/page-5.png')}}" alt="" class="about-bg d-none d-sm-block">
      @else
      @foreach ($layouts as $l)
      @if($l->offset ==5)
      <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
      @endif
      @endforeach
      @endif
      <img class="about-bg d-block d-sm-none" src="{{asset('img/mobile/page-5.png')}}" alt="">
      <div class="container people d-block d-sm-none">
        <h3 class="text-white">People</h3>
        <p>We are experts in creating world-class campaigns, optimize & innovate the entire journey from brand contact
          to end purchase.</p>
        <img src="{{asset('img/article/1.png')}}" class="w-100" alt="">
        <div class="meet text-center">
          <a href="" class="btn btn-outline-secondary meet-team"><span>Meet the team</span><img src="img/arrow-right.png" class="m-0 pl-1" alt=""></a>
        </div>
      </div>
      {{-- end mobile --}}
      <button type="button" class="btn btn-outline-light btn-send d-none d-sm-block">Meet the team</button>
      <div class="container d-none d-sm-block" id="p3-content">
        <div class="two-carousel owl-carousel">
          @if($staffs)
          @foreach ($staffs as $s)
          <div class="item p3-img thedoor_staff"><a href="#"><img src="{{asset('upload/'.$s->photo)}}" alt="" id="p3-img-size" /></a>
            <div class="staff_name__display">
              <h3 class="staff_name">{{$s->staff_name}}</h3>
            </div>
          </div>

          @endforeach
          @endif
        </div>
        <p class="p3-content-p d-flex justify-content-center">Drag to see more</p>
      </div>
      <!-- navigate -->
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to d-flex justify-content-between text-white">
          <a href="#what" class="fa fa-long-arrow-left text-white" aria-hidden="true"></a>
          <span>HUMAN OF THE DOOR</span>
          <a href="#article" class="fa fa-long-arrow-right text-white" aria-hidden="true"></a>
        </div>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="{{asset('img/page/page-5.png')}}" alt="">
        <div class="social_network" style="position: absolute; bottom: 0px; right: -139vh;">
          <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_dark">
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>

    </div>

  </div>
  {{-- Article --}}
  <div class="section fp-auto-height" id="section5">
    <div id="article">
      <?php $article = 0; ?>
      @if ($layouts)
      @foreach ($layouts as $l)
      @if($l->offset == 6)
      <?php $article++; ?>
      @endif
      @endforeach
      @endif
      @if($article ==0)
      <img src="{{asset('/img/layout/page-6.png')}}" class="about-bg d-none d-sm-block" alt="">
      @else
      @foreach ($layouts as $l)
      @if($l->offset ==6)
      <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
      @endif
      @endforeach
      @endif
      <img src="{{asset('img/mobile/page-6.png')}}" class="d-block d-sm-none" alt="">

      <section class="main-article container">
        <h3 class="article-title text-center display-4">BÀI VIẾT</h3>
        <p class="des-article text-center">
          — here are some recent articles —
          <br>
          we are creatives, so it might be about bananas and stuff
        </p>
        <div class="view-more d-flex justify-content-end mb-2">
          <a href="{{url('/all-post')}}" class="text-dark d-none d-sm-block"><span>View more</span>
            <img src="{{asset('/img/arrow-right.png')}}" class="arrow-right" alt="">
          </a>
        </div>
        <div class="row">
          <div class="four-owl owl-carousel owl-theme" id="owl-article">
            @if($blogs)
            @foreach ($blogs as $blog)
            <div class="item">
              <div class="col-lg-12">
                <div class="one-article">
                  <a href="{{url('post/'.$blog->slug)}}" class="thumb-article">
                    <img src="{{asset('upload/'.$blog->thumbnail)}}" alt="">
                  </a>
                  <a href="{{url('post/'.$blog->slug)}}">
                    <h3 class="title-post">{{$blog->title}}</h3>
                  </a>
                  <div class="article-info">
                    by <b>{{$blog->name}}</b> - <span>{{date('F d Y', strtotime($blog->created_at))}}</span>
                  </div>
                </div>
                {{-- end one-article --}}
              </div>
              {{-- End one column --}}
            </div>
            @endforeach
            @endif
          </div>
        </div>

        <div class="navi-article text-right d-block d-sm-none pt-2">
          <i class="fa fa-long-arrow-left preArticle"></i>
          <i class="fa fa-long-arrow-right ml-2 nextArticle"></i>
        </div>

      </section>
      {{-- end main article --}}
      <!-- navigate -->
      <div class="scroll-div d-none d-sm-block">
        <div class="scroll-to border-bottom d-flex justify-content-between text-dark">
          <a href="#human-of-the-door" class="fa fa-long-arrow-left" aria-hidden="true"></a>
          <span>ARTICLE</span>
          <a href="#about-us" class="fa fa-long-arrow-right" aria-hidden="true"></a>
        </div>
      </div>
      <div class="page-number d-none d-sm-block">
        <img src="{{asset('img/page/page-6.png')}}" alt="">
        <div class="social_network" style="position: absolute; bottom: 0px; right: -139vh;">
          <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_light">
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact Us -->
  <div class="section fp-auto-height" id="section6">
    <div id="about-us">
      <?php $about = 0; ?>
      @if ($layouts)
      @foreach ($layouts as $l)
      @if($l->offset == 7)
      <?php $about++; ?>
      @endif
      @endforeach
      @endif
      @if($about ==0)
      <img src="{{asset('img/layout/page-7.png')}}" alt="" class="about-bg d-none d-sm-block">
      @else
      @foreach ($layouts as $l)
      @if($l->offset ==7)
      <img class="about-bg d-none d-sm-block" src="{{asset('upload/'.$l->link)}}" alt="">
      @endif
      @endforeach
      @endif
      <img src="{{asset('img/mobile/page-7.png')}}" class="about-bg d-block d-sm-none" alt="">
      <div class="tabs-content">
        <!-- Section one -->
        <div class="section-one tab-content" id="tab1">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="about-left text-center text-white p1">
                  <div class="col-lg-8 offset-lg-2">

                    <div class="page-section">

                      <p>Here we are</p>
                      <small>let's work together</small>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Col 6 -->
              <div class="col-lg-6">
               <div class="selection">
                  <ul id="tabs-nav">
                    <li><a href="#tab2" class="atab">Hire us</a></li>
                    <li><a href="#tab3" class="atab">Be part of our team</a></li>
                    <li><a href="#tab4" class="atab">Something else</a></li>
                  </ul> <!-- END tabs-nav -->
                </div>

              </div>
            </div>
            <div class="social_network" style="margin-top:165px;">
              <ul class="d-flex pl-2 justify-content-start footer-social social_network__list social_network___page_dark">
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="https://www.facebook.com/dongocminh.FTU" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End section two -->
        <div class="section-two tab-content" id="tab2">

          <!-- title -->
          <div id="form1">
            <form method="post" id="addHirePage">
              @csrf
              <div class="container">
                <div class="row">
                    <div class="d-none d-sm-none d-lg-block col-lg-6">
                        <div class="about-left text-center text-white p1">
                            <div class="col-lg-8 offset-lg-2">
                              <h3 class="text-center pb-3">Hire us</h3>
                              <button onclick="addHirePage()" type="" class="btn btn-outline-light btn-send" id="hius"><i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>Send Us</button>
                            </div>
                        </div>
                    </div>
                  <div class="col-lg-6 d-flex flex-column">
                    <ul id="tabs-nav" class="arrow p-0">
                      <li class="arrow-1">
                        <a href="#tab1">
                          <img src="{{asset('img/arrow-left.png')}}" alt="">
                        </a>
                      </li>
                    </ul>
                  
                    <div class="about-right">
                          <div class="form-group">
                                <label for="exampleInputEmail1">WHAT'S YOUR NAME</label>
                                <input type="text" name="partner_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="error-form"></span>
                          </div>
                          <div class="form-group">
                                <label for="exampleInputEmail1">DO YOU HAVE E-MAIL ?</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="error-form"></span>
                          </div>
                          <div class="form-group">
                                <label for="exampleInputEmail1">WHAT'S YOUR PHONE NUMBER?</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="error-form"></span>
                          </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">HOW CAN WE HELP YOU</label>
                            <div class="list-option">
                                <div class="row">
                                    @foreach($serv as $s)
                                        <div class="col-lg-6">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="service_id" value="{{$s->id}}"><span>{{$s->service_name}}</span>
                                            <span class="error-form"></span>
                                          </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <h4 class="pt-2">WHAT'S YOUR BUDGET?</h4>
                          </div>
                          <div class="col-lg-8">
                            <div class="slidecontainer">
                              <input type="range" min="1" max="30" value="15" class="slider" id="range" name="budget">
                              <p>Value : <output for="range" class="output">15,000,000 VNĐ</output></p>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="form-group text-center d-block d-sm-none">
                        <button  class="btn btn-outline-light btn-send btn-sm" id="mobile-hius"><i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>Send Us</button>
                      </div>

                    </div>

                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Section three -->
        <div class="section-three tab-content" id="tab3">
          <form action="/add_candidate" id="form2" method="post" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="container">
              <div class="row">
                <div class="col-12 col-sm-6 d-none d-sm-block">
                  <div class="about-left text-center text-white p1">
                    <div class="col-lg-8 offset-lg-2">
                      <h3 class="text-center pb-3">Be part of our team</h3>
                      <button onclick="addTeam()" type="submit" id="team" class="btn btn-outline-light btn-send"><i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>Send Us</button>
                    </div>

                  </div>
                </div>
                <div class="col-12 col-sm-6 d-flex flex-column">
                  <ul id="tabs-nav" class="arrow p-0">
                    <li class="arrow-1">
                      <a href="#tab1">
                        <img src="{{asset('img/arrow-left.png')}}" alt="">
                      </a>
                    </li>

                  </ul>
                  <div class="about-right">
                    <div class="form-group">
                      <label for="exampleInputEmail1">WHAT'S YOUR NAME</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <span class="error-form"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">DO YOU HAVE E-MAIL ?</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <span class="error-form"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">WHAT'S YOUR PHONE NUMBER?</label>
                      <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <span class="error-form"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">HOW CAN WE HELP YOU</label>
                      <div class="list-option">
                        <div class="row">
                          @foreach($sldept as $sl)
                          <div class="col-lg-6">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input radio-contact" name="dept_id" value="{{$sl->id}}"><span>{{$sl->dept_name}}</span>
                            </label>
                            <span class="error-form"></span>
                          </div>
                          @endforeach
                        </div>
                        <!-- End row -->
                      </div>
                      <!-- End list option -->
                      <div class="image-upload d-flex justify-content-start pt-3">
                        <label for="file-input" class="pr-3">
                          <img src="{{asset('img/upload-icon.png')}}" alt="">
                        </label>
                        <input id="file-input" type="file" name="profile" hidden />
                        <span class="error-form"></span>
                        <p>Upload your Profile here !</p>
                      </div>
                    </div>
                    <div class="form-group text-center d-block d-sm-none">
                      <button type="submit" class="btn btn-outline-light btn-send btn-sm" id="mobile-team"><i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>Send Us</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Section four -->
        <div class="section-four tab-content" id="tab4">
          <form method="POST" id="form3">
           @csrf
            <div class="container">
              <div class="row">
                <div class="col-lg-6 d-none d-sm-block">
                  <div class="about-left text-center text-white p1">
                    <div class="col-lg-8 offset-lg-2">
                      <h3 class="text-center pb-3">Something else</h3>
                      <button onclick="addFeedBack()" class="btn btn-outline-light btn-send" name="btn_fb"><i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>Send Us</button>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 d-flex flex-column">
                  <ul id="tabs-nav" class="arrow p-0">
                    <li class="arrow-1">
                      <a href="#tab1">
                        <img src="{{asset('img/arrow-left.png')}}" alt="">
                      </a>
                    </li>
                  </ul>
                  <div class="about-right">

                    <div class="form-group">
                      <label for="exampleInputEmail1">WHAT'S YOUR NAME</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <span class="error-form"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">DO YOU HAVE E-MAIL ?</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <span class="error-form"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">WHAT’S YOUR MESSAGE DEAR?</label>
                      <textarea class="form-control" name="describe" id="exampleFormControlTextarea1" rows="8" placeholder="Enter text here..."></textarea>
                      <span class="error-form"></span>
                    </div>
                    <div class="form-group text-center d-block d-sm-none">
                      <button type="submit" class="btn btn-outline-light btn-send btn-sm" id="mobile-something"><i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>Send Us</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </form>

        </div>
        <div class="scroll-div d-none d-sm-block">
          <div class="scroll-to d-flex justify-content-between text-white">
            <a href="#article" class="fa fa-long-arrow-left text-white" aria-hidden="true"></a>
            <span>CONNECT</span>
            <a href="#footer" class="fa fa-long-arrow-right text-white" aria-hidden="true"></a>
          </div>
        </div>
        <div class="page-number d-none d-som-block">
          <img src="{{asset('img/page/page-7.png')}}" alt="">
        </div>
      </div>
      <!-- navigate -->

    </div>

  </div>

  {{-- Article --}}
  <div class="section fp-auto-height" id="section7">
    <footer id="footer">
      <?php $footer = 0; ?>
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
      <img class="bg-article" src="{{asset('upload/'.$l->link)}}" alt="">
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
<script src="js/fullpage.js"></script>
<script type="text/javascript">
  var myFullpage = new fullpage('#fullpage', {
    scrollBar: true
  });
  $(document).ready(function() {
    $('video').prop('muted', true).play()
  });
  function addHirePage()
         {
            event.preventDefault();
                $.ajax({
                    url: "{{route('postHirePage')}}",
                    method: 'post',
                    data: $('#addHirePage').serialize(),
                    success: function(data) {
                        toastr.success('Gửi yêu cầu thành công!')             
                    },
                    error: function(error) {
                      var errors = error.responseJSON;
                      if(errors.errors.email[0])
                        toastr.error(errors.errors.email[0]);
                      if(errors.errors.partner_name[0])
                        toastr.error(errors.errors.partner_name[0]);
                      if(errors.errors.phone[0])
                        toastr.error(errors.errors.phone[0]);      
                    }
                });
        }
        function addTeam()
        {
          event.preventDefault();
          $.ajax({
          header:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          },
                url:  "{{route('postAddTeam')}}", 
                data: new FormData($("#form2")[0]),
                contentType: false,
                processData: false,
                method: 'post',
                success: function(data) {
                    toastr.success('Gửi yêu cầu thành công!')    
                },
                error: function(error) {
                  var errors = error.responseJSON;
                      if(errors.errors.name[0])
                        toastr.error(errors.errors.name[0]);
                      if(errors.errors.email[0])
                        toastr.error(errors.errors.email[0]);
                      if(errors.errors.profile[0])
                        toastr.error(errors.errors.profile[0]); 
                      if(errors.errors.phone[0])
                        toastr.error(errors.errors.phone[0]);     
                      if(errors.errors.dept_id[0])
                        toastr.error(errors.errors.dept_id[0]);          
                }
            });
        }
        function addFeedBack()
        {
          event.preventDefault();
                $.ajax({
                    url: "{{route('postFeedBack')}}",
                    method: 'post',
                    data: $('#form3').serialize(),
                    success: function(data) {
                        toastr.success('Gửi phản hồi thành công!')             
                    },
                    error: function(error) {
                      var errors = error.responseJSON;
                      if(errors.errors.email[0])
                        toastr.error(errors.errors.email[0]);
                      if(errors.errors.name[0])
                        toastr.error(errors.errors.name[0]);
                      if(errors.errors.describe[0])
                        toastr.error(errors.errors.describe[0]);      
                    }
                });

        }
</script>
</body>
</html>
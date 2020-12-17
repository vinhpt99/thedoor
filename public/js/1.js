

$(document).ready(function () {
    
    // $("#owl-article").owlCarousel();
    $('#owl-article').owlCarousel({
        loop:true,
        margin:10,
       
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
    // nex slide article 
    var owl = $('#owl-article');
    owl.owlCarousel();
    $('.nextArticle').click(function() {
        owl.trigger('next.owl.carousel');
    })
    $('.preArticle').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [300]);
    })
    // BUtton hi us
    $('#hius').on('click', function(e){
        e.preventDefault()
        $.ajax({
            // header:{
            //     'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            // },
            url: 'add_hire',
            data: new FormData($("#form1 form")[0]),
            contentType: false,
            processData: false,
            method: 'post',
            success: function(data) {
                toastr.success(data.success)
                $('#form1 form')[0].reset();
            },
            error: function(error) {
                console.log(error);
                var errors = error.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $("#form1 input[name=" + i + "]").siblings('.error-form').text(val[0]);
                  
                })
            }
        });
    });
    // end hius
    $('#team').on('click', function(e){
        e.preventDefault()
        $.ajax({

            header:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            url: 'add_candidate',
            data: new FormData($("#form2")[0]),
            contentType: false,
            processData: false,
            method: 'post',
            success: function(data) {
                // toastr.success(data.success)
                // $('#form3')[0].reset();
                console.log(data);
            },
            error: function(error) {
                console.log(error);
                var errors = error.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $("#form2 input[name=" + i + "]").siblings('.error-form').text(val[0]);
                })
            }
        });
    });
    // end team
    $('#something').on('click', function(e){
        e.preventDefault()
        $.ajax({

            header:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            url: 'add_somethingelse',
            data: new FormData($("#form3")[0]),
            contentType: false,
            processData: false,
            method: 'post',
            success: function(data) {
                toastr.success(data.success)
                $('#form3')[0].reset();
            },
            error: function(error) {
                console.log(error);
                var errors = error.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $("#form3 input[name=" + i + "]").siblings('.error-form').text(val[0]);
                    $("#form3 textarea").siblings('.error-form').text(val[0]);
                  
                })
            }
        });
    });
    // end something
    //button mobile
    $('#mobile-hius').on('click', function(e){
        console.log("clicked");
        e.preventDefault()
        $.ajax({
            // header:{
            //     'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            // },
            url: 'add_hire',
            data: new FormData($("#form1 form")[0]),
            contentType: false,
            processData: false,
            method: 'post',
            success: function(data) {
                toastr.success(data.success)
                $('#form1 form')[0].reset();
            },
            error: function(error) {
                console.log(error);
                var errors = error.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $("#form1 input[name=" + i + "]").siblings('.error-form').text(val[0]);
                  
                })
            }
        });
    });
    $('#mobile-something').on('click', function(e){
        e.preventDefault()
        $.ajax({

            header:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            url: 'add_somethingelse',
            data: new FormData($("#form3")[0]),
            contentType: false,
            processData: false,
            method: 'post',
            success: function(data) {
                toastr.success(data.success)
                $('#form3')[0].reset();
            },
            error: function(error) {
                console.log(error);
                var errors = error.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $("#form3 input[name=" + i + "]").siblings('.error-form').text(val[0]);
                    $("#form3 textarea").siblings('.error-form').text(val[0]);
                  
                })
            }
        });
    });
    $('.three-owl').owlCarousel({
        loop: true,
        margin: 10,
        //nav:true,
        //navText: ["<img src='img/p3-pre.png'>","<img src='img/p3-next.png'>"],
        responsive: {
            0: {
                items:1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2,
            }
        }
        
    });
    $('.two-carousel').owlCarousel({
        loop: true,
        margin: 10,
        //nav:true,
        //navText: ["<img src='img/p3-pre.png'>","<img src='img/p3-next.png'>"],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
// // one carousel
    $('#owl-client').owlCarousel({
     
        loop: true,
        margin: 10,
        //nav:true,
        //navText: ["<img src='img/p3-pre.png'>","<img src='img/p3-next.png'>"],
        responsive: {
            0: {
                items: 3,
             
            },
            600: {
                items: 3,
             
            },
            1000: {
                items: 3,
            
            }
        }
        
    })
    // var owl = $('#owl-client');
    // owl.owlCarousel();
    // // Go to the next item
    // $('.customNextBtn').click(function() {
    //     owl.trigger('next.owl.carousel');
    //     console.log("next");
    // })
    // // Go to the previous item
    // $('.customPrevBtn').click(function() {
    //     // With optional speed parameter
    //     // Parameters has to be in square bracket '[]'
    //     owl.trigger('prev.owl.carousel', [300]);
    //     console.log("preview");
    // })

    //stop next slide
    $('.carousel').carousel('pause');

    //open menu
    $('.menu-button').click(function () {
        $('span.btn1').toggleClass('rotate-right');
      
        
        $('span.btn2').toggleClass('rotate-left');
        $('.tab-menu').toggleClass("move-menu");
    });
    //close mennu click body
    $('body').click(function (evt) {
        if (evt.target.id == "list-menutab")
            return;
        if ($(evt.target).closest('#list-menutab').length) {
            return;
        }
        if (evt.target.id == "menu")
            return;
        if ($(evt.target).closest('#menu').length) {
            return;
        }
        $('.tab-menu').removeClass("move-menu");
        $('span.btn1').removeClass('rotate-right');
        $('span.btn2').removeClass('rotate-left');
    });
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();

    // Click function
    $('#tabs-nav li').click(function () {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });

    $('.customNextBtn').click(function () {
        owl.trigger('next.owl.carousel');
    })
    $('.customPrevBtn').click(function () {
        owl.trigger('prev.owl.carousel', [300]);
    })
});
// Click to div animate
$(document).on('click', 'a[href^="#"]', function (e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top;

    // animated top scrolling
    $('body, html').animate({ scrollTop: pos });
});
//preloaded
$('body').toggleClass('loaded');
//p3 img 
$('#range').on("input", function () {
    $('.output').val(this.value + ",000,000 VNĐ");
}).trigger("change");
// scroll change header
$('.logo1').hide();
var lg1 = $('.logo1');
var lg2 = $('.logo2');
var story = $('#our-story').offset().top;
var clients = $('#clients').offset().top;
var what = $('#what').offset().top;
var human = $('#human-of-the-door').offset().top;
var article = $('#article').offset().top;
var about = $('#about-us').offset().top;
var footer = $('#footer').offset().top;

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if(scroll < story){
         // remove dark
         $('.lang a,span').removeClass('text-dark')
         $('.menu-button span').removeClass('bg-dark')
         $('.left-menu form input').removeClass('bg-dark text-white')
         $('.logo h3').removeClass('text-dark')  
        lg1.hide()
        lg2.show()
    }
    else if(scroll >= story && scroll <clients){
        // dark
        $('.menu-button').click(function () {
            //  $('.left-menu .search input').toggleClass('bg-dark text-dark');
            // $('.left-menu .lang a').toggleClass('text-dark')
        //     $('.left-menu .menu-button span').removeClass('bg-dark').toggleClass('bg-white');
        });
      

        $('.lang a,span').addClass('text-dark')
        $('.menu-button span').addClass('bg-dark')
        $('.left-menu form input').addClass('bg-dark text-white')
        $('.logo h3').addClass('text-dark')    
        lg1.show()
        lg2.hide()
    }else if(scroll >= clients && scroll < what){
        // remove dark
        $('.lang a,span').removeClass('text-dark')
        $('.menu-button span').removeClass('bg-dark')
        $('.left-menu form input').removeClass('bg-dark text-white')
        $('.logo h3').removeClass('text-dark')    
        lg1.hide()
        lg2.show()
    }
    else if(scroll >= what && scroll < human){
        // dark
        $('.lang a,span').addClass('text-dark')
        $('.menu-button span').addClass('bg-dark')
        $('.left-menu form input').addClass('bg-dark text-white')
        $('.logo h3').addClass('text-dark')    
        lg1.show();
        lg2.hide();
    }else if(scroll >= human && scroll < article){
         // remove dark
         $('.lang a,span').removeClass('text-dark')
         $('.menu-button span').removeClass('bg-dark')
         $('.left-menu form input').removeClass('bg-dark text-white')
         $('.logo h3').removeClass('text-dark')  
        lg1.hide();
        lg2.show();
    }
    else if(scroll >= article && scroll < about){
          // dark
          $('.lang a,span').addClass('text-dark')
          $('.menu-button span').addClass('bg-dark')
          $('.left-menu form input').addClass('bg-dark text-white')
          $('.logo h3').addClass('text-dark')    
        lg1.show();
        lg2.hide();
    }
    else if(scroll >= about && scroll <footer){
          // remove dark
          $('.lang a,span').removeClass('text-dark')
          $('.menu-button span').removeClass('bg-dark')
          $('.left-menu form input').removeClass('bg-dark text-white')
          $('.logo h3').removeClass('text-dark')  
        lg1.hide();
        lg2.show();
    }else{
         // dark
         $('.lang a,span').addClass('text-dark')
         $('.menu-button span').addClass('bg-dark')
         $('.left-menu form input').addClass('bg-dark text-white')
         $('.logo h3').addClass('text-dark')    
        lg1.show();
        lg2.hide();
    }
   
 });

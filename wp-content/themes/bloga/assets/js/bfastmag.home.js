jQuery(document).ready(function() {

  /**
   * Top Slider
   **/
  jQuery('.owl-carousel.bfastmag-top-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    nav:false,
    navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
    dots: true,
    autoplay: true,
    autoplayTimeout: 10000,
    lazyLoad: true,
    animateIn: true,
    responsive:{
      0:{ items:1 },
      600: { items:2 },
      992: { items:3 }
    }
  });

  /**
   * Template 1 Slider
   **/
   jQuery('.owl-carousel.bfastmag-fp-s1-posts').owlCarousel({
     loop:true,
     margin:30,
     responsiveClass:true,
     nav:true,
     navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
     dots: false,
     autoplay: true,
     autoplayTimeout: 12000,
     lazyLoad: true,
     animateIn: true,
     responsive:{
       0:{ items:1 },
       600: { items:2 },
       992: { items:3 }
     }
   });

    /**
    * Template 3 Slider
    **/
    jQuery('.owl-carousel.bfastmag-fp-s3-posts').owlCarousel({
      loop:false,
      margin:0,
      responsiveClass:true,
      nav:true,
      navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
      dots: false,
      autoplay: true,
      autoplayTimeout: 15000,
      items:1,
      lazyLoad: true,
    });

    /**
    * Template 4 Slider
    **/
    jQuery('.owl-carousel.bfastmag-fp-s4-posts').owlCarousel({
      loop:true,
      margin:30,
      responsiveClass:true,
      nav:true,
      navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
      dots: false,
      autoplay: true,
      autoplayTimeout: 17000,
      lazyLoad: true,
      responsive:{
        0:{ items:1 },
        600: { items:2 },
        992: { items:2 }
      }
    });

});

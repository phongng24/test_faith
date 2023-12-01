jQuery(document).ready(function(){
  var owl = jQuery('.category-slider .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay: true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 4
      },
      1000: {
        items: 8
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});
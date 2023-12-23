(() => {
  jQuery(document).ready(function () {
    jQuery('[data-js="testimonial-open-video"]').modalVideo();
  
    jQuery('[data-slider="testimonials"]').slick({
      dots: true,
      infinite: false,
      fade: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
    });
  });
})();
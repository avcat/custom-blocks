(() => {
  jQuery(document).ready(function () {
    jQuery('[data-js="contact-testimonial-open-video"]').modalVideo();
  
    jQuery('[data-slider="contact-testimonials"]').slick({
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
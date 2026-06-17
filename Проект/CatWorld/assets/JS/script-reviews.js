new Swiper('.swiper', {
  slidesPerView: 3,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    500: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 1,
    },
    1050: {
      slidesPerView: 2,
    },
    1540: {
      slidesPerView: 3,
    },
  }, 
});


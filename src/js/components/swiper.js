export default class SwiperSliders {
  homepageSlider() {
    var swiper4 = new Swiper(".s1_homepage__slider", {
      grabCursor: true,
      effect: "creative",
      loop: false,
      speed: 700,
      // autoplay: {
      //   delay: 4500,
      //   disableOnInteraction: false,
      // },

      creativeEffect: {
        prev: {
          shadow: true,
          translate: ["-20%", 0, -1],
        },
        next: {
          translate: ["100%", 0, 0],
        },
      },

      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
      },
    });
  }

  projectSlider() {
    var swiper = new Swiper(".s4_project__slider", {
      loop: true,
      slidesPerView: 1,
      slidesPerGroup: 1,

      navigation: {
        nextEl: ".next",
        prevEl: ".prev",
      },

      breakpoints: {
        800: {
          slidesPerView: 4,
          slidesPerGroup: 4,
        },
      }
    });
  }


  init() {
    document.querySelector('.s1_homepage__slider') ? this.homepageSlider() : null
    document.querySelector('.s4_project__slider') ? this.projectSlider() : null
  }
}



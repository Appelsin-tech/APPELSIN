<template>
  <section class="s-services fullpage-section">
    <div class="container">

      <div class="caption-wrapper">
        <div class="g-caption-block">
          <h2 class="g-caption">Услуги</h2>
        </div>
        <div class="nav-slider">
          <button class="next">
            <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
          </button>
          <button class="prev">
            <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
          </button>
        </div>
      </div>
      <swiper :options="swiperOption" ref="mySwiper">

        <swiper-slide>
          <div class="wrapper wrapper-1">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">Серверные решения</h3>
                <p class="desc">Проектирование и реализация проекта, разработка API, работа с БД, автоматизация, боты.
                </p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>

        </swiper-slide>
        <swiper-slide>
          <div class="wrapper wrapper-2">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">WEB - разработка</h3>
                <p class="desc">От лендинга до высоконагруженного сайта любой сложности</p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="wrapper wrapper-3">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">Мобильные игры и приложения</h3>
                <p class="desc">Кросс-платформенные и нативные бизнес решения, 2D и 3D игры, AR/VR</p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="wrapper wrapper-1">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">Блокчейн и криптовалюты</h3>
                <p class="desc">Работа с блокчейном, криптовалютами и кошельками, юридическое сопровождение</p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="wrapper wrapper-2">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">Реклама и продвижение</h3>
                <p class="desc">SEO и контекстная реклама, ведение и аудит, реклама в соцсетях, ремаркетинг,
                  аналитика</p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>
        </swiper-slide>
        <swiper-slide>
          <div class="wrapper wrapper-3">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">Дизайн и брендинг</h3>
                <p class="desc">Графический дизайн сайтов, приложений, презентаций, UI дизайн, брендинг</p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>
        </swiper-slide>
      </swiper>
    </div>
  </section>
</template>

<script>

  import {swiper, swiperSlide} from 'vue-awesome-swiper'

  export default {
    name: 'services-block',
    components: {
      swiper,
      swiperSlide,
    },
    data() {
      return {
        swiperOption: {
          slidesPerView: 3,
          speed: 300,
          navigation: {
            nextEl: '.prev',
            prevEl: '.next',
          },
          breakpoints: {
            // when window width is <= 320px
            990: {
              slidesPerView: 2,
            },
            750: {
              freeMode: true,
              slidesPerView: 'auto'
            },
            425: {
              freeMode: false,
              slidesPerView: 1
            },
          }
        }
      }
    },
    computed: {
      swiper() {
        return this.$refs.mySwiper.swiper
      }
    },
    mounted() {
      // current swiper instance
      console.log('this is current swiper instance object', this.swiper)
    },
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-services {
    min-height: 100vh;
    background: radial-gradient(circle farthest-corner at top right, #23ade0 -20%, rgba(0, 0, 0, 0) 25%),
    radial-gradient(circle farthest-corner at top right, #02d8d5 15%, rgba(0, 0, 0, 0) 50%),
    radial-gradient(circle farthest-corner at 20% 110%, #02d8d5 5%, rgba(0, 0, 0, 0) 30%) #23ade0;
    .caption-wrapper {
      display: flex;
      margin-bottom: 25px;
      justify-content: space-between;
      .xl-comb({ margin-bottom: 15px;});
      .sm-block({ margin-bottom: 10px; });
      .nav-slider {
        display: flex;
        align-items: center;
        button {
          cursor: pointer;
          &.next {
            margin-right: 20px;
            svg {
              transform: rotate(180deg);
            }
          }
          svg {
            width: 30px;
            height: 30px;
            .sm-block({ width: 25px; height: 25px;});
            path {
              fill: #fff;
            }
          }
        }
      }
    }
  }
  .swiper-container {
    padding: 30px 0;
    .md-block({ padding: 0; });
  }
  .swiper-slide {
    display: flex;
    flex-grow: 2;
    height: 540px;
    z-index: 1;
    transition: 0.3s;
    .xl-comb({ height: 440px;});
    .md-block({ height: 440px;});
    .md-comb({ height: 380px;});
    .sm-block({ width: 300px;});
    .sm-comb({ height: 300px;});
    .xs-comb({ height: 270px;});
    &:hover {
      z-index: 6;
    }
  }
  .wrapper {
    position: relative;
    display: flex;
    padding: 50px;
    flex-grow: 1;
    flex-direction: column;
    align-items: flex-start;
    .md-comb({ padding: 30px;});
    .sm-block({ padding: 30px; });
    .sm-comb({ padding: 25px;});
    .xs-block({ padding: 25px; });
    &:hover {
      &::after {
        top: -30px;
        bottom: -30px;
        left: -30px;
        right: -30px;
        .xl-comb({ top: -20px;
          bottom: -20px;
          left: -20px;
          right: -20px;});
        .lg-block({top: -20px;
          bottom: -20px;
          left: -20px;
          right: -20px;})
      }
      .circle-btn {
        svg {
          transform: rotate(90deg);
        }
      }
      .services-item {
        .text-wrapper {
          .desc {
            opacity: 1;
            height: 70px;
            .sm-block({ height: 50px; });
          }
        }
      }
    }
    &-1 {
      &::after {
        background-image: url("../assets/img/services/item-1.png");
        background-position:  top center;
        background-color: #151e33;
      }
    }
    &-2 {
      &::after {
        background-image: url("../assets/img/services/item-2.png");
        background-position: top center;
        background-color: #111310;
      }
    }
    &-3 {
      &::after {
        background-image: url("../assets/img/services/item-3.png");
        background-position: 100% -15%;
        background-color: #2d2633;
      }
    }
    &::after {
      position: absolute;
      content: '';
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      transition: 0.3s;
      background-size: contain;
      background-repeat: no-repeat;
      z-index: 1;
      box-shadow: 0px 0px 170px -10px rgba(0, 0, 0, 0.75) inset;
      .md-comb({ background-image: none;});
      .sm-comb({ background-image: none;});
      .xs-comb({ background-image: none;});
    }
  }
  .grow {
    height: 1px;
    flex-grow: 5;
  }
  .services-item {
    position: relative;
    z-index: 5;
    .text-wrapper {
      margin-bottom: 50px;
      .caption-services {
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 3.04rem;
        letter-spacing: 0.8rem;
        text-transform: uppercase;
        .sm-comb({ font-size: 2rem; letter-spacing: 0.5rem; margin-bottom: 20px;});
      }
      .desc {
        margin-top: 20px;
        font-weight: 300;
        font-size: 1.7rem;
        letter-spacing: 0.14rem;
        opacity: 0;
        height: 0px;
        transition: 0.3s;
        .sm-comb({ margin-top: 15px; font-size: 1.4rem;});
        .xs-block({margin-top: 15px;});
      }
    }
    .circle-btn {
      display: inline-flex;
      width: 65px;
      height: 65px;
      justify-content: center;
      align-items: center;
      border: 1px solid #fff;
      border-radius: 50%;
      .sm-block({ width: 50px; height: 50px; });
      .sm-comb({ width: 35px; height: 35px;});
      .xs-block({ width: 35px; height: 35px;});
      svg {
        width: 25px;
        height: 20px;
        transition: 0.3s;
        .sm-block({ width: 20px; height: 20px; });
        .sm-comb({ width: 15px; height: 15px; });
        .xs-block({ width: 15px; height: 15px; });
      }
    }
  }
</style>

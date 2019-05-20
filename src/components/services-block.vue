<template>
  <section class="s-services fullpage-section">
    <div class="wrapper-container">
      <div class="container section">
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
        <swiper :options="swiperOptions" ref="mySwiperServices">
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
            <div class="wrapper wrapper-4">
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
            <div class="wrapper wrapper-5">
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
            <div class="wrapper wrapper-6">
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
        swiperOptions: {
          slidesPerView: 3,
          speed: 300,
          navigation: {
            nextEl: '.s-services .prev',
            prevEl: '.s-services .next',
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
        return this.$refs.mySwiperServices.swiper
      }
    }
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-services {
    background: radial-gradient(circle farthest-corner at top right, #23ade0 -20%, rgba(0, 0, 0, 0) 25%),
    radial-gradient(circle farthest-corner at top right, #02d8d5 15%, rgba(0, 0, 0, 0) 50%),
    radial-gradient(circle farthest-corner at 20% 110%, #02d8d5 5%, rgba(0, 0, 0, 0) 30%) #23ade0;

    .container {

      box-sizing: border-box;
      .caption-wrapper {
        .md-max-height({ margin-bottom: 30px;});
        .md-block({ margin-bottom: 30px;});
      }
    }
  }
  .swiper-container {
    padding: 30px 0;
    margin-bottom: -30px;
    .md-max-height({height: auto;});
    .md-max-height({padding: 0; margin-bottom: 0;});
    .sm-max-height({padding: 0;});
    .md-block({ padding: 0; margin-bottom: 0;});
  }
  .swiper-slide {
    display: flex;
    height: 100%;
    z-index: 1;
    transition: 0.3s;
    &:hover {
      z-index: 6;
    }
    .wrapper {
      position: relative;
      display: flex;
      padding: 50px;
      flex-grow: 1;
      flex-direction: column;
      align-items: flex-start;
      .s-max-height({ padding: 25px 50px;});
      .sm-block({ padding: 30px; });
      .xs-block({ padding: 25px; });
      &:hover {
        &::after {
          top: -30px;
          bottom: -30px;
          left: -30px;
          right: -30px;
          .lg-block({top: -20px;
            bottom: -20px;
            left: -20px;
            right: -20px;});
          .xs-block({top: 0;
            bottom: 0;
            left: 0;
            right: 0;});
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
      &::after {
        position: absolute;
        content: '';
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        transition: 0.3s;
        background-position:  center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: 1;
      }
      &-1 {
        &::after {
          background-image: url("../assets/img/services/item_1.png");
        }
      }
      &-2 {
        &::after {
          background-image: url("../assets/img/services/item_2.png");
        }
      }
      &-3 {
        &::after {
          background-image: url("../assets/img/services/item_3.png");
        }
      }
      &-4 {
        &::after {
          background-image: url("../assets/img/services/item_4.png");
        }
      }
      &-5 {
        &::after {
          background-image: url("../assets/img/services/item_5.png");
        }
      }
      &-6 {
        &::after {
          background-image: url("../assets/img/services/item_6.png");
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
            font-size: 3rem;
            letter-spacing: 0.8rem;
            text-transform: uppercase;
            .sm-max-height({font-size: 2.4rem; letter-spacing: 0.6rem;});
          }
          .desc {
            margin-top: 20px;
            font-weight: 300;
            font-size: 1.7rem;
            letter-spacing: 0.14rem;
            opacity: 0;
            height: 0px;
            transition: 0.3s;
            .sm-max-height({font-size: 1.4rem; letter-spacing: 0.1rem; margin-top: 15px;});
            .xs-block({margin-top: 15px; opacity: 1; height: 50px;});
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
          .md-max-height({ display: none;});
          .sm-block({ width: 50px; height: 50px; });
          .xs-block({ display: none;});
          svg {
            width: 25px;
            height: 20px;
            transition: 0.3s;
            .sm-block({ width: 20px; height: 20px; });
          }
        }
      }
    }
  }



</style>

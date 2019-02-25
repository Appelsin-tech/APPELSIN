<template>
  <section class="s-services fullpage-section">
    <div class="container">
      <div class="caption-wrapper">
        <div class="g-caption-block">
          <h2 class="g-caption">Услуги</h2>
        </div>
        <div class="nav-slider">
          <button class="next" @click.prevent="slidePrev">
            <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
          </button>
          <button class="prev" @click.prevent="slideNext">
            <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
          </button>
        </div>
      </div>
      <hooper :settings="hooperSettings" ref="carousel" style="height: auto">

        <slide>
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

        </slide>
        <slide>
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
        </slide>
        <slide>
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
        </slide>
        <slide>
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
        </slide>
        <slide>
          <div class="wrapper wrapper-2">
            <div class="grow"></div>
            <div class="services-item">
              <div class="text-wrapper">
                <h3 class="caption-services">Реклама и продвижение</h3>
                <p class="desc">SEO и контекстная реклама, ведение и аудит, реклама в соцсетях, ремаркетинг, аналитика</p>
              </div>
              <a class="circle-btn" href="#">
                <img svg-inline src="../assets/img/icon/arrow-slider-items.svg" alt="">
              </a>
            </div>
          </div>
        </slide>
        <slide>
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
        </slide>
      </hooper>
    </div>
  </section>
</template>

<script>
  import {
    Hooper,
    Slide,
  } from 'hooper';

  export default {
    name: 'services-block',
    components: {
      Hooper,
      Slide,
    },
    data () {
      return {
        hooperSettings: {
          itemsToShow: 1,
          wheelControl: false,
          infiniteScroll: true,
          breakpoints: {
            750: {
              itemsToShow: 2
            },
            1170: {
              itemsToShow: 3,
            }
          }
        },
      }
    },
    methods: {
      slidePrev() {
        this.$refs.carousel.slidePrev();
      },
      slideNext() {
        this.$refs.carousel.slideNext();
      }
    }
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~hooper/dist/hooper.css';

  .s-services {
    background: radial-gradient(circle farthest-corner at top right, #23ade0 -20%, rgba(0,0,0,0) 25%),
    radial-gradient(circle farthest-corner at top right, #02d8d5 15%, rgba(0,0,0,0) 50%),
    radial-gradient(circle farthest-corner at 20% 110%, #02d8d5 5%, rgba(0,0,0,0) 30%) #23ade0;
    .caption-wrapper {
      display: flex;
      margin-bottom: 25px;
      justify-content: space-between;
      .nav-slider {
        display: flex;
        align-items: center;
        button {
          cursor: pointer;
          svg {
            width: 30px;
            height: 30px;
            path {
              fill: #fff;
            }
          }
          &.next {
            margin-right: 20px;
            svg {
              transform: rotate(180deg);
            }
          }
        }
      }
    }
  }
  .hooper-slide {
    display: flex;
    flex-grow: 1;
    height: 540px;
    outline: none;
    transition: 0.3s;
    z-index: 1;
    opacity: 1;
    &:hover {
      z-index: 2;
    }
    &.is-prev,
    &.is-next {
      opacity: 0;
    }
    .wrapper {
      position: relative;
      display: flex;
      padding: 50px;
      flex-grow: 1;
      flex-direction: column;
      align-items: flex-start;
      .xs-block({ padding: 30px;});
      &:hover {
        &::after {
          top: -30px;
          bottom: -30px;
          left: -30px;
          right: -30px;
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
            }
          }
        }
      }
      &-1 {
        &::after {
          background: url("../assets/img/services/item-1.png") no-repeat top center #151e33;
        }
      }
      &-2 {
        &::after {
          background: url("../assets/img/services/item-2.png") no-repeat top center #111310;
        }
      }
      &-3 {
        &::after {
          background: url("../assets/img/services/item-3.png") no-repeat 100% -15% #2d2633;
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
        z-index: 1;
        box-shadow: 0px 0px 170px -10px rgba(0, 0, 0, 0.75) inset;
      }
    }
    .grow {
      height: 170px;
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
        }
        .desc {
          margin-top: 20px;
          font-weight: 300;
          font-size: 1.7rem;
          letter-spacing: 0.14rem;
          opacity: 0;
          height: 0px;
          transition: 0.3s;
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
        svg {
          width: 25px;
          height: 20px;
          transition: 0.3s;
        }
      }
    }
  }
</style>

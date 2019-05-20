<template>
  <section class="s-case fullpage-section">
      <div class="container section">
        <div class="caption-wrapper default-margin-bottom">
          <div class="g-caption-block">
            <h2 class="g-caption">Кейсы </h2>
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
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">Community generation</h3>
                <p class="desc-case">
                  Разработана криптовалюта CGEN на базе технологии Quark, листинг монеты на биржах. Проведен SWAP
                  монеты. Разработан сайт, личный кабинет с онлайн кошельком. Полная разработка и ведение платформы
                </p>
                <a class="line" href="#">
                  <span>cgen.network</span>
                </a>
              </div>
              <img class="cgen-img" src="../assets/img/cgen.png" alt="CGEN">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">API Решения для ресурсов</h3>
                <p class="desc-case">
                  Разработаны API для Федеральной службы судебных приставов, единого федеральный реестра сведений о
                  банкротстве, картотеки арбитражных дел РФ.
                </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">Crowdsale Network</h3>
                <p class="desc-case">
                  Краудфандинг платформа для сбора средств и подбора специалистов на базе блокчейн технологий. Полная
                  разработка и ведение платформы. Разработана криптовалюта CSNP на базе технологии ERC20. Листинг монеты
                  на биржах.
                </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">WHIZ BIZ</h3>
                <p class="desc-case">
                  Фонд поддержки и развития современного искусства на базе блокчейн технологий. Разработка сайта.
                </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">Леталки для детей развивающие</h3>
                <p class="desc-case">
                  Мобильная 2D-игра, разработанная под iOS. Паззл для детей, оффлайн. Опубликовано в AppStore. Полная
                  разработка. </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">FURY RIDE</h3>
                <p class="desc-case">
                  Мобильная 3D-игра, разработанная под iOS. Гонки на мотоциклах, сражения, реалистичная физика, более
                  10км уникальной трассы, умные противники - боты. Оффлайн. Опубликовано в AppStore. Полная
                  разработка. </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">SNIPER ARENA</h3>
                <p class="desc-case">
                  Мобильная 3D-игра в жанре экнш, разработанная под iOS и Android. Программирование поведения
                  персонажей, классов серверной логики и UI. Проектирование классов игрового контента, анимационной FSM.
                  Подготовка\сборка\финализация контента.
                </p>
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
    name: 'cases-block',
    components: {
      swiper,
      swiperSlide,
    },
    data() {
      return {
        swiperOption: {
          slidesPerView: 1,
          lazy: true,
          effect: 'flip',
          preloadImages: false,
          loadPrevNext: true,
          navigation: {
            nextEl: '.prev',
            prevEl: '.next',
          },
        }
      }
    },
    computed: {
      swiper() {
        return this.$refs.mySwiper.swiper
      }
    }
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-case {
    background: radial-gradient(circle farthest-corner at top right, rgba(171, 23, 216, 0.7) 0%, rgba(0, 0, 0, 0) 70%),
    radial-gradient(circle farthest-corner at -10% 110%, rgba(171, 23, 216, 0.5) 5%, rgba(0, 0, 0, 0) 30%) #672fda;
    .swiper-slide {
      display: flex;
    }
    .slide-wrapper {
      display: flex;
      position: relative;
      flex-grow: 2;
      padding: 88px 50px;
      background: #fff;
      .md-block({ padding: 70px 40px; });
      .sm-block({ padding: 40px 30px; });
      .xs-block({ padding: 40px 25px; });
      .col {
        color: #000;
        &-3 {
          width: 35%;
          .md-block({ width: 50%; });
          .sm-block({ width: 100%; });
        }
        .caption-slide {
          margin-bottom: 50px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.3rem;
          .sm-block({ margin-bottom: 30px; font-size: 3rem; letter-spacing: 1rem; });
          .xs-block({font-size: 2.4rem; letter-spacing: 0.7rem; });
        }
        .desc-case {
          margin-bottom: 50px;
          font-size: 1.7rem;
          font-weight: 300;
          color: @colorSecFonts;
          letter-spacing: 0.14rem;
          .sm-block({ margin-bottom: 30px; });
        }
        .line {
          font-weight: 300;
          color: @colorSecFonts;
          display: flex;
          align-items: center;
          span {
            font-size: 1.7rem;
            .bottom-hover(#666);
          }
          &::before {
            display: inline-block;
            content: '';
            margin-right: 20px;
            width: 140px;
            height: 1px;
            background: @colorSecFonts;
          }
        }
      }
      .cgen-img {
        position: absolute;
        right: -230px;
        top: 70px;
        .md-block({ right: -300px; });
        .sm-block({ display: none; });
      }
    }
  }
</style>

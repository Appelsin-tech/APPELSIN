<template>
  <section class="s-case fullpage-section">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper default-margin-bottom">
          <div class="g-caption-block">
            <div class="wrapper-baseline">
              <h2 class="g-caption">Кейсы</h2>
              <span class="underscore"></span>
            </div>
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
        <swiper :options="swiperOption" ref="mySwiperCases">

          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3 cgen">
                <h3 class="caption-slide">Community generation</h3>
                <p class="desc-case">
                  Разработана криптовалюта CGEN на базе технологии Quark, листинг монеты на биржах. Проведен SWAP
                  монеты. Разработан сайт, личный кабинет с онлайн кошельком. Полная разработка и ведение платформы
                </p>
                <a class="link-line" href="https://cgen.network/" target="_blank">
                  <span>cgen.network</span>
                </a>
              </div>
              <img class="img img--cgen" src="../assets/img/case/cgen.png" alt="CGEN">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3 api">
                <h3 class="caption-slide">API Решения для ресурсов</h3>
                <p class="desc-case">
                  Разработаны API для Федеральной службы судебных приставов, единого федеральный реестра сведений о
                  банкротстве, картотеки арбитражных дел РФ.
                </p>
                <a class="link-line" href="https://fssprus.ru/" target="_blank">
                  <span>fssprus.ru</span>
                </a>
              </div>
              <img class="img img--api" src="../assets/img/case/api.png" alt="API Решения для ресурсов">
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
                <a class="link-line" href="https://crowdsale.network/" target="_blank">
                  <span>crowdsale.network</span>
                </a>
              </div>
              <img class="img img--crowdsale" src="../assets/img/case/crowdsale.png" alt="Crowdsale Network">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">WHIZ BIZ</h3>
                <p class="desc-case">
                  Фонд поддержки и развития современного искусства на базе блокчейн технологий. Разработка сайта.
                </p>
                <a class="link-line" href="http://ghost_town.mrpelktn.beget.tech/" target="_blank">
                  <span>whizbiz.io</span>
                </a>
              </div>
              <img class="img img--whiz-biz" src="../assets/img/case/whiz-biz.png" alt="WHIZ BIZ">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3 air">
                <h3 class="caption-slide">Леталки для детей развивающие</h3>
                <p class="desc-case">
                  Мобильная 2D-игра, разработанная под iOS. Паззл для детей, оффлайн. Опубликовано в AppStore. Полная
                  разработка. </p>
                <div class="link-wrapper">
                  <a href="https://itunes.apple.com/ru/app/id1183881507" class="link ios" target="_blank">
                    <img svg-inline class="svg" src="../assets/img/icon/apple.svg">
                    <span>iOS</span>
                  </a>
                </div>
              </div>
              <img class="img img--air" src="../assets/img/case/air.png" alt="Самолет">
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
                <div class="link-wrapper">
                  <a href="https://itunes.apple.com/ru/app/fury-ride/id1281992116" class="link ios" target="_blank">
                    <img svg-inline class="svg" src="../assets/img/icon/apple.svg">
                    <span>iOS</span>
                  </a>
                </div>
              </div>
              <img class="img img--fury-ride" src="../assets/img/case/fury-ride.png" alt="Fury ride">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">SNIPER ARENA</h3>
                <p class="desc-case">
                  Мобильная 3D-игра в жанре экшн, разработанная под iOS и Android. Программирование поведения
                  персонажей, классов серверной логики и UI. Проектирование классов игрового контента, анимационной FSM.
                  Подготовка\сборка\финализация контента.
                </p>
                <div class="link-wrapper">
                  <a href="https://itunes.apple.com/us/app/id1029110855" class="link ios" target="_blank">
                    <img svg-inline class="svg" src="../assets/img/icon/apple.svg">
                    <span>iOS</span>
                  </a>
                  <a href="https://play.google.com/store/apps/details?id=team.gordeyev.sniperarena" class="link android" target="_blank">
                    <img svg-inline class="svg" src="../assets/img/icon/android.svg">
                    <span>android</span>
                  </a>
                </div>
              </div>
              <img class="img img--sniper" src="../assets/img/case/sniper-arena.png" alt="Sniper arena">
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
            nextEl: '.s-case .prev',
            prevEl: '.s-case .next',
          },
        }
      }
    },
    computed: {
      swiper() {
        return this.$refs.mySwiperCases.swiper
      }
    },
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-case {
    background: radial-gradient(circle farthest-corner at top right, rgba(171, 23, 216, 0.7) 0%, rgba(0, 0, 0, 0) 70%),
    radial-gradient(circle farthest-corner at -10% 110%, rgba(171, 23, 216, 0.5) 5%, rgba(0, 0, 0, 0) 30%) #672fda;
   overflow: hidden;
    .swiper-slide {
      display: flex;
    }
    .slide-wrapper {
      display: flex;
      position: relative;
      flex-grow: 2;
      padding: 88px 50px 30px;
      background: #fff;
      .md-block({ padding: 70px 40px; });
      .sm-block({ padding: 40px 30px; });
      .xs-block({ padding: 40px 25px; });
      .col {
        color: #000;
        &-3 {
          position: relative;
          width: 45%;
          z-index: 2;
          .lg-block({ width: 50%; });
          .sm-block({ width: 100%; });
          &.air {
            width: 54%;
            .md-block({ width: 50%; });
            .sm-block({ width: 100%; });
          }
          &.cgen {
            width: 40%;
            .md-block({ width: 50%; });
            .sm-block({ width: 100%; });
          }
          &.api {
            .caption-slide {
              max-width: 440px;
              .lg-block({max-width: 380px});
            }
          }
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
        .link-line {
          font-weight: 300;
          color: @colorSecFonts;
          display: flex;
          align-items: center;
          &.mobile {
            display: none;
            .xs-block({ display: flex;});
          }
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
            .xs-block({ width: 100px;});
          }
        }
        .link-wrapper {
          display: flex;
          .sm-block({align-items: center;});
          &::before {
            display: none;
            content: '';
            margin-right: 20px;
            width: 100px;
            height: 1px;
            background: @colorSecFonts;
            .sm-block({ display: inline-block;});
          }
          .link {
            height: 70px;
            padding: 0 35px 0 25px;
            display: flex;
            align-items: center;
            border: 1px solid #bababa;
            border-radius: 50px;
            transition: 0.3s;
            .sm-block({border: none; height: auto; border-radius: 0; padding: 0;});
            &:first-child {
              margin-right: 10px;
              .sm-block({ margin-bottom: 0; margin-right: 15px;})
            }
            &.ios {
              &:hover {
                border-color: #000;
                .sm-block({border: none});
                svg {
                  path {
                    fill: #000;
                  }
                }
                span {
                  color: #000;
                }
              }
            }
            &.android {
              &:hover {
                border-color: #a4c639;
                .sm-block({border: none});
                svg {
                  path {
                    fill: #a4c639;
                  }
                }
                span {
                  color: #a4c639;
                  .xs-block({color: #000;});
                }
              }
            }
            .svg {
              margin-right: 17px;
              height: 40px;
              width: 40px;
              .sm-block({ display: none;});
              path {
                fill: #bababa;
                transition: 0.3s;
              }
            }
            span {
              font-size: 18px;
              color: #bababa;
              transition: 0.3s;
              .sm-block({ font-size: 1.7rem; .bottom-hover(#666); color: #666666; font-weight: 300;});
            }
          }
        }
      }
      .img {
        position: absolute;
        z-index: 1;
        &--cgen {
          right: -280px;
          top: 70px;
          .lg-block({ right: -340px; });
          .md-block({ right: -300px; });
          .sm-block({ right: 2%; top: 280px;});
          .xs-block({ top: 320px;});
        }
        &--api {
          top: 60px;
          right: -360px;
          .lg-block({ right: -350px; });
          .sm-block({ right: 50%;
            top: 254px;
            max-width: 500px;
            transform: translateX(65%);});
          .xs-block({ top: 280px; max-width: 400px;})
        }
        &--crowdsale {
          top: 27px;
          right: -220px;
          .lg-block({ right: -250px; });
          .md-block({ right: -280px;  top: 60px;});
          .sm-block({ right: 50%;
            top: 254px;
            max-width: 500px;  transform: translateX(50%);});
          .xs-block({top: 300px; max-width: 400px;})
        }
        &--whiz-biz {
          top: 37px;
          right: -130px;
          .lg-block({ right: -90px; });
          .md-block({ right: -150px; });
          .sm-block({ right: 50%;
            top: 220px;
            max-width: 500px; transform: translateX(44%);});
          .xs-block({ top: 250px; max-width: 400px;})
        }
        &--air {
          top: 110px;
          right: -170px;
          .lg-block({ right: -300px; });
          .sm-block({ top: 300px; right: 50%; transform: translateX(50%); max-width: 470px});
          .xs-block({max-width: 350px; top: 300px;})
        }
        &--fury-ride {
          top: 40px;
          right: -200px;
          .lg-block({ right: -250px; });
          .md-block({ right: -280px; top: 80px;});
          .sm-block({ top: 250px; right: 50%; transform: translateX(50%); max-width: 500px});
          .xs-block({ top: 280px;  max-width: 350px});
        }
        &--sniper {
          top: 40px;
          right: -100px;
          .lg-block({ right: -230px; });
          .md-block({ right: -220px; });
          .sm-block({ top: 300px; right: 50%; transform: translateX(44%); max-width: 370px});
          .xs-block({ top: 320px; max-width: 240px});
        }
      }
    }
  }
</style>

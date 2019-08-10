<template>
  <section class="s-about fullpage-section">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper default-margin-bottom">
          <div class="g-caption-block">
            <div class="wrapper-baseline">
              <h2 class="g-caption">О нас</h2>
              <span class="underscore"></span>
            </div>
          </div>
          <div class="nav-slider">
            <button id="about-next" class="next">
              <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
            </button>
            <button  id="about-prev" class="prev">
              <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
            </button>
          </div>
        </div>
        <swiper :options="swiperOption" ref="mySwiper">
          <swiper-slide>
            <div class="slide-wrapper main-slide">
              <div class="svg-wrapper">
                <img svg-inline src="../assets/img/appelsin/app-about.svg" alt="">
              </div>
              <div class="text-wrapper">
                <span class="symbol">
                  <img svg-inline src="../assets/img/icon/double-quote.svg" alt="">
                </span>
                <strong class="description-strong">Наш главный приоритет - помочь вашему бизнесу</strong>
                <em class="description">Мы поддержим на каждом этапе и предложим лучшие решения, чтобы повысить его эффективность в минимальные сроки и с минимальными ресурсами. Высококвалифицированные специалисты, индивидуальный подход и понимание ваших целей в результате гарантируют действительно качественный продукт. К каждому проекту мы относимся как к своему, взамен клиенты продолжают работать только с нами, а зачастую и становятся нашими бизнес-партнерами</em>
                <p class="admin">
                  <strong>Михаил Алиакберов</strong>
                  <span>CEO & Founder</span>
                </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="swiper-wrapper-child">
              <swiper :options="swiperOption_2" ref="mySwiper">
                <swiper-slide>
                  <div class="slide-wrapper skills-slide">
                    <p class="skills-desc">Языки с которыми мы работаем каждый день:</p>
                    <ul class="skills-list">
                      <li class="skills">С#,</li>
                      <li class="skills">Java,</li>
                      <li class="skills">JavaScript,</li>
                      <li class="skills">Html5,</li>
                      <li class="skills">PHP,</li>
                      <li class="skills">SQL</li>
                    </ul>
                  </div>
                </swiper-slide>
                <swiper-slide>
                  <div class="slide-wrapper skills-slide">
                    <p class="skills-desc">Софт, которым мы пользуемся:</p>
                    <ul class="skills-list">
                      <li class="skills">Visual Studio,</li>
                      <li class="skills">Eclipse,</li>
                      <li class="skills">Zend,</li>
                      <li class="skills">Aptana,</li>
                      <li class="skills">Unity Engine,</li>
                      <li class="skills">xCode,</li>
                      <li class="skills">Android Studio,</li>
                      <li class="skills">3ds Max,</li>
                      <li class="skills">Maya,</li>
                      <li class="skills">Adobe Photoshop,</li>
                      <li class="skills">Corel Draw</li>
                    </ul>
                  </div>
                </swiper-slide>
                <swiper-slide>
                  <div class="slide-wrapper skills-slide">
                    <p class="skills-desc">Контроль версий:</p>
                    <ul class="skills-list">
                      <li class="skills">SVN,</li>
                      <li class="skills">Git</li>
                    </ul>
                  </div>
                </swiper-slide>
                <swiper-slide>
                  <div class="slide-wrapper skills-slide">
                    <p class="skills-desc">Сервисы командного взаимодействия, которые мы используем:</p>
                    <ul class="skills-list">
                      <li class="skills">Assembla,</li>
                      <li class="skills">Trello,</li>
                      <li class="skills">Slack,</li>
                      <li class="skills">Todoist,</li>
                      <li class="skills">Discord,</li>
                      <li class="skills">Bitbucket</li>
                    </ul>
                  </div>
                </swiper-slide>
                <swiper-slide>
                  <div class="slide-wrapper skills-slide">
                    <p class="skills-desc">Опыт работы с сервисами и API:</p>
                    <ul class="skills-list api">
                      <li class="skills">Cloudflare,</li>
                      <li class="skills">GoogleMaps,</li>
                      <li class="skills">Postman,</li>
                      <li class="skills">GameCenter,</li>
                      <li class="skills">GooglePlay,</li>
                      <li class="skills">TapJoy,</li>
                      <li class="skills">AdMob,</li>
                      <li class="skills">AppLovin,</li>
                      <li class="skills">Appodeal,</li>
                      <li class="skills">PushWoosh,</li>
                      <li class="skills">Facebook,</li>
                      <li class="skills">VK,</li>
                      <li class="skills">Odnoklassniki,</li>
                      <li class="skills">TestFlight,</li>
                      <li class="skills">HockeyApp,</li>
                      <li class="skills">GameAnalytics,</li>
                      <li class="skills">MixPanel,</li>
                      <li class="skills">Flurry,</li>
                      <li class="skills">Adjust,</li>
                      <li class="skills">UnityAnalytics,</li>
                      <li class="skills">AppsFlyer,</li>
                      <li class="skills">2captcha,</li>
                      <li class="skills">Luminati,</li>
                      <li class="skills">Proxymesh</li>
                    </ul>
                  </div>
                </swiper-slide>
              </swiper>
              <div class="num-slides">
                <div id='about-child-pagination' class="swiper-pagination swiper-pagination-bullets" slot="pagination"></div>
                <div class="nav-slider item">
                  <button id="about-child-next" class="next next-insert">
                    <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
                  </button>
                  <button id="about-child-prev" class="prev prev-insert">
                    <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
                  </button>
                </div>
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
    name: 'about-block',
    components: {
      swiper,
      swiperSlide,
    },
    data() {
      return {
        swiperOption: {
          slidesPerView: 1,
          speed: 300,
          navigation: {
            nextEl: '#about-prev',
            prevEl: '#about-next',
          },
          breakpoints: {
            // when window width is <= 320px
          }
        },
        swiperOption_2: {
          slidesPerView: 1,
          speed: 300,
          navigation: {
            nextEl: '#about-child-prev',
            prevEl: '#about-child-next',
          },
          pagination: {
            el: '#about-child-pagination',
            clickable: true,
            renderBullet(index, className) {
              return `<div class="${className} swiper-pagination-bullet-custom item">${index + 1}</div>`
            }
          },
          breakpoints: {
            // when window width is <= 320px
          }
        }
      }
    },
    computed: {
      swiper() {
        return this.$refs.mySwiper.swiper
      }
    },
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-about {
    background: linear-gradient(to top right, #3fbc47, #59c259) no-repeat;
    .swiper-container {

      .swiper-slide {
        display: flex;
        flex-grow: 2;
        height: 100%;
        z-index: 1;
        background: #fff;
        .slide-wrapper {
          padding: 80px 75px 80px 60px;
          .md-block({ padding: 60px 40px; });
          .sm-block({ padding: 40px 30px; });
          .xs-block({ padding: 30px 25px; });
          &.main-slide {
            display: flex;
            justify-content: space-between;
            .svg-wrapper {
              margin-right: 30px;
              flex-shrink: 0;
              height: 100%;
              .md-block({ max-width: 32% });
              .sm-block({ display: none; });
              > svg {
                height: 100%;
                .md-block({ width: 100%; height: auto; });
              }
            }
            .text-wrapper {
              display: flex;
              flex-direction: column;
              max-width: 57%;
              .md-block({ max-width: 70%; });
              .sm-block({ max-width: 100%; });
              .symbol {
                margin-bottom: 30px;
                width: 30px;
                height: 30px;
                flex-shrink: 0;
                transform: rotate(180deg);
                .sm-block({ width: 24px; height: 24px;});
                .xs-block({ margin-bottom: 20px;});
                .xs-max-height({ margin-bottom: 20px;});
                > svg {
                  width: 100%;
                  height: 100%;
                }
              }
              .description {
                margin-bottom: auto;
                padding-bottom: 10px;
                font-size: 1.7rem;
                font-weight: 300;
                color: #666666;
                &-strong {
                  margin-bottom: 15px;
                  font-family: @fontBebas;
                  font-weight: bold;
                  font-size: 3.5rem;
                  letter-spacing: 1rem;
                  color: #000;
                  .lg-block({ font-size: 2.5rem; letter-spacing: 0.6rem;});
                  .xs-block({ font-size: 2rem; letter-spacing: 0.3rem;})
                }
              }
              .admin {
                > strong {
                  display: block;
                  margin-bottom: 15px;
                  color: #000;
                  font-family: @fontBebas;
                  font-weight: bold;
                  font-size: 2.4rem;
                  letter-spacing: 0.7rem;
                  text-transform: uppercase;
                  .sm-block({ margin-bottom: 7px;});
                  .xs-block({ font-size: 2.2rem; letter-spacing: 0.6rem;})
                }
                > span {
                  font-size: 2rem;
                  font-weight: 300;
                  color: #666666;
                  .xs-block({ font-size: 1.8rem;})
                }
              }
            }
          }
          &.skills-slide {
            .skills-desc {
              margin-bottom: 40px;
              font-size: 1.8rem;
              color: @colorSecFonts;
              .sm-block({ margin-bottom: 30px;});
              .xs-block({ margin-bottom: 20px;});
            }
            .skills-list {
              display: flex;
              flex-wrap: wrap;
              .skills {
                margin-right: 15px;
                font-family: @fontBebas;
                font-weight: bold;
                font-size: 4.5rem;
                letter-spacing: 1.3rem;
                color: #000;
                .md-block({ font-size: 3rem; letter-spacing: 1rem; });
                .sm-block({ margin-right: 10px;});
                .xs-block({font-size: 2.4rem; letter-spacing: 0.5rem; })
              }
              &.api {
                .skills {
                  font-size: 3rem;
                  letter-spacing: 0.8rem;
                  .lg-block({ font-size: 2.5rem; letter-spacing: 0.6rem; });
                  .sm-block({  font-size: 2.2rem; letter-spacing: 0.4rem;});
                }
              }
            }
          }
        }
      }
      .swiper-wrapper-child {
        display: flex;
        width: 100%;
        flex-direction: column;
        .num-slides {
          display: flex;
          height: 200px;
          border-top: 1px solid @colorBorder;
          .lg-block({ height: 150px; });
          .md-block({ height: 100px; });
          .sm-block({ height: 60px; });
          .swiper-pagination {
            position: relative;
            height: 100%;
            display: flex;
            flex-grow: 1;
          }
          .nav-slider {
            display: flex;
            max-width: 195px;
            width: 100%;
            justify-content: center;
            align-items: center;
            .sm-block({ max-width: 150px });
            .xs-block({ max-width: 120px });
            button {
              svg {
                path {
                  fill: #000;
                }
              }
            }
          }
        }
      }
    }
  }

</style>

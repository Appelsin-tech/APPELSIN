<template>
  <section class="s-about fullpage-section">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper">
          <div class="g-caption-block">
            <h2 class="g-caption">О нас _ </h2>
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
        <swiper :options="swiperOption" ref="mySwiper" >
          <swiper-slide>
            <div class="slide-wrapper main-slide">
              <img svg-inline src="../assets/img/appelsin/app-about.svg" alt="">
              <div class="text-wrapper">
                <span class="symbol">
                  <img svg-inline src="../assets/img/icon/double-quote.svg" alt="">
                </span>
                <em class="description">Наш главный приоритет - помочь вашему бизнесу. Мы поддержим на каждом этапе и предложим самые оптимальные решения конкретно для вас, чтобы запустить или повысить эффективность вашего бизнеса в минимальные сроки и с минимальными ресурсами. Люди, входящие в нашу команду, работают в своей отрасли в среднем 10 лет, и мы готовы создать для вас действительно качественный продукт. Мы дорожим каждым нашим клиентом, именно поэтому они возвращаются и продолжают работать только с нами, и, зачастую, мы становимся бизнес-партнерами</em>
                <p class="admin">
                  <strong>Михаил Алиакберов</strong>
                  <span>CEO & Founder</span>
                </p>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper skills-slide">
              <p class="skills-desc">Языки с которыми мы работаем каждый день:</p>
              <ul class="skills-list">
                <li class="skills">С#, </li>
                <li class="skills">Java, </li>
                <li class="skills">JavaScript, </li>
                <li class="skills">Html5, </li>
                <li class="skills">PHP, </li>
                <li class="skills">SQL</li>
              </ul>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper skills-slide">
              <p class="skills-desc">Софт, которым мы пользуемся:</p>
              <ul class="skills-list">
                <li class="skills">Visual Studio, </li>
                <li class="skills">Eclipse, </li>
                <li class="skills">Zend, </li>
                <li class="skills">Aptana, </li>
                <li class="skills">Unity Engine, </li>
                <li class="skills">xCode, </li>
                <li class="skills">Android Studio, </li>
                <li class="skills">3ds Max, </li>
                <li class="skills">Maya, </li>
                <li class="skills">Adobe Photoshop, </li>
                <li class="skills">Corel Draw</li>
              </ul>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper skills-slide">
              <p class="skills-desc">Контроль версий:</p>
              <ul class="skills-list">
                <li class="skills">SVN, </li>
                <li class="skills">Git</li>
              </ul>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper skills-slide">
              <p class="skills-desc">Сервисы командного взаимодействия, которые мы используем:</p>
              <ul class="skills-list">
                <li class="skills">Assembla, </li>
                <li class="skills">Trello, </li>
                <li class="skills">Slack, </li>
                <li class="skills">Todoist, </li>
                <li class="skills">Discord, </li>
                <li class="skills">Bitbucket</li>
              </ul>
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper skills-slide">
              <p class="skills-desc">Опыт работы с сервисами и API:</p>
              <ul class="skills-list api">
                <li class="skills">Cloudflare, </li>
                <li class="skills">GoogleMaps, </li>
                <li class="skills">Postman, </li>
                <li class="skills">GameCenter, </li>
                <li class="skills">GooglePlay, </li>
                <li class="skills">TapJoy, </li>
                <li class="skills">AdMob, </li>
                <li class="skills">AppLovin, </li>
                <li class="skills">Appodeal, </li>
                <li class="skills">PushWoosh, </li>
                <li class="skills">Facebook, </li>
                <li class="skills">VK, </li>
                <li class="skills">Odnoklassniki, </li>
                <li class="skills">TestFlight, </li>
                <li class="skills">HockeyApp, </li>
                <li class="skills">GameAnalytics, </li>
                <li class="skills">MixPanel, </li>
                <li class="skills">Flurry, </li>
                <li class="skills">Adjust, </li>
                <li class="skills">UnityAnalytics, </li>
                <li class="skills">AppsFlyer, </li>
                <li class="skills">2captcha, </li>
                <li class="skills">Luminati, </li>
                <li class="skills">Proxymesh</li>
              </ul>
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
            nextEl: '.prev',
            prevEl: '.next',
          },
          breakpoints: {
            // when window width is <= 320px

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
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-about {
    background: linear-gradient(to top right, #3fbc47, #59c259) no-repeat;
    .wrapper-container {
      position: relative;
      display: flex;
      width: 100%;
      height: 100vh;
      align-items: center;
      justify-content: flex-start;
      .swiper-container {
        flex-grow: 1;
        max-height: 560px;
        width: 100%;
        .swiper-slide {
          display: flex;
          flex-grow: 2;
          height: 100%;
          z-index: 1;
          background: #fff;
          .slide-wrapper {
            padding: 80px 50px;
            &.main-slide {
              display: flex;
              justify-content: space-between;
              >svg {
                width: 320px;
                flex-shrink: 0;
                height: 100%;
              }
              .text-wrapper {
                display: flex;
                flex-direction: column;
                max-width: 60%;
                .symbol {
                  margin-bottom: 40px;
                  width: 30px;
                  height: 30px;
                  transform: rotate(180deg);
                  >svg {
                    width: 100%;
                    height: 100%;
                  }
                }
                .description {
                  margin-bottom: auto;
                  color: #000;
                  font-size: 1.8rem;
                }
                .admin {
                  >strong {
                    display: block;
                    margin-bottom: 15px;
                    color: #000;
                    font-family: @fontBebas;
                    font-weight: bold;
                    font-size: 2.4rem;
                    letter-spacing: 0.7rem;
                    text-transform: uppercase;
                  }
                  >span {
                    font-size: 2rem;
                    color: #3fbc47;
                  }
                }
              }
            }
            &.skills-slide {
              .skills-desc {
                margin-bottom: 40px;
                font-size: 1.8rem;
                color: @colorSecFonts;
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
                }
                &.api {
                  .skills {
                    font-size: 3rem;
                    letter-spacing: 0.8rem;
                  }
                }
              }
            }
          }
        }
      }
    }
  }
</style>

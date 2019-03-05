<template>
  <section class="s-case fullpage-section">
    <div class="container">
      <div class="caption-wrapper">
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
      <swiper :options="swiperOption" ref="mySwiper" >

        <swiper-slide>
          <div class="slide-wrapper">
            <div class="col col-3">
              <h3 class="caption-slide">Community generation</h3>
              <p class="desc-case">
                Проектирование и разработка
                front-end / back-end, полное обслуживание платформы и связанных ресурсов
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
              <h3 class="caption-slide">Test Testovich</h3>
              <p class="desc-case">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi commodi delectus explicabo, itaque mollitia nesciunt obcaecati officiis ratione ut.
              </p>
              <a class="line" href="#">
                <span>cgen.network</span>
              </a>
            </div>
            <img class="cgen-img" height="200" src="../assets/img/services/item-1.png" alt="CGEN">
          </div>
        </swiper-slide>

      </swiper>
    </div>
  </section>
</template>

<script>
  import { swiper, swiperSlide } from 'vue-awesome-swiper'
  export default {
    name: 'cases-block',
    components: {
      swiper,
      swiperSlide,
    },
    data () {
      return {
        swiperOption: {
          slidesPerView: 1,
          effect: 'flip',
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
    },
    mounted() {
      console.log('this is current swiper instance object', this.swiper)
    }
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import '~swiper/dist/css/swiper.css';

  .s-case {
    background:
    radial-gradient(circle farthest-corner at top right, rgba(171,23,216, 0.7) 0%, rgba(0,0,0,0) 70%),
    radial-gradient(circle farthest-corner at -10% 110%, rgba(171,23,216, 0.5) 5%, rgba(0,0,0,0) 30%) #672fda;
    .container {
      .container-pdd();
    }
    .caption-wrapper {
      justify-content: space-between;
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
    .swiper-slide {
      display: flex;
      height: 540px;
      .xl-comb({ height: 440px;});
      .md-block({ height: 440px;});
      .md-comb({ height: 380px;});
      .sm-block({ width: 300px;});
      .sm-comb({ height: 300px;});
      .xs-comb({ height: 270px;});
    }
    .slide-wrapper {
      display: flex;
      position: relative;
      flex-grow: 1;
      padding: 100px 80px;
      background: #fff;
      .md-block({ padding: 70px 60px;});
      .sm-block({ padding: 40px 30px;});
      .sm-comb({  padding: 40px 30px;});
      .col {
        color: #000;
        &-3 {
          width: 33%;
          .sm-block({ width: 100%;});
        }
        .caption-slide {
          margin-bottom: 50px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.7rem;
          letter-spacing: 1.4rem;
          .sm-block({ margin-bottom: 30px; font-size: 3rem; letter-spacing: 1rem;});
        }
        .desc-case {
          margin-bottom: 50px;
          font-size: 1.7rem;
          font-weight: 300;
          color: @colorSecFonts;
          letter-spacing: 0.14rem;
          .sm-block({ margin-bottom: 30px;});
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
        .sm-block({ display: none;});
      }
    }
  }
</style>

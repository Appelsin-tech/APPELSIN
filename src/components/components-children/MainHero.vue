<template>
  <section class="s-main fullpage-section active fp-auto-height-responsive">
    <div class="wrapper-container bg-wrapper">
      <div class="bg-small"></div>
      <div class="bg-big"></div>

      <div class="container container-app section">
        <div class="app-wrapper">
          <img svg-inline src="../../assets/img/appelsin/app.svg" alt="">
        </div>
        <div class="desc-wrapper">
          <h1 class="visually-hidden">{{$t('title-main')}}</h1>
          <p class="desc-caption">
            <span class="symbol">{{$t('title-main--1')}}</span>
            <br>
            <span class="symbol">IT</span>
            <span class="dash">-</span>
            <span class="symbol">{{$t('title-main--2')}}</span>
            <span class="underscore"></span>
          </p>
          <ul class="servises-list">
            <li class="item">
              <p class="item-link">{{$t('server-solutions')}}</p>
            </li>
            <li class="item">
              <p class="item-link">{{$t('web-dev')}}</p>
            </li>
            <li class="item">
              <p class="item-link">{{$t('mobile-game-and-app')}}</p>
            </li>
            <li class="item">
              <p class="item-link">{{$t('advertising-and-promotion')}}</p>
            </li>
            <li class="item">
              <p class="item-link">{{$t('design-and-branding')}}</p>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
  </section>
</template>

<script>
  export default {
    name: 'main-block'
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";

  .s-main {
    background: #ffba00;
    box-shadow: inset 0px 0px 300px 50px rgb(245, 151, 16);
    .sm-max-height({ padding-top: 0px; });
    .sm-block({ padding-top: 0px;});
    .wrapper-container {
      position: relative;
      display: flex;
      width: 100%;
      align-items: center;
      justify-content: flex-start;
      background-image: url("../../assets/img/appelsin-small-11.png"),
      url("../../assets/img/appelsin-small-2.png") ;
      background-repeat: no-repeat;
      background-position: 0% 0%, 95% 10%;
      box-sizing: border-box;
      .sm-max-height({ padding-top: 60px;});
      .sm-block({ padding-top: 60px; });
      .xs-block({background-position: 0% 0%, 95% 80%; height: 100%;});
      .bg-small {
        position: absolute;
        top: 85%;
        left: 10%;
        box-shadow: 0px 0px 50px 20px rgb(243, 117, 14);
      }
      .bg-big {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background-image: url("../../assets/img/appelsin.png");
        background-repeat: no-repeat;
        background-position: 45% 100%;
        z-index: 9;
        @media (min-width: 1170px) and (max-height: 1080px){
          background-position: 55% 130%;
        }
        .lg-max-height({background-position: 45% 250px;});
        .md-max-height({ display: none;});
        .xs-block({ display: none;});
      }
      .container-app {
        max-width: 1210px;
        z-index: 8;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        width: 100%;
        box-sizing: border-box;
        .lg-block({ align-items: center;});
        .md-block({ width: auto; margin: 0;});
        .app-wrapper {
          height: 100%;
          max-height: 100%;
          box-sizing: border-box;
          flex-shrink: 0;
          .lg-block({max-width: 35%;});
          .md-block({ display: none;});
          svg {
            max-width: 100%;
            max-height: 100%;
            height: 100%;
          }
        }
      }
      .desc-wrapper {
        z-index: 10;
        padding-top: 80px;
        margin-left: 10vw;
        flex-shrink: 0;
        .lg-block({ padding-top: 0px;});
        .desc-caption {
          display: inline-block;
          margin-bottom: 40px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 5.7rem;
          text-transform: uppercase;
          .md-max-height({ font-size: 4rem; letter-spacing: 1.3rem; margin-bottom: 30px;});
          .lg-block({font-size: 4rem; letter-spacing: 1.3rem; margin-bottom: 30px;});
          .sm-block({ font-size: 3rem; letter-spacing: 0.8rem; margin-bottom: 20px;});
          .symbol {
            letter-spacing: 1.6rem;
            .md-max-height({letter-spacing: 1.3rem; });
            .lg-block({letter-spacing: 1.3rem;});
            .sm-block({letter-spacing: 0.8rem;});
          }
          .dash {
            margin-left: 15px;
            margin-right: 25px;
            letter-spacing: 0;
            .md-max-height({margin-left: 8px; margin-right: 19px;});
            .lg-block({ margin-left: 8px; margin-right: 19px;});
            .sm-block({ margin-left: 5px; margin-right: 9px;});
          }
          .underscore {
            display: inline-block;
            margin-left: 15px;
            width: 20px;
            height: 6px;
            background: #fff;
            letter-spacing: 0;
            .md-max-height({ width: 16px; height: 4px; margin-left: 6px;});
            .lg-block({width: 16px; height: 4px; margin-left: 6px;});
            .sm-block({ width: 11px; height: 3px; });
          }
        }
        .servises-list {
          .item {
            margin-bottom: 22px;
            &:last-child {
              margin-bottom: 0;
            }
            .item-link {
              position: relative;
              font-size: 2.1rem;
              font-weight: 600;
              text-transform: uppercase;
              color: #fff;
              .sm-block({ font-size: 1.8rem;})
            }
          }
        }
      }
    }
    .phone {
      display: none;
      position: absolute;
      bottom: 50px;
      right: 50%;
      transform: translateX(50%);
      font-size: 2rem;
      color: #fff;
    }
  }
</style>

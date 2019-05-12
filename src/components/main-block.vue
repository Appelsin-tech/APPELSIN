<template>
  <section class="s-main fullpage-section active">
    <div class="bg-wrapper">
      <div class="bg-small"></div>
      <div class="bg-big"></div>
      <div class="desc-wrapper">
        <strong class="desc-caption">Комплексные <br> IT - решения</strong>
        <ul class="servises-list">
          <li class="item">
            <a class="item-link" href="#" @click.prevent="">Серверные решения</a>
          </li>
          <li class="item">
            <a class="item-link" href="#" @click.prevent="">WEB - разработка</a>
          </li>
          <li class="item">
            <a class="item-link" href="#" @click.prevent="">Мобильные игры и приложения</a>
          </li>
          <li class="item">
            <a class="item-link" href="#" @click.prevent="">Криптовалюты</a>
          </li>
          <li class="item">
            <a class="item-link" href="#" @click.prevent="">Реклама и продвижение</a>
          </li>
          <li class="item">
            <a class="item-link" href="#" @click.prevent="">Дизайн и брендинг</a>
          </li>
        </ul>
      </div>
      <div class="container container-box-sizing">
        <div class="app-wrapper">
          <h1 class="visually-hidden">Appelsin</h1>
          <img svg-inline src="../assets/img/appelsin/app.svg" alt="">
          <!--<img src="../assets/img/1556425601194769590.jpg" alt="">-->
        </div>

      </div>
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'main-block',
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";

  .s-main {
    background: #ffba00;
    box-shadow: inset 0px 0px 300px 50px rgb(245, 151, 16);

    .bg-wrapper {
      position: relative;
      display: flex;
      width: 100%;
      height: 100%;
      align-items: center;
      justify-content: flex-start;
      background-image: url("../assets/img/appelsin-small-11.png"),
      url("../assets/img/appelsin-small-2.png") ;
      background-repeat: no-repeat;
      background-position: 0% 0%, 95% 10%;
      box-sizing: border-box;
/*      .lg-width__xs-height({ align-items: flex-end;});*/
      .xs-block({background-position: 0% 0%, 95% 80%;});
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
        background-image: url("../assets/img/appelsin-1.png");
        background-repeat: no-repeat;
        background-position: 65% 100%;
        z-index: 9;
        .xl-max-height({background-position: 60% 320px;});
        .lg-width__lg-height({background-position: 80% 250px;});
        .md-width__xl-height({background-position: 60% 320px;});
        .md-width__lg-height({background-position: 60% 230px;});
        .md-max-height({ display: none;});
        .xs-block({ display: none;});
      }
      .desc-wrapper {
        position: absolute;
        top: 50%;
        right: 50%;
        transform: translate(520px, -290px);
        z-index: 10;
        .lg-width__lg-height({transform: translate(520px, -260px);});
        .md-max-height({transform: translate(400px, -220px);});
        .sm-max-height({transform: translate(250px, -180px);});
        .xs-max-height({transform: translate(50px, -150px);});
        .s-max-height({transform: translate(0, -100px);});
        .lg-block({ position: relative; transform: translate(0, -80px); top: auto; left: 10%; right:auto;});
        .md-width__sm-height({transform: translate(0, -30px);});
        .md-width__xs-height({transform: translate(0, 0);});
        .sm-width__sm-height({transform: translate(0, -30px);});
        .sm-width__xs-height({transform: translate(0, 0);});
        .xs-width__sm-height({transform: translate(0, -30px);});
        .xs-width__xs-height({transform: translate(0, 0);});
        .desc-caption {
          display: inline-block;
          margin-bottom: 40px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 5.7rem;
          letter-spacing: 1.6rem;
          text-transform: uppercase;
          .md-max-height({ font-size: 4rem; letter-spacing: 1.3rem; margin-bottom: 30px;});
          .xs-max-height({ font-size: 2.5rem; letter-spacing: 0.8rem; margin-bottom: 20px;});
          .lg-width__s-height({ font-size: 2.2rem; margin-bottom: 15px;});
        }
        .servises-list {
          .item {
            margin-bottom: 22px;
            .sm-max-height({ margin-bottom: 15px;});
            .xs-max-height({ margin-bottom: 7%;});
            .s-max-height({ margin-bottom: 5%;});
            &:last-child {
              margin-bottom: 0;
            }
            .item-link {
              position: relative;
              font-size: 2.1rem;
              font-weight: 600;
              text-transform: uppercase;
              color: #fff;
              .bottom-hover();
              .sm-max-height({ font-size: 1.8rem;});
              .xs-max-height({ font-size: 1.5rem;});
              .lg-width__s-height({ font-size: 1.3rem;});
            }
          }
        }
      }
      .container-box-sizing {
        max-width: 1210px;
        z-index: 8;
      }
      .phone {
        display: none;
        position: absolute;
        bottom: 50px;
        right: 50%;
        transform: translateX(50%);
        font-size: 2rem;
        color: #fff;
        .xs-block({ display: inline-block;})
      }
    }
    .container {
      height: calc(~"100% - 180px");
      display: flex;
      width: 100%;
      align-items: center;
      box-sizing: border-box;
      .lg-block({ display: none;});
    /*  .xl-max-height({ padding-bottom: 80px; padding-top: 70px; height: 100%;});*/
      .app-wrapper {
        width: 45%;
        box-sizing: border-box;
        .md-max-height({ width: auto; height:100%; });
        svg {
          .xl-max-height({  height: 100%;});
        }
      }

    }
  }
</style>

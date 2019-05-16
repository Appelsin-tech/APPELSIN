<template>
  <section class="s-main fullpage-section active">
    <div class="wrapper-container bg-wrapper">
      <div class="bg-small"></div>
      <div class="bg-big"></div>

      <div class="container container-app section">
        <div class="app-wrapper">
          <h1 class="visually-hidden">Appelsin</h1>
          <img svg-inline src="../assets/img/appelsin/app.svg" alt="">
        </div>

      </div>
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
      height: 100vh;
      align-items: center;
      justify-content: flex-start;
      background-image: url("../assets/img/appelsin-small-11.png"),
      url("../assets/img/appelsin-small-2.png") ;
      background-repeat: no-repeat;
      background-position: 0% 0%, 95% 10%;
      box-sizing: border-box;
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
        background-position: 45% 100%;
        z-index: 9;
        .xl-max-height({background-position: 55% 130%;});
        .lg-width__lg-height({background-position: 45% 250px;});
        .md-width__xl-height({background-position: 60% 320px;});
        .md-width__lg-height({background-position: 60% 230px;});
        .md-max-height({ display: none;});
        .xs-block({ display: none;});
      }
      .container-app {
        max-width: 1210px;
        z-index: 8;
        display: flex;
        width: 100%;
        align-items: center;
        flex-direction: row;
        box-sizing: border-box;
        .md-width__md-height({width:auto; margin: 0 ;});
        .sm-block({ display: none;});
        .app-wrapper {
          height: 100%;
          max-height: 100%;
          box-sizing: border-box;
          .lg-max-height({ height:100%; });
          .md-width__md-height({ width:100%;});
          svg {
            max-width: 100%;
            max-height: 100%;
            height: 100%;
            .xl-max-height({  height: 100%;});
          }
        }

      }
      .desc-wrapper {
        position: absolute;
        top: 50%;
        right: 50%;
        transform: translate(520px, -290px);
        z-index: 10;
        .lg-width__lg-height({transform: translate(520px, -260px);});
        .md-max-height({transform: translate(400px, -50%);});
        .lg-block({ transform: translate(380px, -240px);});
        .md-block({ transform: translate(350px, -200px);});
        .sm-block({ position: relative; transform: translate(0, -80px); top: auto; left: 10%; right:auto;});

        .md-width__md-height({ position: relative; transform: translate(0, 0px); top: auto; left: auto; right:auto; flex-shrink: 0; padding-left: 70px; padding-right: 20px;});
        .xs-block({ position: relative; top: auto; left: auto; right:auto; transform: translate(0, 0); flex-shrink: 1; padding-left: 40px; padding-right: 20px; align-self: center});
        .desc-caption {
          display: inline-block;
          margin-bottom: 40px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 5.7rem;
          letter-spacing: 1.6rem;
          text-transform: uppercase;
          .md-max-height({ font-size: 4rem; letter-spacing: 1.3rem; margin-bottom: 30px;});
          .lg-block({font-size: 4rem; letter-spacing: 1.3rem; margin-bottom: 30px;});
          .sm-block({ font-size: 3rem; letter-spacing: 0.8rem; margin-bottom: 20px;});
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
              .bottom-hover();
              .sm-block({ font-size: 1.8rem;})
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
        .xs-block({ display: inline-block;});
      }
    }

  }
</style>

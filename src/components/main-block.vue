<template>
  <section class="s-main fullpage-section active">
    <div class="bg-wrapper">
      <div class="bg-small"></div>
      <div class="bg-big"></div>
      <div class="container">
          <div class="caption-wrapper">
            <h1 class="visually-hidden">Appelsin</h1>
            <div class="grid-app">
              <img svg-inline src="../assets/img/appelsin/a.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/p.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/p.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/e.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/l.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/s.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/i.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/n.svg" alt="">
              <img svg-inline src="../assets/img/appelsin/dash.svg" alt="">
            </div>
          </div>
          <div class="desc-wrapper">
            <strong class="desc-caption">Комплексные IT - решения</strong>
            <ul class="servises-list">
              <li class="item">
                <a class="item-link" href="#">Серверные решения</a>
              </li>
              <li class="item">
                <a class="item-link" href="#">WEB - разработка</a>
              </li>
              <li class="item">
                <a class="item-link" href="#">Мобильные игры и приложения</a>
              </li>
              <li class="item">
                <a class="item-link" href="#">Криптовалюты</a>
              </li>
              <li class="item">
                <a class="item-link" href="#">Реклама и продвижение</a>
              </li>
              <li class="item">
                <a class="item-link" href="#">Дизайн и брендинг</a>
              </li>
            </ul>
          </div>
        </div>
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
      justify-content: center;
      background-image: url("../assets/img/appelsin-small-11.png"),
      url("../assets/img/appelsin-small-2.png") ;
      background-repeat: no-repeat;
      background-position: 0% 0%, 95% 10%;
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
        background-position: 70% 100%;
        .xl-block({background-position: 80% 120%;})
      }
    }
    .container {
      display: grid;
      grid-template-columns: minmax(0px, 50%) minmax(0px, 50%);
      grid-template-rows: 1fr;
      .caption-wrapper {
        padding: 60px 75px;
        border: 22px solid #fff;
        .caption {
          font-size: 1.8rem;
        }
        .grid-app {
          display: grid;
          grid-template-columns: 1fr 1fr 1fr;
          grid-template-rows: repeat(3, minmax(80px, 150px));
          grid-row-gap: 60px;
          grid-column-gap: 20px;
          svg {
            max-width: 100%;
            height: 100%;
            max-height: 100%;
            path {
              fill: #fff;
            }
          }
        }
      }
      .desc-wrapper {
        padding-left: 130px;
        padding-top: 40px;
        .desc-caption {
          display: inline-block;
          margin-bottom: 40px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 5.7rem;
          letter-spacing: 1.6rem;
          text-transform: uppercase;
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
            }
          }
        }
      }
    }
  }
</style>

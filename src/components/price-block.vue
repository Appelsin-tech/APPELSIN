<template>
  <section class="s-price fullpage-section">
    <div class="container">
      <div class="caption-wrapper">
        <div class="g-caption-block">
          <h2 class="visually-hidden">Расчет стоимости проекта</h2>
          <p class="text-wrapper">
            <span class="g-caption">Рассчитайте</span>
            <span class="small">стоимость вашего проекта</span>
          </p>
        </div>
      </div>
      <div class="steps-wrapper">
        <div class="steps"><span>Шаг </span><span class="red">1 из 5</span></div>
        <div class="steps-content">
          <div class="steps--project">
            <h3 class="steps-caption">Выберите тип проекта</h3>
            <div class="item-wrapper">
              <div class="item">
                <div class="img"></div>
                <p class="name-project">Мобильное приложение</p>
              </div>
              <div class="item">
                <div class="img"></div>
                <p class="name-project">Корпоративный сайт</p>
              </div>
              <div class="item">
                <div class="img"></div>
                <p class="name-project">Интернет - магазин</p>
              </div>
              <div class="item">
                <div class="img"></div>
                <p class="name-project">SEO - продвижение</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'price-block',
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";

  .s-price {
    background: #d94a50;
    .container {
      .container-pdd();
    }
    .caption-wrapper {
      .xs-comb({ margin-bottom: 5px;});
      .text-wrapper {
        display: flex;
        flex-direction: column;
        .small {
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.3rem;
          text-transform: uppercase;
          .xl-comb({ font-size: 3rem;  letter-spacing: 1rem;});
          .sm-block({font-size: 3rem; letter-spacing: 1rem;});
          .xs-block({font-size: 2.4rem; letter-spacing: 0.75rem;});
        }
      }
    }
    .steps-wrapper {
      display: flex;
      padding-top: 60px;
      height: 500px;
      flex-direction: column;
      background: #fff;
      overflow: hidden;
      .xl-comb({ height: 400px; padding-top: 40px;});
      .md-block({ height: 400px; padding-top: 40px;});
      .md-comb({height: 330px; padding-top: 30px;});
      .sm-block({height: 330px; padding-top: 30px;});
      .xs-block({ height: 300px; padding-top: 30px;});
      .xs-comb({ padding-top: 20px;});
      .steps-content {
        display: flex;
        flex-grow: 1;
        .steps--project {
          display: flex;
          flex-direction: column;
          flex-grow: 1;
        }
      }
      .steps {
        margin-bottom: 20px;
        padding-left: 80px;
        padding-right: 80px;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.5rem;
        letter-spacing: 0.4rem;
        color: #000;
        text-transform: uppercase;
        .xl-comb({ margin-bottom: 15px;});
        .md-block({ margin-bottom: 15px; padding-left: 60px; padding-right: 60px;});
        .xs-block({margin-bottom: 10px; padding-left: 30px; padding-right: 30px;});
        .red {
          color: red;
        }
      }
      .steps-caption {
        margin-bottom: 90px;
        padding-left: 80px;
        padding-right: 80px;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 4.5rem;
        letter-spacing: 1.3rem;
        color: #000;
        text-transform: uppercase;
        .xl-comb({ margin-bottom: 60px; font-size: 3rem; letter-spacing: 1rem;});
        .md-block({ margin-bottom: 60px; padding-left: 60px; padding-right: 60px;});
        .md-comb({ margin-bottom: 30px;});
        .sm-block({ margin-bottom: 40px; font-size: 3rem; letter-spacing: 0.8rem;});
        .xs-block({ font-size: 2.2rem; letter-spacing: 0.65rem; margin-bottom: 15px; padding-left: 30px; padding-right: 30px;});
      }
      .item-wrapper {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 0 30px ;
        padding-right: 40px;
        flex-grow: 1;
        .md-block({grid-template-columns: 1fr 1fr; grid-gap: 20px 20px; padding-bottom: 20px; padding-right: 40px;});
        .md-comb({ padding-bottom: 10px; grid-gap: 10px 10px; padding-right: 20px;});
        .sm-block({grid-template-columns: 1fr; grid-gap: 15px 0; padding-bottom: 15px; padding-right: 0;});
        .xs-block({ grid-gap: 10px 0; padding-bottom: 10px;});
        .item {
          display: flex;
          position: relative;
          padding-left: 80px;
          padding-right: 30px;
          flex-grow: 1;
          flex-direction: column;
          align-items: flex-start;
          box-shadow: 0 0 0 0 #fff, 0 0 0 0 #fff;
          transition: box-shadow 0.3s, z-index 0.3s;
          .lg-block({ padding-right: 0;});
          .md-block({ padding-left: 60px; flex-direction: row; align-items: center;});
          .xs-block({padding-left: 30px;});
          &:hover {
            box-shadow: 20px -20px 0px 20px rgba(255,255,255,1), 20px -20px 30px 20px rgba(0,0,0,0.15);
            z-index: 5;
            .md-block({box-shadow: 20px 0px 0px 20px rgba(255,255,255,1), 20px 0px 20px 20px rgba(0,0,0,0.15);});
            .md-comb({box-shadow: 10px 0px 0px 10px rgba(255,255,255,1), 10px 0px 10px 10px rgba(0,0,0,0.15);});
            .sm-block({box-shadow: 0px 0px 0px 15px rgba(255,255,255,1), 0px 0px 15px 15px rgba(0,0,0,0.15);});
            .xs-block({box-shadow: 0px 0px 0px 10px rgba(255,255,255,1), 0px 0px 10px 10px rgba(0,0,0,0.15);});
          }
          .img {
            margin-bottom: 25px;
            width: 85px;
            height: 85px;
            background-image: url("../assets/img/icon/steps/item-1.jpg");
            background-repeat: no-repeat;
            background-size: contain;
            .xl-comb({ width: 60px; height: 60px; margin-bottom: 20px;});
            .md-block({ margin-bottom: 0; margin-right: 30px; width: 50px; height: 50px;});
            .sm-block({ width: 35px; height: 35px;});
            .xs-block({ width: 30px; height: 30px;});
          }
          .name-project {
            font-size: 2rem;
            font-weight: 300;
            color: @colorSecFonts;
          }
        }
      }
    }
  }
</style>

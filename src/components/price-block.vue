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
      .text-wrapper {
        display: flex;
        flex-direction: column;
        .small {
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.3rem;
          text-transform: uppercase;
          .xl-comb({ font-size: 3rem;});
          .sm-block({font-size: 3rem; letter-spacing: 1rem;});
        }
      }
    }
    .steps-wrapper {
      display: flex;
      padding: 60px 80px 0 80px;
      height: 500px;
      flex-direction: column;
      background: #fff;
      overflow: hidden;
      .xl-comb({ height: 400px; padding: 40px 60px 0 60px;});
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
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.5rem;
        letter-spacing: 0.4rem;
        color: #000;
        text-transform: uppercase;
        .xl-comb({ margin-bottom: 15px;});
        .red {
          color: red;
        }
      }
      .steps-caption {
        margin-bottom: 90px;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 4.5rem;
        letter-spacing: 1.3rem;
        color: #000;
        text-transform: uppercase;
        .xl-comb({ margin-bottom: 60px; font-size: 3rem; letter-spacing: 1rem;});
        .sm-block({font-size: 3rem; letter-spacing: 1rem;});
      }
      .item-wrapper {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-column-gap: 30px;
        flex-grow: 1;
        .item {
          display: flex;
          position: relative;
          padding-right: 60px;
          flex-grow: 1;
          flex-direction: column;
          align-items: flex-start;
          box-shadow: 0 0 0 0 #fff, 0 0 0 0 #fff;
          transition: box-shadow 0.3s, z-index 0.3s;
          &:hover {
            box-shadow: -20px -20px 0px 20px rgba(255,255,255,1), -20px -20px 30px 20px rgba(0,0,0,0.75);
            z-index: 5;
          }
          .img {
            margin-bottom: 25px;
            width: 85px;
            height: 80px;
            background-image: url("../assets/img/icon/steps/item-1.jpg");
            background-repeat: no-repeat;
            background-size: contain;
            .xl-comb({ width: 60px; height: 60px; margin-bottom: 20px;});
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

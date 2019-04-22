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
        <div class="steps-num"><span>Шаг </span><span class="red">1 из {{steps.length}}</span></div>
        <div class="steps-content">
          <div class="btn-wrapper">
            <button @click="preventStepsClick">prev</button>
            <span>Текущий индекс {{activeSteps}}</span>
          </div>
          <form @submit.prevent="onSubmit" class="step">
            <h3 class="steps-caption">{{activeQuestion.stepCaption}}</h3>
            <div class="variant-wrapper">
              <div class="item-wrapper">

                <div class="item" v-for="(item, index) in activeQuestion.variant"
                       :key="index"
                       :class="activeQuestion.variant.includes(item.id) ? 'check' : ''" @click="clickVariant(index)">
                  {{item}}
                  <div class="content">
                    <div class="img" :style="{backgroundImage: `url(${getImgUrl(item.img)})`}"></div>
                    <p class="name-project">{{item.name}}</p>
                  </div>
                </div>

              </div>

              <button class="item-btn" type="submit">
                <div class="btn-next">
                  <div class="img"></div>
                  <span>Далее</span>
                </div>

              </button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'price-block',
    data() {
      return {
        price: 0,
        activeSteps: 0,
        steps: [1],
        arrVariants: [
          {
            name: 'Сайт / Сервер',
            id: 'site',
            img: 'item-1-0.png',
            child: ['landing', 'online-store', 'high-services', 'bots-api']
          },
          {
            name: 'Лэндинг',
            id: 'landing',
            img: 'item-1-0.png',
            price: 40000
          },
          {
            name: 'Интернет магазин',
            id: 'online-store',
            img: 'item-1-1.png',
            price: 300000
          },
          {
            name: 'Высоконагруженный сервис',
            id: 'high-services',
            img: 'item-1-2.png',
            price: 1000000
          },
          {
            name: 'Автоматизация / Боты / API',
            id: 'bots-api',
            img: 'item-1-3.png',
            price: 200000
          },
          {
            name: 'Мобильная разработка',
            id: 'mobile',
            img: 'item-1-1.png',
            child: ['native-app', 'crossplatform-app', '2d-game', '3d-game']
          },
          {
            name: 'Нативное приложение',
            id: 'native-app',
            img: 'item-1-0.png',
            child: ['ios-price', 'android-price']
          },
          {
            name: 'IOS',
            id: 'ios-price',
            img: 'item-1-2.png',
            price: 400000,
          },
          {
            name: 'Android',
            id: 'android-price',
            img: 'item-1-2.png',
            price: 400000,
          },
          {
            name: 'Кроссплатформенное приложение',
            id: 'crossplatform-app',
            img: 'item-1-2.png',
            price: 200000,
            child: ['ios', 'android']
          },
          {
            name: '2D Игра',
            id: '2d-game',
            img: 'item-1-2.png',
            price: 400000,
            child: ['ios', 'android']
          },
          {
            name: '3D Игра',
            id: '3d-game',
            img: 'item-1-2.png',
            price: 1500000,
            child: ['ios', 'android']
          },
          {
            name: 'IOS',
            id: 'ios',
            img: 'item-1-2.png',
            //если выбрано 'crossplatform-app' / '2d-game' / '3d-game'
            //price: 'crossplatform-app' / '2d-game' / '3d-game'

            //если выбран 'android'
            //price: 'crossplatform-app' / '2d-game' / '3d-game' * 1.5
          },
          {
            name: 'Android',
            id: 'android',
            img: 'item-1-2.png',
            price: 1500000,
            //если отмечено 'crossplatform-app' / '2d-game' / '3d-game'
            //price: 'crossplatform-app' / '2d-game' / '3d-game'

            //если выбран 'ios'
            //price: 'crossplatform-app' / '2d-game' / '3d-game' * 1.5
          },
          {
            name: 'Реклама / Продвижение',
            id: 'advertising',
            img: 'item-1-3.png',
            child: ['seo-analytics', 'context-advertising', 'social-advertising']
          },
          {
            name: 'Сео и Аналитика',
            id: 'seo-analytics',
            img: 'item-1-3.png',
            price: 50000
          },
          {
            name: 'Контекстная реклама и ремаркетинг',
            id: 'context-advertising',
            img: 'item-1-3.png',
            price: 25000
          },
          {
            name: 'Реклама в соцсетях / продвижение',
            id: 'social-advertising',
            img: 'item-1-3.png',
            price: 15000
          },
          {
            name: 'Другое',
            id: 'other-1',
            img: 'item-1-3.png',
            child: ['branding', 'crypto-wallet', 'design-not-development', 'nothing']
          },
          {
            name: 'Брендинг',
            id: 'branding',
            img: 'item-1-3.png',
            price: 30000
          },
          {
            name: 'Криптовалюты',
            id: 'crypto-wallet',
            img: 'item-1-3.png',
            children: ['crypto-fork', 'blockchain', 'ico']
          },
          {
            name: 'Криптовалюты на базе сторонней разработки / Форк',
            id: 'crypto-fork',
            img: 'item-1-3.png',
            price: 400000
          },
          {
            name: 'Свой блокчейн',
            id: 'blockchain',
            img: 'item-1-3.png',
            price: 3000000
          },
          {
            name: 'ICO',
            id: 'ico',
            img: 'item-1-3.png',
            price: 500000
          },
          {
            name: 'Дизайн без разработки',
            id: 'design-not-development',
            img: 'item-1-3.png',
            children: ['design-site', 'design-presentation', 'design-app', 'other-2']
          },
          {
            name: 'Дизайн сайта',
            id: 'design-site',
            img: 'item-1-3.png',
            price: 15000
          },
          {
            name: 'Дизайн презентации / документа',
            id: 'design-presentation',
            img: 'item-1-3.png',
            price: 10000
          },
          {
            name: 'Дизайн приложения',
            id: 'design-app',
            img: 'item-1-3.png',
            price: 20000
          },
          {
            name: 'Другое',
            id: 'other-2',
            img: 'item-1-3.png',
            price: 10000
          },
          {
            name: 'Ничего из этого',
            id: 'nothing',
            img: 'item-1-3.png',
          },
        ],
        questions: [
          {
            id: 1,
            stepCaption: 'Выберите необходимые вам продукты',
            variant: [
              {
                name: 'Сайт / Сервер',
                img: 'item-1-0.png',
                addQuestion: 1,
                val: 'site'
              },
              {
                name: 'Мобильная разработка',
                img: 'item-1-1.png',
                addQuestion: 2,
                val: 'mobile',
              },
              {
                name: 'Реклама и продвижение',
                img: 'item-1-2.png',
                addQuestion: 1,
                val: 'advertising',
              },
              {
                name: 'Другое',
                img: 'item-1-3.png',
                addQuestion: 1,
                val: 'other',
              }
            ]
          },
          {
            id: 2,
            stepCaption: 'Какие еще продукты вас интересуют',
            variant: [
              {
                name: 'Брендинг',
                img: 'item-2-0.png',
                val: 'brand'
              },
              {
                name: 'Криптовалюты',
                img: 'item-2-1.png',
                addQuestion: 1,
                val: 'crypto'
              },
              {
                name: 'Дизайн без разработки',
                img: 'item-2-2.png',
                addQuestion: 1,
                val: 'design'
              },
              {
                name: 'Ничего из этого',
                img: 'item-2-3.png',
                val: 'other-1'
              }
            ]
          },
          {
            id: 3,
            stepCaption: 'Уточните продукт категории Сайт / Сервер',
            variant: [
              {
                name: 'Лэндинг',
                img: 'item-2-0.png',
                val: 'landing'
              },
              {
                name: 'Интернет магазин',
                img: 'item-2-1.png',
                val: 'online-store'
              },
              {
                name: 'Высоконагруженный сервис',
                img: 'item-2-2.png',
                val: 'high-services'
              },
              {
                name: 'Автоматизация / Боты / API',
                img: 'item-2-3.png',
                val: 'bots-api'
              }
            ]
          },
          {
            id: 4,
            stepCaption: 'Какое мобильно приложение вам необъодимо',
            variant: [
              {
                name: 'Нативное приложение',
                img: 'item-2-0.png',
                addQuestion: 1,
                val: 'native-app'
              },
              {
                name: 'Кросплатформенное приложение',
                img: 'item-2-1.png',
                addQuestion: 1,
                val: 'crossplatform-app'
              },
              {
                name: '2D Игра',
                img: 'item-2-2.png',
                addQuestion: 1,
                val: '2d-game'
              },
              {
                name: '3D игра',
                img: 'item-2-3.png',
                addQuestion: 1,
                val: '3d-game'
              }
            ]
          },
          {
            id: 5,
            stepCaption: 'На какой платформе нажно приложение / Игра',
            variant: [
              {
                name: 'iOS',
                img: 'item-2-0.png',
                val: 'ios'
              },
              {
                name: 'Android',
                img: 'item-2-1.png',
                val: 'android'
              },
            ]
          },
          {
            id: 6,
            stepCaption: 'На какой платформе нажно приложение / Игра',
            variant: [
              {
                name: 'iOS',
                img: 'item-2-0.png',
                val: 'ios'
              },
              {
                name: 'Android',
                img: 'item-2-1.png',
                val: 'android'
              },
            ]
          },
          {
            id: 7,
            stepCaption: 'Что из рекламы вам потребуется',
            variant: [
              {
                name: 'Сео и аналитика',
                img: 'item-2-0.png',
                val: 'seo-analytics'
              },
              {
                name: 'Контекстная реклама и ремаркетинг',
                img: 'item-2-1.png',
                val: 'context-advertising'
              },
              {
                name: 'Реклама в соцсетях / продвижение',
                img: 'item-2-1.png',
                val: 'social-advertising'
              },
            ]
          },
          {
            id: 8,
            stepCaption: 'Какие услуги в криптосфере вас интересуют',
            variant: [
              {
                name: 'Криптовалюта на базе сторонней разработки / форк',
                img: 'item-2-0.png',
                val: 'crypto-fork'
              },
              {
                name: 'Свой блокчейн',
                img: 'item-2-1.png',
                val: 'blockchain'
              },
              {
                name: 'ICO',
                img: 'item-2-1.png',
                val: 'ico'
              },
            ]
          },
          {
            id: 9,
            stepCaption: 'Выберите продукт для дизайна',
            variant: [
              {
                name: 'Дизайн сайта',
                img: 'item-2-0.png',
                val: 'design-site'
              },
              {
                name: 'Дизайн презентации / документа',
                img: 'item-2-0.png',
                val: 'design-presentation'
              },
              {
                name: 'Дизайн приложения',
                img: 'item-2-0.png',
                val: 'design-app'
              },
              {
                name: 'Другое',
                val: 'other-2'
              },
            ]
          },
        ]
      }
    },
    computed: {
      activeQuestion() {
        let id = this.steps[this.activeSteps]
        return this.questions.filter(i => i.id === id)[0]
      }
    },
    methods: {
      preventStepsClick() {
        this.activeSteps--
      },
      getImgUrl(src) {
        const image = require(`../../src/assets/img/icon/steps/${src}`)
        return image;
      },
      onSubmit() {
        this.activeSteps++
      },
      getVariants(variants) {
        let result = []
        this.arrVariants.forEach(variant => {
          if (variants.includes(variant.id)) {
            result.push(variant)
          }
        })
        return result
      },
      clickVariant(indexVarinat) {
        this.steps.push(this.activeQuestion.variant[indexVarinat].addQuestion)
      }
    },
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
      .xs-comb({ margin-bottom: 5px; });
      .text-wrapper {
        display: flex;
        flex-direction: column;
        .small {
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.3rem;
          text-transform: uppercase;
          .xl-comb({ font-size: 3rem; letter-spacing: 1rem; });
          .sm-block({ font-size: 3rem; letter-spacing: 1rem; });
          .xs-block({ font-size: 2.4rem; letter-spacing: 0.75rem; });
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
      .xl-comb({ height: 400px; padding-top: 40px; });
      .md-block({ height: 400px; padding-top: 40px; });
      .md-comb({ height: 330px; padding-top: 30px; });
      .sm-block({ height: 330px; padding-top: 30px; });
      .xs-block({ height: 300px; padding-top: 30px; });
      .xs-comb({ padding-top: 20px; });
      .steps-num {
        margin-bottom: 20px;
        padding-left: 80px;
        padding-right: 80px;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.5rem;
        letter-spacing: 0.4rem;
        color: #000;
        text-transform: uppercase;
        .xl-comb({ margin-bottom: 15px; });
        .md-block({ margin-bottom: 15px; padding-left: 60px; padding-right: 60px; });
        .xs-block({ margin-bottom: 10px; padding-left: 30px; padding-right: 30px; });
        .red {
          color: red;
        }
      }
      .steps-content {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        .btn-wrapper {
          margin-bottom: 40px;
          margin-left: 80px;
          button {
            text-transform: uppercase;
            font-size: 2rem;
            &:first-child {
              margin-right: 30px;
            }
          }
          span {
            margin-left: 40px;
            color: black;
            font-size: 2rem;
          }
        }
        .step {
          display: flex;
          flex-direction: column;
          flex-grow: 1;
          .steps-caption {
            margin-bottom: 40px;
            padding-left: 80px;
            padding-right: 80px;
            font-family: @fontBebas;
            font-weight: bold;
            font-size: 4.5rem;
            letter-spacing: 1.3rem;
            color: #000;
            text-transform: uppercase;
            .xl-comb({ margin-bottom: 60px; font-size: 3rem; letter-spacing: 1rem; });
            .md-block({ margin-bottom: 60px; padding-left: 60px; padding-right: 60px; });
            .md-comb({ margin-bottom: 30px; });
            .sm-block({ margin-bottom: 40px; font-size: 3rem; letter-spacing: 0.8rem; });
            .xs-block({ font-size: 2.2rem; letter-spacing: 0.65rem; margin-bottom: 15px; padding-left: 30px; padding-right: 30px; });
          }
          .variant-wrapper {
            display: flex;
            justify-content: space-between;
            flex-grow: 1;
            .item-wrapper {
              .row-flex();
              z-index: 0;
              flex-grow: 1;
              .md-block({ grid-template-columns: 1fr 1fr; grid-gap: 20px 20px; padding-bottom: 20px; padding-right: 40px; });
              .md-comb({ padding-bottom: 10px; grid-gap: 10px 10px; padding-right: 20px; });
              .sm-block({ grid-template-columns: 1fr; grid-gap: 15px 0; padding-bottom: 15px; padding-right: 0; });
              .xs-block({ grid-gap: 10px 0; padding-bottom: 10px; });
              .item {
                .col-padding();
                .size(2.4);
                position: relative;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                min-width: 50px;
                &::after {
                  position: absolute;
                  content: '';
                  top: 0;
                  bottom: 0;
                  right: 0;
                  left: 0;
                  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                  transition: box-shadow 0.3s;
                  z-index: -1;
                }
                &:hover {
                  background: #fff;
                  cursor: pointer;
                  &::after {
                    box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.1);
                  }
                }
                &.check {
                  background: #fff;
                  &::after {
                    box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.1);
                  }
                }
                .hidden-input {
                  display: none;
                }
                .content {
                  display: flex;
                  position: relative;
                  padding-top: 50px;
                  padding-left: 50px;
                  padding-right: 30px;
                  flex-grow: 1;
                  flex-direction: column;
                  align-items: flex-start;
                  .lg-block({ padding-right: 0; });
                  .md-block({ padding-left: 60px; flex-direction: row; align-items: center; });
                  .xs-block({ padding-left: 30px; });
                  .img {
                    margin-bottom: 25px;
                    width: 85px;
                    height: 85px;
                    background-repeat: no-repeat;
                    background-size: contain;
                    .xl-comb({ width: 60px; height: 60px; margin-bottom: 20px; });
                    .md-block({ margin-bottom: 0; margin-right: 30px; width: 50px; height: 50px; });
                    .sm-block({ width: 35px; height: 35px; });
                    .xs-block({ width: 30px; height: 30px; });
                  }
                  .name-project {
                    font-size: 2rem;
                    font-weight: 300;
                    color: @colorSecFonts;
                  }
                }
              }
            }
            .item-btn {
              .col-padding();
              .size(2.4);
              position: relative;
              display: flex;
              width: 230px;

              background: #f8f5f5;
              cursor: pointer;
              transition: 0.3s;
              box-sizing: border-box;
              .btn-next {
                display: flex;
                padding: 50px 20px 20px 50px;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                .img {
                  margin-bottom: 40px;
                  width: 60px;
                  height: 60px;
                  background: url("../assets/img/icon/arrow-calc.png") no-repeat center / contain;
                }
                span {
                  font-family: @fontBebas;
                  font-weight: bold;
                  font-size: 2.4rem;
                  letter-spacing: 0.2rem;
                  text-transform: uppercase;
                  color: #000;
                }
              }
            }
          }
        }
      }
    }
  }
</style>

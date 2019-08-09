<template>
  <section class="s-price fullpage-section">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper">
          <div class="g-caption-block">
            <h2 class="visually-hidden">Расчет стоимости проекта</h2>
            <div class="wrapper-baseline">
              <h2 class="g-caption">Рассчитайте</h2>
              <span class="underscore"></span>
            </div>
            <p class="text-wrapper">
              <span class="small">стоимость вашего проекта</span>
            </p>
          </div>
        </div>
        <div class="steps-wrapper">
          <result-form v-if="showResult" :answers="answers" v-on:go-back-step="preventStepsClick" :steps="steps"
                       :activeSteps="activeSteps" :questions="questions"/>
          <div class="steps" v-if="!showResult">
            <div class="steps-num">
              <span class="arrow" @click="preventStepsClick" v-if="this.activeSteps > 0"></span>
              <span>Шаг </span>
              <span class="red">{{activeSteps + 1}} из <span v-if="steps.length !== 1">{{steps.length + 1}}</span><span v-if="steps.length === 1">3</span></span>
            </div>
            <div class="steps-content">
              <div class="step">
                <h3 class="steps-caption">{{activeQuestion.stepCaption}}</h3>
                <div class="variant-wrapper">
                  <div class="item-wrapper">

                    <div class="item" v-for="(item, index) in activeQuestion.variant"
                         :key="index"
                         :class="answers.findIndex(i=>i.val === item.val) === -1 ? '' : 'check'"
                         @click="clickVariant(item, activeQuestion.type)">
                      <div class="content">
                        <div class="img" :style="{backgroundImage: `url(${getImgUrl(item.img)})`}"></div>
                        <p class="name-project">{{item.name}}</p>
                      </div>
                    </div>

                  </div>

                  <div class="item-btn" @click="submitButton" :class="activeNextBtn ? 'active' : 'disabled'">
                    <div class="btn-next">
                      <div class="img">
                        <img svg-inline src="../assets/img/icon/arrow-right-calc.svg" alt="">
                      </div>

                      <span>Далее</span>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import ResultForm from './components-children/PriceBlockCalcResult'

  export default {
    name: 'price-block',
    data() {
      return {
        price: 11,
        activeSteps: 0,
        answers: [],
        questions: [
          {
            id: 1,
            stepCaption: 'Выберите необходимые вам продукты',
            type: 'checkbox',
            variant: [
              {
                name: 'Сайт / Сервер',
                img: 'item-1-0.png',
                addQuestion: 3,
                val: 'site',
                idQuestions: 1
              },
              {
                name: 'Мобильная разработка',
                img: 'item-1-1.png',
                addQuestion: 4,
                val: 'mobile',
                idQuestions: 1
              },
              {
                name: 'Реклама и продвижение',
                img: 'item-1-2.png',
                addQuestion: 7,
                val: 'advertising',
                idQuestions: 1
              },
              {
                name: 'Ничего из этого',
                img: 'item-1-3.png',
                addQuestion: 2,
                activeClass: false,
                val: 'other',
                idQuestions: 1
              }
            ]
          },
          {
            id: 2,
            stepCaption: 'Какие еще продукты вас интересуют',
            type: 'checkbox',
            variant: [
              {
                name: 'Брендинг',
                img: 'item-2-0.png',
                val: 'brand',
                price: 30000,
                idQuestions: 2
              },
              {
                name: 'Криптовалюты',
                img: 'item-2-1.png',
                addQuestion: 8,
                val: 'crypto',
                idQuestions: 2
              },
              {
                name: 'Дизайн без разработки',
                img: 'item-2-2.png',
                addQuestion: 9,
                val: 'design',
                idQuestions: 2
              },
              {
                name: 'Ничего из этого',
                img: 'item-2-3.png',
                val: 'other-1',
                idQuestions: 2
              }
            ]
          },
          {
            id: 3,
            stepCaption: 'Уточните продукт категории Сайт / Сервер',
            type: 'radio',
            variant: [
              {
                name: 'Лэндинг',
                img: 'item-3-0.png',
                val: 'landing',
                price: 40000,
                idQuestions: 3
              },
              {
                name: 'Интернет магазин',
                img: 'item-3-1.png',
                val: 'online-store',
                price: 300000,
                idQuestions: 3
              },
              {
                name: 'Сервис с высокой нагрузкой',
                img: 'item-3-2.png',
                val: 'high-services',
                price: 1000000,
                idQuestions: 3
              },
              {
                name: 'Автоматизация / Боты / API',
                img: 'item-3-3.png',
                val: 'bots-api',
                price: 200000,
                idQuestions: 3
              }
            ]
          },
          {
            id: 4,
            stepCaption: 'Какое мобильное приложение вам необходимо',
            type: 'radio',
            variant: [
              {
                name: 'Нативное приложение',
                img: 'item-4-0.png',
                addQuestion: 5,
                val: 'native-app',
                idQuestions: 4
              },
              {
                name: 'Кросплатформенное приложение',
                img: 'item-4-1.png',
                addQuestion: 6,
                val: 'crossplatform-app',
                price: 200000,
                idQuestions: 4
              },
              {
                name: '2D Игра',
                img: 'item-4-2.png',
                addQuestion: 6,
                val: '2d-game',
                price: 400000,
                idQuestions: 4
              },
              {
                name: '3D игра',
                img: 'item-4-3.png',
                addQuestion: 6,
                val: '3d-game',
                price: 1500000,
                idQuestions: 4
              }
            ]
          },
          {
            id: 5,
            stepCaption: 'На какой платформе нужно приложение / Игра',
            type: 'checkbox',
            variant: [
              {
                name: 'iOS',
                img: 'item-6-0.png',
                val: 'ios-fix',
                price: 400000,
                idQuestions: 5
              },
              {
                name: 'Android',
                img: 'item-6-1.png',
                val: 'android-fix',
                price: 400000,
                idQuestions: 5
              },
            ]
          },
          {
            id: 6,
            stepCaption: 'На какой платформе нужно приложение / Игра',
            type: 'checkbox',
            variant: [
              {
                name: 'iOS',
                img: 'item-6-0.png',
                val: 'ios',
                idQuestions: 6
              },
              {
                name: 'Android',
                img: 'item-6-1.png',
                val: 'android',
                idQuestions: 6
              },
            ]
          },
          {
            id: 7,
            stepCaption: 'Что из рекламы вам потребуется',
            type: 'checkbox',
            variant: [
              {
                name: 'Сео и аналитика',
                img: 'item-5-0.png',
                val: 'seo-analytics',
                price: 50000,
                idQuestions: 7
              },
              {
                name: 'Контекстная реклама и ремаркетинг',
                img: 'item-5-1.png',
                val: 'context-advertising',
                price: 25000,
                idQuestions: 7
              },
              {
                name: 'Реклама в соцсетях / продвижение',
                img: 'item-5-2.png',
                val: 'social-advertising',
                price: 15000,
                idQuestions: 7
              },
            ]
          },
          {
            id: 8,
            stepCaption: 'Какие услуги в криптосфере вас интересуют',
            type: 'checkbox',
            variant: [
              {
                name: 'Криптовалюта на базе сторонней разработки / форк',
                img: 'item-7-0.png',
                val: 'crypto-fork',
                price: 400000,
                idQuestions: 8
              },
              {
                name: 'Свой блокчейн',
                img: 'item-7-1.png',
                val: 'blockchain',
                price: 3000000,
                idQuestions: 8
              },
              {
                name: 'ICO',
                img: 'item-7-2.png',
                val: 'ico',
                price: 500000,
                idQuestions: 8
              },
            ]
          },
          {
            id: 9,
            stepCaption: 'Выберите продукт для дизайна',
            type: 'checkbox',
            variant: [
              {
                name: 'Дизайн сайта',
                img: 'item-8-0.png',
                val: 'design-site',
                price: 15000,
                idQuestions: 9
              },
              {
                name: 'Дизайн презентации / документа',
                img: 'item-8-1.png',
                val: 'design-presentation',
                price: 10000,
                idQuestions: 9
              },
              {
                name: 'Дизайн приложения',
                img: 'item-8-2.png',
                val: 'design-app',
                price: 20000,
                idQuestions: 9
              },
              {
                name: 'Другое',
                img: 'item-8-3.png',
                val: 'other-2',
                price: 10000,
                idQuestions: 9
              },
            ]
          },
        ],
      }
    },
    components: {
      ResultForm
    },
    computed: {
      activeQuestion () {
        let id = this.steps[this.activeSteps]
        return this.questions.filter((i) => {
          if (i.id === id) {
            return true
          }
        })[0]
      },
      steps () {
        let res = [1, 2]
        this.answers.forEach((item, i) => {
          if (item.addQuestion !== undefined) {
            switch (item.addQuestion) {
              case 4:
                res.splice(-1, 0, item.addQuestion, null)
                break;
              case 6:
              case 5:
                let indexMobile = res.findIndex(item => {
                  if (item === 4) {
                    return true
                  }
                })
                res.splice(indexMobile + 1, 1, item.addQuestion)
                break;
              case 2:
                res.splice(-1, 1, item.addQuestion);
                break;
              case 9:
              case 8:
                res.push(item.addQuestion);
                break;
              default:
                res.splice(-1, 0, item.addQuestion)
            }
          }
        })
        return res
      },
      showResult () {
        // return true
        return this.activeSteps >= this.steps.length
      },
      activeNextBtn () {
        let res = false;
        this.answers.forEach((a) => {
          this.activeQuestion.variant.forEach(v => {
            if (a.val === v.val) {
              if (a.activeClass === false) {
                res = false
              } else {
                res = true
              }
            }
          })
        })
        return res
      }
    },
    methods: {
      submitButton () {
        if (this.answers.length > 0) {
          this.activeSteps++
        }
      },
      preventStepsClick () {
        if (this.activeSteps > 0) {
          this.activeSteps--
        }
      },
      getImgUrl (src) {
        const image = require(`../../src/assets/img/icon/steps/${src}`)
        return image
      },
      removeAnswer (index) {
        let removeAnswer = this.answers[index]
        if (removeAnswer.addQuestion !== undefined) {
          let findIndexQuestion = this.questions.findIndex((q) => q.id === removeAnswer.addQuestion)
          if (findIndexQuestion !== -1) {
            this.questions[findIndexQuestion].variant.forEach(v => {
              this.answers.forEach((a, ia) => {
                if (a.val === v.val) {
                  this.removeAnswer(ia)
                }
              })
            })
          }
        }
        this.answers.splice(index, 1)
      },
      clickVariant (variant, type) {
        let index = this.answers.findIndex(item => {
          if (item.val === variant.val) {
            return true
          }
        })
        if (index === -1) {
          if (type === 'radio') {
            this.answers.forEach((a, ia) => {
              this.activeQuestion.variant.forEach(v => {
                if (a.val === v.val) {
                  this.removeAnswer(ia)
                }
              })
            })
          } else {
            if (this.activeQuestion.id === 2) {
              let delVariant = ['brand', 'crypto', 'design']
              if (variant.val === 'other-1') {
                this.answers = this.answers.filter(e => delVariant.indexOf(e.val) === -1)
              } else {
                let oi = this.answers.findIndex(i => i.val === 'other-1')
                if (oi !== -1) {
                  this.removeAnswer(oi)
                }
              }
            } else if (this.activeQuestion.id === 1) {
              let delVariant = ['site', 'mobile', 'advertising']
              if (variant.val === 'other') {
                this.answers = this.answers.filter(e => delVariant.indexOf(e.val) === -1)
              } else {
                let oi = this.answers.findIndex(i => i.val === 'other')
                if (oi !== -1) {
                  this.removeAnswer(oi)
                }
              }
            }
          }
          this.answers.push(variant)
        } else if (variant.val === 'other') {
          this.answers[index] = variant
          if (this.answers[index].activeClass) {
            this.answers[index].activeClass = false
          } else {
            this.answers[index].activeClass = true
          }
        } else {
          this.removeAnswer(index)
        }
      },
      checkClass(item) {
        let active = this.answers.findIndex(i => {
          if (i.val === item.val) {
            if(i.activeClass !== undefined && i.activeClass === false) {
              return false
            } else  {
              return i
            }
          } else {
            return false
          }
        })
        if (active === -1) {
          return false
        } else  {
          return true
        }
      }
    },
    created() {
      this.questions.forEach(item => {
        if(item.id === 1) {
          this.answers.push(item.variant[3])
        }
      })
    }
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";

  .s-price {
    background: radial-gradient(circle farthest-corner at top right, rgba(230, 74, 110, 1) 0%, rgba(0, 0, 0, 0) 60%),
    radial-gradient(circle farthest-corner at -10% 110%, rgba(232, 91, 124, 1) 5%, rgba(0, 0, 0, 0) 40%) #d94950;
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
          .md-block({ font-size: 3rem; letter-spacing: 1rem; });
          .sm-block({ font-size: 3rem; letter-spacing: 1rem; });
          .xs-block({ font-size: 2.4rem; letter-spacing: 0.75rem; });
        }
      }
    }
    .steps-wrapper {
      flex-basis: 100%;
      max-height: 560px;
      .steps {
        display: flex;
        padding-top: 45px;
        height: 100%;
        flex-direction: column;
        background: #fff;
        overflow: hidden;
        box-sizing: border-box;
        .md-block({ padding-top: 40px; });
        .sm-block({ padding-top: 30px; });
      }
      .steps-num {
        margin-bottom: 20px;
        padding-left: 50px;
        padding-right: 80px;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.5rem;
        letter-spacing: 0.4rem;
        color: #000;
        text-transform: uppercase;
        .md-block({ margin-bottom: 15px; padding-left: 40px; padding-right: 20px; });
        .sm-block({ margin-bottom: 10px; padding-left: 30px; });
        .xs-block({ padding-left: 25px;});
        .arrow {
          display: inline-block;
          transform: rotate(45deg);
          margin-right: 10px;
          width: 12px;
          height: 12px;
          border-left: 3px solid #dd4858;
          border-bottom: 3px solid #dd4858;
          cursor: pointer;
          .sm-block({ width: 10px; height: 10px;});
        }
        .red {
          color: #dd4858;
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
          .sm-block({ height: 100%;});
          .steps-caption {
            margin-bottom: 40px;
            padding-left: 50px;
            padding-right: 80px;
            font-family: @fontBebas;
            font-weight: bold;
            font-size: 4.5rem;
            letter-spacing: 1.3rem;
            color: #000;
            text-transform: uppercase;
            .md-block({ margin-bottom: 40px; font-size: 3rem; letter-spacing: 1rem; padding-left: 40px; padding-right: 20px; });
            .sm-block({ margin-bottom: 20px; font-size: 2.5rem; letter-spacing: 0.5rem; padding-left: 30px; padding-right: 20px; });
            .xs-block({ font-size: 2.2rem; letter-spacing: 0.65rem; margin-bottom: 15px; padding-left: 30px; padding-right: 30px; });
            .xs-block({ padding-left: 25px; padding-right: 15px;});
          }
          .variant-wrapper {
            display: flex;
            margin-top: auto;
            justify-content: space-between;
            flex-grow: 1;
            max-height: 305px;
            .item-wrapper {
              display: grid;
              grid-template-columns: repeat(4, minmax(100px, 1fr));
              z-index: 0;
              flex-grow: 1;
              .md-block({ grid-template-columns: minmax(100px, 1fr) minmax(100px, 1fr); height: 100%; });
              .sm-block({ display: flex; flex-direction: column; grid-template-columns: auto; height: 100%;});
              .item {
                position: relative;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                min-width: 50px;
                .sm-block({max-height: 25%; height: 76px;});
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
                .content {
                  display: flex;
                  position: relative;
                  padding-top: 50px;
                  padding-left: 50px;
                  padding-right: 30px;
                  flex-grow: 1;
                  flex-direction: column;
                  align-items: flex-start;
                  .md-block({ padding-top: 25px; padding-left: 40px; padding-right: 25px;});
                  .sm-block({ padding-left: 20px; padding-top: 0; flex-direction: row; align-items: center; });
                  .xs-block({ padding: 0 15px;});
                  .img {
                    margin-bottom: 25px;
                    width: 85px;
                    height: 85px;
                    background-repeat: no-repeat;
                    background-size: contain;
                    .md-block({ width: 45px; height: 45px; });
                    .sm-block({ width: 35px; height: 35px; margin-bottom: 0; margin-right: 10px; });
                    .xs-block({ width: 25px; height: 25px;});
                  }
                  .name-project {
                    font-size: 2rem;
                    font-weight: 300;
                    color: @colorSecFonts;
                    .xs-block({ font-size: 1.6rem;});
                  }
                }
              }
            }
            .item-btn {
              width: 20%;
              position: relative;
              display: flex;
              flex-shrink: 0;
              justify-content: center;
              background: #f8f5f5;
              cursor: pointer;
              transition: 0.3s;
              box-sizing: border-box;
              .sm-block({ width: 30%;});
              &.active {
                &:active,
                &:focus,
                &:hover {
                  .btn-next {
                    .img {
                      border: 2px solid #dd4858;
                      svg {
                        path {
                          fill: #dd4858;
                        }
                      }
                    }
                  }
                }
              }
              &.disabled {
                pointer-events: none;
              }
              .btn-next {
                display: flex;
                padding-top: 50px;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                .img {
                  margin-bottom: 50px;
                  width: 60px;
                  height: 60px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  flex-shrink: 0;
                  border: 2px solid @colorBorder;
                  border-radius: 50%;
                  transition: 0.3s;
                  .md-block({ width: 45px; height: 45px; });
                  svg {
                    width: 25px;
                    height: 25px;
                    path {
                      fill: @colorBorder;
                      transition: 0.3s;
                    }
                  }
                }
                span {
                  margin-left: 3px;
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

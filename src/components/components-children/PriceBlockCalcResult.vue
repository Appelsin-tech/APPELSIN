<template>
  <form class="result-form" @submit.prevent="onSubmit">
    <div class="col col--price">
      <div class="price-wrapper">
        <div class="steps-num">
          <span class="arrow" @click="$emit('go-back-step')"></span>
          <span>Шаг </span>
          <span class="red">{{activeSteps + 1}} из {{steps.length + 1}}</span>
        </div>
        <p class="description">Средняя стоимость такого заказа у нас</p>
        <p class="price-num"><strong class="price">{{price}}</strong> <span class="currency">руб.</span></p>
        <!--<div class="ans">{{answers}}</div>-->
        <a class="file-link" href="#">
          <span class="file-text--big">Прикрепить файл</span>
          <span class="file-text--small">(до 5 Мб)</span>
        </a>
      </div>
      <button class="btn-desktop" type="submit">Заказать проект</button>
    </div>
    <div class="col col--input">
      <div class="input-wrapper">
        <div class="item">
          <input type="text" placeholder="Имя" v-model="form.name">
        </div>
        <div class="item">
          <input type="tel" placeholder="Телефон" v-model="form.tel">
        </div>
        <div class="item">
          <input type="email" placeholder="E-mail" v-model="form.email">
        </div>
        <div class="item textarea">
          <textarea v-model="form.message" placeholder="Текст сообщения"></textarea>
        </div>
      </div>
      <div class="checkbox-wrapper">
        <input type="checkbox" id="checkPerson" v-model="form.checkedPersonalData">
        <label class="label-person" for="checkPerson">
          <span>Я согласен на обработку </span>
          <a class="link-person" href="#">персональных данных</a>
        </label>
      </div>
    </div>
  </form>
</template>

<script>
  export default {
    name: "PriceBlockCalcResult",
    props: ['answers', 'steps', 'activeSteps'],
    data() {
      return {
        form: {
          name: '',
          tel: '',
          email: '',
          message: '',
          file: [],
          questions: '',
          checkedPersonalData: ''
        }
      }
    },
    methods: {
      onSubmit() {

      }
    },
    computed: {
      price() {
        let sum = 0;
        this.answers.forEach((item) => {
          if (item.price !== undefined) {
            sum += item.price
          }
          if (item.val === 'crossplatform-app' || item.val === '2d-game' || item.val === '3d-game') {
            let price = item.price
            let vars = this.answers.filter(a => {
              return a.val === 'ios' || a.val === 'android'
            })
            if (vars.length > 1) {
              sum += price * 0.5
            }
          }
        })
        return sum
      },
      questionsName() {
        let nameQuestions = [];
        this.answers.forEach((item) => {
          nameQuestions.push(item.name)
        })
        return nameQuestions
      },
      iosAndroid() {
        this.answers.forEach((item) => {
          nameQuestions.push(item.name)
        })
      }
    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .result-form {
    display: flex;
    height: 100%;
    background: #fff;
    color: #000;
    .col {
      width: 50%;
      &--price {
        display: flex;
        flex-direction: column;
        font-family: @fontBebas;
        font-weight: bold;
        .price-wrapper {
          display: flex;
          flex-grow: 1;
          padding: 45px 50px 55px 50px;
          flex-direction: column;
          border-right: 1px solid @colorBorder;
          .md-block({padding: 40px;});
          .steps-num {
            margin-bottom: 20px;
            font-family: @fontBebas;
            font-weight: bold;
            font-size: 2.5rem;
            letter-spacing: 0.4rem;
            color: #000;
            text-transform: uppercase;
            .md-block({ margin-bottom: 15px; });
            .xs-block({ margin-bottom: 10px;});
            .arrow {
              display: inline-block;
              transform: rotate(45deg);
              margin-right: 10px;
              width: 12px;
              height: 12px;
              border-left: 3px solid #dd4858;
              border-bottom: 3px solid #dd4858;
              cursor: pointer;
            }
            .red {
              color: #dd4858;
            }
          }
          .description {
            margin-bottom: 40px;
            max-width: 400px;
            font-size: 3rem;
            line-height: 4rem;
            letter-spacing: 0.7rem;

          }
          .ans {
            font-size: 1.8rem;
          }
          .price-num {
            display: flex;
            align-items: baseline;
            .price {
              font-size: 7rem;
              font-weight: bold;
              line-height: 1;
              letter-spacing: 2rem;
              color: #db4954;
              .md-block({ font-size: 5.5rem; letter-spacing: 1.5rem;});
            }
            .currency {
              font-size: 3rem;
              letter-spacing: 0.7rem;
              .md-block({ font-size: 2.5rem; letter-spacing: 0.6rem;});
            }
          }
          .file-link {
            position: relative;
            margin-top: auto;
            padding-left: 60px;
            color: #000;
            .md-block({ padding-left: 45px;});
            &::after {
              position: absolute;
              content: '';
              left: 0;
              top: calc(~"50% - 21px");
              width: 42px;
              height: 42px;
              background: url("../../assets/img/icon/clip.png") no-repeat center / contain;
              .md-block({ width: 30px; height: 30px; top: calc(~"50% - 15px");});
            }
            .file-text--big {
              position: relative;
              margin-right: 20px;
              font-size: 2rem;
              letter-spacing: 0.5rem;
              &::after {
                position: absolute;
                content: '';
                bottom: -2px;
                left: 0;
                right: 4px;
                height: 2px;
                background-image: repeating-linear-gradient(90deg, transparent 2px 6px, #000 2px 10px);
              }
            }
            .file-text--small {
              font-family: @fontMain;
              font-weight: 200;
              font-size: 1.6rem;
            }
          }
        }
        .btn-desktop {
          height: 85px;
          display: flex;
          padding-left: 50px;
          align-items: center;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 2.4rem;
          letter-spacing: 0.6rem;
          color: #fff;
          background: #000;
          text-align: left;
          text-transform: uppercase;
          cursor: pointer;
          .md-block({ height: 60px; padding-left: 40px;});
        }
      }
      &--input {
        display: flex;
        flex-direction: column;
        .input-wrapper {
          display: flex;
          flex-grow: 1;
          flex-direction: column;
          .item {
            height: 85px;
            border-bottom: 1px solid @colorBorder;
            box-sizing: border-box;
            textarea,
            input {
              padding-left: 25px;
              padding-right: 15px;
              height: 100%;
              width: 100%;
              font-size: 2rem;
              box-sizing: border-box;
              border: none;
              &:focus,
              &:active {
                outline: none;
                background: #f8f5f5;
              }
              &::placeholder {
                font-family: @fontBebas;
                font-weight: bold;
                font-size: 2rem;
                letter-spacing: 0.5rem;
                color: #000;
                text-transform: uppercase;
              }
            }
            &.textarea {
              height: auto;
              flex-grow: 1;
              textarea {
                padding-top: 25px;
                resize: none;
              }
            }
          }
        }
        .checkbox-wrapper {
          display: flex;
          height: 85px;
          padding-left: 25px;
          padding-right: 15px;
          align-items: center;
          .md-block({ height: 60px; });
          input {
            display: none;
            &:checked + label::after {
              display: block;
            }
          }
          .label-person {
            position: relative;
            padding-left: 55px;
            font-size: 1.6rem;
            .md-block({padding-left: 40px;});
            &::before,
            &::after {
              position: absolute;
              content: '';
              left: 0;
            }
            &::before {
              top: -3px;
              width: 25px;
              height: 25px;
              background: #f8f5f5;
            }
            &::after {
              display: none;
              top: 0;
              left: 8px;
              transform: rotate(40deg);
              width: 6px;
              height: 12px;
              border-bottom: 2px solid #db4954;
              border-right: 2px solid #db4954;
            }
            span {
              color: @colorSecFonts;
            }
            .link-person {
              color: #db4954;
              border-bottom: 1px solid #db4954;
              transition: 0.3s;
              &:hover {
                border-bottom: 1px solid transparent;
              }
            }
          }
        }
      }
    }
  }
</style>

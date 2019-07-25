<template>
  <form class="result-form" @submit.prevent="onSubmit" :class="[{success: success}, {error: error.server}, {waiting: waiting}]">
    <div class="col col--price">
      <div class="price-wrapper">
        <div class="steps-num">
          <span class="arrow" @click="$emit('go-back-step')"></span>
          <span>Шаг </span>
          <span class="red">{{activeSteps + 1}} из {{steps.length + 1}}</span>
        </div>
        <p class="description">Средняя стоимость такого заказа у нас</p>
        <p class="price-num"><strong class="price">{{price}}</strong> <span class="currency">руб.</span></p>
        <!--<input type="file" name="file" id="file_price" v-on:change="handleFile" class="visually-hidden"/>-->
        <label class="file-link desktop" for="file_price">
          <span class="file-text--big">Прикрепить файл</span>
          <span class="file-text--small">(до 5 Мб)</span>
        </label>
      </div>
      <button class="btn-price btn--submit" type="submit">Заказать проект</button>
      <div class="btn-price btn--next-steps" @click="showForm = !showForm">Заказать проект</div>
    </div>
    <div class="col col--input" :class="{active : showForm}">
      <div class="input-wrapper">
        <div class="g-item-form" :class="{errorTooltip: error.name}">
          <input class="g-item-form__field" type="text" placeholder="Имя" v-model="form.name">
          <div class="error-tooltip">
            <span>Введите имя</span>
          </div>
        </div>
        <div class="g-item-form" :class="{errorTooltip: error.phone}">
          <input class="g-item-form__field" type="tel" placeholder="Телефон" v-model="form.phone">
          <div class="error-tooltip">
            <span>Введите телефон</span>
          </div>
        </div>
        <div class="g-item-form" :class="{errorTooltip: error.email}">
          <input class="g-item-form__field" type="email" placeholder="E-mail" v-model="form.email">
          <div class="error-tooltip">
            <span>Введите E-mail</span>
          </div>
        </div>
        <div class="g-item-form textarea" :class="{errorTooltip: error.message}">
          <textarea class="g-item-form__field" v-model="form.message" placeholder="Текст сообщения"></textarea>
          <div class="error-tooltip">
            <span>Введите текст сообщения</span>
          </div>
        </div>
        <label class="file-link mobile" for="file_price">
          <span class="file-text--big">Прикрепить файл</span>
          <span class="file-text--small">(до 5 Мб)</span>
        </label>
      </div>
      <div class="checkbox-wrapper" :class="{errorTooltip: error.checked}">
        <div class="error-tooltip error-tooltip--top">
          <span>Подтвердите согласие</span>
        </div>
        <input type="checkbox" id="checkPerson" v-model="form.checkedPersonalData">
        <label class="label-person" for="checkPerson">
          <span>Я согласен на обработку </span>
          <a class="link-person" href="#">персональных данных</a>
        </label>
      </div>
      <div class="btn-wrapper">
        <div class="btn-back" @click="showForm = !showForm">
          <img svg-inline src="../../assets/img/icon/arrow-slider.svg" alt="">
        </div>
        <button class="btn-price btn--mobile" type="submit">Отправить</button>
      </div>

    </div>
  </form>
</template>

<script>

  import axios from 'axios'

  export default {
    name: "PriceBlockCalcResult",
    props: ['answers', 'steps', 'activeSteps', 'questions'],
    data() {
      return {
        showForm: false,
        waiting: false,
        error: {
          name: false,
          phone: false,
          email: false,
          message: false,
          checked: false,
          server: false
        },
        errorName: '',
        success: false,
        form: {
          nameForm: 'calculate',
          name: '',
          phone: '',
          email: '',
          message: '',
          file: [],
          checkedPersonalData: false
        }
      }
    },
    methods: {
      onSubmit() {
        //validation

        if (this.form.name.length < 1) {
          this.hideError('name')
        } else if (this.form.phone.length < 4) {
          this.hideError('phone')
        } else if (this.form.email.length < 4) {
          this.hideError('email')
        } else if (this.form.message.length < 4) {
          this.hideError('message')
        } else if (!this.form.checkedPersonalData) {
          this.hideError('checked')
        } else {
          this.waiting = true;
          let formData = new FormData();
          formData.append('nameForm', this.form.nameForm);
          formData.append('name', this.form.name);
          formData.append('phone', this.form.phone);
          formData.append('email', this.form.email);
          formData.append('message', this.form.message);
          formData.append('questions', JSON.stringify(this.questionsName));
          formData.append('price', this.price);
          formData.append('file', this.form.file);
          formData.append('checked', this.form.checkedPersonalData);
          axios.post('/mail.php', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          })
            .then(response => {
              this.waiting = false;
              if (response.data.type === 'error') {
                if (response.data.server === 'server') {
                  this.errorName = response.data.server
                  this.error[this.errorName] = true
                }
                this.errorName = response.data.input_name
                this.error[this.errorName] = true
              } else {
                this.success = true
                this.error[this.errorName] = false
              }
            })
            .catch(response => {
              console.log(response)
            })
        }
      },
      hideError(name) {
        console.log(name, this.error[name])
        this.error[name] = true
        setTimeout(()=>{
          this.error[name] = false
        }, 2000)
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
        let itemArr = '';
        this.answers.forEach((variant) => {
          this.questions.forEach(step => {
            if (variant.idQuestions === step.id) {
              itemArr = 'Вопрос: ' + step.stepCaption + ';  ' + 'Ответ: ' + variant.name + ';'
              nameQuestions.push(itemArr)
            }
          })
        })
        return nameQuestions
      },
      iosAndroid() {
        this.answers.forEach((item) => {
          nameQuestions.push(item.name)
        })
      },
    }
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .result-form {
    display: flex;
    position: relative;
    height: 100%;
    background: #fff;
    color: #000;
    overflow: hidden;
    &.waiting {
      .col {
        .btn--submit,
        .btn--mobile {
          pointer-events: none;
          opacity: 0.7;
        }
      }
    }
    .col {
      width: 50%;
      .sm-block({ width: 100%; });
      &--price {
        display: flex;
        flex-direction: column;
        font-family: @fontBebas;
        font-weight: bold;
        z-index: 5;
        .price-wrapper {
          position: relative;
          display: flex;
          flex-grow: 1;
          padding: 45px 50px 55px 50px;
          flex-direction: column;
          border-right: 1px solid @colorBorder;
          .md-block({ padding: 40px; });
          .sm-block({ border: none; padding: 30px; });
          .steps-num {
            margin-bottom: 20px;
            font-family: @fontBebas;
            font-weight: bold;
            font-size: 2.5rem;
            letter-spacing: 0.4rem;
            color: #000;
            text-transform: uppercase;
            .md-block({ margin-bottom: 15px; });
            .xs-block({ margin-bottom: 10px; });
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
            .xs-block({ font-size: 2.4rem; letter-spacing: 0.5rem; line-height: 3rem; })
          }
          .ans {
            font-size: 1.8rem;
          }
          .price-num {
            display: flex;
            align-items: baseline;
            margin-bottom: auto;
            .price {
              font-size: 7rem;
              font-weight: bold;
              line-height: 1;
              letter-spacing: 2rem;
              color: #db4954;
              .md-block({ font-size: 5.5rem; letter-spacing: 1.5rem; });
              .xs-block({ font-size: 4rem; letter-spacing: 1.1rem; });
            }
            .currency {
              font-size: 3rem;
              letter-spacing: 0.7rem;
              .md-block({ font-size: 2.5rem; letter-spacing: 0.6rem; });
            }
          }
        }
      }
      &--input {
        display: flex;
        flex-direction: column;
        transition: 0.3s;
        background: #fff;
        .sm-block({ position: absolute; top: 100%; bottom: -100%; z-index: 9; });
        &.active {
          top: 0;
          bottom: 0;
          z-index: 9;
        }
        .input-wrapper {
          display: flex;
          flex-grow: 1;
          flex-direction: column;
        }
        .checkbox-wrapper {
          position: relative;
          display: flex;
          height: 85px;
          padding-left: 25px;
          padding-right: 15px;
          align-items: center;
          .md-block({ height: 70px; });
          .sm-block({ height: 50px; });
          &.errorTooltip {
            .error-tooltip {
              display: block;
            }
          }
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
            .md-block({ padding-left: 40px; });
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
        .error {
          display: none;
          position: absolute;
          bottom: -40px;
          right: 30px;
          border: 1px solid #D94950;
          border-radius: 4px;
          background: #D94950;
          z-index: 99;
          .sm-block({ bottom: -34px;});
          > span {
            position: relative;
            display: block;
            padding: 8px 12px;
            width: 100%;
            height: 100%;
            font-size: 2rem;
            color: #fff;
            font-weight: 400;
            box-sizing: border-box;
            .sm-block({ font-size: 1.6rem;});
            &::after {
              content: " ";
              position: absolute;
              top: -6px;
              right: 15px;
              width: 11px;
              height: 11px;
              background: #D94950;
              transform: rotate(-45deg);
              box-sizing: border-box;
            }
          }
          &--top {
            bottom: auto;
            top: -40px;
            .sm-block({ top: -34px;});
            >span {
              &::after {
                top: auto;
                bottom: -6px;
              }
            }
          }
        }
      }
      .file-link {
        position: relative;
        margin-top: auto;
        padding-left: 60px;
        font-family: @fontBebas;
        color: #000;
        .md-block({ padding-left: 45px; });
        .xs-block({ padding-left: 0; });
        &.desktop {
          .sm-block({ display: none; });
        }
        &.mobile {
          display: none;
          height: 50px;
          margin-left: 25px;
          align-items: center;
          .sm-block({ display: inline-flex; });
        }
        &::after {
          position: absolute;
          content: '';
          left: 0;
          top: calc(~"50% - 21px");
          width: 42px;
          height: 42px;
          background: url("../../assets/img/icon/clip.png") no-repeat center / contain;
          .md-block({ width: 30px; height: 30px; top: calc(~"50% - 15px"); });
          .xs-block({ display: none; });
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
      .btn-price {
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
        text-transform: uppercase;
        cursor: pointer;
        .md-block({ height: 70px; padding-left: 40px; });
        &.btn--submit {
          .sm-block({ display: none; });
        }
        &.btn--next-steps {
          display: none;
          .sm-block({ display: flex; });
          .xs-block({ justify-content: center; padding-left: 0; });
        }
        &.btn--mobile {
          flex-grow: 1;
          .xs-block({ padding-left: 20px; height: 55px; });
        }
      }
      .btn-wrapper {
        display: none;
        width: 100%;
        .sm-block({ display: flex; });
        .btn-back {
          height: 70px;
          width: 70px;
          display: flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          transform: scale(-1, 1);
          border-top: 1px solid @colorBorder;
          box-sizing: border-box;
          .xs-block({ height: 55px; width: 55px; });
          svg {
            width: 30px;
            height: 30px;
            .xs-block({ width: 25px; height: 25px; });
            path {
              fill: @colorBorder;
            }
          }
        }
      }
    }
  }
</style>

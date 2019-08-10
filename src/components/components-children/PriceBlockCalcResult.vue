<template>
  <form class="result-form" @submit.prevent="onSubmit" :class="[{success: success}, {error: error.server}, {waiting: waiting}]">
    <div class="col col--price">
      <div class="price-wrapper">
        <div class="steps-num">
          <span class="arrow" @click="$emit('go-back-step')"></span>
          <span>Шаг </span>
          <span class="red">{{activeSteps + 1}} из {{steps.length + 1}}</span>
        </div>
        <div class="sum-wrapper" v-if="price !== 0">
          <p class="description">Средняя стоимость такого заказа у нас</p>
          <p class="price-num"><strong class="price">{{price}}</strong> <span class="currency">руб.</span></p>
        </div>
        <div class="wrapper-secondary" v-if="price === 0">
          <p class="description">Расскажите о вашем проекте</p>
          <ul class="list-contacts">
            <li>
              <a class="link-contacts" href="tel:+79644952929">
                <img svg-inline class="phone" src="../../assets/img/icon/phone.svg" alt="">
                <span>+7 (964) 495-29-29</span>
              </a>
            </li>
            <li>
              <a class="link-contacts" href="mailto:info@appelsin.tech">
                <img svg-inline class="mail" src="../../assets/img/icon/email.svg" alt="">
                <span>info@appelsin.tech</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="btn-wrapper btn-wrapper--desktop" :class="{errorTooltip: error.server}">
        <button class="btn-wrapper__btn btn-wrapper__btn--default" type="submit" >Заказать проект</button>
        <div class="error-tooltip error-tooltip--submit">
          <span>Ошибка</span>
        </div>
        <button class="btn-wrapper__btn btn-wrapper__btn--next" type="button" @click="showForm = !showForm">Заказать проект</button>
      </div>
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
        <div class="g-item-form g-item-form--textarea" :class="{errorTooltip: error.message}">
          <textarea class="g-item-form__field g-item-form__field--textarea" v-model="form.message" placeholder="Текст сообщения"></textarea>
          <div class="error-tooltip">
            <span>Введите текст сообщения</span>
          </div>
        </div>
        <div class="file-wrapper" :class="{errorTooltip: error.file}">
          <input type="file" name="file" id="file_calc" v-on:change="handleFile" class="visually-hidden"/>
          <label class="file-link" v-if="!showFileName" for="file_calc" >
            <span class="file-text--big">Прикрепить файл</span>
            <span class="file-text--small">(до 5 Мб)</span>
          </label>
          <div class="error-tooltip error-tooltip--submit">
            <span>Файл слишком большой</span>
          </div>
          <div class="file-progress " v-if="showFileName">
            <img svg-inline class="svg-file" src="../../assets/img/icon/file.svg" alt="">
            <span class="file-name">{{form.file.name}}</span>
            <button class="file-delete" type="button" @click="deleteFile">
              <img svg-inline src="../../assets/img/icon/delete.svg" alt="">
            </button>
          </div>
        </div>
      </div>
      <div class="checkbox-wrapper" :class="{errorTooltip: error.checked}">
        <div class="error-tooltip error-tooltip--top">
          <span>Подтвердите согласие</span>
        </div>
        <input type="checkbox" id="checkPerson" v-model="form.checkedPersonalData">
        <label class="label-person" for="checkPerson">
          <span>Я согласен на обработку </span>
          <a class="link-person" href="#" @click.prevent="$modal.show('modal-policy')">персональных данных</a>. Этот сайт защищен reCAPCHA при соблюдении  <a class="link-person" href="https://policies.google.com/privacy" target="_blank">политики конфиденциальности</a> Google и <a class="link-person" href="https://policies.google.com/terms" target="_blank">пользовательского соглашения</a>.
        </label>
      </div>
      <div class="btn-wrapper btn-wrapper--mobile" :class="{errorTooltip: error.server}">
        <button class="btn-wrapper__btn btn-wrapper__btn--back" type="button" @click="showForm = !showForm">
          <img svg-inline src="../../assets/img/icon/arrow-slider.svg" alt="">
        </button>
        <button class="btn-wrapper__btn btn-wrapper__btn--mobile" type="submit">Отправить</button>
        <div class="error-tooltip error-tooltip--submit">
          <span>Ошибка</span>
        </div>
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
          server: false,
          file: false
        },
        errorName: '',
        success: false,
        form: {
          nameForm: 'calculate',
          name: '',
          phone: '',
          email: '',
          message: '',
          file: '',
          checkedPersonalData: false
        },
        token: '',
        percentCompleted: 0
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
          this.$recaptcha('login').then((token) => {
            this.token = token
            let formData = new FormData();
            formData.append('token', this.token);
            formData.append('nameForm', this.form.nameForm);
            formData.append('name', this.form.name);
            formData.append('phone', this.form.phone);
            formData.append('email', this.form.email);
            formData.append('message', this.form.message);
            formData.append('file', this.form.file);
            formData.append('checked', this.form.checkedPersonalData);
            formData.append('questions', JSON.stringify(this.questionsName));
            formData.append('price', this.price);
            axios.post('/mail.php', formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              },
              onUploadProgress: (progressEvent) => {
                this.percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
              }
            })
              .then(response => {
                this.waiting = false;
                if (response.data.type === 'error' || response.data.type === 'server') {
                  if(response.data.input_name) {
                    this.errorName = response.data.input_name
                  }
                  this.errorName = 'server'
                  this.hideError(this.errorName)
                } else {
                  this.success = true;
                  this.$modal.show('modal-response', {
                    data: this.form,
                    status: 'success',
                    hashClass: 'pink'
                  })
                }
              })
              .catch(response => {
                console.log(response)
              })
          })
        }
      },
      handleFile (e) {
        if(e.target.files[0].size > 5000000) {
          this.errorName = 'file'
          this.hideError(this.errorName)
        } else {
          this.form.file = e.target.files[0];
          console.log(e.target.files)
        }
      },
      hideError(name) {
        this.error[name] = true
        setTimeout(()=>{
          this.error[name] = false
        }, 2000)
      },
      deleteFile () {
        this.form.file = '';
        document.getElementById('file_calc').value = ''
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
      showFileName () {
        let res;
        this.form.file !== '' ? res = true : res = false
        console.log(this.form.file)
        return res
      }
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
    &.success,
    &.waiting {
      .col {
        .btn-wrapper__btn--default,
        .btn-wrapper__btn--mobile {
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
          .wrapper-secondary {
            .description {
              margin-bottom: 40px;
              max-width: 400px;
              font-size: 4.2rem;
              letter-spacing: 1.3rem;
              line-height: 4.5rem;
              .md-block({ font-size: 3.5rem; letter-spacing: 1rem; line-height: 4rem; });
              .sm-block({ font-size: 3rem; letter-spacing: 0.8rem; });
              .xs-block({ font-size: 2.4rem; letter-spacing: 0.5rem; line-height: 3rem; });
            }
            .list-contacts {
              display: flex;
              flex-direction: column;
              li:first-child {
                margin-bottom: 40px;
              }
              .link-contacts {
                display: flex;
                align-items: center;
                svg {
                  margin-right: 25px;
                  width: 47px;
                  height: 47px;
                  flex-shrink: 0;
                  box-sizing: border-box;
                  .md-block({ width: 38px; height: 38px; margin-right: 20px; });
                  .xs-block({ width: 30px; height: 30px; margin-right: 15px; });
                  path {
                    fill: #db4954;
                  }
                  &.phone {
                    padding: 8px;
                    border: 1px solid #db4954;
                    border-radius: 50%;
                    .xs-block({ padding: 6px; });
                  }
                }
                > span {
                  font-family: @fontBebas;
                  font-weight: bold;
                  font-size: 3rem;
                  letter-spacing: 0.5rem;
                  color: #000;
                  .md-block({ font-size: 2.8rem; });
                  .xs-block({ font-size: 2.2rem; letter-spacing: 0.4rem; });
                }
              }
            }
          }

          .sum-wrapper {
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
          .md-block({ height: 70px; padding-left: 10px; padding-right: 5px;});
          .sm-block({ min-height: 50px; height: auto; padding-top: 8px; padding-bottom: 8px;});
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
            font-size: 1.4rem;
            color: @colorSecFonts;
            .md-block({ padding-left: 40px; font-size: 1.2rem;});
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
              background: #d94950;
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
      .file-wrapper {
        display: flex;
        position: relative;
        align-items: center;
        height: 60px;
        padding-left: 25px;
        padding-right: 25px;
        border-bottom: 1px solid #dadada;
        .md-block({ padding-left: 10px;});
        .sm-block({ height: 50px; });
        &.errorTooltip {
          .error-tooltip {
            display: block;
          }
        }
        .file-link {
          display: inline-flex;
          position: relative;
          align-items: center;
          padding-left: 55px;
          font-family: @fontBebas;
          color: #000;
          cursor: pointer;
          .md-block({ padding-left: 40px;});
          &::after {
            position: absolute;
            content: '';
            left: 0;
            top: calc(~"50% - 14px");
            width: 28px;
            height: 28px;
            background: url("../../assets/img/icon/clip.png") no-repeat center / contain;
            .md-block({ width: 24px; height: 24px; top: calc(~"50% - 12px"); });
            .xs-block({ width: 20px; height: 20px; top: calc(~"50% - 10px"); });
          }
          .file-text--big {
            position: relative;
            margin-right: 20px;
            font-size: 2rem;
            letter-spacing: 0.5rem;
            .xs-block({ font-size: 1.8rem; letter-spacing: 0.4rem;});
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
        .file-progress {
          display: flex;
          justify-content: space-between;
          align-items: center;
          flex-grow: 1;
          min-width: 0;
          .file-name {
            font-size: 1.8rem;
            margin-right: auto;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            max-width: 60%;
          }
          .svg-file {
            width: 25px;
            margin-right: 30px;
            .md-block({ margin-right: 15px;});
            .sm-block({ width: 20px; margin-right: 20px;});
            path {
              fill: #D94950;
            }
          }
          .file-delete {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 50%;
            transition: 0.3s;
            cursor: pointer;
            &:hover {
              background: #D94950;
              border-color: #fff;
              svg {
                path {
                  fill: #fff;
                }
              }
            }
            svg {
              width: 14px;
              height: 14px;
              path {
                fill: #ccc;
                transition: 0.3s;
              }
            }
          }
        }
      }
      .btn-wrapper {
        position: relative;
        width: 100%;
        height: 85px;
        .md-block({ height: 70px;});
        .xs-block({ height: 55px; });
        &--desktop {
          &.errorTooltip {
            .btn-wrapper__btn--default + .error-tooltip {
              .from(@break_sm; {display: block});
            }
          }
        }
        &--mobile {
          display: none;
          .sm-block({ display: flex; });
          &.errorTooltip {
            .btn-wrapper__btn--mobile + .error-tooltip {
              .sm-block({ display: block;});
            }
          }
        }
        &__btn {
          display: flex;
          width: 100%;
          height: 100%;
          align-items: center;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 2.4rem;
          letter-spacing: 0.6rem;
          color: #fff;
          background: #000;
          text-transform: uppercase;
          cursor: pointer;
          &--default {
            padding-left: 50px;
            .sm-block({ display: none;});
          }
          &--next {
            display: none;
            padding-left: 40px;
            .sm-block({ display: flex;});
            .xs-block({ padding: 0; text-align: center; justify-content: center;});
          }
          &--mobile {
            padding-left: 20px;
            flex-grow: 1;
            .sm-block({ display: flex; });
          }
          &--back {
            display: none;
            width: 70px;
            height: 100%;
            align-items: center;
            justify-content: center;
            transform: scale(-1, 1);
            border-top: 1px solid @colorBorder;
            box-sizing: border-box;
            background: #fff;
            .sm-block({ display: flex; });
            .xs-block({ width: 55px;});
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
  }
</style>

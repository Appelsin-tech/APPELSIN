<template>
  <section class="s-contacts fullpage-section">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper default-margin-bottom">
          <div class="g-caption-block">
            <div class="wrapper-baseline">
              <h2 class="g-caption">Контакты</h2>
              <span class="underscore"></span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <form class="main-form" @submit.prevent="onSubmit" :class="{success: success}">
            <div class="col col--link-contacts">
              <div class="wrapper-secondary">
                <p class="description">Расскажите о вашем проекте</p>
                <ul class="list-contacts">
                  <li>
                    <a class="link-contacts" href="tel:+79644952929">
                      <img svg-inline class="phone" src="../assets/img/icon/phone.svg" alt="">
                      <span>+7 (964) 495-29-29</span>
                    </a>
                  </li>
                  <li>
                    <a class="link-contacts" href="mailto:info@appelsin.tech">
                      <img svg-inline class="mail" src="../assets/img/icon/email.svg" alt="">
                      <span>info@appelsin.tech</span>
                    </a>
                  </li>
                </ul>
                <div class="success-form price">
                  <span>Спасибо, ваша заявка принята!</span>
                </div>
              </div>
              <button class="btn-price btn--submit" type="submit">Заказать проект</button>
              <div class="btn-price btn--next-steps"  @click="showForm = !showForm">Заказать проект</div>
            </div>
            <div class="col col--input" :class="{active : showForm}">
              <div class="input-wrapper">
                <div class="item" :class="{errorItem: error.name}">
                  <input type="text" placeholder="Имя" v-model="form.name">
                  <div class="error">
                    <span>Введите имя</span>
                  </div>
                </div>
                <div class="item" :class="{errorItem: error.phone}">
                  <input type="tel" placeholder="Телефон" v-model="form.phone">
                  <div class="error">
                    <span>Введите телефон</span>
                  </div>
                </div>
                <div class="item" :class="{errorItem: error.email}">
                  <input type="email" placeholder="E-mail" v-model="form.email">
                  <div class="error">
                    <span>Введите E-mail</span>
                  </div>
                </div>
                <div class="item textarea" :class="{errorItem: error.message}">
                  <textarea placeholder="Текст сообщения" v-model="form.message"></textarea>
                  <div class="error">
                    <span>Введите текст сообщения</span>
                  </div>
                  <div class="success-form input">
                    <span>Спасибо, ваша заявка принята!</span>
                  </div>
                </div>
                <!--<label class="file-link mobile" for="file">-->
                <!--<span class="file-text&#45;&#45;big">Прикрепить файл</span>-->
                <!--<span class="file-text&#45;&#45;small">(до 5 Мб)</span>-->
                <!--</label>-->
              </div>
              <div class="checkbox-wrapper" :class="{errorItem: error.checked}">
                <div class="error error--top">
                  <span>Подтвердите согласие</span>
                </div>
                <input type="checkbox" id="checkPersonContacts" v-model="form.checkedPersonalData">
                <label class="label-person" for="checkPersonContacts">
                  <span>Я согласен на обработку </span>
                  <a class="link-person" href="#">персональных данных</a>
                </label>
              </div>
              <div class="btn-wrapper">
                <div class="btn-back" @click="showForm = !showForm">
                  <img svg-inline src="../assets/img/icon/arrow-slider.svg" alt="">
                </div>
                <button class="btn-price btn--mobile" type="submit">Отправить</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'contacts-block',
    data () {
      return {
        showForm: false,
        error: {
          name: false,
          phone: false,
          email: false,
          message: false,
          checked: false
        },
        errorName: '',
        success: false,
        form: {
          nameForm: 'contacts',
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
          axios.post('/mail.php', {
            name: this.form.name,
            phone: this.form.phone,
            email: this.form.email,
            message: this.form.message,
            checked: this.form.checkedPersonalData
          })
            .then(response => {
              console.log(response)
              if (response.data.type === 'error') {
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
        this.error[name] = true
        setTimeout(()=>{
          this.error[name] = false
        }, 2000)
      }
    },
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  .s-contacts {
    background: #f69b0e;
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
    .content-wrapper {
      flex-grow: 1;
    }
    .main-form {
      display: flex;
      position: relative;
      height: 100%;
      background: #fff;
      color: #000;
      overflow: hidden;
      &.success {
        .col {
          .success-form.price {
            display: block;
            .sm-block({ display: none; })
          }
          .success-form.input {
            .sm-block({ display: block; })
          }
          .btn--submit,
          .btn--mobile {
            pointer-events: none;
            opacity: 0.7;
          }
        }
      }
      .success-form {
        display: none;
        position: absolute;
        left: 50px;
        right: 50px;
        background: #59c259;
        bottom: 50px;
        .md-block({ bottom: 20px; left: 25px; right: 25px; });
        > span {
          display: block;
          font-family: @fontBebas;
          font-size: 2.4rem;
          padding: 8px 20px;
          font-weight: 400;
          color: #fff;
          text-transform: lowercase;
          .xs-block({ font-size: 2rem; padding: 5px 10px; })
        }
      }
      .col {
        width: 50%;
        .sm-block({ width: 100%; });
        &--link-contacts {
          display: flex;
          flex-direction: column;
          font-family: @fontBebas;
          font-weight: bold;
          z-index: 5;
          .wrapper-secondary {
            position: relative;
            display: flex;
            flex-grow: 1;
            padding: 45px 50px 55px 50px;
            flex-direction: column;
            border-right: 1px solid @colorBorder;
            .md-block({ padding: 40px; });
            .sm-block({ border: none; padding: 30px; });
            .description {
              margin-bottom: 40px;
              max-width: 400px;
              font-size: 4.2rem;
              letter-spacing: 1.3rem;
              line-height: 4.5rem;
              .md-block({ font-size: 3.5rem; letter-spacing: 1rem; line-height: 4rem;});
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
                  .md-block({ width: 38px; height: 38px; margin-right: 20px;});
                  .xs-block({ width: 30px; height: 30px; margin-right: 15px;});
                  path {
                    fill: #ffba00;
                  }
                  &.phone {
                    padding: 8px;
                    border: 1px solid #ffba00;
                    border-radius: 50%;
                    .xs-block({ padding: 6px;});
                  }
                }
                >span {
                  font-family: @fontBebas;
                  font-weight: bold;
                  font-size: 3rem;
                  letter-spacing: 0.5rem;
                  color: #000;
                  .md-block({ font-size: 2.8rem;});
                  .xs-block({ font-size: 2.2rem; letter-spacing: 0.4rem;});
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
            .item {
              position: relative;
              height: 85px;
              border: 1px solid transparent;
              border-bottom-color: @colorBorder;
              box-sizing: border-box;
              .sm-block({ height: 60px; });
              &.errorItem {
                .error {
                  display: block;
                }
              }
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
            position: relative;
            display: flex;
            height: 85px;
            padding-left: 25px;
            padding-right: 15px;
            align-items: center;
            .md-block({ height: 70px; });
            .sm-block({ height: 50px; });
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
            &.errorItem {
              .error {
                display: block;
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
            background: url("../assets/img/icon/clip.png") no-repeat center / contain;
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
  }
</style>

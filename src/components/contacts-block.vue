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
          <form class="main-form" @submit.prevent="onSubmit" :class="[{waiting: waiting}, {success: success}]">
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
                <input type="file" name="file" id="file_contacts" v-on:change="handleFile" class="visually-hidden"/>
                <label class="file-link desktop" for="file_contacts" >
                  <span class="file-text--big">Прикрепить файл</span>
                  <span class="file-text--small">(до 5 Мб) {{percent}}</span>
                </label>
              </div>
              <button class="btn-price btn--submit" type="submit">Заказать проект</button>
              <div class="btn-price btn--next-steps"  @click="showForm = !showForm">Заказать проект</div>
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
                  <textarea class="g-item-form__field" placeholder="Текст сообщения" v-model="form.message"></textarea>
                  <div class="error-tooltip">
                    <span>Введите текст сообщения</span>
                  </div>
                </div>
                <label class="file-link mobile" for="file_contacts" >
                  <span class="file-text--big">Прикрепить файл</span>
                  <span class="file-text--small">(до 5 Мб)</span>
                </label>
              </div>
              <div class="checkbox-wrapper" :class="{errorTooltip: error.checked}">
                <div class="error-tooltip error-tooltip--top">
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
          nameForm: 'contacts',
          name: '',
          phone: '',
          email: '',
          message: '',
          file: '',
          checkedPersonalData: false
        },
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
          let formData = new FormData();
          formData.append('nameForm', this.form.nameForm);
          formData.append('name', this.form.name);
          formData.append('phone', this.form.phone);
          formData.append('email', this.form.email);
          formData.append('message', this.form.message);
          formData.append('file', this.form.file);
          formData.append('checked', this.form.checkedPersonalData);
          axios.post('/mail.php', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function(progressEvent) {
              this.percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
              console.log(this.percentCompleted)
            }
          })
            .then(response => {
              this.waiting = false;
              if (response.data.type === 'error') {
                if (response.data.server === 'server') {
                  this.$modal.show('modal-response', {
                    response: 'error'
                  })
                  this.errorName = response.data.server
                  this.hideError(this.errorName)
                }
                this.$modal.show('modal-response', {
                  response: 'error'
                })
                this.errorName = response.data.input_name
                this.hideError(this.errorName)
              } else {
                this.success = true;
                this.$modal.show('modal-response', {
                  response: 'success'
                })
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
      },
      handleFile (e) {
        this.form.file = e.target.files[0];
        console.dir(this.form.file)
      }
    },
    computed: {
      percent () {
        return this.percentCompleted
      }
    }
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
      &.success,
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
                border-bottom: 2px solid #f69b0e;
                border-right: 2px solid #f69b0e;
              }
              span {
                color: @colorSecFonts;
              }
              .link-person {
                color: #f69b0e;
                border-bottom: 1px solid #f69b0e;
                transition: 0.3s;
                &:hover {
                  border-bottom: 1px solid transparent;
                }
              }
            }
          }
        }
        .file {

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
            background: url("../assets/img/icon/clip-orange.png") no-repeat center / contain;
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

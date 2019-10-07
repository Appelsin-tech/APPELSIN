<template>
  <section class="s-case fullpage-section fp-auto-height-responsive">
    <div class="wrapper-container">
      <div class="container section">
        <div class="caption-wrapper default-margin-bottom">
          <div class="g-caption-block">
            <div class="wrapper-baseline">
              <h2 class="g-caption">{{$t('cases')}}</h2>
              <span class="underscore"></span>
            </div>
          </div>
          <div class="nav-slider">
            <button class="next">
              <img svg-inline src="../../assets/img/icon/arrow-slider.svg" alt="">
            </button>
            <button class="prev">
              <img svg-inline src="../../assets/img/icon/arrow-slider.svg" alt="">
            </button>
          </div>
        </div>
        <swiper :options="swiperOption" ref="mySwiperCases">
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">DAZZLING</h3>
                <p class="desc-case">{{$t('dazz-desc')}}</p>
                <a class="link-line" href="https://dazzling.life/" target="_blank">
                  <span>dazzling.life</span>
                </a>
              </div>
              <img class="img img--dazz swiper-lazy" :data-src="getImgUrl('dazz.png')" alt="WHIZ BIZ">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3 cgen">
                <h3 class="caption-slide">Community generation</h3>
                <p class="desc-case">{{$t('cgen-desc')}}</p>
                <a class="link-line" href="https://cgen.network/" target="_blank">
                  <span>cgen.network</span>
                </a>
              </div>
              <img class="img img--cgen swiper-lazy" :data-src="getImgUrl('cgen.png')" alt="CGEN">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3 api">
                <h3 class="caption-slide">{{$t('api-solutions')}}</h3>
                <p class="desc-case">{{$t('api-solutions-desc')}}</p>
                <a class="link-line" href="https://fssprus.ru/" target="_blank">
                  <span>fssprus.ru</span>
                </a>
              </div>
              <img class="img img--api swiper-lazy" :data-src="getImgUrl('api.png')" :alt="$t('api-solutions')">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">Crowdsale Network</h3>
                <p class="desc-case">{{$t('crowdsale-desc')}}</p>
                <a class="link-line" href="https://crowdsale.network/" target="_blank">
                  <span>crowdsale.network</span>
                </a>
              </div>
              <img class="img img--crowdsale swiper-lazy" :data-src="getImgUrl('crowdsale.png')" alt="Crowdsale Network">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">WHIZ BIZ</h3>
                <p class="desc-case">{{$t('whiz-biz-desc')}}</p>
                <a class="link-line" href="http://ghost_town.mrpelktn.beget.tech/" target="_blank">
                  <span>whizbiz.io</span>
                </a>
              </div>
              <img class="img img--whiz-biz swiper-lazy" :data-src="getImgUrl('whiz-biz.png')" alt="WHIZ BIZ">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3 air">
                <h3 class="caption-slide">{{$t('fly-game')}}</h3>
                <p class="desc-case">{{$t('fly-game-desc')}}</p>
                <div class="link-wrapper">
                  <a href="https://itunes.apple.com/ru/app/id1183881507" class="link ios" target="_blank">
                    <img svg-inline class="svg" src="../../assets/img/icon/apple.svg">
                    <span>iOS</span>
                  </a>
                </div>
              </div>
              <img class="img img--air swiper-lazy" :data-src="getImgUrl('air.png')" alt="Самолет">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">FURY RIDE</h3>
                <p class="desc-case">{{$t('fury-ride-desc')}}</p>
                <div class="link-wrapper">
                  <a href="https://itunes.apple.com/ru/app/fury-ride/id1281992116" class="link ios" target="_blank">
                    <img svg-inline class="svg" src="../../assets/img/icon/apple.svg">
                    <span>iOS</span>
                  </a>
                </div>
              </div>
              <img class="img img--fury-ride swiper-lazy" :data-src="getImgUrl('fury-ride.png')" alt="Fury ride">
            </div>
          </swiper-slide>
          <swiper-slide>
            <div class="slide-wrapper">
              <div class="col col-3">
                <h3 class="caption-slide">SNIPER ARENA</h3>
                <p class="desc-case">{{$t('sniper-arena-desc')}}</p>
                <div class="link-wrapper">
                  <a href="https://itunes.apple.com/us/app/id1029110855" class="link ios" target="_blank">
                    <img svg-inline class="svg" src="../../assets/img/icon/apple.svg">
                    <span>iOS</span>
                  </a>
                  <a href="https://play.google.com/store/apps/details?id=team.gordeyev.sniperarena" class="link android" target="_blank">
                    <img svg-inline class="svg" src="../../assets/img/icon/android.svg">
                    <span>android</span>
                  </a>
                </div>
              </div>
              <img class="img img--sniper swiper-lazy" :data-src="getImgUrl('sniper-arena.png')" alt="Sniper arena">
            </div>
          </swiper-slide>
          <swiper-slide>
            <form class="main-form" @submit.prevent="onSubmit" :class="{waiting: waiting, success: success || statusMail}">
              <div class="col col--desc">
                <div class="wrapper-secondary">
                  <p class="description">{{$t('cases-form')}}</p>
                  <p class="description--small">{{$t('cases-form-desc')}}</p>
                </div>
                <div class="btn-wrapper btn-wrapper--desktop" :class="{errorTooltip: error.server}">
                  <button class="btn-wrapper__btn btn-wrapper__btn--default" type="submit">
                    <span v-if="!this.statusMail">{{$t('mail-form.send-request')}}</span>
                    <span v-else class="success">{{$t('submit-success')}}</span>
                  </button>
                  <div class="error-tooltip error-tooltip--submit">
                    <span>{{$t('mail-form.error.default')}}</span>
                  </div>
                  <button class="btn-wrapper__btn btn-wrapper__btn--next" type="button" @click="showForm = !showForm">
                    <span v-if="!this.statusMail">{{$t('mail-form.send-request')}}</span>
                    <span v-else class="success">{{$t('submit-success')}}</span>
                  </button>
                </div>
              </div>
              <div class="col col--input" :class="{active : showForm}">
                <div class="input-wrapper">
                  <div class="g-item-form" :class="{errorTooltip: error.name}">
                    <input class="g-item-form__field" type="text" :placeholder="$t('mail-form.name')" v-model="form.name">
                    <div class="error-tooltip">
                      <span>{{$t('mail-form.error.name')}}</span>
                    </div>
                  </div>
                  <div class="g-item-form" :class="{errorTooltip: error.phone}">
                    <input class="g-item-form__field" type="tel" :placeholder="$t('mail-form.phone')" v-model="form.phone">
                    <div class="error-tooltip">
                      <span>{{$t('mail-form.error.phone')}}</span>
                    </div>
                  </div>
                  <div class="g-item-form" :class="{errorTooltip: error.email}">
                    <input class="g-item-form__field" type="email" placeholder="E-mail" v-model="form.email">
                    <div class="error-tooltip">
                      <span>{{$t('mail-form.error.email')}}</span>
                    </div>
                  </div>
                  <div class="g-item-form g-item-form--textarea" :class="{errorTooltip: error.message}">
                  <textarea class="g-item-form__field g-item-form__field--textarea" :placeholder="$t('mail-form.message')"
                            v-model="form.message"></textarea>
                    <div class="error-tooltip">
                      <span>{{$t('mail-form.error.message')}}</span>
                    </div>
                  </div>
                  <div class="file-wrapper" :class="{errorTooltip: error.file}">
                    <input type="file" name="file" id="file_cases" v-on:change="handleFile" class="visually-hidden"/>
                    <label class="file-link" v-if="!showFileName" for="file_cases">
                      <span class="file-text--big">{{$t('mail-form.file')}}</span>
                      <span class="file-text--small">({{$t('mail-form.file-size')}})</span>
                    </label>
                    <div class="error-tooltip error-tooltip--submit">
                      <span>{{$t('mail-form.error.file')}}</span>
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
                    <span>{{$t('mail-form.error.checkbox')}}</span>
                  </div>
                  <input type="checkbox" id="checkPersonCases" v-model="form.checkedPersonalData">
                  <label class="label-person" for="checkPersonCases">
                    <span>{{$t('mail-form.check-personal')}} </span>
                    <a class="link-person" href="#"  @click.prevent="$modal.show('modal-policy')">{{$t('mail-form.check-personal-link')}}</a>. {{$t('mail-form.captcha')}} <a class="link-person" href="https://policies.google.com/privacy" target="_blank">{{$t('mail-form.captcha-policy')}}</a> {{$t('mail-form.captcha-and')}} <a class="link-person" href="https://policies.google.com/terms" target="_blank">{{$t('mail-form.captcha-agreement')}}</a>.
                  </label>
                </div>
                <div class="btn-wrapper btn-wrapper--mobile" :class="{errorTooltip: error.server}">
                  <button class="btn-wrapper__btn btn-wrapper__btn--back" type="button" @click="showForm = !showForm">
                    <img svg-inline src="../../assets/img/icon/arrow-slider.svg" alt="">
                  </button>
                  <button class="btn-wrapper__btn btn-wrapper__btn--mobile" type="submit">
                    <span v-if="!this.statusMail">{{$t('mail-form.send')}}</span>
                    <span v-else class="success">{{$t('submit-success')}}</span>
                  </button>
                  <div class="error-tooltip error-tooltip--submit">
                    <span>{{$t('mail-form.error.default')}}</span>
                  </div>
                </div>
              </div>
            </form>
          </swiper-slide>
        </swiper>
      </div>
    </div>
  </section>
</template>

<script>
  import {swiper, swiperSlide} from 'vue-awesome-swiper'
  import axios from 'axios'

  export default {
    name: 'cases-block',
    props: {
      fullPageReady: {
        type: Boolean
      },
      resize: {
        type: Boolean
      },
      statusMail: {
        type: Boolean
      }
    },
    components: {
      swiper,
      swiperSlide,
    },
    data() {
      return {
        swiperOption: {
          slidesPerView: 1,
          lazy: true,
          effect: 'flip',
          preloadImages: false,
          loadPrevNext: true,
          watchSlidesVisibility: true,
          navigation: {
            nextEl: '.s-case .prev',
            prevEl: '.s-case .next',
          },
        },
        showForm: false,
        waiting: false,
        disabled: false,
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
          nameForm: 'cases',
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
      getImgUrl (src) {
        const image = require(`../../../src/assets/img/case/${src}`)
        return image
      },
      onSubmit() {
        //validation
        if (this.statusMail) {
          return false
        } else {
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
              formData.append('checked', this.form.checkedPersonalData)
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
                    if (response.data.input_name) {
                      this.errorName = response.data.input_name
                    }
                    this.errorName = 'server'
                    this.hideError(this.errorName)
                  } else {
                    this.$emit('send-mail')
                    this.success = true;
                    this.$modal.show('modal-response', {
                      data: this.form,
                      status: 'success',
                      hashClass: 'orange'
                    })
                  }
                })
                .catch(response => {
                  console.log(response)
                })
            })
          }
        }
      },
      hideError(name) {
        this.error[name] = true
        setTimeout(() => {
          this.error[name] = false
        }, 2000)
      },
      handleFile(e) {
        if (e.target.files[0].size > 5000000) {
          this.errorName = 'file'
          this.hideError(this.errorName)
        } else {
          this.form.file = e.target.files[0];
        }
      },
      deleteFile() {
        this.form.file = '';
        document.getElementById('file_contacts').value = ''
      },
    },
    watch: {
      fullPageReady(newVal, oldVal) {
        if(newVal) {
          this.mySwiperCases.update()
        }
      },
      resize(newVal, oldVal) {
        if(newVal) {
          this.mySwiperCases.update()
        }
      }
    },
    computed: {
      mySwiperCases() {
        return this.$refs.mySwiperCases.swiper
      },
      showFileName() {
        let res;
        this.form.file !== '' ? res = true : res = false
        return res
      }
    },
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  @import '../../../node_modules/swiper/dist/css/swiper.css';

  .s-case {
    background: radial-gradient(circle farthest-corner at top right, rgba(171, 23, 216, 0.7) 0%, rgba(0, 0, 0, 0) 70%),
    radial-gradient(circle farthest-corner at -10% 110%, rgba(171, 23, 216, 0.5) 5%, rgba(0, 0, 0, 0) 30%) #672fda;
   overflow: hidden;
    .swiper-slide {
      display: flex;
    }
    .slide-wrapper {
      display: flex;
      position: relative;
      flex-grow: 2;
      padding: 88px 50px 30px;
      background: #fff;
      .lg-w__sm-h({ padding: 50px 40px;});
      .md-block({ padding: 70px 40px; });
      .md-w__sm-h({ padding: 50px 40px;});
      .sm-block({ padding: 40px 30px; });
      .sm-w__sm-h({ padding: 40px 30px;});
      .xs-block({ padding: 40px 25px; });
      .col {
        color: #000;
        &-3 {
          position: relative;
          width: 45%;
          z-index: 2;
          .lg-block({ width: 50%; });
          .sm-block({ width: 100%; });
          &.air {
            width: 54%;
            .md-block({ width: 50%; });
            .sm-block({ width: 100%; });
          }
          &.cgen {
            width: 40%;
            .md-block({ width: 50%; });
            .sm-block({ width: 100%; });
          }
          &.api {
            .caption-slide {
              max-width: 440px;
              .lg-block({max-width: 380px});
            }
          }
        }
        .caption-slide {
          margin-bottom: 50px;
          font-family: @fontBebas;
          font-weight: bold;
          font-size: 4.5rem;
          letter-spacing: 1.3rem;
          .sm-max-height({ margin-bottom: 30px; font-size: 3rem; letter-spacing: 1rem;});
          .sm-block({ margin-bottom: 30px; font-size: 3rem; letter-spacing: 1rem; });
          .xs-block({font-size: 2.4rem; letter-spacing: 0.7rem; });
        }
        .desc-case {
          margin-bottom: 50px;
          font-size: 1.7rem;
          font-weight: 300;
          color: @colorSecFonts;
          letter-spacing: 0.14rem;
          .sm-block({ margin-bottom: 30px; });
        }
        .link-line {
          font-weight: 300;
          color: @colorSecFonts;
          display: flex;
          align-items: center;
          &.mobile {
            display: none;
            .xs-block({ display: flex;});
          }
          span {
            font-size: 1.7rem;
            .bottom-hover(#666);
          }
          &::before {
            display: inline-block;
            content: '';
            margin-right: 20px;
            width: 140px;
            height: 1px;
            background: @colorSecFonts;
            .xs-block({ width: 100px;});
          }
        }
        .link-wrapper {
          display: flex;
          .sm-block({align-items: center;});
          &::before {
            display: none;
            content: '';
            margin-right: 20px;
            width: 100px;
            height: 1px;
            background: @colorSecFonts;
            .sm-block({ display: inline-block;});
          }
          .link {
            height: 70px;
            padding: 0 35px 0 25px;
            display: flex;
            align-items: center;
            border: 1px solid #bababa;
            border-radius: 50px;
            transition: 0.3s;
            .sm-block({border: none; height: auto; border-radius: 0; padding: 0;});
            &:first-child {
              margin-right: 10px;
              .sm-block({ margin-bottom: 0; margin-right: 15px;})
            }
            &.ios {
              &:hover {
                border-color: #000;
                .sm-block({border: none});
                svg {
                  path {
                    fill: #000;
                  }
                }
                span {
                  color: #000;
                }
              }
            }
            &.android {
              &:hover {
                border-color: #a4c639;
                .sm-block({border: none});
                svg {
                  path {
                    fill: #a4c639;
                  }
                }
                span {
                  color: #a4c639;
                  .xs-block({color: #000;});
                }
              }
            }
            .svg {
              margin-right: 17px;
              height: 40px;
              width: 40px;
              .sm-block({ display: none;});
              path {
                fill: #bababa;
                transition: 0.3s;
              }
            }
            span {
              font-size: 18px;
              color: #bababa;
              transition: 0.3s;
              .sm-block({ font-size: 1.7rem; .bottom-hover(#666); color: #666666; font-weight: 300;});
            }
          }
        }
      }
      .img {
        position: absolute;
        z-index: 1;
        &--cgen {
          right: -280px;
          top: 70px;
          .lg-block({ right: -340px; });
          .md-block({ right: -300px; });
          .sm-block({ right: 2%; top: 280px;});
          .xs-block({ top: 320px;});
        }
        &--api {
          top: 60px;
          right: -360px;
          .lg-block({ right: -350px; });
          .sm-block({ right: 50%;
            top: 254px;
            max-width: 500px;
            transform: translateX(65%);});
          .xs-block({ top: 280px; max-width: 400px;})
        }
        &--crowdsale {
          top: 27px;
          right: -220px;
          .lg-block({ right: -250px; });
          .md-block({ right: -280px;  top: 60px;});
          .sm-block({ right: 50%;
            top: 254px;
            max-width: 500px;  transform: translateX(50%);});
          .xs-block({top: 300px; max-width: 400px;})
        }
        &--whiz-biz {
          top: 37px;
          right: -130px;
          .lg-block({ right: -90px; });
          .md-block({ right: -150px; });
          .sm-block({ right: 50%;
            top: 220px;
            max-width: 500px; transform: translateX(44%);});
          .xs-block({ top: 250px; max-width: 400px;})
        }
        &--air {
          top: 110px;
          right: -170px;
          .lg-block({ right: -300px; });
          .sm-block({ top: 300px; right: 50%; transform: translateX(50%); max-width: 470px});
          .xs-block({max-width: 350px; top: 300px;})
        }
        &--fury-ride {
          top: 40px;
          right: -200px;
          .lg-block({ right: -250px; });
          .md-block({ right: -280px; top: 80px;});
          .sm-block({ top: 250px; right: 50%; transform: translateX(50%); max-width: 500px});
          .xs-block({ top: 280px;  max-width: 350px});
        }
        &--sniper {
          top: 40px;
          right: -100px;
          .lg-block({ right: -230px; });
          .md-block({ right: -220px; });
          .sm-block({ top: 300px; right: 50%; transform: translateX(44%); max-width: 370px});
          .xs-block({ top: 320px; max-width: 240px});
        }
        &--dazz {
          top: 70px;
          right: -135px;
          max-height: 410px;
          .lg-block({ right: -100px;
            max-height: 335px;; });
          .md-block({ right: auto; left: 35vw; });
          .sm-block({ top: 280px;  left: 50%; transform: translateX(-50%); max-height: 250px;});
          .xs-block({ top: 280px; max-height: 150px;});
        }
      }
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
          .btn-wrapper__btn--default,
          .btn-wrapper__btn--mobile,
          .btn-wrapper__btn--next {
            pointer-events: none;
            opacity: 0.7;
          }
        }
      }
      .col {
        position: relative;
        width: 50%;
        z-index: 2;
        .sm-block({ width: 100%; });
        &--desc {
          display: flex;
          flex-direction: column;

          z-index: 2;
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
              font-family: @fontBebas;
              font-weight: bold;
              font-size: 4.2rem;
              letter-spacing: 1.3rem;
              line-height: 4.5rem;
              .md-block({ font-size: 3.5rem; letter-spacing: 1rem; line-height: 4rem; });
              .sm-block({ font-size: 3rem; letter-spacing: 0.8rem; });
              .xs-block({ font-size: 2.4rem; letter-spacing: 0.5rem; line-height: 3rem; });
              &--small {
                font-size: 1.8rem;
                line-height: 2.3rem;
                font-weight: 300;
                color: #666666;
                .xs-block({ font-size:1.6rem; line-height: 2rem; });
              }
            }
          }
        }
        &--input {
          display: flex;
          flex-direction: column;
          transition: 0.3s;
          background: #fff;
          .sm-block({ position: absolute; top: 100%; bottom: -100%; z-index: 3; });
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
                border-bottom: 2px solid #672fda;
                border-right: 2px solid #672fda;
              }
              .link-person {
                color: #672fda;
                border-bottom: 1px solid #672fda;
                transition: 0.3s;
                &:hover {
                  border-bottom: 1px solid transparent;
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
              background: url("../../assets/img/icon/clip-violet.png") no-repeat center / contain;
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
                fill: #f69b0e;
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
          .md-block({ height: 70px; });
          .xs-block({ height: 55px; });
          &--desktop {
            &.errorTooltip {
              .btn-wrapper__btn--default + .error-tooltip {
                .from(@break_sm; { display: block });
              }
            }
          }
          &--mobile {
            display: none;
            .sm-block({ display: flex; });
            &.errorTooltip {
              .btn-wrapper__btn--mobile + .error-tooltip {
                .sm-block({ display: block; });
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
            &--default,
            &--next,
            &--mobile {
              span.success {
                position: relative;
                &::before {
                  content: '';
                  display: inline-block;
                  margin-right: 25px;
                  transform: rotate(40deg);
                  width: 8px;
                  height: 18px;
                  border-bottom: 2px solid #fff;
                  border-right: 2px solid #fff;
                }
              }
            }
            &--default {
              padding-left: 50px;
              .sm-block({ display: none; });
            }
            &--next {
              display: none;
              padding-left: 40px;
              .sm-block({ display: flex; });
              .xs-block({ padding: 0; text-align: center; justify-content: center; });
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
              .xs-block({ width: 55px; });
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
  }
</style>

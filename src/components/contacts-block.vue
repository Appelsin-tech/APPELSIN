<template>
  <section class="s-contacts fullpage-section">
    <div class="wrapper-container">
      <div class="container">
        <div class="caption-wrapper">
          <div class="g-caption-block">
            <h2 class="visually-hidden">Контакты</h2>
            <p class="text-wrapper">
              <span class="g-caption">Рассчитайте</span>
              <span class="small">стоимость вашего проекта</span>
            </p>
          </div>
        </div>
        <div class="steps-wrapper">
          <div class="steps" >
            <div class="steps-num">
              <span class="arrow"></span>
              <span>Шаг </span>
              <span class="red"></span>
            </div>
            <div class="steps-content">
              <div class="step">
                <h3 class="steps-caption"></h3>
                <div class="variant-wrapper">
                  <div class="item-wrapper">

                    <div class="item">

                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
          <form class="result-form" @submit.prevent="onSubmit">
            <div class="col col--price">
              <div class="price-wrapper">
                <div class="steps-num">
                  <span class="arrow"></span>
                  <span>Шаг </span>
                  <span class="red"></span>
                </div>
                <p class="description">Средняя стоимость такого заказа у нас</p>
                <p class="price-num"><span class="currency">руб.</span></p>
                <!--<input type="file" id="file">-->
                <label class="file-link desktop" for="file">
                  <span class="file-text--big">Прикрепить файл</span>
                  <span class="file-text--small">(до 5 Мб)</span>
                </label>
              </div>
              <button class="btn-price btn--submit" type="submit">Заказать проект</button>
              <div class="btn-price btn--next-steps">Заказать проект</div>
            </div>
            <div class="col col--input" >
              <div class="input-wrapper">
                <div class="item">
                  <input type="text" placeholder="Имя" >
                </div>
                <div class="item">
                  <input type="tel" placeholder="Телефон">
                </div>
                <div class="item">
                  <input type="email" placeholder="E-mail" >
                </div>
                <div class="item textarea">
                  <textarea  placeholder="Текст сообщения"></textarea>
                </div>
                <label class="file-link mobile" for="file">
                  <span class="file-text--big">Прикрепить файл</span>
                  <span class="file-text--small">(до 5 Мб)</span>
                </label>
              </div>
              <div class="checkbox-wrapper">
                <input type="checkbox" id="checkPerson">
                <label class="label-person" for="checkPerson">
                  <span>Я согласен на обработку </span>
                  <a class="link-person" href="#">персональных данных</a>
                </label>
              </div>
              <div class="btn-wrapper">
                <div class="btn-back">
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
  export default {
    name: 'contacts-block',
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
    .steps-wrapper {
      flex-grow: 1;
      max-height: 560px;
      .lg-block({ max-height: 500px;; });
      .sm-block({ height: 330px; });
      .xs-block({ height: 300px; });
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
                .sm-block({max-height: 25%});
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
                    .sm-block({ width: 35px; height: 35px; margin-bottom: 0; margin-right: 10px; background-position: center;});
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
    .result-form {
      display: flex;
      position: relative;
      height: 100%;
      background: #fff;
      color: #000;
      overflow: hidden;
      .col {
        width: 50%;
        .sm-block({ width: 100%;});
        &--price {
          display: flex;
          flex-direction: column;
          font-family: @fontBebas;
          font-weight: bold;
          z-index: 5;
          .price-wrapper {
            display: flex;
            flex-grow: 1;
            padding: 45px 50px 55px 50px;
            flex-direction: column;
            border-right: 1px solid @colorBorder;
            .md-block({padding: 40px;});
            .sm-block({ border: none; padding: 30px;});
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
              .xs-block({font-size: 2.4rem; letter-spacing: 0.5rem; line-height: 3rem;})
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
                .xs-block({ font-size: 4rem; letter-spacing: 1.1rem;});
              }
              .currency {
                font-size: 3rem;
                letter-spacing: 0.7rem;
                .md-block({ font-size: 2.5rem; letter-spacing: 0.6rem;});
              }
            }
          }
        }
        &--input {
          display: flex;
          flex-direction: column;
          transition: 0.3s;
          background: #fff;
          .sm-block({ position: absolute; top: 100%; bottom: -100%; z-index:9;});
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
              height: 85px;
              border-bottom: 1px solid @colorBorder;
              box-sizing: border-box;
              .sm-block({ height: 60px;});
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
        .file-link {
          position: relative;
          margin-top: auto;
          padding-left: 60px;
          font-family: @fontBebas;
          color: #000;
          .md-block({ padding-left: 45px;});
          .xs-block({ padding-left: 0;});
          &.desktop {
            .sm-block({ display: none;});
          }
          &.mobile {
            display: none;
            height: 50px;
            margin-left: 25px;
            align-items: center;
            .sm-block({ display: inline-flex;});
          }
          &::after {
            position: absolute;
            content: '';
            left: 0;
            top: calc(~"50% - 21px");
            width: 42px;
            height: 42px;
            background: url("../assets/img/icon/clip.png") no-repeat center / contain;
            .md-block({ width: 30px; height: 30px; top: calc(~"50% - 15px");});
            .xs-block({ display: none;});
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
          .md-block({ height: 70px; padding-left: 40px;});
          &.btn--submit {
            .sm-block({ display: none;});
          }
          &.btn--next-steps {
            display: none;
            .sm-block({ display: flex;});
            .xs-block({ justify-content: center; padding-left: 0;});
          }
          &.btn--mobile {
            flex-grow: 1;
            .xs-block({padding-left: 20px; height: 55px;});
          }
        }
        .btn-wrapper {
          display: none;
          width: 100%;
          .sm-block({ display: flex;});
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
            .xs-block({ height: 55px; width: 55px;});
            svg {
              width: 30px;
              height: 30px;
              .xs-block({ width: 25px; height: 25px;});
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

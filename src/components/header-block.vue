<template>
  <header class="b-header" :class="{active : showMenu}">
    <div class="container">
      <div class="logo-wrapper">
        <img svg-inline src="../assets/img/icon/logoApp.svg" alt="">
        <img svg-inline src="../assets/img/appelsin/appelsin-logo.svg" alt="">
      </div>
      <span class="agency">Digital agency</span>
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
      <a class="submit" href="#">Оставить заявку</a>
      <button class="burger" @click="menu">
        <span></span>
        <span></span>
        <span></span>
        <!--<img svg-inline src="../assets/img/icon/menu.svg" alt="">-->
      </button>
    </div>
    <ul class="menu-list">
      <li class="item">
        <a href="#" class="link" >О нас</a>
      </li>
      <li class="item">
        <a href="#services" class="link" @click="menu">Услуги</a>
      </li>
      <li class="item">
        <a href="#" class="link">Наши работы</a>
      </li>
      <li class="item">
        <a href="#contacts" class="link" @click="menu">Контакты</a>
      </li>
      <li class="item item--submit">
        <a href="#contacts" class="link" @click="menu">Оставить заявку</a>
      </li>
    </ul>
  </header>
</template>

<script>
  export default {
    name: 'header-block',
    props: ['showMenu'],
    data() {
      return {
      }
    },
    methods: {
      menu() {
        this.$emit('menu')
      },
      moveSlide() {
        this.fullpage_api.moveTo('services', 1)
      }
    }
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  .b-header {
    position: fixed;
    padding-top: 30px;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    .md-max-height({ padding-top: 15px; });
    .xs-max-height({ padding-top: 10px; });
    .md-block({ position: absolute; padding-top: 15px; });
    .sm-block({ padding-top: 10px; });
    &.active {
      position: fixed;
      bottom: 0;
      background: #fff;
      color: #000;
      .svg-logo {
        path {
          fill: #ffba00;
        }
      }
      .svg-logo-appelsin {
        path {
          fill: #000;
        }
      }
      .submit,
      .phone {
        color: #000;
      }
      .burger {
        span {
          background: #000;
          &:nth-child(1) {
            width: 35px;
            transform: rotate(45deg);
            transform-origin: 5px 9px;
          }
          &:nth-child(2) {
            opacity: 0;
          }
          &:nth-child(3) {
            width: 35px;
            transform: rotate(-45deg);
            transform-origin: 5px -5px;
          }
        }
      }
      .menu-list {
        display: flex;
      }
    }
  }
  .container {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }
  .logo-wrapper {
    display: flex;
    align-items: center;
    .md-block({ margin-right: auto; });
    .svg-logo {
      width: 38px;
      height: 38px;
      margin-right: 60px;
      .xs-max-height({ width: 30px; height: 30px; margin-right: 30px; });
      .md-block({ margin-right: 40px; });
      .sm-block({ width: 30px; height: 30px; margin-right: 25px; });
    }
    .svg-logo-appelsin {
      width: 140px;
      height: 22px;
      .xs-max-height({ width: 110px; height: 20px; });
      .lg-block({ width: 130px; height: 20px; });
      .sm-block({ width: 110px; height: 16px; });
      path {
        fill: #fff;
      }
    }
  }
  .agency {
    margin-right: auto;
    font-size: 1.7rem;
    font-weight: 300;
    .md-block({ display: none; });
    &::before {
      content: '|';
      margin: 0 60px;
      .md-block({ margin: 0 30px; });
      .xs-max-height({ margin: 0 40px; })
    }
  }
  .phone {
    display: none;
    margin-right: 80px;
    font-size: 1.7rem;
    color: #fff;
  }
  .submit {
    display: block;
    margin-right: 30px;
    transform: translateY(3px);
    font-family: @fontBebas;
    font-weight: bold;
    font-size: 2.47rem;
    letter-spacing: 0.7rem;
    color: #fff;
    .bottom-hover();
    .sm-block({ display: none;});
  }
  .burger {

    display: flex;
    flex-direction: column;
    align-items: flex-end;
    cursor: pointer;
    .xs-block({ order: 2; });
    span {
      display: block;
      height: 3px;
      margin-bottom: 8px;
      background-color: #fff;
      border-radius: 1px;
      transition: all 0.2s ease 0.1s;
      &:nth-child(1) {
        width: 20px;
      }
      &:nth-child(2) {
        width: 35px;
      }
      &:nth-child(3) {
        width: 20px;
        margin-bottom: 0;
      }
    }
  }
  .menu-list {
    position: absolute;
    display: none;
    left: 0;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    flex-direction: column;
    align-items: center;
    .sm-width__xs-height({transform: translateY(-60%);});
    .item {
      margin-bottom: 25px;
      text-align: center;
      .sm-block({ margin-bottom: 17px;});
      &:last-child {
        margin-bottom: 0;
      }
      &--submit {
        display: none;
        .sm-block({ display: block;});
      }
      .link {
        font-family: @fontBebas;
        font-size: 3rem;
        letter-spacing: 0.8rem;
        font-weight: bold;
        color: #000;
        text-transform: uppercase;
        transition: 0.3s;
        .sm-block({font-size: 2.4rem;
          letter-spacing: 0.6rem;});
        &:hover {
          color: #ffba00;
        }
      }
    }
  }
</style>

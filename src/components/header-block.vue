<template>
  <header class="b-header">
    <div class="container">
      <div class="logo-wrapper">
        <img svg-inline src="../assets/img/icon/logoApp.svg" alt="">
        <img svg-inline src="../assets/img/appelsin/appelsin-logo.svg" alt="">
      </div>
      <span class="agency">Digital agency</span>
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
      <a class="submit" href="#">Оставить заявку</a>
      <!--<div class="menu-wrapper">-->
        <!--<button class="menu">-->
          <!--<img svg-inline src="../assets/img/icon/menu.svg" alt="">-->
        <!--</button>-->
      <!--</div>-->
    </div>
  </header>
</template>

<script>
  export default {
    name: 'header-block',
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  .b-header {
    position: absolute;
    padding-top: 30px;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    .md-max-height({ padding-top: 15px;});
    .xs-max-height({ padding-top: 10px;});
    .md-block({padding-top: 15px;});
    .sm-block({padding-top: 10px;});

  }
  .container {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    .xs-block({ flex-direction: column; align-items: flex-start;})
  }
  .logo-wrapper {
    display: flex;
    align-items: center;
    .sm-block({ margin-right: auto;});
    .svg-logo {
      width: 38px;
      height: 38px;
      margin-right: 60px;
      .xs-max-height({ width: 30px; height: 30px; margin-right: 30px;});
      .md-block({margin-right: 40px;});
      .sm-block({ width: 30px; height: 30px; margin-right: 25px;});

    }
    .svg-logo-appelsin {
      width: 140px;
      height: 22px;
      .xs-max-height({ width: 110px; height: 20px;});
      .lg-block({ width: 130px; height: 20px;});
      .sm-block({ width: 110px; height: 16px;});

      path {
        fill: #fff;
      }
    }
  }
  .agency {
    margin-right: auto;
    font-size: 1.7rem;
    font-weight: 300;
    .sm-block({ display: none;});
    &::before {
      content: '|';
      margin: 0 60px;
      .md-block({margin: 0 30px;});
      .xs-max-height({ margin: 0 40px;})
    }
  }
  .phone {
    font-size: 1.7rem;
    color: #fff;
    .xs-block({ display: none;});
    .xs-max-height({ display: none;});
  }
  .submit {
    display: none;
    font-family: @fontBebas;
    font-weight: bold;
    font-size: 2.47rem;
    letter-spacing: 0.7rem;
    color: #fff;
    .bottom-hover();
    .xs-max-height({ display: block;});
    .xs-block({ display: none;});
  }
  .menu-wrapper {
    .xs-block({order: 2;});
    .menu {
      display: flex;
      align-items: center;
      .svg-menu {
        width: 35px;
        height: 35px;
        .sm-block({ width: 30px; height: 30px;})
      }
    }
  }
</style>

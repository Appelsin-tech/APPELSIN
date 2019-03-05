<template>
  <header class="b-header">
    <div class="container">
      <div class="logo-wrapper">
        <img svg-inline src="../assets/img/icon/logoApp.svg" alt="">
        <img svg-inline src="../assets/img/appelsin/appelsin-logo.svg" alt="">
      </div>
      <span class="agency">Digital agency</span>
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
      <div class="menu-wrapper">
        <button class="menu">
          <img svg-inline src="../assets/img/icon/menu.svg" alt="">
        </button>
      </div>
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
    position: fixed;
    padding-top: 30px;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    .xl-comb({ padding-top: 20px;});
    .md-block({padding-top: 20px;});
    .sm-block({padding-top: 10px;});
  }
  .container {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }
  .logo-wrapper {
    display: flex;
    align-items: center;
    .sm-block({ margin-right: auto;});
    .svg-logo {
      width: 38px;
      height: 38px;
      margin-right: 60px;
      .md-block({margin-right: 40px;});
      .sm-block({ width: 30px; height: 30px; margin-right: 25px;});
    }
    .svg-logo-appelsin {
      width: 140px;
      height: 22px;
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
    }
  }
  .phone {
    margin-right: 80px;
    font-size: 1.7rem;
    color: #fff;
    .sm-block({ margin-right: 50px;});
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

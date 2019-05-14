<template>
  <footer class="b-footer" :class="{active : showMenu}">
    <div class="container">
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
      <a class="submit" href="#">Оставить заявку</a>
      <a class="policy" href="#">Политика конфиденциальности</a>

    </div>
  </footer>
</template>

<script>
  export default {
    name: 'footer-block',
    props: ['showMenu']
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";

  .b-footer {
    position: fixed;
    padding-bottom: 30px;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 999;
    .sm-block({ padding-bottom: 50px;});
    .xs-block({ display: none;});
    .xs-max-height({ display: none;});
    &.active {
      display: block;
      .container {
        .sm-block({flex-direction: column;
          align-items: center;});
        .submit,
        .policy {
          color: #000;
        }
        .policy {
          display: block;
          border-bottom: 1px solid #000;
          .sm-block({ order: 3;});
        }
        .phone {
          color: #000;
          .sm-block({ order: 2; display: block;
            margin-bottom: 20px;});
          .xs-max-height({ display: block;});
        }
      }
    }
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      .sm-block({ justify-content: center;});
      .phone {
        display: block;
        font-size: 1.7rem;
        color: #fff;
      }
      .submit {
        display: none;
        font-family: @fontBebas;
        font-weight: bold;
        font-size: 2.47rem;
        letter-spacing: 0.7rem;
        color: #fff;
        .bottom-hover();
      }
      .policy {
        font-size: 1.7rem;
        font-weight: 300;
        color: #fff;
        transition: 0.3s;
        border-bottom: 1px solid #fff;
        .sm-block({ display: none;});
        &:hover {
          border-bottom-color: transparent;
        }
      }
    }
  }
</style>

<template>
  <footer class="b-footer">
    <div class="container">
      <a class="submit" href="#">Оставить заявку</a>
      <a class="policy" href="#">Политика конфиденциальности</a>
    </div>
  </footer>
</template>

<script>
  export default {
    name: 'footer-block',
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
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      .sm-block({ justify-content: center;});
      .submit {
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

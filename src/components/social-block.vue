<template>
  <ul class="b-social">
    <li class="item">
      <a class="item-link" href="#">
        <img svg-inline src="@/assets/img/icon/social/vk.svg" alt="">
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="#">
        <img svg-inline src="@/assets/img/icon/social/twitter.svg" alt="">
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="#">
        <img svg-inline src="@/assets/img/icon/social/facebook-logo.svg" alt="">
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="#">
        <img svg-inline src="@/assets/img/icon/social/youtube.svg" alt="">
      </a>
    </li>
  </ul>
</template>

<script>
  export default {
    name: 'social-block',
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  .b-social {
    position: fixed;
    display: flex;
    left: 0;
    top: 50%;
    flex-direction: column;
    transform: translateY(-50%);
    z-index: 99;
    .item {
      &-link {
        display: flex;
        width: 72px;
        height: 72px;
        align-items: center;
        justify-content: center;
        color: #fff;
        transition: 0.3s;
        &:hover {
          background: #fff;
          color: transparent;
          path {
            fill: #000;
          }
        }
        >svg {
          width: 100%;
          max-width: 22px;
          max-height: 22px;
          path {
            fill: #fff;
            transition: 0.3s;
          }
        }
      }
    }
  }
</style>

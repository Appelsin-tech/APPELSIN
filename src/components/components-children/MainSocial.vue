<template>
  <ul class="b-social">
    <li class="item">
      <a class="item-link" href="https://vk.com/appelsin_tech" target="_blank">
        <img svg-inline src="@/assets/img/icon/social/vk.svg" alt="">
        <img svg-inline src="@/assets/img/icon/social/vk-1.svg" alt="">
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="https://www.instagram.com/appelsin_tech/" target="_blank">
        <img svg-inline src="@/assets/img/icon/social/instagram.svg" alt="">
        <img svg-inline src="@/assets/img/icon/social/instagram-1.svg" alt="">
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="https://www.facebook.com/Appelsintech/" target="_blank">
        <img svg-inline src="@/assets/img/icon/social/fb.svg" alt="">
        <img svg-inline src="@/assets/img/icon/social/fb-1.svg" alt="">
      </a>
    </li>
    <li class="item">
      <a class="item-link" href="https://www.youtube.com/channel/UCt8CyzxKiuecJk_i2f3_rSA" target="_blank">
        <img svg-inline src="@/assets/img/icon/social/you.svg" alt="">
        <img svg-inline src="@/assets/img/icon/social/you-1.svg" alt="">
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
  @import "../../assets/less/_variables";
  .b-social {
    position: fixed;
    display: flex;
    left: 0;
    top: 50%;
    flex-direction: column;
    transform: translateY(-50%);
    z-index: 99;
    .xl-block({ display: none;});
    .item {
      &-link {
        display: flex;
        position: relative;
        width: 72px;
        height: 72px;
        transition: 0.3s;
        &:hover {
          svg {
            &.hover-none {
              opacity: 0;
            }
            &.hover {
              opacity: 1;
            }
          }
        }
        >svg {
          width: 100%;
          height: 100%;
          transition: 0.3s;
          &.hover {
            position: absolute;
            opacity: 0;
          }
          path {
            fill: #fff;
            transition: 0.3s;
          }
        }
      }
    }
  }
</style>

<template>
  <header class="b-header" :class="[{active : showMenu}, {scroll: fixedMenu}, { 'hidden-scroll': !showNavbar }, { 'no-scroll': noScroll }]">
    <div class="container">
      <a class="logo-wrapper" href="#main" @click="hideMenu('#main')">
        <img svg-inline src="../../assets/img/icon/logoApp.svg" alt="">
        <img svg-inline src="../../assets/img/appelsin/appelsin-logo.svg" alt="">
      </a>
      <span class="agency">Digital agency</span>
      <div class="lang-wrapper">
        <lang-select :options="languageSelect" :classOnScroll="noScroll" :activeMenu="showMenu" :selected="selected" v-on:updateOption="newLocale"></lang-select>
      </div>
      <a class="phone" href="tel:+79644952929">+7 (964) 495-29-29</a>
      <!--<a class="submit default" href="#price">Оставить заявку</a>-->
      <a class="submit menu" href="#price" @click="hideMenu('#price')">{{$t('submit-application')}}</a>
      <button class="burger" @click="menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <ul class="menu-list">
      <li class="item">
        <a href="#about" class="link" @click="menuLink('#about')">{{$t('about')}}</a>
      </li>
      <li class="item">
        <a href="#services" class="link" @click="menuLink('#services')">{{$t('services')}}</a>
      </li>
      <li class="item">
        <a href="#cases" class="link" @click="menuLink('#cases')">{{$t('our-work')}}</a>
      </li>
      <li class="item">
        <a href="#price" class="link" @click="menuLink('#price')">{{$t('cost-calculation')}}</a>
      </li>
      <li class="item">
        <a href="#contacts" class="link" @click="menuLink('#contacts')">{{$t('contacts')}}</a>
      </li>
      <li class="item item--submit">
        <a href="#price" class="link" @click="menuLink('#price')">{{$t('submit-application')}}</a>
      </li>
    </ul>
  </header>
</template>

<script>
  import LangSelect from '../components-helpers/LangSelect'
  export default {
    name: 'header-block',
    props: ['showMenu'],
    components: {LangSelect},
    data() {
      return {
        offset: 50,
        showNavbar: true,
        noScroll: true,
        lastScrollPosition: 0,
        scrollValue: 0,
        fixedMenu: false,
        languageSelect: [
          {label: 'Ru', value: 'ru-RU'},
          {label: 'En', value: 'en'},
        ],
        search: false,
        selected: '',
      }
    },
    methods: {
      newLocale(val) {
        this.selected = val
      },
      menuLink(anchor) {
        this.$emit('menu')
        if(this.$route.path === '/404') {
          this.$router.push({path: '/' + anchor})
        }
      },
      menu() {
        this.$emit('menu')
      },
      hideMenu (anchor) {
        if (this.openMenu) {
          this.$emit('menu')
        }
        if(this.$route.path === '/404') {
          this.$router.push({path: '/' + anchor})
        }
      },
      onScroll () {
        let currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
        if (currentScrollPosition <= 0) {
          this.noScroll = true
          return
        }
        if (Math.abs(currentScrollPosition - this.lastScrollPosition) < 60) {
          return
        }
        this.noScroll = false
        this.showNavbar = currentScrollPosition < this.lastScrollPosition
        this.lastScrollPosition = currentScrollPosition
      }
    },
    computed: {
      openMenu () {
        return this.showMenu
      }
    },
    watch: {
      selected: function (newSelected, oldSelected) {
        if (newSelected.value === 'ru-RU') {
          this.$i18n.locale = 'ru-RU'
          localStorage.setItem('lang', 'ru-RU')
        } else if (newSelected.value === 'en') {
          this.$i18n.locale = 'en'
          localStorage.setItem('lang', 'en')
        }
      }
    },
    created() {
      let langLocal = localStorage.getItem('lang')
      if (langLocal === 'ru-RU') {
        this.selected = {label: 'Ru', value: 'ru-RU'}
      } else if (langLocal === 'en') {
        this.selected = {label: 'En', value: 'en'}
      }
    },
    mounted () {
      this.lastScrollPosition = window.pageYOffset
      window.addEventListener('scroll', this.onScroll)
    },

    beforeDestroy () {
      window.removeEventListener('scroll', this.onScroll)
    },
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .b-header {
    position: fixed;
    padding-top: 30px;
    top: 0;
    left: 0;
    right: 0;
    height: 70px;
    bottom: auto;
    z-index: 997;
    transform: translateY(0);
    transition: all 0.3s ease-in-out;
    .md-max-height({ padding-top: 15px; });
    .xs-max-height({ padding-top: 10px; });
    .md-block({ position: absolute; padding-top: 15px; height: 50px;});
    .sm-block({ padding-top: 0; position: fixed;  height: 50px;});
    &::after {
      content: '';
      display: block;
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      background: #fff;
      opacity: 0;
      transform-origin: right top;
      transform: scale(0);
      transition: all 0.3s ease-in-out;
      z-index: 1;
    }
    &.no-scroll {
      .container {
        background: transparent;
      }
    }
    &.hidden-scroll {
      .sm-block({transform: translateY(-100%);});
    }
    &.active {
      position: fixed;
      height: 100%;
      &::after {
        transform: scale(1);
        opacity: 1;
      }
      .container {
        background: transparent;
      }
      .svg-logo {
        path {
          fill: #ffba00;
          transition: 0.3s ease-out;
          transition-delay: 0.2s;
        }
      }
      .svg-logo-appelsin {
        path {
          fill: #000;
          transition: 0.3s ease-out;
          transition-delay: 0.2s;
        }
      }
      .agency {
        color: #000;
        transition: 0.3s ease-out;
        transition-delay: 0.15s;
      }
      .submit {
        .bottom-hover(#000);
        &.menu {
          color: #000;
          transition: 0.3s ease-out;
          transition-delay: 0.1s;
          .sm-block({ display: none;});
        }
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
        z-index: 5;
        .item {
          animation: fadeItemMenu 0.2s ease-in-out forwards;
          animation-delay: 0.2s;
          &:nth-of-type(2) {
            animation-delay: 0.3s;
          }
          &:nth-of-type(3) {
            animation-delay: 0.4s;
          }
          &:nth-of-type(4) {
            animation-delay: 0.5s;
          }
          &:nth-of-type(5) {
            animation-delay: 0.6s;
          }
          &:nth-of-type(6) {
            animation-delay: 0.7s;
          }
        }
      }
    }
  }
  .container {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    transition: all 0.3s ease-in-out;
    .sm-block({ background: rgba(0,0,0,0.8); height: 50px;})
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
  .lang-wrapper {
    margin-right: auto;
  }
  .agency {
    margin-right: 60px;
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
    margin-right: 60px;
    transform: translateY(3px);
    font-family: @fontBebas;
    font-weight: bold;
    font-size: 2.47rem;
    letter-spacing: 0.7rem;
    color: #fff;
    .bottom-hover();
    .md-block({ margin-right: 40px;});
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
      opacity: 0;
      transform: translateX(50px);
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
        .bottom-hover(#000);
        .sm-block({font-size: 2.4rem;
          letter-spacing: 0.6rem;});
      }
    }
  }
  @keyframes fadeItemMenu {
    0% {
      opacity: 0;
      transform: translateX(50px);
    }
    100% {
      opacity: 1;
      transform: translateX(0px);
    }
  }
</style>

<template>
  <div id="app">
    <header-block/>
    <social-block/>
    <div id="nav-menu" class="navigation-wrapper">
      <button class="arrow next-slide" @click="prevSlide"></button>
      <div id="mainMenu" class="main-nav-menu">
        <a data-menuanchor="main" class="link-section" href="#main"></a>
        <a data-menuanchor="services" class="link-section" href="#services"></a>
        <a data-menuanchor="skills" class="link-section" href="#skills"></a>
        <a data-menuanchor="price" class="link-section" href="#price"></a>
        <a data-menuanchor="case" class="link-section" href="#case"></a>
        <a data-menuanchor="contacts" class="link-section" href="#contacts"></a>
      </div>
      <button class="arrow prev-slide" @click="nextSlide"></button>
    </div>
    <main>
      <full-page ref="fullpage" :options="options" id="fullpage">
        <main-block/>
        <services-block/>
        <case-block/>
        <skills-block/>
        <price-block/>
        <contacts-block/>
      </full-page>
    </main>
    <footer-block/>
  </div>
</template>

<script>
  import SocialBlock from './components/social-block'
  import HeaderBlock from './components/header-block'
  import MainBlock from './components/main-block'
  import ServicesBlock from './components/services-block'
  import SkillsBlock from './components/skills-block'
  import PriceBlock from './components/price-block'
  import CaseBlock from './components/cases-block'
  import ContactsBlock from './components/contacts-block'

  import FooterBlock from './components/footer-block'

  export default {
    name: 'app',
    components: {
      HeaderBlock,
      SocialBlock,
      MainBlock,
      ServicesBlock,
      SkillsBlock,
      PriceBlock,
      CaseBlock,
      ContactsBlock,
      FooterBlock
    },
    data() {
      return {
        options: {
          licenseKey: '',
          controlArrows: true,
          fixedElements: '#nav-menu',
          anchors: ['main', 'services', 'skills', 'price', 'case', 'contacts'],
          menu: '#maimMenu',
          //scrollBar: true,
          responsiveHeight: 500,
          responsiveWidth: 319,
          css3: true,
          sectionSelector: '.fullpage-section',
          afterLoad: this.afterLoad,
          onLeave: this.onLeave
        }
      }
    },
    methods: {
      prevSlide() {
        fullpage_api.moveSectionUp();
      },
      nextSlide() {
        fullpage_api.moveSectionDown();
      }
    }
  }
</script>

<style lang="less">
  @import "~fullpage.js/dist/fullpage.min.css";
  @import "assets/less/main.less";

  #app {
    position: relative;
  }
  .navigation-wrapper {
    position: fixed;
    right: 100px;
    top: 50%;
    transform: translateY(-50%);
    .xl-block({ display: none; });
    .arrow {
      width: 36px;
      height: 36px;
      background: url("assets/img/icon/down-arrow.svg") no-repeat center / contain;
      cursor: pointer;
      outline: none;
      &.next-slide {
        transform: rotate(180deg);
      }
    }
    .main-nav-menu {
      display: flex;
      flex-direction: column;
      .link-section {
        display: inline-block;
        width: 35px;
        height: 23px;
        background: linear-gradient(to right, #fff, #fff) no-repeat center;
        background-size: 20px 1px;
        &.active {
          background-size: 35px 1px;
        }
      }
    }
  }
</style>

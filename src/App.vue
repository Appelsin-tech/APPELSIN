<template>
  <div id="app">
    <header-block @menu="activeMenu" :showMenu="showMenu"/>
    <social-block/>
    <div id="nav-menu" class="navigation-wrapper">
      <button class="arrow next-slide" @click="prevSlide"></button>
      <ul id="mainMenu" class="main-nav-menu">
        <li data-menuanchor="main" class="active">
          <a  class="link-section" href="#main"></a>
        </li>
        <li data-menuanchor="services">
          <a  class="link-section" href="#services"></a>
        </li>
        <li data-menuanchor="cases">
          <a  class="link-section" href="#cases"></a>
        </li>
        <li data-menuanchor="about">
          <a  class="link-section" href="#about"></a>
        </li>
        <li data-menuanchor="price">
          <a  class="link-section" href="#price"></a>
        </li>
        <li data-menuanchor="contacts">
          <a  class="link-section" href="#contacts"></a>
        </li>
      </ul>
      <button class="arrow prev-slide" @click="nextSlide"></button>
    </div>
    <main>
      <full-page ref="fullpage" :options="options" id="fullpage">
        <main-block/>
        <services-block/>
        <case-block/>
        <about-block/>
        <price-block/>

        <contacts-block/>
      </full-page>
    </main>
    <footer-block :showMenu="showMenu"/>
    <modal-policy/>
    <modal-response/>
  </div>
</template>

<script>

  import SocialBlock from './components/social-block'
  import HeaderBlock from './components/header-block'
  import MainBlock from './components/main-block'
  import ServicesBlock from './components/services-block'
  import AboutBlock from './components/about-block'
  import PriceBlock from './components/price-block'
  import CaseBlock from './components/cases-block'
  import ContactsBlock from './components/contacts-block'
  import FooterBlock from './components/footer-block'
  import ModalPolicy from './components/modal/ModalPolicy'
  import ModalResponse from './components/modal/ModalResponse'


  export default {
    name: 'app',
    components: {
      HeaderBlock,
      SocialBlock,
      MainBlock,
      ServicesBlock,
      AboutBlock,
      PriceBlock,
      CaseBlock,
      ContactsBlock,
      FooterBlock,
      ModalPolicy,
      ModalResponse
    },
    data() {
      return {
        showMenu: false,
        windowHeight: 0,
        options: {
          licenseKey: '',
          verticalCentered: true,
          controlArrows: true,
          fixedElements: '#nav-menu',
          anchors: ['main', 'services', 'cases', 'about', 'price', 'contacts'],
          menu: '#mainMenu',
          responsiveHeight: 750,
          responsiveWidth: 750,
          // autoScrolling:false,
          // scrollOverflow:true,
          sectionSelector: '.fullpage-section',
          normalScrollElements: '.fancybox-container, .wrapper-overflow, .paragraph, .form-response, .form-response *',
        }
      }
    },
    methods: {
      prevSlide() {
        fullpage_api.moveSectionUp();
      },
      nextSlide() {
        fullpage_api.moveSectionDown();
      },
      activeMenu() {
        this.showMenu = !this.showMenu
      }
    },
    watch: {
      showMenu (newVal, oldVal) {
        if(newVal === true) {
          window.document.body.style.overflow = 'hidden'
          fullpage_api.setAllowScrolling(false);
        } else {
          window.document.body.style.overflow = 'visible'
          fullpage_api.setAllowScrolling(true);
        }
      },
    },
    mounted() {
      this.$nextTick(()=> {
        if (window.location.href === 'https://appelsin.tech/#policy') {
          this.$modal.show('modal-policy')
        }
      })

    }
  }
</script>

<style lang="less">
  @import "assets/less/main.less";
  @import "~fullpage.js/dist/fullpage.min.css";


  #app {
    position: relative;
  }
  .navigation-wrapper {
    position: fixed;
    right: 100px;
    top: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    transform: translateY(-50%);
    @media screen and (max-width: 1700px) {
      right: 50px;
    }
    .xl-block({ display: none; });
    .arrow {
      position: relative;
      width: 26px;
      height: 26px;
      cursor: pointer;
      outline: none;
      &::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 26px;
        height: 26px;
        border-top: 1px solid #fff;
        border-right: 1px solid #fff;
      }
      &.prev-slide {
        transform: rotate(135deg);
      }
      &.next-slide {
        transform: rotate(-45deg);
      }
    }

    .main-nav-menu {
      display: flex;
      flex-direction: column;
      margin: 35px 0;
      .sm-height({ margin: 15px 0;});
      li {
        margin-bottom: 10px;
        &:last-child {
          margin-bottom: 0;
        }
        &.active {
          .link-section {
            background-size: 35px 1px;
          }
        }
      }
      .link-section {
        display: inline-block;
        width: 40px;
        height: 25px;
        background: linear-gradient(to right, #fff, #fff) no-repeat center;
        background-size: 20px 1px;
        .sm-height({ height: 18px;});
      }
    }
  }

</style>

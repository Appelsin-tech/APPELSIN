<template>
  <div>

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
        <main-hero/>
        <main-services :fullPageReady="fullPageReady" :resize="resize"/>
        <main-cases :fullPageReady="fullPageReady" :resize="resize"/>
        <main-about :fullPageReady="fullPageReady" :resize="resize"/>
        <main-price/>
        <main-contacts/>
      </full-page>
    </main>
  </div>
</template>

<script>


  import MainHero from './components-children/MainHero'
  import MainServices from './components-children/MainServices'
  import MainAbout from './components-children/MainAbout'
  import MainPrice from './components-children/MainPrice'
  import MainCases from './components-children/MainCases'
  import MainContacts from './components-children/MainContacts'

  export default {
    name: "TheMain",
    components:{
      MainHero,
      MainServices,
      MainAbout,
      MainPrice,
      MainCases,
      MainContacts,
    },
    data() {
      return {
        resize: true,
        windowWidth: window.innerWidth,
        fullPageReady: false,
        options: {
          licenseKey: '',
          verticalCentered: true,
          controlArrows: true,
          fixedElements: '#nav-menu',
          anchors: ['main', 'services', 'cases', 'about', 'price', 'contacts'],
          menu: '#mainMenu',
          responsiveHeight: 750,
          responsiveWidth: 750,
          onLeave: this.getActiveSlideCustom,
          afterRender: ()=> {
            this.fullPageReady = true
            setTimeout(()=>{
              this.fullPageReady = false
            }, 100)
          },
          // autoScrolling:false,
          // scrollOverflow:true,
          sectionSelector: '.fullpage-section',
          normalScrollElements: '.fancybox-container, .wrapper-overflow, .paragraph, .form-response, .form-response *, .g-item-form__label',
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
      getActiveSlideCustom(origin, destination) {
        this.$emit('updateOption', destination.anchor);
      },
      resizeSwiper() {
        this.windowWidth = window.innerWidth
      }
    },
    created() {
      window.addEventListener('resize', this.resizeSwiper)
    },
    destroyed() {
      window.removeEventListener('resize', this.resizeSwiper)
    },
    watch: {
      windowWidth(newVal, oldVal) {
        if (newVal !== oldVal) {
          this.resize = false
          setTimeout(()=>{
            this.resize = true
          },100)
        }
      }
    },
  }
</script>

<style scoped lang="less">
  @import "../assets/less/_variables";
  @import "~fullpage.js/dist/fullpage.min.css";
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

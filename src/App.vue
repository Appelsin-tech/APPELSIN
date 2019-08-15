<template>
  <div id="app" >
    <main-header @menu="activeMenu" :showMenu="showMenu"/>
    <main-social/>
    <modal-policy :classSection="classSection"/>
    <modal-response/>
    <router-view v-on:updateOption="classAnchor"/>
    <main-footer :showMenu="showMenu"/>
  </div>
</template>

<script>
  import MainSocial from './components/components-children/MainSocial'
  import MainHeader from './components/components-children/MainHeader'
  import MainFooter from './components/components-children/MainFooter'
  import ModalPolicy from './components/modal/ModalPolicy'
  import ModalResponse from './components/modal/ModalResponse'


  export default {
    name: 'app',
    components: {
      MainSocial,
      MainHeader,
      MainFooter,
      ModalPolicy,
      ModalResponse
    },
    data() {
      return {
        showMenu: false,
        windowHeight: 0,
        classSection: 'main',
      }
    },
    methods: {
      classAnchor (e) {
        this.classSection = e
      },
      activeMenu() {
        this.showMenu = !this.showMenu
      },
    },
    watch: {
      showMenu (newVal, oldVal) {
        if(newVal === true) {
          window.document.body.style.overflow = 'hidden'
          if(this.$route.path === '/') {
            fullpage_api.setAllowScrolling(false);
          }
        } else {
          window.document.body.style.overflow = 'visible'
          if(this.$route.path === '/') {
            fullpage_api.setAllowScrolling(true);
          }
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
  @import "./assets/less/main.less";
  #app {
    position: relative;
  }
</style>

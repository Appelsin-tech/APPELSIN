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
        fromRoute: ''
      }
    },
    methods: {
      classAnchor (e) {
        if(this.$route.path === '/404') {
          this.classSection = '#main'
        } else {
          this.classSection = e
        }
      },
      activeMenu() {
        this.showMenu = !this.showMenu
      },
    },
    watch: {
      '$route' (to, from) {
        this.fromRoute = from.path
      },
      showMenu (newVal, oldVal) {
        if(newVal === true) {
          if(this.$route.path === '/') {
            window.document.body.style.overflow = 'hidden'
            fullpage_api.setAllowScrolling(false);
          }
        } else {
          if(this.$route.path === '/' && this.fromRoute !== '/404') {
            window.document.body.style.overflow = 'visible'
            fullpage_api.setAllowScrolling(true);
          }
        }
      },
    },
    mounted() {
      this.$nextTick(()=> {
        alert(this.$i18n.locale)
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

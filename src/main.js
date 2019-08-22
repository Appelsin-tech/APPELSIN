import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueModal from 'vue-js-modal'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import VueFullPage from 'vue-fullpage.js'
import { VueReCaptcha } from 'vue-recaptcha-v3'
import i18n from './i18n'


// For more options see below
Vue.use(VueReCaptcha, {
  siteKey: '6LeNvrAUAAAAAAqBxJnWqsd2DdvNeKgZLIQ9tUwa',
  loaderOptions: {
    useRecaptchaNet: true
  }
})
Vue.use(VueFullPage);


Vue.use(VueAwesomeSwiper, /* { default global options } */)


Vue.config.productionTip = false
Vue.use(VueModal, {dialog: true, dynamic: true, injectModalsContainer: true})


new Vue({
  router,
  i18n,
  render: h => h(App)
}).$mount('#app')

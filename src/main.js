import Vue from 'vue'
import App from './App.vue'
import VueModal from 'vue-js-modal'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import VueFullPage from 'vue-fullpage.js'
Vue.use(VueFullPage);


Vue.use(VueAwesomeSwiper, /* { default global options } */)


Vue.config.productionTip = false
Vue.use(VueModal, {dialog: true, dynamic: true, injectModalsContainer: true})

Vue.directive('scroll', {
  inserted: function (el, binding) {
    let f = function (evt) {
      if (binding.value(evt, el)) {
        window.removeEventListener('scroll', f)
      }
    }
    window.addEventListener('scroll', f)
  }
})

new Vue({
  render: h => h(App),
}).$mount('#app')

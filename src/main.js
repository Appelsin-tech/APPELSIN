import Vue from 'vue'
import App from './App.vue'
import VueModal from 'vue-js-modal'
import VueAwesomeSwiper from 'vue-awesome-swiper'



Vue.use(VueAwesomeSwiper, /* { default global options } */)


Vue.config.productionTip = false
Vue.use(VueModal, {dialog: true, dynamic: true, injectModalsContainer: true})


new Vue({
  render: h => h(App),
}).$mount('#app')

import Vue from 'vue'
import App from './App.vue'
import VueModal from 'vue-js-modal'

import VueFullPage from 'vue-fullpage.js'

Vue.use(VueFullPage);
Vue.config.productionTip = false
Vue.use(VueModal, {dialog: true, dynamic: true, injectModalsContainer: true})


new Vue({
  render: h => h(App),
}).$mount('#app')

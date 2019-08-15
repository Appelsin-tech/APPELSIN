import Vue from 'vue'
import Router from 'vue-router'
import TheMain from './components/TheMain'
import TheError from './components/TheError'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'TheMain',
      component: TheMain
    },
    {
      path: '/404',
      name: 'TheError',
      component: TheError
    },
    {
      path: '*',
      redirect: '/404',
    },
  ]
})

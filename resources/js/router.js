import VueRouter from 'vue-router'

Vue.use(VueRouter)

/***********************************************
 ***************** Vue Routes ******************
 **********************************************/

let routes = [
  // Admin Tab Routes
  {
    path: '/users',
    component: require('./components/Admin/Users.vue').default
  },
  // Profile Tab Route
  {
    path: '/profile',
    component: require('./components/Profile/Profile.vue').default
  },
  {
    path: '/developer',
    component: require('./components/Developer.vue').default
  },
  // National Tab Routes
  {
    path: '/master-dashboard',
    component: require('./components/Master/MasterDashboard.vue').default
  },
  // VIC Tab Routes
  {
    path: '/manager-vic',
    component: require('./components/StateVIC/Manager.vue').default
  },
  // QLD Tab Routes
  {
    path: '/manager-qld',
    component: require('./components/StateQLD/Manager.vue').default
  },
  // NSW Tab Routes
  {
    path: '/manager-nsw',
    component: require('./components/StateNSW/Manager.vue').default
  },
  // SA Tab Routes
  {
    path: '/manager-sa',
    component: require('./components/StateSA/Manager.vue').default
  }
]

/***********************************************
 *************** Vue Components ****************
 **********************************************/

Vue.component(
  'example-component',
  require('./components/ExampleComponent.vue').default
)
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
)
Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
)
Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
)
Vue.component(
  'new-quote-requests-bar',
  require('./components/Charts/NewQuoteRequestsBarChart.vue').default
)
Vue.component(
  'new-quote-requests-pie',
  require('./components/Charts/NewQuoteRequestsPieChart.vue').default
)
Vue.component(
  'sales-line-gbg',
  require('./components/Charts/SalesFortnightGBGLineChart.vue').default
)
Vue.component(
  'sales-line-new',
  require('./components/Charts/SalesFortnightNEWLineChart.vue').default
)
Vue.component(
  'sales-line-now',
  require('./components/Charts/SalesFortnightNOWLineChart.vue').default
)
Vue.component(
  'sales-line-smt',
  require('./components/Charts/SalesFortnightSMTLineChart.vue').default
)

const router = new VueRouter({
  mode: 'history',
  routes, // short for `routes: routes`
  linkActiveClass: 'active'
})

const app = new Vue({
  el: '#app',
  router
})

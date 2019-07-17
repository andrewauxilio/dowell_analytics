import VueRouter from 'vue-router'

Vue.use(VueRouter)

/***********************************************
 ***************** Vue Routes ******************
 **********************************************/

let routes = [
  // Default Page
  { path: '/home', redirect: '/welcome' },
  // Contact Page
  {
    path: '/contact',
    component: require('./components/Contact.vue').default
  },
  // Welcome Page
  {
    path: '/welcome',
    component: require('./components/Welcome.vue').default
  },
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
    path: '/dashboard-nat',
    component: require('./components/Master/Dashboard.vue').default
  },
  {
    path: '/eports-nat',
    component: require('./components/Master/Reports.vue').default
  },
  // VIC Tab Routes
  {
    path: '/manager-vic',
    component: require('./components/StateVIC/Manager.vue').default
  },
  // QLD Tab Routes
  {
    path: '/dashboard-qld',
    component: require('./components/StateQLD/Dashboard.vue').default
  },
  {
    path: '/reports-qld',
    component: require('./components/StateQLD/Reports.vue').default
  },
  // NSW Tab Routes
  {
    path: '/dashboard-nsw',
    component: require('./components/StateNSW/Dashboard.vue').default
  },
  {
    path: '/reports-nsw',
    component: require('./components/StateNSW/Reports.vue').default
  },
  // SA Tab Routes
  {
    path: '/manager-sa',
    component: require('./components/StateSA/Manager.vue').default
  },
  // SA Tab Routes
  {
    path: '/messenger',
    component: require('./components/Messenger/Messenger.vue').default
  },
  // Not Found Page
  {
    path: '*',
    component: require('./components/PageNotFound.vue').default
  }
]

/***********************************************
 *************** Vue Components ****************
 **********************************************/

Vue.component(
  'example-component',
  require('./components/ExampleComponent.vue').default
)
Vue.component('not-found', require('./components/PageNotFound.vue').default)
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
  require('./components/Charts/NewQuoteRequests/NewQuoteRequestsBarChart.vue')
    .default
)
Vue.component(
  'new-quote-requests-pie',
  require('./components/Charts/NewQuoteRequests/NewQuoteRequestsPieChart.vue')
    .default
)
Vue.component(
  'sales-line-nat',
  require('./components/Charts/Sales/SalesFortnightNATLineChart.vue').default
)
// QLD
Vue.component(
  'sales-line-qld',
  require('./components/Charts/Sales/SalesFortnightQLDLineChart.vue').default
)
Vue.component(
  'sales-line-gbg',
  require('./components/Charts/Sales/SalesFortnightGBGLineChart.vue').default
)
Vue.component(
  'sales-bar-gbg',
  require('./components/Charts/Sales/SalesFortnightGBGBarChart.vue').default
)
Vue.component(
  'qr-pie-qld',
  require('./components/Charts/NewQuoteRequests/NewQuoteRequestsQLD.vue')
    .default
)
// NSW
Vue.component(
  'sales-line-nsw',
  require('./components/Charts/Sales/SalesFortnightNSWLineChart.vue').default
)
Vue.component(
  'sales-line-new',
  require('./components/Charts/Sales/SalesFortnightNEWLineChart.vue').default
)
Vue.component(
  'sales-line-now',
  require('./components/Charts/Sales/SalesFortnightNOWLineChart.vue').default
)
Vue.component(
  'sales-line-smt',
  require('./components/Charts/Sales/SalesFortnightSMTLineChart.vue').default
)
Vue.component(
  'qr-pie-nsw',
  require('./components/Charts/NewQuoteRequests/NewQuoteRequestsNSW.vue')
    .default
)
Vue.component(
  'sales-bar-new',
  require('./components/Charts/Sales/SalesFortnightNEWBarChart.vue').default
)
Vue.component(
  'sales-bar-now',
  require('./components/Charts/Sales/SalesFortnightNOWBarChart.vue').default
)
Vue.component(
  'sales-bar-smt',
  require('./components/Charts/Sales/SalesFortnightSMTBarChart.vue').default
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

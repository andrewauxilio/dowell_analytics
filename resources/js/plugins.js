import { Form, HasError, AlertError } from 'vform'
import moment from 'moment'
import swal from 'sweetalert2'
import VueAxios from 'vue-axios'
import axios from 'axios'
import VueProgressBar from 'vue-progressbar'

// Vue Form
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// Laravel-Vue-Pagination
Vue.component('pagination', require('laravel-vue-pagination'))

// SweetAlert
window.swal = swal
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})
window.toast = toast
window.Fire = new Vue()

// Axios
Vue.use(VueAxios, axios)

// Vue Progress bar
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '6px'
})

/***********************************************
 **************** VUE FILTERS ******************
 **********************************************/

// Format String to uppercase first letter
Vue.filter('toUpperCase', function (text) {
  return text.charAt(0).toUpperCase() + text.slice(1)
})

// Format Date
Vue.filter('myDate', function (created) {
  return moment(created).format('MMMM Do YYYY')
})

// Change location abbreviations to long names
Vue.filter('ToLongName', function (text) {
  switch (text) {
    case 'GBG':
      return (text = 'Geebung')
      break
    case 'MOO':
      return (text = 'Moonah')
      break
    case 'ELI':
      return (text = 'Elizabeth')
      break
    case 'LON':
      return (text = 'Londsdale')
      break
    case 'SMT':
      return (text = 'Smithfield')
      break
    case 'TVN':
      return (text = 'Townsville')
      break
    case 'NEW':
      return (text = 'Newcastle')
      break
    case 'SHP':
      return (text = 'Shepparton')
      break
    case 'NOW':
      return (text = 'Nowra')
      break
    case 'BAY':
      return (text = 'Bayswater')
      break
    case 'QBN':
      return (text = 'Queanbeyan')
      break
    default:
      return text
  }
})

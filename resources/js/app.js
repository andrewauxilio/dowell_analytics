/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueAxios from 'vue-axios';
import axios from 'axios';
require("./bootstrap");
require("admin-lte");

window.Vue = require("vue");
Vue.use(VueAxios, axios);

//Progress Bar
import VueProgressBar from "vue-progressbar";
Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "6px",
});

//Epic Spinners
// import EpicSpinner from 'epic-spinners';
// Vue.use(EpicSpinner, {
//     color: "'#ff1d5e'",
//     size: "60",
// });

//ChartJS
import Chart from "chart.js";
import hchsvuecharts from "hchs-vue-charts";
Vue.use(window.VueCharts);

//vform, HasError and AlertError
import { Form, HasError, AlertError } from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//Sweet Alert
import swal from "sweetalert2";
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
});
window.toast = toast;

window.Fire = new Vue();

//Make first letter capital
Vue.filter("toUpperCase", function(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});

//Moment JS change date format
import moment from "moment";
Vue.filter("myDate", function(created) {
    return moment(created).format("MMMM Do YYYY");
});

Vue.filter("ToLongName", function(text) {
    switch (text) {
        case "GBG":
            return (text = "Geebung");
            break;
        case "MOO":
            return (text = "Moonah");
            break;
        case "ELI":
            return (text = "Elizabeth");
            break;
        case "LON":
            return (text = "Londsdale");
            break;
        case "SMT":
            return (text = "Smithfield");
            break;
        case "TVN":
            return (text = "Townsville");
            break;
        case "NEW":
            return (text = "Newcastle");
            break;
        case "SHP":
            return (text = "Shepparton");
            break;
        case "NOW":
            return (text = "Nowra");
            break;
        case "BAY":
            return (text = "Bayswater");
            break;
        default:
            return text;
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import VueRouter from "vue-router";
Vue.use(VueRouter);

let routes = [
    //Admin Tab Routes
    {
        path: "/users",
        component: require("./components/Admin/Users.vue").default,
    },
    {
        path: "/developer",
        component: require("./components/Developer.vue").default,
    },
    //National Tab Routes
    {
        path: "/master-dashboard",
        component: require("./components/Master/MasterDashboard.vue").default,
    },
    //VIC Tab Routes
    {
        path: "/manager-vic",
        component: require("./components/StateVIC/Manager.vue").default,
    },
    //QLD Tab Routes
    {
        path: "/manager-qld",
        component: require("./components/StateQLD/Manager.vue").default,
    },
    //NSW Tab Routes
    {
        path: "/manager-nsw",
        component: require("./components/StateNSW/Manager.vue").default,
    },
    //SA Tab Routes
    {
        path: "/manager-sa",
        component: require("./components/StateSA/Manager.vue").default,
    },
];

const router = new VueRouter({
    mode: "history",
    routes, // short for `routes: routes`
    linkActiveClass: "active",
});

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "passport-clients",
    require("./components/passport/Clients.vue").default
);
Vue.component(
    "passport-authorized-clients",
    require("./components/passport/AuthorizedClients.vue").default
);
Vue.component(
    "passport-personal-access-tokens",
    require("./components/passport/PersonalAccessTokens.vue").default
);
Vue.component(
    "new-quote-requests-bar", 
    require('./components/Charts/NewQuoteRequestsBarChart.vue').default
);
Vue.component(
    "new-quote-requests-pie", 
    require('./components/Charts/NewQuoteRequestsPieChart.vue').default
);
Vue.component(
    "sales-line-gbg", 
    require('./components/Charts/SalesFortnightGBGLineChart.vue').default
);
Vue.component(
    "sales-line-new", 
    require('./components/Charts/SalesFortnightNEWLineChart.vue').default
);
Vue.component(
    "sales-line-now", 
    require('./components/Charts/SalesFortnightNOWLineChart.vue').default
);
Vue.component(
    "sales-line-smt", 
    require('./components/Charts/SalesFortnightSMTLineChart.vue').default
);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router,
});

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

import Form from "./core/Form";
import PortalVue from 'portal-vue'

window.Vue = Vue;
Vue.use(VueRouter);


Vue.use(PortalVue);

window.axios = axios;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};


window.Form = Form;

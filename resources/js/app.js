import './bootstrap';

import Form from './core/Form';

import axios from 'axios';
import Example from './components/Example';

import Notification from "./components/Notification";

import Coupon from "./components/Coupon";

import router from './routes';
import Carousel from "./components/Carousel";
import SeriesDropdown from "./components/SeriesDropdown";
import SupportButton from "./components/SupportButton";
import Accordion from "./components/Accordion";
import Accordion2 from "./components/Accordion2";
import Pinned from "./components/Pinned";

window.axios = axios;
window.Form = Form;


new Vue({
    el: '#app',

    components: {
        Example,
        Notification,
        Coupon,
        Carousel,
        SeriesDropdown,
        SupportButton,
        Accordion,
        Accordion2,
        Pinned
    },

    router,

    data: {
        form: new Form({
            name: '',
            description: ''
        }),

        coupon: 'FREEBIE',
    },

    methods: {
        onSubmit() {
            this.form.post('/projects')
                .then(data => console.log(data))
                .catch(errors => console.log(errors));
        }
    }
});

let store = {
    user: {
        name: 'John Doe'
    }
};


new Vue({
    el: '#one',

    data: {
        shared: store
    }
});


new Vue({
    el: '#two',

    data: {
        shared: store
    },

});




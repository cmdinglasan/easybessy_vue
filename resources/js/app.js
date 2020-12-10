require('./bootstrap');

require('moment');

import Vue from 'vue';

import 'alpinejs';

import { asset } from '@codinglabs/laravel-asset'

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import VueApexCharts from 'vue-apexcharts'




Vue.mixin({
    methods: {
        route
    }
});
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueApexCharts);

const app = document.getElementById('app');



new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
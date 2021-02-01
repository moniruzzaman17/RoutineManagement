import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

import Home from'../components/Home.vue';

const routes = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/',
			component: Home,
			name: 'home',
		}
	]
});

export default routes;
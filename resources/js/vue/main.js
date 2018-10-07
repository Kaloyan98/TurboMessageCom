import Vue from 'vue';
import Vuex from 'vuex';

// components
import './components/message-section';
import './components/icon';

// store
import messenger from './store/messenger/index';

if (document.querySelector('#message-app')) {
	// setup store
	Vue.use(Vuex);

	const store = new Vuex.Store({
		modules: {
			messenger
		}
	});

	const app = new Vue({
		el: '#message-app',
		store
	});
}
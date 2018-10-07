import Vue from 'vue';
import { mapGetters } from 'vuex';

Vue.component('tcm-message-section', {
	computed: {
		...mapGetters('messenger', [
			'isMessageSectionShown'
		]),
	}
});
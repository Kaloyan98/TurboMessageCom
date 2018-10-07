import Vue from 'vue';

import { mapActions, mapGetters } from 'vuex';

Vue.component('tcm-icon', {
	computed: {
		...mapGetters('messenger', [
			'isMessageSectionShown'
		]),
	},
	data() {
		return {
			localShowMessageSection
		};
	},
	methods: {
		...mapActions('messenger', [
			'showMessageSection'
		]),
		toggleMessageSection() {
			this.showMessageSection(!this.isMessageSectionShown);
		},
	}
});
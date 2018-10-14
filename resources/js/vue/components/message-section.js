import Vue from 'vue';
import { mapGetters, mapActions } from 'vuex';

Vue.component('tcm-message-section', {
	computed: {
		...mapGetters('messenger', [
			'isMessageSectionShown',
			'getMessages'
		]),
	},
	data() {
		return {
			textMessage: ''
		};
	},
	methods: {
		...mapActions('messenger', [
			'addMessage',
		]),
		sendMessage() {
			this.addMessage({
				imageURL: 'https://picsum.photos/200/300?dfs=df434',
				text: this.textMessage,
			});
		},
		getImageStyle(message) {
			return `background-image: url(${message.imageURL});`
		}
	},
});
import Vue from 'vue';
import axios from 'axios';
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
			if (!this.textMessage) {
				return;
			}

			this.addMessage({
				imageURL: 'https://picsum.photos/200/300?dfs=df434',
				text: this.textMessage,
			});

			const formData = new FormData();
			formData.append('message', this.textMessage);

			axios.post('test-ajax.php', formData, {
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
			})
				.then((response) => {
					console.log(response);
				})
				.catch((error) => {
					console.error(error);
				});

		this.textMessage = '';
		},
		getImageStyle(message) {
			return `background-image: url(${message.imageURL});`
		}
	},
});
import { ADD_MESSAGE, SHOW_MESSAGE_SECTION } from './mutations';

export default {
	addMessage({ commit }, payload) {
		commit(ADD_MESSAGE, payload);
	},
	showMessageSection({ commit }, payload) {
		commit(SHOW_MESSAGE_SECTION, payload);
	}
};
import { ADD_MESSAGE } from './mutations';

export default {
	addMessage({ commit }, payload) {
		commit(ADD_MESSAGE);
	}
};
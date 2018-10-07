export const ADD_MESSAGE = 'addMessage';
export const SHOW_MESSAGE_SECTION = 'showMessageSection';

export default {
	[ADD_MESSAGE](state, payload) {

	},
	[SHOW_MESSAGE_SECTION](state, payload) {
		state.showMessageSection = payload;
	}
}
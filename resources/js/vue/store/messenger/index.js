import state from './state';
import getters from './getters';
import actions from './actions';
import mutations from './mutations';

const namespaced = true;

export default {
	namespaced,
	state,
	getters,
	actions,
	mutations,
};
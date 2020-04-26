import PartnerAPI from "../api/partner";

const CREATING_PARTNER = "CREATING_PARTNER",
  CREATING_PARTNER_SUCCESS = "CREATING_PARTNER_SUCCESS",
  CREATING_PARTNER_ERROR = "CREATING_PARTNER_ERROR",
  FETCHING_PARTNERS = "FETCHING_PARTNERS",
  FETCHING_PARTNERS_SUCCESS = "FETCHING_PARTNERS_SUCCESS",
  FETCHING_PARTNERS_ERROR = "FETCHING_PARTNERS_ERROR";


export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    partners: []
  },
  getters: {
    isLoading(state) {
      return state.isLoading;
    },
    hasError(state) {
      return state.error !== null;
    },
    error(state) {
      return state.error;
    },
    hasPartners(state) {
      return state.partners.length > 0;
    },
    partners(state) {
      return state.partners;
    },
  },
  mutations: {
    [CREATING_PARTNER](state) {
      state.isLoading = true;
      state.error = null;
    },
    [CREATING_PARTNER_SUCCESS](state, partner) {
      state.isLoading = false;
      state.error = null;
      state.partners.unshift(partner);
    },
    [CREATING_PARTNER_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
      state.partners = [];
    },
    [FETCHING_PARTNERS](state) {
      state.isLoading = true;
      state.error = null;
      state.partners = [];
    },
    [FETCHING_PARTNERS_SUCCESS](state, partners) {
      state.isLoading = false;
      state.error = null;
      state.partners = partners;
    },
    [FETCHING_PARTNERS_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
      state.partners = [];
    },
    
    // [DELETING_POST](state, id){
    //   let idx = state.posts.indexOf(id)
    //   state.posts.splice(idx,1)
    //  }
  },
  actions: {
    async create({ commit }, payload) {
      commit(CREATING_PARTNER);
      try {
        let response = await PartnerAPI.create(payload.name, payload.website, payload.img);
        commit(CREATING_PARTNER_SUCCESS, response.data);
        return response.data;
      } catch (error) {
        commit(CREATING_PARTNER_ERROR, error);
        return null;
      }
    },
    async findAll({ commit }) {
      commit(FETCHING_PARTNERS);
      try {
        let response = await PartnerAPI.findAll();
        commit(FETCHING_PARTNERS_SUCCESS, response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_PARTNERS_ERROR, error);
        return null;
      }
    },
    
  }
};
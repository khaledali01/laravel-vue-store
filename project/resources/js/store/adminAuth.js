import {request} from "../app";


export const adminAuth = {
    namespaced: true,
    state: {
        isLogged: false
    },
    actions: {
        checkLogin({commit}) {
            return axios.post('/api/admin/me', {},
                {
                    headers: {
                        Authorization: localStorage.user
                    }
                }).then((res) => {
                commit('setLogin')
                request.defaults.headers["Authorization"] = localStorage.user
            }).catch(() => {
                throw new Error()
            })
        },
        login({commit, dispatch}, data) {
            axios.post('/api/login', data)
                .then((res) => {
                    localStorage.user = res.data.token_type + ' ' + res.data.access_token
                    dispatch('checkLogin')
                })
        }
    },
    mutations: {
        setLogin(state) {
            state.isLogged = true
        }
    }
}

export default adminAuth

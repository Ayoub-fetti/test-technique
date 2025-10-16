import {defineStore} from 'pinia'
import {login, logout,register} from '../api/auth';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
    }),
    actions: {
        async register(name, email, password, password_confirmation) {
            const data = await register(name, email, password, password_confirmation);
            this.user = data.user;
        },
        async login(email, password) {
            const data = await login(email, password);
            this.token = data.access_token;
            this.user = data.user;
        },
        async logout() {
            await logout();
            this.user = null;
            this.token = null;
            localStorage.removeItem('token');
        },
    },
});
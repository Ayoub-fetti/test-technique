import { createRouter, createWebHistory } from 'vue-router'

import dash from './components/dash.vue'
import login from './components/login.vue'
import register from './components/register.vue'
const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes: [
		{
			path: '/',
			name: 'dash',
			component: dash
		},
        {
            path: '/login',
            name : 'login',
            component: login
        },
                {
            path: '/register',
            name : 'register',
            component: register
        }
	]
})

export default router
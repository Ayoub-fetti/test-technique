<script setup>
import { ref } from 'vue';
import { useAuthStore } from '../store/auth';
import { useRouter } from 'vue-router';

const email = ref('');
const password = ref('');
const auth = useAuthStore();
const route = useRouter();

async function handleLogin() {
    try {
        await auth.login(email.value,password.value);
        route.push('/dash');
    } catch (e) {
        // alert(e.response?.data?.message || 'login failed');
        console.error(e);
    }
}
</script>


<template>
    <div>
        <h1>Login</h1>
        <input v-model="email" placeholder="email">
        <input v-model="password" type="password" placeholder="password">
        <button @click="handleLogin()">Login</button>
    </div>
</template>
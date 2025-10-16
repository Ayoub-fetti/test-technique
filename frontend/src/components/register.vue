<script setup>
import { ref } from 'vue';
import { useAuthStore } from '../store/auth';
import { useRouter } from 'vue-router';

const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');

const auth = useAuthStore();
const route = useRouter();

async function handleRegister() {
    try {
        await auth.register(name.value, email.value, password.value, password_confirmation.value);
        route.push('/dash');
    } catch (e) {
       // alert(e.response?.data?.message || 'register failed');
        console.error(e);

    }
}


</script>
<template>
    <div>
        <h1>register</h1>
        <input v-model="name" placeholder="name">
        <input v-model="email" placeholder="email">
        <input v-model="password" type="password" placeholder="password">
        <input v-model="password_confirmation" type="password" placeholder="password">
        <button @click="handleRegister()">Register</button>
    </div>
</template>
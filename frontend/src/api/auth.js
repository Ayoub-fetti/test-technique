import axios from "../axios";
export async function login(email,password) {
    const res = await axios.post('/auth/login', {email, password});
    localStorage.setItem('token', res.data.access_token);
    return res.data;
    
}
export async function register(name,email,password,password_confirmation) {
    const res = await axios.post('/auth/register' , {name,email,password,password_confirmation});
    return res.data;
}

export async function logout() {
    await axios.post('/logout');
    localStorage.removeItem('token');
}
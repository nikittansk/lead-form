import { createApp } from 'vue';
import App from './src/App.vue';
import router from './src/router/router.js';
import axios from 'axios';
window.axios = axios;


window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.content;

createApp(App)
    .use(router)
    .mount('#app');


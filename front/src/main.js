import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
export const BACKAND_URL = 'https://9060-87-117-53-132.ngrok-free.app'

const app = createApp(App)
app.use(router)

app.mount('#app')

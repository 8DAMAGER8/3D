import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
export const BACKAND_URL = 'https://4bc9-5-139-109-74.ngrok-free.app'

const app = createApp(App)
app.use(router)

app.mount('#app')

import axios from "axios";
import router from "./router";
import {BACKAND_URL} from "./main";

const api = axios.create();

//start request
api.interceptors.request.use(config => {

    if (localStorage.getItem('access_token'))
    config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`;
    // config.headers = {
    //     'ngrok-skip-browser-warning': 'any'
    // };

    return config
}, error => {
})

//end request
//start response

api.interceptors.response.use( {}, error => {
    console.log()
    if (error.response.data.message === 'Token has expired'){
        return axios.post(BACKAND_URL + `/api/auth/refresh`,{},{
            headers: {
                'ngrok-skip-browser-warning': 'any',
                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
        }).then(res => {
            localStorage.setItem('access_token', res.data.access_token)

            error.config.headers.authorization = `Bearer ${res.data.access_token}`

            return api.request(error.config)
        })
    }
    if (error.response.status === 401) {
         router.push({name: 'login'})
    }
})
//end response
export default api

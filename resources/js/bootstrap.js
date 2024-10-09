import axios from 'axios';
import Cookies from "js-cookie";

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = "Bearer " + Cookies.get('access_token');

import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import AppCurrenciesIndex from "./Components/AppCurrenciesIndex.vue";

/*axios.get("api/v1/currencies").then(response => {
    console.log(response.data);
});*/

/*axios.post("api/v1/login", {email: "gamespluck@gmail.com", password: "mamlasy1"}).then(response => {
    console.log(response.data.access_token);
    Cookies.set('access_token', response.data.access_token);
});
*/



const app = createApp({
});

app.component('AppCurrenciesIndex', AppCurrenciesIndex);
app.mount('#app');

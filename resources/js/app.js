import './bootstrap';
import Cookies from 'js-cookie'


axios.get("api/v1/currencies").then(response => {
    console.log(response.data);
});

/*axios.post("api/v1/login", {email: "gamespluck@gmail.com", password: "mamlasy1"}).then(response => {
    console.log(response.data.access_token);
    Cookies.set('access_token', response.data.access_token);
});
*/

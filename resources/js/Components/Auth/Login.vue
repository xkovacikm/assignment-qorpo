<template>
  <div v-if="authenticated === false">
    <input class="form-control mb-3" type="email" placeholder="Email" v-model="email" />
    <input class="form-control mb-3" type="password" placeholder="Password" v-model="password" />

    <div v-if="errors">
        <div v-for="errorsForAttribute in errors">
            <div v-for="error in errorsForAttribute">
                <div class="alert alert-danger">{{ error }}</div>
            </div>
        </div>
    </div>
    <div v-if="success">
        <div class="alert alert-success">Successfully logged in.</div>
    </div>
    <button class="btn btn-primary mt-3" @click="login">Login</button>
  </div>
  <div v-else-if="authenticated === true">
      <h1>Welcome!</h1>
      <div class="btn btn-danger" @click="logout">Logout</div>
  </div>

</template>

<script>
import cookie from "js-cookie";

export default {
  data() {
    return {
      authenticated: null,
      email: "",
      password: "",
      errors: {},
      success: null,
    };
  },
  methods: {
      checkAuthenticated(){
          axios.post("/api/v1/auth/me").then( response => {
              this.authenticated = true;
          }).catch( error => {
              this.authenticated = false;
          });
      },

      login() {
          axios.post("/api/v1/auth/login", {
              email: this.email,
              password: this.password,
          }).then( response => {
              cookie.set("access_token", response.data.access_token);
              this.success = true;
              window.location.reload();
          }).catch( error  => {
              this.errors = error.response.data.errors;
          });
      },

      logout(){
          axios.post("/api/v1/auth/logout").then( response => {
              cookie.remove("access_token");
              window.location.reload();
          });
      }
  },
  mounted() {
      this.checkAuthenticated();
  }
}
</script>

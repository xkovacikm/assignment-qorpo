<template>
  <not-authenticated v-if="authenticated === false"></not-authenticated>
  <div v-else>
      <div v-for="watchdog in watchdogs" :key="watchdog.id">
          <div class="card mt-3 shadow">
              <div class="card-body">
                  <h5 class="card-title">
                    <img :src="watchdog.currency.image_url" class="img-fluid me-2" style="width:20px;" />
                    <a :href="'/currencies/' + watchdog.currency.coin_id">{{watchdog.currency.name}}</a>
                  </h5>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import NotAuthenticated from "../Auth/NotAuthenticated.vue";

export default {
  data(){
      return {
          authenticated: null,
          watchdogs: [],
      }
  },
  methods:{
      fetchWatchdogs(){
          axios.get("/api/v1/watchdogs").then(response => {
              this.watchdogs = response.data;
              this.authenticated = true;
          }).catch(error => {
              error.status === 401 ? this.authenticated = false : console.log(error);
          });
      }
  },
  mounted() {
      this.fetchWatchdogs();
  },
  components: {NotAuthenticated}
}
</script>

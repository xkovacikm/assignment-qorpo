<template>
  <div class="mt-5">
    <div v-if="eligible && !hasWatchdog" class="btn btn-primary" @click="createWatchdog">Create a watchdog for this currency</div>
    <div v-if="eligible && hasWatchdog" class="btn btn-danger" @click="destroyWatchdog">Remove watchdog</div>
  </div>
</template>

<script>
export default {
  props: {
    coin_id: {
      type: String,
      required: true
    }
  },

  data() {
    return {
      eligible: false,
      hasWatchdog: false,
    }
  },

  methods: {
    checkEligibility() {
      axios.get("/api/v1/watchdogs/" + this.coin_id).then(response => {
        this.eligible = true;
        this.hasWatchdog = true;
      }).catch(error => {
        if(error.status === 404){
          this.eligible = true;
        }
      });
    },

    createWatchdog(){
        axios.post("/api/v1/watchdogs/" + this.coin_id).then(response => {
          this.hasWatchdog = true;
        }).catch(error => {
          console.log(error);
        });
    },

    destroyWatchdog(){
        axios.delete("/api/v1/watchdogs/" + this.coin_id).then(response => {
          this.hasWatchdog = false;
        }).catch(error => {
          console.log(error);
        });
    }

  },

  mounted: function () {
    this.checkEligibility();
  },
}
</script>

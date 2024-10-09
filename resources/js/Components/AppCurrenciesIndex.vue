<template>
  <div>
      <loader v-if="!ready" />
      <div v-else>
          <div class="table">
              <thead>
                <tr>
                    <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <CurrencyRow v-for="currency in currencies" :key="currency.id" :currency/>
              </tbody>
          </div>
      </div>
  </div>
</template>

<script>
import CurrencyRow from "./Currencies/CurrencyRow.vue";
import Loader from "./Loader.vue";

export default {
  components: {Loader, CurrencyRow },

  data() {
      return {
          ready: false,
          currencies: []
      }
  },

  methods: {
      fetchCurrencies(){
          axios.get("api/v1/currencies").then(response => {
              this.currencies = response.data.data;
              this.ready = true;
          }).catch(error => {
              console.log(error);
          });
      }
  },
  mounted: function() {
      this.fetchCurrencies();
  }
}
</script>

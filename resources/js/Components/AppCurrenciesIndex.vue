<template>
  <div>
      <not-authenticated v-if="authorized === false"></not-authenticated>
      <div v-else-if="authorized === true">
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
import NotAuthenticated from "./NotAuthenticated.vue";
import CurrencyRow from "./Currencies/CurrencyRow.vue";

export default {
  components: {CurrencyRow, NotAuthenticated},

  data() {
      return {
          authorized: null,
          currencies: []
      }
  },

  methods: {
      fetchCurrencies(){
          axios.get("api/v1/currencies").then(response => {
              this.currencies = response.data.data;
              this.authorized = true;
          }).catch(error => {
              this.authorized = false;
          });
      }
  },
  mounted: function() {
      this.fetchCurrencies();
  }
}
</script>

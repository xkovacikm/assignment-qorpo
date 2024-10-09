<template>
  <div>
      <loader v-if="!ready" />
      <div v-else>
          <table class="table">
              <thead>
                <tr>
                    <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <CurrencyRow v-for="currency in currencies" :key="currency.coin_id" :currency/>
              </tbody>
          </table>

          <div>
              <a class="btn btn-dark me-3" :href="links.prev" v-if="links.prev" @click.prevent="fetchCurrencies(links.prev)">Previous</a>
              <a class="btn btn-dark" :href="links.next" v-if="links.next" @click.prevent="fetchCurrencies(links.next)">Next</a>
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
          currencies: [],
          links: {},
      }
  },

  methods: {
      fetchCurrencies( url ){
          axios.get(url).then(response => {
              this.currencies = response.data.data;
              console.log(this.currencies);
              this.links = response.data.links;
              this.ready = true;
          }).catch(error => {
              console.log(error);
          });
      }
  },
  mounted: function() {
      this.fetchCurrencies("/api/v1/currencies");
  }
}
</script>

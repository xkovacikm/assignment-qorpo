<template>
  <tr>
    <td>
      <a :href="url(model.coin_id)">
        <img class="img-fluid me-3" style="width: 20px" :src="model.image_url">
        {{ model.name }}
      </a>
    </td>
  </tr>
</template>
<script>
export default {
  props: ['currency'],
  data() {
    return {
      model: {}
    }
  },
  methods: {
      url(id){
          return "/currencies/" + id;
      }
  },
  mounted: function () {
    this.model = this.currency
  }
}
</script>

<template>
  <div class="d-flex align-items-center h-100">
    <button
      class="btn btn-outline-success btn-sm mr-3"
      @click="viewProduct($event)" data-btn-name="view"
    >
      <i class="fas fa-eye" data-btn-name="view"></i>
    </button>
    <button class="btn btn-sm btn-outline-info mr-3 " @click="viewProduct($event)" data-btn-name="edit">
      <i class="fas fa-edit" data-btn-name="edit"></i>
    </button>
    <button class="btn btn-sm btn-outline-danger" @click="viewProduct($event)" data-btn-name="delete">
      <i class="fas fa-trash-alt" data-btn-name="delete"></i>
    </button>
    <!-- <product-details-view ref="productDetailsModel"></product-details-view> -->
  </div>
</template>

<script>
// import ProductDetailsView from '../modal/ProductDetailsView.vue'
export default {
  components: {
    // ProductDetailsView
  },
  data() {
    return {
      proDetails: false,
      view: 'view'
    };
  },
  methods: {
    viewProduct(event) {
        let btnName = event.target.getAttribute('data-btn-name');
        debugger
      if (this.params.onClick instanceof Function) {
        this.params.onClick(this.params, btnName);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>

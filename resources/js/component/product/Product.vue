<template>

  <div class="right-side">
    <div class="content p-5">
      <h3>Products List</h3>
      <button class="btn btn-dark align-self-end addProduct" @click="showmodel">
        <i class="fas fa-plus"></i> Add Product
      </button>
      <br />
      <div id="productListTable"></div>
      <table class="table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in productList" :key="index">
                    <td>{{++index}}</td>
                    <td>{{product.sku}}</td>
                    <td>{{product.name}}</td>
                    <td>{{product.category.name}}</td>
                    <td>{{product.sub_category.name}}</td>
                    <td>
                        <i class="fas fa-edit"></i>  <i class="fas fa-trash-alt"></i>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
  </div>
  <product-add-model ref="productAddModel"></product-add-model>
</template>

<script>

import ProductAddModel from "../model/ProductAdd.vue";
import { h } from 'vue'
export default {
  components: {
    ProductAddModel,
  },
  data() {
    return {
      productList: [],
    };
  },
  methods: {
    showmodel() {
      this.$refs.productAddModel.showmodel();
    },
    getProductList() {
      axios.get("/sanctum/csrf-cookie").then((response) => {
        this.axios.get("/api/admin/product").then((data) => {
          console.log(data.data);
          this.productList = data.data;
        });
      });
    },
  },

  mounted() {
    this.getProductList();
  },
};
</script>

<style lang="scss" scoped>

h3 {
  font-family: "Montserrat Alternates";
  font-weight: bold;
}
.addProduct {
  background-color: #17a169;
  border: none;
  &:hover {
    box-shadow: 0 0 15px 0px #17a169;
  }
}
.table {
  .fa-edit {
    color: #17a169;
  }
  .fa-trash-alt {
    color: #77020b;
  }
}
</style>

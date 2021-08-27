<template>

  <div class="right-side">
    <div class="content p-5">
        <div class="headerButton d-flex justify-content-between">
            <h3>Products List</h3>
                <button class="btn btn-dark align-self-end addProduct" @click="showmodel"><i class="fas fa-plus"></i> Add Product
            </button>
        </div>
      <br />
      <div id="productListTable"></div>
        <ag-grid-vue style="width: 100%; height: 100%;"
            class="ag-theme-alpine"
            :columnDefs="columnDefs"
            :defaultColDef="defaultLayout"
            :rowData="productList"
            >
        </ag-grid-vue>

    </div>
  </div>
  <product-add-model ref="productAddModel"></product-add-model>
</template>

<script>

import ProductAddModel from "../model/ProductAdd.vue";
import { AgGridVue } from "ag-grid-vue3";
import btnCellRenderer from './BtnCellrenderer.vue'
export default {
  components: {
    ProductAddModel,
    AgGridVue,
    btnCellRenderer
  },
  data() {
    return {
      productList: [],
      columnDefs : [
                {headerName:'SKU', field: 'sku'},
                {headerName:'Name', field: 'name'},
                {headerName:'Category', field: 'category.name' },
                {headerName:'Subcategory', field: 'sub_category.name' },
                {headerName:'Short description', field: 'shortDescription' },
                {headerName:'Description', field: 'description' },
                {headerName:'Action', cellRenderer: 'btnCellRenderer',
                cellRendererParams: (params) =>{
                    return params;
                }, minWidth: 300 },

            ],
        defaultLayout: {
            flex: 1,
            filter: true,
        },
        // frameworkComponents: null
    }
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
  beforeMount () {
    //   this.frameworkComponents = btnCellRenderer;
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

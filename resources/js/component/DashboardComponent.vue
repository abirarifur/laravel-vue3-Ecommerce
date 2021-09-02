<template>
  <div class="right-side mt-5">
    <div class="content">
      <div class="short-details">
        <div class="card m-3">
            <router-link to="/admin/product">
            <div class="card-header text-white bg-dark">Products</div>
            <div class="card-body bg-info d-flex justify-content-between">
                <div class="amount">{{totalCurrentProduct}}</div>
                <i class="fas fa-box"></i>
            </div>
            </router-link>
        </div>
        <div class="card m-3">
          <div class="card-header text-white bg-dark">Orders</div>
          <div class="card-body bg-success d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fas fa-dolly"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header text-white bg-dark">Today's Amount</div>
          <div class="card-body bg-warning d-flex justify-content-between">
            <div class="amount">$50</div>
            <i class="fas fa-coins"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header text-white bg-dark">Monthly Amount</div>
          <div class="card-body bg-secondary d-flex justify-content-between">
            <div class="amount">$50</div>
            <i class="fas fa-hand-holding-usd"></i>
          </div>
        </div>
      </div>
      <div class="chartDetails d-flex">
        <div class="orderChart m-3 justify-content-between">
          <div class="card">
            <div class="card-header bg-dark text-white">Products Chart</div>
            <div class="card-body">
                <ProductChart :productchartdata="productchartdata" v-if="this.productchartdata.length > 0"/>
            </div>
          </div>
        </div>
        <div class="productChart m-3 d-flex justify-content-between">
          <div class="card w-100">
            <div class="card-header bg-dark text-white">Orders Chart</div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProductChart from "./charts/ProductCharts.vue"
export default {
  components: {
      ProductChart,

  },
  data() {
      return {
          productchartdata: [],
          totalProduct: 0,
          totalCurrentProduct: 0,
      }
  },
 methods: {
      async getCurrentMonthData(){
          debugger
       await this.axios.get("/sanctum/csrf-cookie").then( async (response) => {
       await this.axios.get("/api/admin/product/product-count-date-wise").then((data) => {
           debugger
                this.productchartdata = data.data.totalProductCount
                this.totalCurrentProduct = data.data.currentTotalProduct
                this.totalProduct = data.data.reduce((a, b) => a + b);
            });
        });
      }
  },
  beforeMount () {
     this.getCurrentMonthData();
  },
};
</script>

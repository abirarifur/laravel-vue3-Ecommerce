<template>
<div class="left-side">
            <sidebar></sidebar>
        </div>
<div class="main-header">
            <navbar></navbar>
        </div>
  <div class="right-side mt-5">
    <div class="content">
      <div class="short-details">
        <div class="card m-3">
          <div class="card-header bg-dark">Products</div>
          <div class="card-body bg-info d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header bg-dark">Orders</div>
          <div class="card-body bg-success d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header bg-dark">Today's Amount</div>
          <div class="card-body bg-warning d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
        <div class="card m-3">
          <div class="card-header bg-dark">Monthly Amount</div>
          <div class="card-body bg-secondary d-flex justify-content-between">
            <div class="amount">50</div>
            <i class="fab fa-product-hunt"></i>
          </div>
        </div>
      </div>
      <div class="chartDetails d-flex">
        <div class="orderChart m-3 justify-content-between">
          <div class="card">
            <div class="card-header bg-dark text-white">Products Chart</div>
            <div class="card-body">
                <ProductChart />
            </div>
          </div>
        </div>
        <div class="productChart m-3 justify-content-between">
          <div class="card">
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
// import Navbar from './bars/Navbar.vue'
// import Sidebar from './bars/Sidebar.vue'
export default {
  components: {
      ProductChart,
    //   Navbar,
    //   Sidebar
  },
  data() {
    return {

    }
  },
  methods: {

  },
  mounted() {},
};
</script>

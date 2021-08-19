<template>
  <div class="sidebar-wrapper">
    <!-- <div class="logo">
      <img :src="logo" alt="Logo" class="logoImg" />
      <div class="logo-text">Admin Panel</div>
    </div> -->
    <!-- <hr /> -->
    <div class="menu">
      <div class="menu-list">
        <div class="menu-name">
          <i class="fas fa-cart-plus"></i>
          <router-link to="/">Dashboard</router-link>
        </div>
      </div>
      <div class="menu-list">
        <div
          class="menu-name"
          data-bs-toggle="collapse"
          href="#products"
          role="button"
          aria-expanded="false"
          aria-controls="products"
        >
          <i class="fas fa-cart-plus"></i>
          Products
        </div>
        <div class="collapse" id="products">
          <ul class="list-group list-group-flush bg-dark">
            <router-link to="/admin/product"><li class="list-group-item bg-dark text-white">Product list</li></router-link>
            <li class="list-group-item bg-dark text-white">A second item</li>
            <li class="list-group-item bg-dark text-white">A third item</li>
            <li class="list-group-item bg-dark text-white">A fourth item</li>
            <li class="list-group-item bg-dark text-white">And a fifth one</li>
          </ul>
        </div>
      </div>
      <div class="menu-list">
        <div
          class="menu-name"
          data-bs-toggle="collapse"
          href="#orders"
          role="button"
          aria-expanded="false"
          aria-controls="orders"
        >
          <i class="fas fa-cart-plus"></i>
          Orders
        </div>
        <div class="collapse" id="orders">
          <ul class="list-group list-group-flush bg-dark">
            <li class="list-group-item bg-dark text-white">An item</li>
            <li class="list-group-item bg-dark text-white">A second item</li>
            <li class="list-group-item bg-dark text-white">A third item</li>
            <li class="list-group-item bg-dark text-white">A fourth item</li>
            <li class="list-group-item bg-dark text-white">And a fifth one</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

};
</script>

<style lang="scss" scoped>
</style>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar scroll</a>
      <img :src="adminImg" alt="" class="admin_img" />
    </div>
  </nav>
</template>

<script>
export default {
  setup() {
      let adminImg = "img/admin-img.jpg"
    return {
        adminImg
    };
  },
};
</script>

<style lang="scss" scoped>
</style>
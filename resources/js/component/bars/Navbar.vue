<template>
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="logo">
        <img :src="logo" alt="Logo" class="logoImg" />
        <div class="logo-text">Admin Panel</div>
      </div>
      <ul
        class="navbar-nav navbar-nav-scroll"
        style="--bs-scroll-height: 100px"
      >
        <li class="nav-item dropdown">
          <a
            class="dropdown-toggle"
            href="#"
            id="navbarScrollingDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img :src="adminImg" alt="" class="admin_img" />
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#" @click="logout">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import axios from "axios";
import router from '../../routes.js'
export default {
  setup() {
    let adminImg = '/img/admin-img.jpg';
    let logo = "/img/logo.png";
    function logout() {
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/logout")
          .then((res) => {
            if (res.data.logout == true) {
                window.laravel.isLoggedin = false;
                router.push('/admin/login');
            }

          })
          .catch((e) => {
            console.log(e);
          });
      });
    }
    return {
      adminImg,
      logout,
      logo,
    };
  },
};
</script>

<style lang="scss" scoped>
</style>

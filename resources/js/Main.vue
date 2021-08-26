<template>
    <div class="left-side" v-if="isLoggedin">
    <Sidebar />
  </div>
  <div class="main-header" v-if="isLoggedin">
    <navbar></navbar>
  </div>
  <router-view></router-view>
  <vue-progress-bar></vue-progress-bar>
</template>

<script>
import Sidebar from './component/bars/Sidebar.vue'
import Navbar from './component/bars/Navbar.vue'
// import Login from './pages/Login.vue'
export default {
    components: {
        Sidebar,
        Navbar,
        // Login
    },
    data() {
        return {
            isLoggedin: null
        }
    },
    mounted() {
      this.$Progress.finish();

    },
    created() {
      this.$Progress.start();
      this.$router.beforeEach((to, from, next) => {
          this.isLoggedin = window.laravel.isLoggedin;
        if (to.meta.progress !== undefined) {
          let meta = to.meta.progress;
          this.$Progress.parseMeta(meta);
        }
        this.$Progress.start();
        next();
      });

      this.$router.afterEach((to, from) => {
        this.$Progress.finish();
      });

    },

};
</script>

<style lang="scss" scoped>
</style>

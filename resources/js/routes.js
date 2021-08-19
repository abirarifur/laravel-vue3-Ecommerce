import { createRouter, createWebHistory } from 'vue-router';
import DashboardComponent from './component/DashboardComponent'
import Login from './pages/Login'
import Product from './component/product/Product'
const routes = [
    { path: '/',name: 'dashboard', component: DashboardComponent },
    { path: '/admin/login',name: 'Login', component: Login },
    { path: '/admin/product',name: 'adminProductList', component: Product }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

  router.beforeResolve((to, from, next) => {
    if (to.name  != 'Login' && !window.laravel.isLoggedin) next({ name: 'Login' })
    if (to.name  == 'Login' && window.laravel.isLoggedin) next({ name: 'dashboard' })
    else next()
  })

export default router;

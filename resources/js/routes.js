import { createRouter, createWebHistory } from 'vue-router';
import DashboardComponent from './component/DashboardComponent'
import Product from './component/product/Product'
const routes = [
    { path: '/', component: DashboardComponent },
    { path: '/product', component: Product }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
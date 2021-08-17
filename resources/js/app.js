require('./bootstrap');

import { createApp } from 'vue';
import router from './routes.js';
import Main from './Main'
import Navbar from './component/bars/Navbar';
import Sidebar from './component/bars/Sidebar';
const app = createApp(Main);

app.component('navbar' , Navbar);
app.component('sidebar' , Sidebar);
app.use(router);
app.mount('#app');

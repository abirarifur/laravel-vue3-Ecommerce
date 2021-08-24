require('./bootstrap');

import { createApp } from 'vue';
import router from './routes.js';
import Main from './Main'
import Navbar from './component/bars/Navbar';
import Sidebar from './component/bars/Sidebar';
import VueProgressBar from "@aacassandra/vue3-progressbar";
import axios from 'axios';
const app = createApp(Main);

app.component('navbar' , Navbar);
app.component('sidebar' , Sidebar);
const options = {
  color: "#00C479",
  failedColor: "#874b4b",
  thickness: "5px",
  transition: {
    speed: "0.2s",
    opacity: "0.6s",
    termination: 300,
  },
  autoRevert: true,
  location: "top",
  inverse: false,
};
app.use(router).use(VueProgressBar, options);
app.config.globalProperties.axios=axios
app.mount('#app');

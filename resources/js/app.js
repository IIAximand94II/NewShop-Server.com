import './bootstrap';
import { createApp} from "vue";
import App from './App.vue';
import router from './router';
import Toast from 'vue3-toast-single'
import 'vue3-toast-single/dist/toast.css'

const app = createApp(App);

app.use(router);
app.use(Toast, { verticalPosition: "top right", duration: 2500 })

app.mount('#app');


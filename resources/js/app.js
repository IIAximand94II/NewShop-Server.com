import './bootstrap';
import { createApp} from "vue";
import App from './App.vue';
import router from './router';

// import vSelect from "vue-select";
// import 'vue3-select2-component/dist/Select2.min'
// import 'vue-select/dist/vue-select.css';

const app = createApp(App);

app.use(router);

//app.component("v-select", vSelect);

app.mount('#app');
//createApp(App).mount('#app');

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router"; // Importer Vue Router

const app = createApp(App);
app.use(router);
app.mount("#app"); // Monte Vue.js sur l’élément avec id "app"

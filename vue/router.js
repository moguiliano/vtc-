import { createRouter, createWebHistory } from "vue-router";
import Home from "./pages/Home.vue";
import Reservation from "./pages/Reservation.vue";
import Profile from "./pages/Profile.vue";

const routes = [
  { path: "/", component: Home },
  { path: "/reservation", component: Reservation },
  { path: "/profile", component: Profile }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;

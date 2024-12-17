import { createRouter, createWebHistory } from "vue-router";
import Home from "../components/Home.vue";
import TheContact from "../components/TheContact.vue";
import FinancialClinic from "../components/FinancialClinic.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { name: "Home", path: "/", component: Home },
    { name: "TheContact", path: "/contact", component: TheContact },
    {
      name: "FinancialClinic",
      path: "/financial-clinic",
      component: FinancialClinic,
    },
  ],
});

export default router;

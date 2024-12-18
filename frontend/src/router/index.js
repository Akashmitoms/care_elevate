import { createRouter, createWebHistory } from "vue-router";
import Home from "../components/Home.vue";
import TheContact from "../components/TheContact.vue";
import FinancialClinic from "../components/FinancialClinic.vue";
import AdminPanel from "../components/Admin/AdminPanel.vue";

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
    { name: "AdminPanel", path: "/admin", component: AdminPanel },
  ],
});

export default router;

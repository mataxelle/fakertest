import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../views/Home";
import PeinturePage from "../components/PeinturePage";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    { path: "/",
      name: "home",
      component: Home
    },
    { path: "/peinture/:id",
      name: "peinture",
      component: PeinturePage
    },
    { path: "*",
      redirect: "/" }
  ]
});
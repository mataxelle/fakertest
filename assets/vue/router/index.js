import Vue from "vue";
import VueRouter from "vue-router";

import Actualites from "../components/Actualites";
import Apropos from "../components/Apropos";
import Home from "../views/Home";
import PeinturePage from "../components/PeinturePage";
import Portfolio from "../components/Portfolio";

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
    { path: "/actualites",
      name: "actualites",
      component: Actualites
    },
    { path: "/portfolio",
      name: "portfolio",
      component: Portfolio
    },
    { path: "/a_propos",
      name: "a_propos",
      component: Apropos
    },
    { path: "*",
      redirect: "/" }
  ]
});
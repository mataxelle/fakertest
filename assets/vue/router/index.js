import Vue from "vue";
import VueRouter from "vue-router";

import ActualitesList from "../components/ActualitesList";
import Apropos from "../components/Apropos";
import CategorieCard from "../components/CategorieCard";
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
      component: ActualitesList
    },
    { path: "/portfolio",
      name: "portfolio",
      component: Portfolio
    },
    { path: "/categorie/:slug",
      name: "categorie",
      component: CategorieCard
    },
    { path: "/a_propos",
      name: "a_propos",
      component: Apropos
    },
    { path: "*",
      redirect: "/" }
  ]
});
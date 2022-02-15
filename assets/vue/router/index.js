import Vue from "vue";
import VueRouter from "vue-router";

import ActualiteCard from "../components/ActualiteCard";
import ActualitesList from "../components/ActualitesList";
import Apropos from "../components/Apropos";
import CategorieCard from "../components/CategorieCard";
import Contact from "../components/Contact";
import Home from "../views/Home";
import PeintureCard from "../components/PeintureCard";
import Portfolio from "../components/Portfolio";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    { path: "/",
      name: "home",
      component: Home
    },
    { path: "/peinture/:slug",
      name: "peinture",
      component: PeintureCard
    },
    { path: "/actualites",
      name: "actualites",
      component: ActualitesList
    },
    { path: "/actualites/:slug",
      name: "actualite_details",
      component: ActualiteCard
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
    { path: "/contact",
      name: "contact",
      component: Contact
    },
    { path: "*",
      redirect: "/" }
  ]
});
import DashboardLayout from "@/pages/Layout/DashboardLayout.vue";
import Dashboard from "@/pages/Dashboard.vue";
import Settings from "@/pages/Settings";
import NotFound from "@/pages/Service/NotFound";
import Websites from "@/pages/Websites/Websites";
import Website from "@/pages/Websites/Website";
import WebsiteCharts from "@/pages/Websites/WebsiteCharts";
import Fullsitescan from "@/pages/Websites/Fullsitescan";
import FullscanAnalytics from "@/pages/Websites/FullscanAnalytics";
import Users from "@/pages/Users/Users.vue";
import ExampleSettings from "@/pages/Service/ExampleSettings";

// Frontend components
import Register from "@/pages/Frontend/Auth/Register";
import Login from "@/pages/Frontend/Auth/Login";

import FrontendLayout from "@/pages/Layout/FrontendLayout";
import Home from "@/pages/Frontend/Home";
import About from "@/pages/Frontend/About";
import Examples from "@/pages/Frontend/Examples";
import Features from "@/pages/Frontend/Features";
import Contacts from "@/pages/Frontend/Contacts";
import FrontendContent from "@/pages/Layout/FrontendContent";

const routes = [
  {
    path: "/",
    name: "Frontend",
    component: FrontendContent,
    children: [
      {
        path: "/",
        name: "Home",
        component: Home,
        meta: {
          protected: false,
          onlyadmin: false,
          transition: "zoom"
        }
      },
      {
        path: "/about",
        name: "About",
        component: About,
        meta: {
          protected: false,
          onlyadmin: false,
          transition: "overlay-right-full"
        }
      },
      {
        path: "/examples",
        name: "Examples",
        component: Examples,
        meta: {
          protected: false,
          onlyadmin: false,
          transition: "overlay-down-full"
        }
      },
      {
        path: "/features",
        name: "Features",
        component: Features,
        meta: {
          protected: false,
          onlyadmin: false,
          transition: "overlay-up-full"
        }
      },
      {
        path: "/contacts",
        name: "Contacts",
        component: Contacts,
        meta: {
          protected: false,
          onlyadmin: false,
          transition: "overlay-right"
        }
      },
      {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {
          protected: false,
          onlyadmin: false,
          transition: "overlay-left-full"
        }
      }
    ]
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardLayout,
    children: [
      {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: {
          protected: true,
          onlyadmin: false
        }
      },
      {
        path: "/settings",
        name: "settings",
        component: Settings,
        meta: {
          protected: true,
          onlyadmin: false
        }
      },
      {
        path: "/users",
        name: "users",
        component: Users,
        meta: {
          protected: true,
          onlyadmin: true
        }
      },
      {
        path: "/example-settings",
        name: "examples",
        component: ExampleSettings,
        meta: {
          protected: true,
          onlyadmin: true
        }
      },
      {
        path: "/websites",
        name: "mywebsites",
        component: Websites,
        meta: {
          protected: true,
          onlyadmin: false
        }
      },
      {
        path: "/website/:website_id",
        name: "Analytics",
        component: Website,
        meta: {
          protected: true,
          onlyadmin: false
        }
      },
      {
        path: "/website/:website_id/parameters",
        name: "Parameters",
        component: WebsiteCharts,
        meta: {
          protected: true,
          onlyadmin: false
        }
      },
      {
        path: "/fullscan/:website_id",
        name: "Fullsitescan",
        component: Fullsitescan,
        meta: {
          protected: true,
          onlyadmin: false
        }
      },
      {
        path: "/analytics/:website_id",
        name: "FullscanAnalytics",
        component: FullscanAnalytics,
        meta: {
          protected: true,
          onlyadmin: false
        }
      }
    ]
  },
  {
    path: "*",
    component: NotFound,
    meta: {
      protected: false,
      transition: "overlay-down"
    }
  }
];

export default routes;

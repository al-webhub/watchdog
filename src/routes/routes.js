import DashboardLayout from "@/pages/Layout/DashboardLayout.vue";

import Dashboard from "@/pages/Dashboard.vue";
import Register from "@/pages/Auth/Register";
import Login from "@/pages/Auth/Login";

import Settings from "@/pages/Settings";
import Content from "@/pages/Layout/Content";
import NotFound from "@/pages/Service/NotFound";
import Websites from "@/pages/Websites/Websites";

import Users from "@/pages/Users/Users.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: Content,
    redirect: "login/",
    children: [
      {
        path: "login",
        name: "login",
        component: Login,
        meta: {
          protected: false
        }
      },
      {
        path: "register",
        name: "Register",
        component: Register,
        meta: {
          protected: false
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
          protected: true
        }
      },
      {
        path: "/settings",
        name: "settings",
        component: Settings,
        meta: {
          protected: true
        }
      },
      {
        path: "/users",
        name: "users",
        component: Users,
        meta: {
          protected: true
        }
      },
      {
        path: "/websites",
        name: "My websites",
        component: Websites,
        meta: {
          protected: true
        }
      }
    ]
  },
  {
    path: "*",
    component: NotFound
  }
];

export default routes;

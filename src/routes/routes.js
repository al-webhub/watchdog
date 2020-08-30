import DashboardLayout from "@/pages/Layout/DashboardLayout.vue";

import Dashboard from "@/pages/Dashboard.vue";
import TableList from "@/pages/TableList.vue";
import Typography from "@/pages/Typography.vue";
import Icons from "@/pages/Icons.vue";
import Maps from "@/pages/Maps.vue";
import Notifications from "@/pages/Notifications.vue";
import Login from "@/pages/Login";
import Settings from "@/pages/Settings";
import Content from "@/pages/Layout/Content";
import Register from "@/pages/Register";

const routes = [
  {
    path: "/",
    name: "home",
    component: Content,
    redirect: "login/",
    children: [
      {
        path: "login/",
        name: "login",
        component: Login,
        meta: {
          protected: false
        }
      },
      {
        path: "register/",
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
      }
    ]
  }
];

export default routes;

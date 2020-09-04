import VueRouter from 'vue-router'

// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import News from './pages/news/News'
import NewsItem from './pages/news/newsItem'
import CreateNews from './pages/news/createNews'
import Query from './pages/Query'
import Queries from './pages/Queries'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // news
  {
    path: '/news',
    name: 'news',
    component: News,
    meta: {
      auth: undefined
    }
  },
  // createNews
  {
    path: '/news/create',
    name: 'createNews',
    component: CreateNews,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // query
  {
    path: '/query',
    name: 'query',
    component: Query,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // queries
  {
    path: '/queries',
    name: 'queries',
    component: Queries,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  }
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router

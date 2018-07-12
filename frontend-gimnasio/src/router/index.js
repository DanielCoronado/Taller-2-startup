import Vue from 'vue'
import Router from 'vue-router'
import MyApp from '@/components/MyApp'
import Login from '@/components/Login'
import Credentials from '@/services/Credentials.service.js'
import Clientes from '@/components/Clientes'
import Entrenadores from '@/components/Entrenadores'
import ProfileCliente from '@/components/ProfileCliente'
import Rutinas from '@/components/Rutinas'
import VerRutinas from '@/components/VerRutinas'

Vue.use(Router)

let credentials = new Credentials()

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'MyApp',
      component: MyApp,
      children: [
        {
          path: '/clientes',
          component: Clientes
        },
        {
          path: '/entrenadores',
          component: Entrenadores
        },
        {
          name: 'userprofile',
          path: '/userprofile/:id',
          component: ProfileCliente
        },
        {
          path: '/rutinas',
          component: Rutinas
        },
        {
          name: 'verrutinas',
          path: '/verRutinas',
          component: VerRutinas
        }
      ]
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    }
  ]
})

router.beforeEach((to, from, next) => {
  if (credentials.isLogin()) {
    if (to.path === '/login') next({path: '/'})
    else next()
    next()
  } else {
    if (to.path === '/login') next()
    else next({path: '/login'})
  }
})

export default router

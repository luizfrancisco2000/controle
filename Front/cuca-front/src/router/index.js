import Vue from 'vue';
import Router from 'vue-router';

//Principais
import Login from '@/components/Login';
import Menu from '@/components/Menu';

//Cadastro de Usuarios
import ListaUsuario from '@/components/ListaUsuario';
import CadastrarUsuario from '@/components/CadastrarUsuario';
Vue.use(Router);
function isLogado() {
  var usuario = JSON.parse(localStorage.getItem("cuca-site"));
  if (usuario != null && usuario.nome != "" && usuario.user != "") {
    return true;
  } else {
    localStorage.setItem("cuca-site", null);
    return false;
  }
}

function verificarLogin(to, next) {
  if (!isLogado()) {
    next('/')
  } else {
    next()
  }
}
export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/Menu',
      name: 'Menu',
      component: Menu,
      children: [
      {
        path: '/ListaUsuario',
        name: 'ListaUsuario',
        component: ListaUsuario,
        beforeEnter(to, from, next) {
          verificarLogin(to, next)
        }
      },
        {
            path: '/CadastrarUsuario',
            name: 'CadastrarUsuario',
            component: CadastrarUsuario,
            beforeEnter(to, from, next){
              verificarLogin(to,next);
            }
        },
        {
          path: '/CadastrarUsuario/:id',
          props: true,
          name: 'CadastrarUsuario2',
          component: CadastrarUsuario,
          beforeEnter(to, from, next){
            verificarLogin(to,next);
          }
      }
    ]
    },
  ]
});

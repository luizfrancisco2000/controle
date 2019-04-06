import Vue from 'vue';
import Router from 'vue-router';

//Principais
import Login from '@/components/Login';
import Menu from '@/components/Menu';

//Cadastro de Usuarios
import ListaUsuario from '@/components/ListaUsuario';
import CadastrarUsuario from '@/components/CadastrarUsuario';

//Cadastro de Usuarios
import ListaAluno from '@/components/ListaAluno';
import CadastrarAluno from '@/components/CadastrarAluno';

//Cadastro de Contratante
import ListaContratante from '@/components/ListaContratante';
import CadastrarContratante from '@/components/CadastrarContratante';

//Cadastro de Contratos
import ListaContrato from '@/components/ListaContrato';
import CadastrarContrato from '@/components/CadastrarContrato';

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
      },
      {
        path: '/ListaAluno',
        name: 'ListaAluno',
        component: ListaAluno,
        beforeEnter(to, from, next) {
          verificarLogin(to, next)
        }
      },
        {
            path: '/CadastrarAluno',
            name: 'CadastrarAluno',
            component: CadastrarAluno,
            beforeEnter(to, from, next){
              verificarLogin(to,next);
            }
        },
        {
          path: '/CadastrarAluno/:id',
          props: true,
          name: 'CadastraAluno2',
          component: CadastrarAluno,
          beforeEnter(to, from, next){
            verificarLogin(to,next);
          }
      },
      {
        path: '/ListaContrato',
        name: 'ListaContrato',
        component: ListaContrato,
        beforeEnter(to, from, next) {
          verificarLogin(to, next)
        }
      },
        {
            path: '/CadastrarContrato',
            name: 'CadastrarContrato',
            component: CadastrarContrato,
            beforeEnter(to, from, next){
              verificarLogin(to,next);
            }
        },
        {
          path: '/CadastrarContrato/:id',
          props: true,
          name: 'CadastraContrato2',
          component: CadastrarContrato,
          beforeEnter(to, from, next){
            verificarLogin(to,next);
          }
      },
      {
        path: '/ListaContratante',
        name: 'ListaContratante',
        component: ListaContratante,
        beforeEnter(to, from, next) {
          verificarLogin(to, next)
        }
      },
        {
            path: '/CadastrarContratante',
            name: 'CadastrarContratante',
            component: CadastrarContratante,
            beforeEnter(to, from, next){
              verificarLogin(to,next);
            }
        },
        {
          path: '/CadastrarContratante/:id',
          props: true,
          name: 'CadastraContratante2',
          component: CadastrarContratante,
          beforeEnter(to, from, next){
            verificarLogin(to,next);
          }
      }
    ]
    },
  ]
});

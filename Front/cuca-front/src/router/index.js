import Vue from 'vue';
import Router from 'vue-router';
import Login from '@/components/Login';

Vue.use(Router);
/*function isLogado() {
  var usuario = JSON.parse(localStorage.getItem("flex-site_cthm"));
  if (usuario != null && usuario.nome != "" && usuario.login != "") {
    return true;
  } else {
    localStorage.setItem("flex-site_cthm", null);
    return false;
  }
}

function verificarLogin(to, next) {
  if (!isLogado()) {
    next('/')
  } else {
    next()
  }
}*/
export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    }
  ]
});

<template>
  <v-app>
    <!--v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Atenção</v-card-title>

        <v-card-text>Não existe nenhum usuário cadastrado. Por favor, cadastre um usuário.</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="cadastrar">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog-->
    <v-dialog v-model="dialogErro" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>Erro ao acessar o serviços. Contate o administrador, por favor!</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialogErro = !dialogErro">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialogErro1" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>Erro ao realizar login.</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialogErro1= !dialogErro1">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <div style="margin: 50px auto; width: 40%; text-align: center;">
      <img src="../assets/logo.jpg">
      <v-form ref="form" @keyup.enter="entrar">
        <div v-if="!logando">
          <v-text-field v-model="login.user" label="Login" required></v-text-field>
          <v-text-field v-model="login.senha" label="Senha" type="password" required></v-text-field>
          <v-btn color="success"  @click="entrar">Entrar</v-btn>
        </div>
        <div v-else>
          <v-text-field disabled v-model="login.user" label="Login" required></v-text-field>
          <v-text-field disabled v-model="login.senha" label="Senha" type="password" required></v-text-field>
          <v-btn color="warning" disabled>Logando...</v-btn>
        </div>
      </v-form>
    </div>
  </v-app>
</template>

<script>
import axios from "../axios/client.js";
export default {
  data() {
    return {
      dialog: false,
      dialogErro: false,
      dialogErro1:false,
      logando: false,
      login: {
        user: "",
        senha: ""
      }
    };
  },
  methods: {
    entrar() {
      axios
        .post("login", this.login)
        .then(response => {
          if (response.data.nome) {
            this.$router.push({ name: "Menu" });
            localStorage.setItem(
                "cuca-site",
                JSON.stringify(response.data)
              );
          } else {
            this.dialogErro1 = true;
          }
        })
        .catch(e => {
          console.log(e);
          this.dialogErro = true;
        });
    }
  },
    created: function() {
    axios
      .get("iniciar")
      .then(response => {
        if (response.data.usuarios == 1) {
          this.dialog = true;
        }
      })
      .catch(e => {
        this.dialogErro = true;
      });
  }
}


</script>
<template>
  <v-app>
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>Erro ao acessar o serviços. Contate o administrador, por favor!</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialog = false">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialogErro1" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>Preencha todos os campos!</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="warning" flat @click="dialogErro1 = false">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialogErro2" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>As senhas não são iguais!</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="warning" flat @click="dialogErro2 = false">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog v-model="dialogErro3" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>Erro ao cadastrar o usuário.</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialogErro3= !dialogErro3">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <div style="margin: 50px auto; width: 40%; text-align: center;">
      <span>{{title}}</span>
      <v-form ref="form">
        <v-text-field v-model="usuario.nome" label="Nome" required></v-text-field>
        <v-text-field v-if="cadastro" v-model="usuario.user" label="Login" required></v-text-field>
        <v-text-field v-else v-model="usuario.user" disabled label="Login" required></v-text-field>
        <v-text-field v-model="usuario.senha" label="Senha" type="password" required></v-text-field>
        <v-text-field v-model="senha" label="Confirmar Senha" type="password" required></v-text-field>
        <v-btn v-if="cadastro" color="success" @click="cadastrar">Cadastrar</v-btn>
        <v-btn v-else color="success" @click="alterar">Alterar</v-btn>
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
      dialogErro1: false,
      dialogErro2: false,
      dialogErro3: false,
      title: "",
      cadastro: true,
      items: [],
      senha: "",
      usuario: {
        user: "",
        nome: "",
        senha: ""
      }
    };
  },
  methods: {
    cadastrar() {
      if (
        this.usuario.user == "" ||
        this.usuario.nome == "" ||
        this.usuario.senha == "" ||
        this.senha == "" 
      ) {
        this.dialogErro1 = true;
      } else if (this.senha != this.usuario.senha) {
        this.dialogErro2 = true;
      } else {
        axios
          .post("usuario", this.usuario)
          .then(response => {
            if (response.data) {
              this.$router.push({ name: "ListaUsuario" });
            } else {
              this.dialogErro3 = true;
            }
          })
          .catch(e => {
            console.log(e);
            this.dialog = true;
          });
      }
    },
    alterar() {
      if (
        this.usuario.user == "" ||
        this.usuario.nome == "" 
      ) {
        this.dialogErro1 = true;
      } else if (this.senha != "" && this.senha != this.usuario.senha) {
        this.dialogErro2 = true;
      } else {
        axios
          .put("usuario/" + this.usuario.id, this.usuario)
          .then(response => {
            if (response.data) {
              this.$router.push({ name: "ListaUsuario" });
            } else {
              this.dialogErro3 = true;
            }
          })
          .catch(e => {
            console.log(e);
            this.dialog = true;
          });
      }
    }
  },

  created: function() {
    if (this.$route.params.id) {
      this.title = "Editar usuário";
      this.cadastro = false;
      axios
        .get("usuario/" + this.$route.params.id)
        .then(response => {
          this.usuario = response.data[0];
        })
        .catch(e => {});
    } else {
      this.title = "Novo usuário";
      this.cadastro = true;
    }
  }
};
</script>
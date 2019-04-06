<template>
  <div>
    <v-dialog v-model="dialog" persistent max-width="290">
      <v-card>
        <v-card-title class="headline">Excluir usuário?</v-card-title>
        <v-card-text>Tem certeza que queres excluir este usuário?</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" flat @click="dialog = false">Não</v-btn>
          <v-btn color="green darken-1" flat @click="deleteItem">Sim</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-toolbar flat color="white">
      <v-toolbar-title>Usuários</v-toolbar-title>
      <v-spacer></v-spacer>

      <v-btn color="primary" dark class="mb-2" @click="novo">Novo usuário</v-btn>
    </v-toolbar>
    <v-data-table :headers="headers" :items="items" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{props.item.id}}</td>
        <td>{{ props.item.user }}</td>
        <td>{{ props.item.nome }}</td>
        <td>
          <v-icon small class="mr-2" @click="editItem(props.item)">edit</v-icon>
          <v-icon small @click="modalItem(props.item)">delete</v-icon>
        </td>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import axios from "../axios/client.js";
export default {
  name: "",
  data() {
    return {
      items: [],
      item: {},
      dialog: false,
      headers: [
        { text: "User", value: "user" },
        { text: "Nome", value: "nome" },
        { text: "Id", value: "id" },
        { text: "Ações" }
      ]
    };
  },
  methods: {
    novo: function() {
      this.$router.push({ name: "CadastrarUsuario" });
    },
    editItem: function(item) {
      let url = "CadastrarUsuario/" + item.id;
      this.$router.push(url);
    },
    modalItem: function(item) {
      this.item = item;
      this.dialog = true;
    },
    deleteItem: function() {
      axios
        .delete("usuario/" + this.item.id)
        .then(response => {
          if (response.data) {
            this.carregar();
            this.dialog = false;
          } else {
            this.dialog = false;
          }
        })
        .catch(e => {
          this.dialog = false;
        });
    },
    carregar: function() {
      axios
        .get("iniciar")
        .then(response => {
          this.items = response.data;
        })
        .catch(e => {});
    }
  },
  created: function() {
    this.carregar();
  }
};
</script>

<style>
</style>
<template>
  <div>
    <v-dialog v-model="dialogErro1" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" primary-title>Erro</v-card-title>

        <v-card-text>Por favor, antes de cadastrar um novo contrantante, tenha ao menos um contrato ativo!</v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" flat @click="dialogErro1= !dialogErro1">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog v-model="dialog" persistent max-width="290">
      <v-card>
        <v-card-title class="headline">Excluir Contratante?</v-card-title>
        <v-card-text>Tem certeza que queres excluir este Contratante?</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" flat @click="dialog = false">Não</v-btn>
          <v-btn color="green darken-1" flat @click="deleteItem">Sim</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-toolbar flat color="white">
      <v-toolbar-title>Contratantes</v-toolbar-title>
      <v-spacer></v-spacer>

      <v-btn color="primary" dark class="mb-2" @click="novo">Novo Contratante</v-btn>
    </v-toolbar>
    <v-data-table :headers="headers" :items="items" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{ props.item.nome }}</td>
        <td>{{props.item.turma}}</td>
        <td>{{props.item.horario}}</td>
        <td>{{props.item.pago}}</td>
        <td>{{ props.item.ativo}}</td>

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
      dialogErro1:false,
      dialog: false,
      date: null,
      headers: [
        { text: "Nome", value: "nome" },
        { text: "Turma", value: "turma" },
        { text: "Horario", value: "horario" },
        { text: "Pago mês atual", value: "pago" },
        { text: "Ativo", value: "ativo"},
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
      .get("contratante")
      .then(response => {
        this.items = response.data;
      })
      .catch(e => {});
    },
    procurarContratos: function(){
        axios.get("contrato").then(response => {
        if (response.data[0] == null) {
          this.dialogErro1 = true;
        }
      });
    },

  },
  created: function() {
    this.carregar();
    this.procurarContratos();
  }
};
</script>

<style>
</style>
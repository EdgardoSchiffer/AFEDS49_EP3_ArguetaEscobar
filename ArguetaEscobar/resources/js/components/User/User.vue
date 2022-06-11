<template>
  <div>
    <div class="container">
      <template v-if="!loading">
        <div class="row">
          <h1>Usuarios</h1>
          <!-- Form -->
          <div class="col-md-4 pt-3">
            <label>Nombre</label>
            <input class="form-control" type="text" v-model="user.name" />
          </div>
          <div class="col-md-4 pt-3">
            <label>Correo</label>
            <input class="form-control" type="text" v-model="user.email" />
          </div>
          <div class="col-md-4 pt-3">
            <label>Contraseña</label>
            <input class="form-control" type="text" v-model="user.password" />
          </div>
          <div class="col-md-12 pt-3">
            <a href="#" class="btn btn-success" @click="save()">
              <i class="fa fa-save"></i> {{ textButton }}</a
            >
          </div>

          <!-- Table -->
          <user-table
            :data="users"
            :headers="headers"
          />
        </div>
        <paginationLaravel
          :data="pagination"
          @pagination-change-page="getResults"
          :limit="1"
        ></paginationLaravel>
      </template>
      <template v-else>
        <alert />
      </template>
    </div>
  </div>
</template>

<script>
import ui from "../../libs/ui";
import axios from "axios";
import Swal from "sweetalert2";
import PaginationLaravel from "laravel-vue-pagination";

export default {
  components: { PaginationLaravel },
  data: () => {
    return {
      user: {
        name: "",
        email: "",
        password: ""
      },
      users: [],
      headers: [
        "#",
        "Nombre",
        "Email",
      ],
      textButton: "Guardar",
      loading: false,
      pagination: {},
    };
  },

  mounted() {
    this.initialize();
  },

  methods: {
    async initialize() {
      this.loading = true;

      let res = await axios.get("api/user");
      this.users = res.data.users.data;
      this.pagination = res.data.users;
      this.loading = false;
    },

    async save() {
      let res;
      switch (this.textButton) {
        case "Guardar":
          res = await axios.post("api/user", this.user).catch((e) => {
            ui.alert("Registro no pudo ser guardado correctamente.", "error");
          });

          if (res.data.message == "success") {
            this.documents = res.data.documents;
            ui.alert("Registro creado correctamente.");
          }
          break;
      }
      this.initialize();
      this.cleanInputs();
    },

    cleanInputs() {
      this.document = {
        code: "",
        document_name: "",
        account_number: "",
        name_bank: "",
        initial_amount: "0.00",
      };
      this.textButton = "Guardar";
    },

    async getResults(page = 1) {
      const res = await axios.get(this.pagination.path + "?page=" + page);
      this.users = res.data.users.data;
      this.pagination = res.data.users;
    },
  },
};
</script>

<style>
</style>

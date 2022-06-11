<template>
  <div>
    <div class="container">
      <template v-if="!loading">
        <div class="row">
          <h1>Empleados</h1>
          <!-- Form -->
          <div class="col-md-4 d-none">
            <input class="form-control" type="text" v-model="employee.id" />
          </div>

          <div class="col-md-4 pt-3">
            <label>Código</label>
            <input class="form-control" type="text" v-model="employee.code" />
          </div>
          <div class="col-md-4 pt-3">
            <label>Nombre</label>
            <input
              class="form-control"
              type="text"
              v-model="employee.employee_name"
            />
          </div>
          
          <div class="col-md-4 pt-3">
            <label>Sucursal</label>
            <select v-model="employee.branch_office_name" class="form-select">
              <option
                v-for="branch_office in branch_offices"
                :key="branch_office.id"
                :value="branch_office.name_branch_office"
              >
                {{ branch_office.name_branch_office }}
              </option>
            </select>
          </div>
          
          <div class="col-md-4 pt-3">
            <label>Salario (US$)</label>
            <input
              class="form-control"
              type="number"
              step="0.01"
              v-model="employee.salary"
            />
          </div>

          <div class="col-md-12 pt-3">
            <a href="#" class="btn btn-success" @click="save()">
              <i class="fa fa-save"></i> {{ textButton }}</a
            >
          </div>

          <!-- Table -->
          <document-table
            :data="employees"
            :headers="headers"
            @delete="deleteP($event)"
            @edit="edit($event)"
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
      employee: {
        code: "",
        employee_name: "",
        age: 0,
        branch_office_name: "",
        salary: "0.00",
      },
        branch_offices: [],
      employees: [],
      headers: [
        "#",
        "Código",
        "Nombre",
        "Salario",
        "Sucursual",
        "Acciones",
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

      let res = await axios.get("api/employee");
      this.employees = res.data.employees.data;
      this.pagination = res.data.employees;

      res = await axios.get("api/branch_office");
      this.branch_offices = res.data.branch_offices;

      if (this.branch_offices.length > 0) {
        this.employee.branch_office_name = res.data.branch_offices[0].name_branch_office;
      }

      this.loading = false;
    },

    async save() {
      let res;
      switch (this.textButton) {
        case "Guardar":
          res = await axios.post("api/employee", this.employee).catch((e) => {
            ui.alert("Registro no pudo ser guardado correctamente.", "error");
          });

          if (res.data.message == "success") {
            this.employees = res.data.employees;
            ui.alert("Registro creado correctamente.");
          }
          break;
        case "Modificar":
          res = await axios
            .put(`api/employee/${this.employee.id}`, this.employee)
            .catch((e) => {
              ui.alert(
                "Registro no pudo ser actualizado correctamente.",
                "error"
              );
            });

          if (res.data.message == "success") {
            ui.alert("Registro modificado correctamente.");
          }
          break;
      }
      this.initialize();
      this.cleanInputs();
    },

    edit(id) {
      this.employee = this.employees.find((employee) => employee.id == id);
      this.textButton = "Modificar";
    },

    async deleteP(id) {
      Swal.fire({
        title: "¿Estás seguro de eliminar este registro?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Confimar",
      }).then(async (result) => {
        if (result.isConfirmed) {
          const res = await axios.delete(`api/employee/${id}`).catch((e) => {
            ui.alert("Registro no pudo ser eliminado correctamente.", "error");
          });

          if (res.data.message == "success") {
            ui.alert("Registro eliminado correctamente.");
            this.initialize();
            this.cleanInputs();
          }
        }
      });
    },

    cleanInputs() {
      this.employeet = {
        code: "",
        employee_name: "",
        branch_office_name: "",
        salary: "0.00",
      };
      this.textButton = "Guardar";
    },

    async getResults(page = 1) {
      const res = await axios.get(this.pagination.path + "?page=" + page);
      this.documents = res.data.documents.data;
      this.pagination = res.data.documents;
    },
  },
};
</script>

<style>
</style>

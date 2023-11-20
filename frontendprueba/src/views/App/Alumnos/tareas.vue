<template>
  <b-container fluid>
    <b-modal id="modal-1" ref="modal-1" title="Agregar Producto">
      <form>
        <div class="col-md-12 mb-3">
          <label for="nombre">NOMBRE</label>
          <input
            required
            type="text"
            class="form-control"
            id="nombre"
            v-model.trim="$v.form.nombre.$model"
            :state="!$v.form.nombre.$error"
            placeholder="Ingresar nombre"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="descripcion">DESCRIPCION</label>
          <input
            required
            type="text"
            class="form-control"
            id="descripcion"
            v-model.trim="$v.form.descripcion.$model"
            :state="!$v.form.descripcion.$error"
            placeholder="Ingresar descripcion"
          >
        </div>
      </form>
      <template #modal-footer="{}">
        <b-button  variant="primary" @click="onSave()"
          >Guardar</b-button
        >
        <b-button variant="danger" @click="closeModal('save')"
          >Cancelar</b-button
        >
      </template>
    </b-modal>
    <b-modal id="modal-2" ref="modal-2" title="Editar Producto">
      <form>
        <div class="col-md-12 mb-3">
          <label for="nombre">NOMBRE</label>
          <input
            required
            type="text"
            class="form-control"
            id="nombre"
            v-model.trim="$v.form.nombre.$model"
            :state="!$v.form.nombre.$error"
            placeholder="Ingresar marca"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="descripcion">DESCRIPCION</label>
          <input
            required
            type="text"
            class="form-control"
            id="descripcion"
            v-model.trim="$v.form.descripcion.$model"
            :state="!$v.form.descripcion.$error"
            placeholder="Ingresar tipo"
          >
        </div>
      </form>
      <template #modal-footer="{}">
        <b-button  variant="primary" @click="onUpdate()"
          >Guardar</b-button
        >
        <b-button variant="danger" @click="closeModal('update')"
          >Cancelar</b-button
        >
      </template>
    </b-modal>
    <b-modal id="modal-3" ref="modal-3" title="Desactivar especialidad">
      <h6 class="my-4">
        ¿Desea Eliminar el Carro: {{ form.nombre }} ?
      </h6>
      <template #modal-footer="{}">
        <b-button
          type="submit"
          variant="primary"
          @click="eliminarRegistro()
                  $bvModal.hide('modal-3')"
          >Eliminar</b-button
        >
        <b-button variant="danger" @click="$bvModal.hide('modal-3')"
          >Cancelar</b-button
        >
      </template>
    </b-modal>
    <b-modal id="modal-4" ref="modal-4" title="Activar especialidad">
      <h6 class="my-4">
        ¿Desea activar el usuario: {{ form.user }} ?
      </h6>
      <template #modal-footer="{}">
        <b-button
          type="submit"
          variant="primary"
          @click="onState()
                  $bvModal.hide('modal-4')"
          >Activar</b-button
        >
        <b-button variant="danger" @click="$bvModal.hide('modal-4')"
          >Cancelar</b-button
        >
      </template>
    </b-modal>
    <b-modal id="modal-5" ref="modal-5" title="X">
    </b-modal>
    <b-row>
      <b-col md="12">
        <iq-card>
            <template v-slot:headerTitle>
              <h4 class="card-title mt-3">TAREAS</h4>
              <div class="iq-search-bar mt-2">
                <div class="row">
                  <div class="col-sm">
                  </div>
                </div>
              </div>
            </template>
            <template v-slot:headerAction>
            <b-button variant="primary"  v-b-modal.modal-1>AGREGAR NUEVO</b-button>
          </template>
          <template v-slot:body>
            <table class="table table-bordered table-striped">
              <thead class="table-active">
              <th>
                ACCION
              </th>
              <th>
                NOMBRE
              </th>
              <th>
                DESCRIPCION
              </th>
              <th>
                ESTADO
              </th>
              <th>
                CAMBIAR
              </th>
              </thead>
              <tbody>
                <tr v-for="datos in datosPost" :key="datos.id">
                  <td>
                    <button class="btn btn-outline-dark" @click="accionEdit(1,datos)" v-b-modal.modal-2>
                      <icon class="ri-pencil-fill"></icon>
                    </button>
                    <button class="btn btn-danger" @click="accionEdit(2, datos)" v-b-modal.modal-3>
                      <icon class="ri-delete-bin-7-fill"></icon>
                    </button>
                  </td>
                  <td v-text="datos.nombre"></td>
                  <td v-text="datos.descripcion"></td>
                  <td v-text="datos.estado"></td>
                  <td>
                    <button class="btn btn-success" @click="editEstado(3,datos)" v-if="datos.estado === 'pendiente'">
                      COMPLETAR
                    </button>
                    <button class="btn btn-info" @click="editEstado(1,datos)" v-else-if="datos.estado === 'cancelada'">
                      PENDIENTE
                    </button>
                    <button class="btn btn-danger" @click="editEstado(2,datos)" v-if="datos.estado === 'completada'">
                      CANCELAR
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </template>
        </iq-card>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
import { xray } from '../../../config/pluginInit'
// import VuetablePagination from 'vuetable-2/src/components/VuetablePagination.vue'
import useVuelidate from '@vuelidate/core'
import { required } from '@vuelidate/validators'
import axios from 'axios'
import { apiUrl, laravelUrl } from '../../../config/constant'

export default {
  name: 'inicio',
  components: {
  },
  setup () {
    return { $v: useVuelidate() }
  },
  beforeMount () {
    this.getDatos()
  },
  mounted () {
    xray.index()
    axios.get(apiUrl + '/type/get').then((response) => {
      this.typeOptions = response.data
    })
    this.getDatos()
  },
  data () {
    return {
      from: 0,
      to: 0,
      total: 0,
      perPage: 5,
      search: '',
      form: {
        id: 0,
        nombre: '',
        descripcion: '',
        estado: ''
      },
      apiBase: laravelUrl + '/tareas/getAll',
      datosPost: null,
      typeOptions: [],
      options: [
        { value: '1', nombre: 'NOMBRE' },
        { value: '2', nombre: 'DESCRIPCION' },
        { value: '4', nombre: 'ESTADO' }
      ],
      columna: { value: '1', nombre: 'NOMBRE' },
      fields: [
        {
          name: '__slot:actions',
          title: 'Acciones',
          titleClass: '',
          dataClass: 'text-muted'
          // width: "15%",
        },
        {
          name: 'nombre',
          sortField: 'nombre',
          title: 'NOMBRE',
          dataClass: 'list-item-heading'
        },
        {
          name: 'descripcion',
          sortField: 'descripcion',
          title: 'DESCRIPCION',
          dataClass: 'list-item-heading'
        },
        {
          name: 'estado',
          sortField: 'estado',
          title: 'ESTADO',
          dataClass: 'list-item-heading'
        }
      ]
    }
  },
  validations () {
    return {
      form: {
        nombre: { required },
        descripcion: { required },
        estado: { required }
      }
    }
  },
  methods: {
    eliminarRegistro () {
      axios.delete(laravelUrl + '/tareas/delete/' + this.form.id).then((response) => {
        this.getDatos()
      })
    },
    getDatos () {
      axios.get(laravelUrl + '/tareas/getAll').then((response) => {
        this.datosPost = response.data
        console.log(this.datosPost)
      })
    },
    accionEdit (accion, datos) {
      if (accion === 1) {
        // ACTUALIZAR
        this.form.id = datos.id
        this.form.nombre = datos.nombre
        this.form.descripcion = datos.descripcion
        this.form.estado = datos.estado
      } else if (accion === 2) {
        this.form.id = datos.id
        this.form.nombre = datos.nombre
        this.form.descripcion = datos.descripcion
        this.form.estado = datos.estado
      }
    },
    editEstado (tipo, datos) {
      if (tipo === 1) {
        // PASAR A PENDIENTE
        console.log('llegue')
        axios.put(laravelUrl + '/tareas/update/' + datos.id, {
          nombre: datos.nombre,
          descripcion: datos.descripcion,
          estado: 'pendiente'
        })
          .then((response) => {
            this.getDatos()
          })
          .catch((error) => {
            // this.errorMessage = error.message;
            console.error('Error!', error)
          })
      } else if (tipo === 2) {
        console.log('llegue2')
        // PASAR A CANCELADA
        axios.put(laravelUrl + '/tareas/update/' + datos.id, {
          nombre: datos.nombre,
          descripcion: datos.descripcion,
          estado: 'cancelada'
        })
          .then((response) => {
            this.getDatos()
          })
          .catch((error) => {
            // this.errorMessage = error.message;
            console.error('Error!', error)
          })
      } else if (tipo === 3) {
        console.log('llegue3')
        // PASAR A COMPLETADA
        axios.put(laravelUrl + '/tareas/update/' + datos.id, {
          nombre: datos.nombre,
          descripcion: datos.descripcion,
          estado: 'completada'
        })
          .then((response) => {
            this.getDatos()
          })
          .catch((error) => {
            // this.errorMessage = error.message;
            console.error('Error!', error)
          })
      }
    },
    openModal (modal, action) {
      switch (modal) {
        case 'save': {
          this.$v.$reset()
          this.form.id = 0
          this.form.nombre = ''
          this.form.descripcion = ''
          this.form.estado = ''
          break
        }
      }
    },
    closeModal (action) {
      switch (action) {
        case 'save': {
          this.$v.$reset()
          this.$refs['modal-1'].hide()
          this.form.id = 0
          this.form.nombre = ''
          this.form.descripcion = ''
          this.form.estado = ''
          break
        }
        case 'update': {
          this.$v.$reset()
          this.$refs['modal-2'].hide()
          this.form.id = 0
          this.form.nombre = ''
          this.form.descripcion = ''
          this.form.estado = ''
          break
        }
      }
    },
    onValidate (action) {
      this.$v.$touch()
      if (this.$v.$error !== true) {
        if (action === 'save') {
          this.onSave()
        } else if (action === 'update') {
          this.onUpdate()
        }
      }
    },
    setData (data) {
      this.form.user = data.user
      this.form.state = data.estado
      this.form.id = data.id
      this.form.userType = data.tipo_usuario
    },
    /* Guardar */
    onSave () {
      const me = this
      // this.$refs["modalSave"].hide();
      axios.post(laravelUrl + '/tareas/create', {
        nombre: me.form.nombre,
        descripcion: me.form.descripcion,
        estado: 'pendiente'
      })
        .then((response) => {
          me.getDatos()
          me.closeModal('save')
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('Error!', error)
        })
    },
    /* Actualizar */
    onUpdate () {
      const me = this
      axios.put(laravelUrl + '/tareas/update/' + me.form.id, {
        nombre: me.form.nombre,
        descripcion: me.form.descripcion,
        estado: me.form.estado
      })
        .then((response) => {
          this.getDatos()
          me.closeModal('update')
        })
        .catch((error) => {
          // this.errorMessage = error.message;
          console.error('Error!', error)
        })
    },
    onState () {
      let me = this
      if (this.form.state === 1) {
        axios
          .put(apiUrl + '/user/deactivate', {
            id: this.form.id
          })
          .then((response) => {
            me.$refs.vuetable.refresh()
            me.$refs['modal-3'].hide()
          })
          .catch((error) => {
            // this.errorMessage = error.message;
            console.error('There was an error!', error)
          })
      } else {
        axios
          .put(apiUrl + '/user/activate', {
            id: this.form.id
          })
          .then((response) => {
            me.$refs.vuetable.refresh()
            me.$refs['modal-4'].hide()
          })
          .catch((error) => {
            // this.errorMessage = error.message;
            console.error('There was an error!', error)
          })
      }
    },
    makeQueryParams (sortOrder, currentPage, perPage) {
      return sortOrder[0]
        ? {
          criterio: sortOrder[0] ? sortOrder[0].sortField : 'createdAt',
          order: sortOrder[0] ? sortOrder[0].direction : 'desc',
          page: currentPage,
          limit: this.perPage,
          search: this.search,
          columna: this.columna.value
        }
        : {
          criterio: sortOrder[0] ? sortOrder[0].sortField : 'createdAt',
          order: sortOrder[0] ? sortOrder[0].direction : 'desc',
          page: currentPage,
          limit: this.perPage,
          search: this.search,
          columna: this.columna.value
        }
    },
    changePageSizes (perPage) {
      this.perPage = perPage
      this.$refs.vuetable.refresh()
    },
    searchChange (val) {
      this.search = val.toLowerCase()
      this.$refs.vuetable.refresh()
    },
    onPaginationData (paginationData) {
      this.from = paginationData.from
      this.to = paginationData.to
      this.total = paginationData.total
      this.lastPage = paginationData.last_page
      this.items = paginationData.data
      this.$refs.pagination.setPaginationData(paginationData)
    },
    onChangePage (page) {
      this.$refs.vuetable.changePage(page)
    },
    changeTypeSearch (columna) {
      this.columna = columna
    },
    mensaje (mensaje) {
      this.$refs['modal-5'].show()
      this.$refs['modal-5'].title = mensaje
    }
  }
}
</script>

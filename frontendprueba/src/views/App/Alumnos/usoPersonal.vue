<template>
  <b-container fluid>
    <b-modal id="modal-1" ref="modal-1" title="Agregar Cliente">
      <form>
        <div class="col-md-12 mb-3">
          <label for="nombre">Nombre</label>
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
          <label for="nit">NIT</label>
          <input
            required
            type="text"
            class="form-control"
            id="nit"
            v-model.trim="$v.form.nit.$model"
            :state="!$v.form.nit.$error"
            placeholder="Ingresar NIT"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="direccion">DIRECCION</label>
          <input
            required
            type="text"
            class="form-control"
            id="direccion"
            v-model.trim="$v.form.direccion.$model"
            :state="!$v.form.direccion.$error"
            placeholder="Ingresar Direccion"
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
    <b-modal id="modal-2" ref="modal-2" title="Editar Cliente">
      <form>
        <div class="col-md-12 mb-3">
          <label for="nombre">Nombre</label>
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
          <label for="nit">NIT</label>
          <input
            required
            type="text"
            class="form-control"
            id="nit"
            v-model.trim="$v.form.nit.$model"
            :state="!$v.form.nit.$error"
            placeholder="Ingresar NIT"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="direccion">DIRECCION</label>
          <input
            required
            type="text"
            class="form-control"
            id="direccion"
            v-model.trim="$v.form.direccion.$model"
            :state="!$v.form.direccion.$error"
            placeholder="Ingresar Direccion"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="estado">ESTADO</label>
          <input
            required
            type="number"
            class="form-control"
            id="estado"
            v-model.trim="$v.form.estado.$model"
            :state="!$v.form.estado.$error"
            min="0"
            max="1"
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
        ¿Desea Eliminar al Cliente: {{ form.nombre }} ?
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
              <h4 class="card-title mt-3">CLIENTES</h4>
              <div class="iq-search-bar mt-2">
                <div class="row">
                  <div class="col-sm">
                    <b-form action="#" class="searchbox">
                        <b-input id="search" placeholder="Buscar..." @input="(val) => searchChange(val)" />
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                    </b-form>
                  </div>
                  <div class="col-sm">
                    <b-dropdown
                      id="ddown1"
                      :text="columna.nombre"
                      variant="outline-dark"
                      class="mr-1 float-md-left btn-group"
                      size="xs"
                    >
                      <b-dropdown-item
                        v-for="(search, index) in options"
                        :key="index"
                        @click="changeTypeSearch(search)"
                        >{{ search.nombre }}</b-dropdown-item
                      >
                    </b-dropdown>
                  </div>
                </div>
              </div>
            </template>
            <template v-slot:headerAction>
            <b-button variant="primary"  v-b-modal.modal-1>AGREGAR NUEVO</b-button>
          </template>
          <template v-slot:body>
            <table>
              <thead>
              <th>
                ACCION
              </th>
              <th>
                NOMBRE
              </th>
              <th>
                NIT
              </th>
              <th>
                DIRECCION
              </th>
              <th>
                ESTADO
              </th>
              </thead>
              <tbody>
                <tr v-for="datos in datosPost" :key="datos.id">
                  <td>
                    <button class="btn btn-danger" @click="accionEdit(1,datos)" v-b-modal.modal-2>
                      <icon class="ri-pencil-fill"></icon>
                    </button>
                    <button class="btn btn-success" @click="accionEdit(2, datos)" v-b-modal.modal-3>
                      <icon class="ri-delete-bin-7-fill"></icon>
                    </button>
                  </td>
                  <td v-text="datos.nombre"></td>
                  <td v-text="datos.nit"></td>
                  <td v-text="datos.direccion"></td>
                  <td v-text="datos.estado"></td>
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
  name: 'Alumnos',
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
        nit: '',
        direccion: '',
        estado: 1
      },
      apiBase: laravelUrl + '/client/getAll',
      typeOptions: [],
      options: [
        { value: '1', nombre: 'NOMBRE' },
        { value: '2', nombre: 'NIT' },
        { value: '3', nombre: 'DIRECCION' },
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
          name: 'nit',
          sortField: 'nit',
          title: 'NIT',
          dataClass: 'list-item-heading'
        },
        {
          name: 'direccion',
          sortField: 'direccion',
          title: 'DIRECCION',
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
        nit: { required },
        direccion: { required },
        estado: { required }
      }
    }
  },
  methods: {
    eliminarRegistro () {
      axios.delete(laravelUrl + '/client/delete/' + this.form.id).then((response) => {
        this.getDatos()
      })
    },
    getDatos () {
      axios.get(laravelUrl + '/client/getAll').then((response) => {
        this.datosPost = response.data
        console.log(this.datosPost)
      })
    },
    accionEdit (accion, datos) {
      if (accion === 1) {
        // ACTUALIZAR
        this.form.id = datos.id
        this.form.nombre = datos.nombre
        this.form.nit = datos.nit
        this.form.direccion = datos.direccion
        this.form.estado = datos.estado
      } else if (accion === 2) {
        this.form.id = datos.id
        this.form.nombre = datos.nombre
        this.form.nit = datos.nit
        this.form.direccion = datos.direccion
        this.form.estado = datos.estado
      }
    },
    openModal (modal, action) {
      switch (modal) {
        case 'save': {
          this.$v.$reset()
          this.form.id = 0
          this.form.nombre = ''
          this.form.nit = ''
          this.form.direccion = ''
          this.form.estado = 1
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
          this.form.nit = ''
          this.form.direccion = ''
          this.form.estado = 1
          break
        }
        case 'update': {
          this.$v.$reset()
          this.$refs['modal-2'].hide()
          this.form.id = 0
          this.form.nombre = ''
          this.form.nit = ''
          this.form.direccion = ''
          this.form.estado = 1
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
      axios.post(laravelUrl + '/client/create', {
        nombre: me.form.nombre,
        nit: me.form.nit,
        direccion: me.form.direccion
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
      axios.put(laravelUrl + '/client/update/' + me.form.id, {
        nombre: me.form.nombre,
        nit: me.form.nit,
        direccion: me.form.direccion,
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

<template>
  <b-container fluid>
    <b-modal id="modal-1" ref="modal-1" title="Agregar Producto">
      <form>
        <div class="col-md-12 mb-3">
          <label for="marca">MARCA</label>
          <input
            required
            type="text"
            class="form-control"
            id="marca"
            v-model.trim="$v.form.marca.$model"
            :state="!$v.form.marca.$error"
            placeholder="Ingresar marca"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="tipo">TIPO</label>
          <input
            required
            type="text"
            class="form-control"
            id="tipo"
            v-model.trim="$v.form.tipo.$model"
            :state="!$v.form.tipo.$error"
            placeholder="Ingresar tipo"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="placa">PLACA</label>
          <input
            required
            type="text"
            class="form-control"
            id="placa"
            v-model.trim="$v.form.placa.$model"
            :state="!$v.form.placa.$error"
            placeholder="Ingresar placa"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="estado">ESTADO</label>
          <input
            required
            type="text"
            class="form-control"
            id="estado"
            v-model.trim="$v.form.estado.$model"
            :state="!$v.form.estado.$error"
            placeholder="Ingresar estado"
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
          <label for="marca">MARCA</label>
          <input
            required
            type="text"
            class="form-control"
            id="marca"
            v-model.trim="$v.form.marca.$model"
            :state="!$v.form.marca.$error"
            placeholder="Ingresar marca"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="tipo">TIPO</label>
          <input
            required
            type="text"
            class="form-control"
            id="tipo"
            v-model.trim="$v.form.tipo.$model"
            :state="!$v.form.tipo.$error"
            placeholder="Ingresar tipo"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="placa">PLACA</label>
          <input
            required
            type="text"
            class="form-control"
            id="placa"
            v-model.trim="$v.form.placa.$model"
            :state="!$v.form.placa.$error"
            placeholder="Ingresar placa"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="estado">ESTADO</label>
          <input
            required
            type="text"
            class="form-control"
            id="estado"
            v-model.trim="$v.form.estado.$model"
            :state="!$v.form.estado.$error"
            placeholder="Ingresar estado"
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
              <h4 class="card-title mt-3">CARROS</h4>
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
            <table class="table table-bordered table-striped">
              <thead class="table-active">
              <th>
                ACCION
              </th>
              <th>
                MARCA
              </th>
              <th>
                TIPO
              </th>
              <th>
                PLACA
              </th>
              <th>
                ESTADO
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
                  <td v-text="datos.marca"></td>
                  <td v-text="datos.tipo"></td>
                  <td v-text="datos.placa"></td>
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
        marca: '',
        tipo: '',
        placa: '',
        estado: ''
      },
      apiBase: laravelUrl + '/carro/getAll',
      datosPost: null,
      typeOptions: [],
      options: [
        { value: '1', nombre: 'MERCA' },
        { value: '2', nombre: 'TIPO' },
        { value: '3', nombre: 'PLACA' },
        { value: '4', nombre: 'ESTADO' }
      ],
      columna: { value: '1', nombre: 'MARCA' },
      fields: [
        {
          name: '__slot:actions',
          title: 'Acciones',
          titleClass: '',
          dataClass: 'text-muted'
          // width: "15%",
        },
        {
          name: 'marca',
          sortField: 'marca',
          title: 'MARCA',
          dataClass: 'list-item-heading'
        },
        {
          name: 'tipo',
          sortField: 'tipo',
          title: 'TIPO',
          dataClass: 'list-item-heading'
        },
        {
          name: 'placa',
          sortField: 'placa',
          title: 'PLACA',
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
        marca: { required },
        tipo: { required },
        placa: { required },
        estado: { required }
      }
    }
  },
  methods: {
    eliminarRegistro () {
      axios.delete(laravelUrl + '/carro/delete/' + this.form.id).then((response) => {
        this.getDatos()
      })
    },
    getDatos () {
      axios.get(laravelUrl + '/carro/getAll').then((response) => {
        this.datosPost = response.data
        console.log(this.datosPost)
      })
    },
    accionEdit (accion, datos) {
      if (accion === 1) {
        // ACTUALIZAR
        this.form.id = datos.id
        this.form.marca = datos.marca
        this.form.tipo = datos.tipo
        this.form.placa = datos.placa
        this.form.estado = datos.estado
      } else if (accion === 2) {
        this.form.id = datos.id
        this.form.marca = datos.marca
        this.form.tipo = datos.tipo
        this.form.placa = datos.placa
        this.form.estado = datos.estado
      }
    },
    openModal (modal, action) {
      switch (modal) {
        case 'save': {
          this.$v.$reset()
          this.form.id = 0
          this.form.marca = ''
          this.form.tipo = ''
          this.form.placa = ''
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
          this.form.marca = ''
          this.form.tipo = ''
          this.form.placa = ''
          this.form.estado = ''
          break
        }
        case 'update': {
          this.$v.$reset()
          this.$refs['modal-2'].hide()
          this.form.id = 0
          this.form.marca = ''
          this.form.tipo = ''
          this.form.placa = ''
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
      axios.post(laravelUrl + '/carro/create', {
        marca: me.form.marca,
        tipo: me.form.tipo,
        placa: me.form.placa,
        estado: me.form.estado
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
      axios.put(laravelUrl + '/carro/update/' + me.form.id, {
        marca: me.form.marca,
        tipo: me.form.tipo,
        placa: me.form.placa,
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

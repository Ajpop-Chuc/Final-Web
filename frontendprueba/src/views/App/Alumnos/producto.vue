<template>
  <b-container fluid>
    <b-modal id="modal-1" ref="modal-1" title="Agregar Producto">
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
          <label for="descripcion">Descripcion</label>
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
        <div class="col-md-12 mb-3">
          <label for="cantidad">Cantidad</label>
          <input
            required
            type="text"
            class="form-control"
            id="cantidad"
            v-model.trim="$v.form.cantidad.$model"
            :state="!$v.form.cantidad.$error"
            placeholder="Ingresar cantidad"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="precio">Precio</label>
          <input
            required
            type="text"
            class="form-control"
            id="precio"
            v-model.trim="$v.form.precio.$model"
            :state="!$v.form.precio.$error"
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
    <b-modal id="modal-2" ref="modal-2" title="Editar Producto">
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
          <label for="descripcion">Descripcion</label>
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
        <div class="col-md-12 mb-3">
          <label for="cantidad">Cantidad</label>
          <input
            required
            type="text"
            class="form-control"
            id="cantidad"
            v-model.trim="$v.form.cantidad.$model"
            :state="!$v.form.cantidad.$error"
            placeholder="Ingresar cantidad"
          >
        </div>
        <div class="col-md-12 mb-3">
          <label for="precio">Precio</label>
          <input
            required
            type="text"
            class="form-control"
            id="precio"
            v-model.trim="$v.form.precio.$model"
            :state="!$v.form.precio.$error"
            placeholder="Ingresar precio"
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
              <h4 class="card-title mt-3">PRODUCTOS</h4>
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
                NOMBRE
              </th>
              <th>
                DESCRIPCION
              </th>
              <th>
                CANTIDAD
              </th>
              <th>
                PRECIO
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
                  <td v-text="datos.cantidad"></td>
                  <td v-text="datos.precio"></td>
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
        cantidad: '',
        precio: ''
      },
      apiBase: laravelUrl + '/producto/getAll',
      datosPost: null,
      typeOptions: [],
      options: [
        { value: '1', nombre: 'NOMBRE' },
        { value: '2', nombre: 'DESCRIPCION' },
        { value: '3', nombre: 'CANTIDAD' },
        { value: '4', nombre: 'PRECIO' }
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
          name: 'cantidad',
          sortField: 'cantidad',
          title: 'CANTIDAD',
          dataClass: 'list-item-heading'
        },
        {
          name: 'precio',
          sortField: 'precio',
          title: 'PRECIO',
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
        cantidad: { required },
        precio: { required }
      }
    }
  },
  methods: {
    eliminarRegistro () {
      axios.delete(laravelUrl + '/producto/delete/' + this.form.id).then((response) => {
        this.getDatos()
      })
    },
    getDatos () {
      axios.get(laravelUrl + '/producto/getAll').then((response) => {
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
        this.form.cantidad = datos.cantidad
        this.form.precio = datos.precio
      } else if (accion === 2) {
        this.form.id = datos.id
        this.form.nombre = datos.nombre
        this.form.descripcion = datos.descripcion
        this.form.cantidad = datos.cantidad
        this.form.precio = datos.precio
      }
    },
    openModal (modal, action) {
      switch (modal) {
        case 'save': {
          this.$v.$reset()
          this.form.id = 0
          this.form.nombre = ''
          this.form.descripcion = ''
          this.form.cantidad = ''
          this.form.precio = ''
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
          this.form.cantidad = ''
          this.form.precio = ''
          break
        }
        case 'update': {
          this.$v.$reset()
          this.$refs['modal-2'].hide()
          this.form.id = 0
          this.form.nombre = ''
          this.form.descripcion = ''
          this.form.cantidad = ''
          this.form.precio = ''
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
      axios.post(laravelUrl + '/producto/create', {
        nombre: me.form.nombre,
        descripcion: me.form.descripcion,
        cantidad: me.form.cantidad,
        precio: me.form.precio
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
      axios.put(laravelUrl + '/producto/update/' + me.form.id, {
        nombre: me.form.nombre,
        descripcion: me.form.descripcion,
        cantidad: me.form.cantidad,
        precio: me.form.precio
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

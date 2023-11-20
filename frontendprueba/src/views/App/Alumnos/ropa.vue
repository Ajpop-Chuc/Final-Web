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
                Tipo
              </th>
              <th>
                Marca
              </th>
              <th>
                Precio
              </th>
              <th>
                material
              </th>
              <th>
                color
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
                  <td v-text="datos.tipo"></td>
                  <td v-text="datos.marca"></td>
                  <td v-text="datos.precio"></td>
                  <td v-text="datos.material"></td>
                  <td v-text="datos.color"></td>
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
        tipo: '',
        marca: '',
        precio: '',
        material: '',
        color: ''
      },
      apiBase: laravelUrl + '/ropa/getAll',
      datosPost: null,
      typeOptions: [],
      options: [
        { value: '1', nombre: 'TIPO' },
        { value: '2', nombre: 'MARCA' },
        { value: '3', nombre: 'PRECIO' },
        { value: '4', nombre: 'MATERIAL' },
        { value: '4', nombre: 'COLOR' }
      ],
      columna: { value: '1', nombre: 'TIPO' },
      fields: [
        {
          name: '__slot:actions',
          title: 'Acciones',
          titleClass: '',
          dataClass: 'text-muted'
          // width: "15%",
        },
        {
          name: 'tipo',
          sortField: 'tipo',
          title: 'TIPO',
          dataClass: 'list-item-heading'
        },
        {
          name: 'marca',
          sortField: 'marca',
          title: 'MARCA',
          dataClass: 'list-item-heading'
        },
        {
          name: 'precio',
          sortField: 'precio',
          title: 'PRECIO',
          dataClass: 'list-item-heading'
        },
        {
          name: 'material',
          sortField: 'material',
          title: 'MATERIAL',
          dataClass: 'list-item-heading'
        },
        {
          name: 'color',
          sortField: 'color',
          title: 'COLOR',
          dataClass: 'list-item-heading'
        }
      ]
    }
  },
  validations () {
    return {
      form: {
        tipo: { required },
        marca: { required },
        precio: { required },
        material: { required },
        color: { required }
      }
    }
  },
  methods: {
    eliminarRegistro () {
      axios.delete(laravelUrl + '/ropa/delete/' + this.form.id).then((response) => {
        this.getDatos()
      })
    },
    getDatos () {
      axios.get(laravelUrl + '/ropa/getAll').then((response) => {
        this.datosPost = response.data
        console.log(this.datosPost)
      })
    },
    accionEdit (accion, datos) {
      if (accion === 1) {
        // ACTUALIZAR
        this.form.id = datos.id
        this.form.tipo = datos.tipo
        this.form.marca = datos.marca
        this.form.precio = datos.precio
        this.form.material = datos.material
        this.form.color = datos.color
      } else if (accion === 2) {
        this.form.id = datos.id
        this.form.tipo = datos.tipo
        this.form.marca = datos.marca
        this.form.precio = datos.precio
        this.form.material = datos.material
        this.form.color = datos.color
      }
    },
    openModal (modal, action) {
      switch (modal) {
        case 'save': {
          this.$v.$reset()
          this.form.id = 0
          this.form.tipo = ''
          this.form.marca = ''
          this.form.precio = ''
          this.form.material = ''
          this.form.color = ''
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
          this.form.tipo = ''
          this.form.marca = ''
          this.form.precio = ''
          this.form.material = ''
          this.form.color = ''
          break
        }
        case 'update': {
          this.$v.$reset()
          this.$refs['modal-2'].hide()
          this.form.id = 0
          this.form.tipo = ''
          this.form.marca = ''
          this.form.precio = ''
          this.form.material = ''
          this.form.color = ''
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
      axios.post(laravelUrl + '/ropa/create', {
        tipo: me.form.tipo,
        marca: me.form.marca,
        precio: me.form.precio,
        material: me.form.material,
        color: me.form.color
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
      axios.put(laravelUrl + '/ropa/update/' + me.form.id, {
        tipo: me.form.tipo,
        marca: me.form.marca,
        precio: me.form.precio,
        material: me.form.material,
        color: me.form.color
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

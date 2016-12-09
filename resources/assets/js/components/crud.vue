<template>
  <div class="container">
    <div class="row" v-show="estado=='ver'">
      <div class="col-md-12">
        <h3 class="text-center">Listado</h3>
        <input type="text" v-model="filtro.texto" @keyup.enter="listar();filtro.page=1" class="form-control">
        <button class="btn btn-success" @click="estado='crear';formulario=form_init">Crear</button>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Codigo</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in respuesta.data">
              <td>{{item.idfamilia}}</td>
              <td>{{item.codfamilia}}</td>
              <td>{{item.desfamilia}}</td>
              <td>
                <button class="btn btn-warning" @click="editar(item)">Editar</button>
                <button class="btn btn-danger" @click="eliminar(item)">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="panel panel-default">
          <div class="panel-body">
            Pagina: <input type="number" v-model="filtro.page" @keyup.enter="listar()">
          </div>
        </div>
      </div>
    </div>
    <div class="row" v-show="estado=='crear' || estado=='editar'">
      <div class="col-md-12">
        <h3>Formulario</h3>
        <label for="">Codigo</label><input type="text" v-model="formulario.codfamilia" class="form-control">
        <label for="">Descripción</label><input type="text" v-model="formulario.desfamilia" class="form-control">
        <template v-if="estado=='crear'">
          <button class="btn btn-default" @click="crear();estado='ver'">Crear</button>
        </template>
        <template v-else>
          <button class="btn btn-default" @click="actualizar();estado='ver'">Guardar Cambios</button>
        </template>
        <button class="btn btn-danger" @click="estado='ver'">Cancelar</button>
      </div>
    </div>
    <pre>
CONFIGURACION:
Link: {{link}}
{{$data}}
    </pre>
  </div>
</template>

<script>
export default {
  name: 'crud',
  props: ['link'],
  data () {
    return {
      estado: 'ver',
      filtro: {
        texto: '',
        page: 1
      },
      formulario: {},
      form_init: {
        idfamilia: 0,
        codfamilia: '',
        desfamilia: ''
      },
      respuesta: {}
    }
  },
  methods: {
    listar () {
      this.$http.get(this.link, {
        params: {
          search: this.filtro.texto,
          page: this.filtro.page
        }
      }).then((response) => {
        this.respuesta = response.data
        console.log(response.data.data)
      })
    },
    crear () {
      // this.respuesta.data.push(this.formulario)
      this.$http.post(this.link, {
        params: {
          codfamilia: this.formulario.codfamilia,
          desfamilia: this.formulario.desfamilia
        }
      }).then((response) => {
        console.log('peticion hecha')
        console.log(response.data)
      })
    },
    editar (item) {
      this.formulario = item
      this.estado = 'editar'
    },
    actualizar () {
      // for (var item in this.respuesta.data) {
      //   if (item.idfamilia === this.formulario.idfamilia) {
      //     item = this.formulario
      //     break
      //   }
      // }
      this.$http.put(this.link+'/'+this.formulario.idfamilia, {
        params: {
          codfamilia: this.formulario.codfamilia,
          desfamilia: this.formulario.desfamilia
        }
      }).then((response) => {
        console.log('peticion hecha')
        console.log(response.data)
      })
    },
    eliminar (item) {
      // this.respuesta.data.splice(item, 1)
      this.$http.delete(this.link+'/'+item.idfamilia)
      .then((response) => {
        console.log('peticion hecha')
        console.log(response.data)
        this.listar()
      })
    }
  },
  created () {
    this.listar()
  }
}
</script>

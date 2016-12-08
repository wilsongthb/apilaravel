<template>
  <div class="container">
    <button v-on:click="counter += 1">counter</button>
    <h1>CRUD con VueJS</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Codigo</th>
          <th>Descripcion</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in respuesta.data">
          <td>{{item.idfamilia}}</td>
          <td>{{item.codfamilia}}</td>
          <td>{{item.desfamilia}}</td>
          <td>
            <button type="button" class="btn btn-warning" aria-label="Left Align">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
            </button>
            <button type="button" class="btn btn-danger" aria-label="Left Align">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <h2>Formulario</h2>
    <form action="">
      <label for="">Codigo</label>
      <input type="text" maxlength="9" v-model="form.cod" class="form-control">
      <label for="">Descripcion</label>
      <input type="text" v-model="form.des" class="form-control">
      <input type="text" class="btn btn-default" @click="crear()" value="Crear">
    </form>
    <hr>
    <pre>
{{$data}}
    </pre>
  </div>
</template>

<script>
import jq from 'jquery'
// import bootstrap from 'bootstrap'

export default {
  name: 'crud',
  props: ['link'],
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      counter: 1,
      estado: 'ver',
      form: {
        cod: '',
        des: ''
      },
      respuesta: {}
      // link: 'http://localhost:8082/api/vue/familia'
    }
  },
  methods: {
    listar () {
      var puente = this
      jq.getJSON(
        puente.link,
        function (data) {
          // console.log(data)
          puente.respuesta = data
        }
      )
    },
    crear () {
      var puente = this
      jq.post(
        puente.link,
        puente.form,
        function (data) {
          console.log(data)
        }
      )
    }
  },
  created () {
    this.listar()
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<!--<style scoped>
.crud{
  border: solid
}
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>-->

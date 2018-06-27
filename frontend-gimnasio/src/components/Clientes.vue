<template>
  <v-app style="background-color: #363636;" dark>
    <v-container fluid>
      <v-card>
        <v-card-title>
          <h2>Clientes</h2>
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="search"
            label="Buscar"
            single-line
            hide-details
          ></v-text-field>
        </v-card-title>
        <br><br>
        
        <v-layout row justify-center>
          <v-dialog v-model="dialog" persistent max-width="500px">
            <v-btn slot="activator" style="color: #99b898;" dark>Agregar Cliente</v-btn>
            <v-card style="background: linear-gradient(0.25turn, #2a363b, #363636);">
              <v-card-title>
                <span style="color: #99b898;" class="headline">Cuenta de Cliente</span>
              </v-card-title>
              <v-card-text>
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Email"
                        type="text"
                        :rules="rules"
                        v-model="nuevoCliente.email" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Password" 
                        type="password"
                        :rules="rules"
                        v-model="nuevoCliente.password"  
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12>
                      <v-select
                        dark
                        :items="items"
                        v-model="nuevoCliente.id_rol"  
                        label="Tipo de Usuario"
                        :rules="rules"
                        required
                        single-line
                      ></v-select>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card-text>

              <v-card-title>
                <span style="color: #99b898;" class="headline">Datos del Cliente</span>
              </v-card-title>
              <v-card-text>
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm12 md12>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Rut"
                        type="text"
                        :rules="rules" 
                        v-model="nuevoCliente.rut" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md6>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Nombre"
                        type="text"
                        :rules="rules" 
                        v-model="nuevoCliente.nombre" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md6>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Apellidos"
                        type="text"
                        :rules="rules" 
                        v-model="nuevoCliente.apellidos" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md6>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Edad"
                        :rules="rules" 
                        v-model="nuevoCliente.edad" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <br><br>
                  </v-layout>
                </v-container>
                <small style="color: #99b898;">*Campos Obligatorios</small>
              </v-card-text>
              <v-card-actions>
                <v-btn color="blue darken-1" flat @click="dialog = false">Cancelar</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="registrarCliente(nuevoCliente)">Guardar</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-layout>

        <br><br>
        <v-divider></v-divider>
        <v-data-table
          :headers="headers"
          :items="clientes"
          :search="search"
        >
          <template slot="items" slot-scope="clientes">
            <td>{{ clientes.item.id }}</td>
            <td class="text-xs-left">{{ clientes.item.rut }}</td>
            <td class="text-xs-left">{{ clientes.item.nombre }}</td>
            <td class="text-xs-left">{{ clientes.item.apellidos }}</td>
            <td>
              <v-btn icon @click="goToUserProfile(clientes.item.id)">
                <v-icon>person</v-icon>
              </v-btn>
            </td>
          </template>
          <v-alert slot="no-results" :value="true" color="error" icon="warning">
            Su búsqueda "{{ search }}" no arrojó resultados.
          </v-alert>
        </v-data-table>
      </v-card>
    </v-container>
  </v-app>
</template>

<script>
import {clienteService} from '@/services/Clientes.service'

export default {
  data () {
    return {
      search: '',
      headers: [
        {
          text: 'id',
          align: 'left',
          sortable: false,
          value: 'id'
        },
        { text: 'Rut', value: 'rut' },
        { text: 'Nombre', value: 'nombre' },
        { text: 'Apellidos', value: 'apellidos' },
        { text: 'Perfil' }
      ],
      clientes: [],
      nuevoCliente: {},
      dialog: false,
      rules: [
        v => !!v || 'Campo Requerido'
      ],
      items: [
        { text: 'Entrenador', value: 2 },
        { text: 'Cliente', value: 3 }
      ]
    }
  },
  mounted () {
    let vm = this
    clienteService.query().then(data => {
      vm.clientes = data.body
      console.log(vm.clientes)
    }, erro => {
      console.log('error')
    })
  },
  methods: {
    registrarCliente (nuevoCliente) {
      let vm = this
      clienteService.save(nuevoCliente).then(data => {
        vm.nuevoCliente = data.body
        console.log(vm.nuevoCliente)
        vm.clientes.push(nuevoCliente)
        vm.dialog = false
        vm.nuevoCliente = {}
      }, err => {
        alert('ERROR. Intente nuevamente')
        console.log(err)
      })
    },
    goToUserProfile (id) {
      let vm = this
      vm.$router.push({name: 'userprofile', params: {id: id}})
    }
  }
}
</script>

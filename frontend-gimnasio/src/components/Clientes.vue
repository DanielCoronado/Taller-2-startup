<template>
  <v-container>
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
                      :readonly="lectura" 
                      :rules="rules"
                      v-model="usuario.email"   
                      required></v-text-field>
                  </v-flex>
                  <v-flex xs12>
                    <v-text-field 
                      color="light-green lighten-1" 
                      dark 
                      label="Password" 
                      type="password" 
                      :readonly="lectura" 
                      :rules="rules"
                      v-model="usuario.password"  
                      required></v-text-field>
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
                  <v-flex xs12 sm6 md6>
                    <v-text-field 
                      color="light-green lighten-1" 
                      dark 
                      label="Nombre" 
                      :readonly="lectura" 
                      :rules="rules" 
                      v-model="clientes.nombre" 
                      required
                      >
                    </v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md6>
                    <v-text-field 
                      color="light-green lighten-1" 
                      dark 
                      label="Apellidos" 
                      :readonly="lectura" 
                      :rules="rules" 
                      v-model="clientes.apellidos" 
                      required
                      >
                    </v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md6>
                    <v-text-field 
                      color="light-green lighten-1" 
                      dark 
                      label="Rut" 
                      :readonly="lectura" 
                      :rules="rules" 
                      v-model="clientes.rut" 
                      required
                      >
                    </v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md6>
                    <v-text-field 
                      color="light-green lighten-1" 
                      dark 
                      label="Edad" 
                      :readonly="lectura" 
                      :rules="rules" 
                      v-model="clientes.edad" 
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
              <v-btn color="blue darken-1" flat @click="registrarCliente(usuario, clientes)">Guardar</v-btn>
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
          <td class="text-xs-left">{{ clientes.item.edad }}</td>
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Su búsqueda "{{ search }}" no arrojó resultados.
        </v-alert>
      </v-data-table>
    </v-card>
  </v-container>
</template>

<script>
import {clienteService} from '@/services/Clientes.service'
import {userService} from '@/services/User.service'

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
        { text: 'Edad', value: 'edad' }
      ],
      clientes: [],
      usuario: {},
      dialog: false,
      lectura: false,
      rules: [
        v => !!v || 'Campo Requerido'
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
    registrarCliente (usuario, clientes) {
      let vm = this

      userService.save(usuario).then(data => {
        console.log(data)
        vm.usuario = data.body
      }, err => {
        alert('error')
        console.log(err)
      })

      clienteService.save(clientes).then(data => {
        console.log(data)
        vm.clientes = data.body
        vm.closeDialog()
        vm.clientes.push(clientes)
      }, err => {
        alert('error')
        console.log(err)
      })
    },
    closeDialog () {
      let vm = this
      vm.$emit('closeDialog')
      vm.clientes = {}
    }
  }
}
</script>

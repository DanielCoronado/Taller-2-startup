<template>
  <v-app style="background-color: #363636;" dark>
    <v-container fluid>
      <v-layout row wrap>
        <v-flex xs12 sm6 md4 text-xs-center>
          <v-card dark flat style="background-color: #363636;">
            <h3 class="text-sm-left display-1" style="padding-top: 15px; padding-bottom: 20px;">Profile</h3>
            <img style="border-radius: 75px;" src="https://randomuser.me/api/portraits/men/85.jpg" >
            <h3 style="padding-top: 15px;">{{ cliente.nombre+" "+cliente.apellidos }}</h3>
            <p>{{ cliente.rol }}</p>
            

            <v-layout row justify-center>
              <v-dialog v-model="dialog" persistent max-width="500px">
                <v-btn round slot="activator" color="blue-grey" dark>Edit Profile</v-btn>
                <v-card style="background: linear-gradient(0.25turn, #2a363b, #363636);">
                  <v-card-title style="margin-bottom: -30px;">
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
                            v-model="updateCliente.rut" 
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
                            v-model="updateCliente.nombre" 
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
                            v-model="updateCliente.apellidos" 
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
                            v-model="updateCliente.edad" 
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
                    <v-btn color="blue darken-1" flat @click="actualizarCliente(updateCliente)">Guardar</v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-layout>

            <br><br>
            <v-expansion-panel flat popout>
              <v-expansion-panel-content>
                <div slot="header">Personal Information</div>
                <v-card>
                  <table>
                    <tr>
                      <td><v-subheader>Edad:</v-subheader></td>
                      <td><v-subheader>{{ cliente.edad }}</v-subheader></td>
                    </tr>
                    <tr>
                      <td><v-subheader>Rut:</v-subheader></td>
                      <td><v-subheader>{{ cliente.rut }}</v-subheader></td>
                    </tr>
                    <tr>
                      <td><v-subheader>Email:</v-subheader></td>
                      <td><v-subheader>{{ cliente.email }}</v-subheader></td>
                    </tr>
                  </table>
                </v-card>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-card>
        </v-flex>
        <v-flex xs12 md5 text-xs-center>
          <h3 class="text-sm-left display-1" style="padding-top: 15px; padding-bottom: 20px;">Rutinas</h3>
          <v-card dark flat style="background-color: #363636;" class="white--text" v-for="rutina in rutinas" :key="rutina.id">
            <v-card-title primary-title>
              <div>{{ rutina.id }}</div>
              <div class="text-xs-left">{{ rutina.nombre_rutina }}</div>
            </v-card-title>
            <v-card-actions>
            </v-card-actions>
          </v-card>
        </v-flex>
        <v-flex xs12 md3 text-xs-center>
          <h3 class="text-sm-left display-1" style="padding-top: 15px; padding-bottom: 20px;">Progreso</h3>
          <v-card dark flat style="background-color: #363636;" class="white--text" v-for="progreso in progresos" :key="progreso.id">
            <v-card-title primary-title>
              <div>id_cliente: {{ progreso.id_cliente }}</div>
            </v-card-title>
            <v-card-actions>
              <div class="text-xs-left">{{ progreso.altura }}</div>
              <div class="text-xs-left">{{ progreso.peso }}</div>
              <div class="text-xs-left">{{ progreso.imc }}</div>
              <div class="text-xs-left">{{ progreso.fecha_registro }}</div>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
import {clienteService} from '@/services/Clientes.service'
import {rutinaClienteService} from '@/services/RutinasCliente.service'
import {registroClienteService} from '@/services/RegistrosCliente.service'

export default {
  data () {
    return {
      idProfile: 0,
      cliente: {},
      updateCliente: {},
      rutinas: {},
      progresos: [],
      dialog: false,
      rules: [
        v => !!v || 'Campo Requerido'
      ],
      headers: [
        {
          text: 'id',
          align: 'left',
          sortable: false,
          value: 'id'
        },
        { text: 'Nombre Rutina', value: 'nombre_rutina' }
      ]
    }
  },
  mounted () {
    let vm = this
    vm.idProfile = vm.$route.params.id

    clienteService.getById(vm.idProfile).then(data => {
      vm.cliente = data.body
      console.log(vm.cliente)
    })

    rutinaClienteService.getById(vm.idProfile).then(data => {
      vm.rutinas = data.body.rutinas
      console.log(data.body)
    }, erro => {
      console.log('error')
    })

    registroClienteService.getById(vm.idProfile).then(data => {
      vm.progresos = data.body.rutinas
      console.log(vm.progresos)
    }, erro => {
      console.log('error')
    })
  },
  methods: {
    actualizarCliente (updateCliente) {
      let vm = this
      vm.idProfile = vm.$route.params.id
      console.log(updateCliente)
      clienteService.update(vm.idProfile, updateCliente).then(data => {
        vm.updateCliente = data.body
        console.log(vm.updateCliente)
        vm.dialog = false
      }, err => {
        alert('ERROR. Intente nuevamente')
        console.log(err)
      })
    }
  }
}
</script>

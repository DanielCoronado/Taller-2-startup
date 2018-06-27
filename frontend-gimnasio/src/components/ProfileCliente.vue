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
            <v-btn round color="blue-grey" dark>Edit Profile</v-btn>
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
        <v-flex xs12 sm6 md5 text-xs-center>
          <v-card dark flat style="background-color: #363636;">
            <h3 class="text-sm-left display-1" style="padding-top: 15px; padding-bottom: 20px;">Horarios</h3>
          </v-card>
        </v-flex>
        <v-flex xs12 md3 text-xs-center>
          <v-card dark flat style="background-color: #363636;">
            <h3 class="text-sm-left display-1" style="padding-top: 15px; padding-bottom: 20px;">Rutinas</h3>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
import {clienteService} from '@/services/Clientes.service'

export default {
  data () {
    return {
      idProfile: 0,
      cliente: {}
    }
  },
  mounted () {
    let vm = this
    vm.idProfile = vm.$route.params.id

    clienteService.getById(vm.idProfile).then(data => {
      vm.cliente = data.body
      console.log(vm.cliente)
    })
  }
}
</script>

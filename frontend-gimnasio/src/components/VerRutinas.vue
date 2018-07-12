<template>
  <v-app style="background-color: #363636;" dark>
    <v-container fluid>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 text-xs-center>
          <v-card dark flat style="background-color: #363636;">
            <h3 class="text-sm-left display-1" style="padding-top: 15px; padding-bottom: 20px;">Profile</h3>
            <h3 style="padding-top: 15px;">{{ rutina.nombre_rutina }}</h3>
            <p>{{ rutina.descripcion }}</p>

            <v-expansion-panel flat popout>
              <v-expansion-panel-content>
                <div slot="header">Personal Information</div>
                <v-card>
                  <table>
                    <tr>
                      <td><v-subheader>Fecha Inicio:</v-subheader></td>
                      <td><v-subheader>{{ rutina.fecha_inicio }}</v-subheader></td>
                    </tr>
                    <tr>
                      <td><v-subheader>Fecha Término:</v-subheader></td>
                      <td><v-subheader>{{ rutina.fecha_termino }}</v-subheader></td>
                    </tr>
                  </table>
                </v-card>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
import {rutinaService} from '@/services/Rutinas.service'

export default {
  data () {
    return {
      idRutina: 0,
      rutina: {}
    }
  },
  mounted () {
    let vm = this
    vm.idRutina = vm.$route.params.id

    rutinaService.getById(vm.idRutina).then(data => {
      vm.rutina = data.body
      console.log(vm.rutina)
    })
  }
}
</script>

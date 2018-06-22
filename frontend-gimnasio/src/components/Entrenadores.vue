<template>
  <v-app style="background-color: #363636;" dark>
    <v-container>
      <v-card>
        <v-card-title>
          <h2>Entrenadores (Arreglar)</h2>
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
        <br><br>
        <v-divider></v-divider>
        <v-data-table
          :headers="headers"
          :items="entrenadores"
          :search="search"
        >
          <template slot="items" slot-scope="entrenadores">
            <td>{{ entrenadores.item.id }}</td>
            <td class="text-xs-left">{{ entrenadores.item.rut }}</td>
            <td class="text-xs-left">{{ entrenadores.item.nombre }}</td>
            <td class="text-xs-left">{{ entrenadores.item.apellidos }}</td>
            <td class="text-xs-left">{{ entrenadores.item.edad }}</td>
            <td>
              <v-btn icon>
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
import {entrenadoresService} from '@/services/Entrenadores.service'

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
        { text: 'Edad', value: 'edad' },
        { text: 'Perfil' }
      ],
      entrenadores: []
    }
  },
  mounted () {
    let vm = this
    entrenadoresService.query().then(data => {
      vm.entrenadores = data.body
      console.log(vm.entrenadores)
    }, erro => {
      console.log('error')
    })
  }
}
</script>

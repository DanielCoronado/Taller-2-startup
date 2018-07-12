<template>
  <v-app style="background-color: #363636;" dark>
    <v-container>
      <v-card>
        <v-card-title>
          <h2>Rutinas</h2>
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
          :items="rutinas"
          :search="search"
        >
          <template slot="items" slot-scope="rutinas">
            <td>{{ rutinas.item.id }}</td>
            <td class="text-xs-left">{{ rutinas.item.nombre_rutina }}</td>
            <td class="text-xs-left">{{ rutinas.item.descripcion }}</td>
            <td class="text-xs-left">{{ rutinas.item.fecha_inicio }}</td>
            <td class="text-xs-left">{{ rutinas.item.fecha_termino }}</td>
            <td>
              <v-btn icon @click="goToRutina(rutinas.item.id)">
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
import {rutinaService} from '@/services/Rutinas.service'

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
        { text: 'Nombre Rutina', value: 'nombre_rutina' },
        { text: 'Descripción', value: 'descripcion' },
        { text: 'Fecha Inicio', value: 'fecha_inicio' },
        { text: 'Fecha Término', value: 'fecha_termino' },
        { text: 'Rutina' }
      ],
      rutinas: []
    }
  },
  mounted () {
    let vm = this
    rutinaService.query().then(data => {
      vm.rutinas = data.body
      console.log(vm.rutinas)
    }, erro => {
      console.log('error')
    })
  },
  methods: {
    goToRutina (id) {
      let vm = this
      vm.$router.push({name: 'verrutinas', params: {id: id}})
    }
  }
}
</script>

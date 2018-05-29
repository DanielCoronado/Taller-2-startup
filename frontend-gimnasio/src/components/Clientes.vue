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
      <h2>Espacio para agregar boton agregar cliente</h2>
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
      clientes: []
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
  }
}
</script>

<template>
  <v-container>
    <h2>{{ cliente.nombre }}</h2>
    <h2>{{ cliente.apellidos }}</h2>
    <h2>{{ cliente.edad }}</h2>
    <h2>{{ cliente.rut }}</h2>
  </v-container>
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
    })
  }
}
</script>

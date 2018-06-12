<template>
  <v-container>
    <h2>Nombre: {{ cliente.nombre }}</h2>
    <h2>Apellidos: {{ cliente.apellidos }}</h2>
    <h2>Email: {{ cliente.email }}</h2>
    <h2>Rut: {{ cliente.rut }}</h2>
    <h2>Edad: {{ cliente.edad }}</h2>
    <h2>Rol: {{ cliente.rol }}</h2>
  </v-container>
</template>

<script>
import {clienteService} from '@/services/Clientes.service'

export default {
  data () {
    return {
      idProfile: 0,
      cliente: []
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

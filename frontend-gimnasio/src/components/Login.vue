<template>
  <v-app flat style="background: linear-gradient(0.25turn, #2a363b, #363636);">
    <v-card style="background: linear-gradient(0.25turn, #2a363b, #363636);" flat>
      <br><br>
      <v-layout row>
        <v-flex xs10 offset-xs1 md6 offset-md3>
          <center>
            <v-layout>
              <v-flex xs8 offset-xs2 md6 offset-md3 class="text-xs-center">
                <h1 style="color: #99b898;">Sistema de Administración de Gimnasios</h1>
                <br>
                <h3 style="color: #99b898;">Bienvenido/a </h3>
              </v-flex>
            </v-layout>
            <br><br>
            <v-card style="v-card {width: 370px; height: 400px; border-radius: 10px;} @media only screen and (max-width: 300px){v-card {width: 250px;}}" class="transparent">
              <br><br>
              <v-layout row wrap>
                <v-flex xs8 offset-xs2>
                  <v-form>
                    <v-text-field
                      label="Correo Electrónico"
                      type="email"
                      v-model="credentials.email"
                      color="light-green lighten-1"
                      dark
                      required
                    ></v-text-field>
                    <v-text-field
                      label="Contraseña"
                      type="password"
                      v-model="credentials.password"
                      color="light-green lighten-1"
                      dark
                      required
                    ></v-text-field><br><br>
                    <small v-if="errorLogin" class="red--text">Email o Password Incorrectos</small>
                    <v-btn :loading="isLoading" @click="submit(credentials)" :disabled="!isValidForm" block style="border-radius: 7px; background: linear-gradient(0.40turn, #e5eec1, #a2d4ab, #3eaca8, #547a82, #5a5050);" color=" black--text">Iniciar Sesión</v-btn>
                  </v-form>
                </v-flex>
              </v-layout>
            </v-card>
          </center>
        </v-flex>
      </v-layout>
    </v-card>
  </v-app>
</template>

<script>
import {loginService} from '@/services/Login.service'
import CredentialsService from '@/services/Credentials.service.js'

export default {
  data () {
    return {
      isLoading: false,
      credentials: {
        email: '',
        password: ''
      },
      errorLogin: false,
      credentialService: new CredentialsService()
    }
  },
  methods: {
    submit (credentials) {
      let vm = this
      vm.isLoading = true
      loginService.save(credentials).then(data => {
        vm.credentialService.setToken(data.body.token)
        vm.credentialService.setCurrentUser(data.body.users)
        var rol = data.body.users.rol
        if (rol === 'Secretaria') {
          vm.$router.push('/clientes')
        } else if (rol === 'Entrenador') {
          vm.$router.push('/clientes')
        }
      }, () => {
        vm.errorLogin = true
        vm.isLoading = false
      })
    }
  },
  computed: {
    isValidForm () {
      let vm = this
      return vm.credentials.email !== '' && this.credentials.password !== ''
    }
  }
}
</script>

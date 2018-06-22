<template>
  <v-app>
    <v-navigation-drawer
      persistent
      :mini-variant="miniVariant"
      :clipped="clipped"
      v-model="drawer"
      enable-resize-watcher
      fixed
      app
      style="background: linear-gradient(0.40turn, #5a5050, #547a82, #3eaca8, #a2d4ab, #e5eec1);"
    >
      <v-toolbar style="background-color: #676767;" class="transparent" flat>
        <v-list class="pa-0">
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="https://randomuser.me/api/portraits/men/85.jpg">
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title style="color: #a2d4ab;">{{ user.nombre + " " + user.apellidos }}</v-list-tile-title>
              <h5 style="color: #3eaca8;">{{ user.rol }}</h5>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>
      <v-list class="pt-0" dense style="background: transparent;">
        <v-divider></v-divider>
        <v-list-tile @click="goHome()">
          <v-list-tile-action>
            <v-icon>home</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Home</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list class="pt-0" dense style="background: transparent;" v-if="user.rol == 'Secretaria'">
        <v-list-tile @click="goToClientes()">
          <v-list-tile-action>
            <v-icon>people</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Clientes</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list class="pt-0" dense style="background: transparent;" v-if="user.rol == 'Secretaria'">
        <v-list-tile @click="goToEntrenadores()">
          <v-list-tile-action>
            <v-icon>directions_run</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Entrenadores</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list class="pt-0" dense style="background: transparent;" v-if="user.rol == 'Entrenador'">
        <v-list-tile @click="goHome()">
          <v-list-tile-action>
            <v-icon>fitness_center</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Rutinas</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>

    </v-navigation-drawer>
    <v-toolbar
      app
      :clipped-left="clipped"
      style="background-color: #2a363b; color: #99b898;"
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer" style="color: #99b898;"></v-toolbar-side-icon>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn @click="logout" flat style="color: #e84a5f;">Cerrar Sesión
        <v-icon dark right>exit_to_app</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <router-view/>
    </v-content>
    <v-footer :fixed="fixed" app class="transparent">
      <span>&copy; 2018 - Gym Fit - Acuña / Coronado</span>
    </v-footer>
  </v-app>
</template>

<script>
import CredentialsService from '@/services/Credentials.service'

export default {
  data () {
    return {
      clipped: true,
      drawer: true,
      fixed: false,
      miniVariant: false,
      title: 'Gym-Fit',
      user: {},
      credenciales: new CredentialsService()
    }
  },
  mounted () {
    let vm = this
    vm.user = vm.credenciales.getCurrentUser()
  },
  methods: {
    logout () {
      let vm = this
      vm.credenciales.clearCredentials()
      vm.$router.push('/login')
    },
    goHome () {
      let vm = this
      vm.$router.push('/')
    },
    goToClientes () {
      let vm = this
      vm.$router.push('/clientes')
    },
    goToEntrenadores () {
      let vm = this
      vm.$router.push('/entrenadores')
    }
  },
  name: 'App'
}
</script>

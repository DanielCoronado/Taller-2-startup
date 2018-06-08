class CredentialsService {
  setCurrentUser (user) {
    localStorage.setItem('user', JSON.stringify(user))
  }
  getCurrentUser () {
    let user = localStorage.getItem('user')
    return JSON.parse(user)
  }

  setToken (token) {
    localStorage.setItem('token', token)
  }
  getToken () {
    let token = localStorage.getItem('token')
    return token
  }

  clearCredentials () {
    localStorage.clear('user')
    localStorage.clear('token')
  }

  isLogin () {
    if (this.getToken() != null) return true
    else return false
  }
}

export default CredentialsService

import ApiService from './Api.service.js'

class LoginService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const loginService = new LoginService('login')

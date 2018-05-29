import ApiService from './Api.service.js'

class UserService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const userService = new UserService('users{/id}')

import ApiService from './Api.service.js'

class EntrenadoresService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const entrenadoresService = new EntrenadoresService('entrenadores')

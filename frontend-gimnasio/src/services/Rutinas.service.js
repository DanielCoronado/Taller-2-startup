import ApiService from './Api.service.js'

class RutinaService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const rutinaService = new RutinaService('rutinas{/id}')

import ApiService from './Api.service.js'

class RutinaClienteService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const rutinaClienteService = new RutinaClienteService('rutinascliente{/id}')

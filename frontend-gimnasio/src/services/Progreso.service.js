import ApiService from './Api.service.js'

class ProgresoService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const progresoService = new ProgresoService('progresos{/id}')

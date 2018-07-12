import ApiService from './Api.service.js'

class RegistroClienteService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const registroClienteService = new RegistroClienteService('registroscliente{/id}')

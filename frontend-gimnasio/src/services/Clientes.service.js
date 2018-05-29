import ApiService from './Api.service.js'

class ClienteService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const clienteService = new ClienteService('clientes{/id}')

export class AddressService {
    async getCitiesByUF(uf) {
        const response = await fetch(
            `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`
        );

        const cities = await response.json();
        return cities;
    }
}

import { AddressService } from "../Services/address-service";

export class CitiesUI {
    async setCities(UF){
        const addressService = new AddressService();
        const cities = await addressService.getCitiesByUF(UF);

        const citySelect = document.getElementById('city');

        citySelect.innerHTML = '';

        cities.forEach(city => {
            citySelect.innerHTML += `
                <option value="${city['nome']}">
                    ${city['nome']}
                </option>
            `;
        });
    }
}

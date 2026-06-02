import { AddressService } from "../Services/address-service";

export class CitiesUI {
    async setCities(UF){
        const spinner = document.getElementById('spinner')
        const citySelect = document.getElementById('city');

        spinner.classList.remove('hidden');
        citySelect.classList.add("hidden");

        const addressService = new AddressService();
        const cities = await addressService.getCitiesByUF(UF);

        citySelect.innerHTML = '';

        cities.forEach(city => {
            citySelect.innerHTML += `
                <option value="${city['nome']}">
                    ${city['nome']}
                </option>
            `;
        });

        spinner.classList.add('hidden');
        citySelect.classList.remove("hidden");
    }
}

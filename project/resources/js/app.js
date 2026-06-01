import './bootstrap';
import { CitiesUI } from './UI/cities-ui';

const stateSelect = document.getElementById('state');

if (stateSelect) {
    const citiesUI = new CitiesUI();

    citiesUI.setCities(stateSelect.value);

    stateSelect.addEventListener('change', async (event) => {
        await citiesUI.setCities(event.target.value);
    });
}

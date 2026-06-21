import { CitiesUI } from "./UI/cities-ui";
import { documentHandler } from "./document-handler";
import { phoneHandler } from "./phone-handler";

documentHandler();
phoneHandler();


const stateSelect = document.getElementById('state');


if(stateSelect){
stateSelect.addEventListener('change', async (event) => {
    console.log(event.target.value);

    const citiesUI = new CitiesUI();
    await citiesUI.setCities(event.target.value);
});
}
else {
    console.log("State Select não encontrado");
}

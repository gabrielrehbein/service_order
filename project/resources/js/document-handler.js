import IMask from 'imask';

export function documentHandler(){
    const CNPJInput = document.getElementById('cnpj');
    const CPFInput = document.getElementById('cpf');

    if (CPFInput) {
        const CPFMask = IMask(CPFInput, {
            mask: '000.000.000-00'
        });
    }

    if (CNPJInput) {
        const CNPJMask = IMask(CNPJInput, {
            mask: '00.000.000/0000-00'
        });
    }

    if(CPFInput && CNPJInput){
        document.querySelector('form').addEventListener('submit', () => {
            document.getElementById('cpf').value = CPFMask.unmaskedValue;
            document.getElementById('cnpj').value = CNPJMask.unmaskedValue;
        });
    }

}


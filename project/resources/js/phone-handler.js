import IMask from 'imask';

export function phoneHandler(){
    const phoneInput = document.getElementById('phone');

    if (phoneInput) {
        const phoneMask = IMask(phoneInput, {
            mask: '(00) 90000-0000'
        });

        document.querySelector('form').addEventListener('submit', () => {
            phoneInput.value = phoneMask.unmaskedValue;
        });
    }

}


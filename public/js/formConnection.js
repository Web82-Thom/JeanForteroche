class FormConnection {
    constructor() {
        this.eventListenerMethode();

        document.getElementById('email');
        document.getElementById('password');
    }

    eventListenerMethode() {
        this.button = document.getElementById('formButton').addEventListener('click' , () => this.verification());
    }

    verification() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email !== "" && password !== "" ) {
            this.eventListenerMethode();
        } else {
            alert('Veuillez remplir tous les champs correctement.');
        }
    }
}
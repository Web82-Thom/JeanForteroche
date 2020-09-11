class FormConnection {
    constructor() {
        this.eventListenerMethod();

        document.getElementById('email');
        document.getElementById('password');
    }

    eventListenerMethod() {
        this.button = document.getElementById('formButton').addEventListener('click' , () => this.verification());
    }

    verification() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email !== "" && password !== "" ) {
            this.eventListenerMethod();
        } else {
            alert('Veuillez remplir tous les champs correctement.');
        }
    }
}
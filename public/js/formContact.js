class FormContact {
    constructor() {
        this.eventListenerMethode();

        document.getElementById('inputContactName').value = localStorage.getItem('name');
        document.getElementById('inputContactFirstName').value = localStorage.getItem('firstName');
        document.getElementById('inputContactEmail').value = localStorage.getItem('email');
        document.getElementById('inputContactMessage').value = localStorage.getItem('message');
    }

    eventListenerMethode() {
        document.getElementById('formButton').addEventListener('click' , () => this.verification());
    }

    verification() {
        let name = document.getElementById('inputContactName').value;
        let firstName = document.getElementById('inputContactFirstName').value;
        let email = document.getElementById('inputContactEmail').value;
        let title = document.getElementById('inputContactTitle').value;
        let message = document.getElementById('inputContactMessage').value;

        if (name !== "" &&
            firstName !== "" && 
            email !== "" && 
            title !== "" &&
            message  !== "" ) {
            localStorage.setItem('email', email);
            localStorage.setItem('name', name);
            localStorage.setItem('firstName', firstName);

            alert('Votre message à été envoyer avec succes!');
            document.getElementById("formContent").submit();
        } else {
            alert('Veuillez remplir tous les champs correctement.');
        }
    }
}
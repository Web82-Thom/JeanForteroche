class FormContact {
    constructor() {
        this.eventListenerMethode();

        this.form = document.getElementById('formContact');
        
        document.getElementById('inputContactName').value = localStorage.getItem('name');

        document.getElementById('inputContactFirstName').value = localStorage.getItem('firstName');
        
        document.getElementById('inputContactEmail').value = sessionStorage.getItem('Email');

        document.getElementById('inputContactTitle').value = localStorage.getItem('Titre');

        document.getElementById('inputContactMessage').value = localStorage.getItem('message');

    }

    eventListenerMethode() {
        document.getElementById('buttonSend').addEventListener('click' , () => this.verification());
    }

    verification() {
        let name = document.getElementById('inputContactName').value;
        let firstName = document.getElementById('inputContactFirstName').value;
        let email = document.getElementById('inputContactEmail').value;
        let title = document.getElementById('inputContactTitle').value;
        let message = document.getElementById('inputContactMessage').value;

        if (name !=="" && firstName !=="" && email !=="" && title !=="" &&message  !=="" ) {
            sessionStorage.setItem('email', email);

            document.getElementById("formContent").submit();
            alert('Votre message à été envoyer avec succes!');
            
        } else {
            alert('Veuillez remplir tous les champs correctement.');
        }
    }
}
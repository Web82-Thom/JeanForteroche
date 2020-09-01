class FormAddComment {
    constructor() {
        this.eventListenerMethode();

        document.getElementById('author');
        document.getElementById('comment');
    }

    eventListenerMethode() {
        document.getElementById('submitComment').addEventListener('click' , () => this.verification());
    }

    verification() {
        let author = document.getElementById('author').value;
        let comment = document.getElementById('comment').value;

        if (author !== "" && comment !== "" ) {
            this.eventListenerMethode();
        } else {
            alert('Veuillez remplir tous les champs correctement.');
        }
    }
}
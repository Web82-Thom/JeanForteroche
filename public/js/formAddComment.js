class FormAddComment {
    constructor() {
        this.eventListenerMethod();

        document.getElementById('author');
        document.getElementById('comment');
    }

    eventListenerMethod() {
        document.getElementById('submitComment').addEventListener('click' , () => this.verification());
    }

    verification() {
        let author = document.getElementById('author').value;
        let comment = document.getElementById('comment').value;

        if (author !== "" && comment !== "" ) {
            this.eventListenerMethod();
        } else {
            alert('Veuillez remplir tous les champs correctement.');
        }
    }
}
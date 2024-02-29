
    // Fonction pour afficher la boîte de dialogue de confirmation
    function confirmDelete() {
        // Boîte de dialogue de confirmation avec un message
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette idée ?");
        // Si l'utilisateur clique sur OK, retourne true (confirmation) ; sinon, retourne false (annulation)
        return confirmation;
    }

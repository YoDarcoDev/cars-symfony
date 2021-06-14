

// ******* SELECTION *******
// Bouton supprimer listing (Croix)
const btnsCroix = document.querySelectorAll('.croix');

// Bouton confirmer de la Modal
const btnModalSupprimer = document.querySelector('#btnModalOk');



// ******* EVENEMENT *******
// Click croix remplit la modale
btnsCroix.forEach(element => element.addEventListener('click', () => {
    remplirDataset(element.id)
}))

// Valider la suppression
btnModalSupprimer.addEventListener('click', validerSuppression);



// ******* FUNCTION *******
// Valider suppression
async function validerSuppression() {
    // Récupère carId
    const carId = btnModalSupprimer.dataset.carId;

    if (carId !== "") {
        try {
            const response = await fetch(`/cars/${carId}/delete`, {
                method: "POST"
            })
            const data = await response.json();

            if (data.success) {
                toastr.success(data.message);

                const cardCar = document.querySelector( `#delete-${carId}`);
                cardCar.remove();
            }
        } catch(error) {
            console.log("Erreur :" + error);
        }
        // Cacher Modal
        hideModal('modalSuppression');
    }
}

// Récupérer les dataset du btnListingSupprimer (bookingPlanId)
const remplirDataset = (dataCarId) => {
    btnModalSupprimer.setAttribute('data-car-id', "")
    btnModalSupprimer.dataset.carId = dataCarId.split('-')[1];
}

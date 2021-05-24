// SELECTION: Bouton supprimer (Croix)
const btnsCroix = document.querySelectorAll('#croix');
console.log(btnsCroix);


// FUNCTION: Remplir et afficher Modal avec carId
const remplirModal = (carId) => {
    const btnModalOk = document.querySelector('#btnModalOk');
    btnModalOk.dataset.carId = carId;
}


// EVENEMENT: Remplir la modal
btnsCroix.forEach(element => element.addEventListener('click', () => {
    remplirModal(element.dataset.carId)
}))





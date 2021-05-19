// SELECTION: Bouton supprimer (Croix)
const btnCroix = document.getElementById('croix');
console.log(btnCroix);

// SELECTION: Bouton valider (Modal)
const btnModalOk = document.querySelector('#btnModalOk');
console.log(btnModalOk);


// FUNCTION: Remplir Modal (userId)
const remplirModal = (userId) => {
    btnCroix.dataset.userId = userId;
}

// EVENEMENT: Click sur la croix
btnCroix.addEventListener('click', (el) => {
   console.log(remplirModal(el.dataset.userId));
})

// EVENEMENT: Click valider suppression
btnModalOk.addEventListener('click', validerSuppression);


// FUNCTION: Valider la suppression
async function validerSuppression() {

}


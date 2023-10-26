
const entryForm = document.getElementById("entryForm");
const addButton = document.getElementById("addNewEntry");

const checkBenenficiary = document.getElementById("check-benenficiary");
const beneficiaryModal = document.getElementById("beneficiarymodal");
const cancelBenenficiary = document.getElementById("cancel-benenficiary");

const editDataAuto = document.getElementById('edit-Data-Auto')
const cancelEdit = document.getElementById('cancel-edit')
const editDataAutoModal = document.getElementById('edit-DataAuto-Modal')


const removeAuto  = document.getElementById('remove-auto')
const cancelAutoModal = document.getElementById('cancel-auto-modal')

const removeModal  = document.getElementById('remove-modal')

const closePinBtn = document.getElementById('closepinBtn');
const modalTransactionPin = document.getElementById('modalTransactionPin');
const inputFields = document.querySelectorAll('.input-field');

const amountInput = document.getElementById("amountInput");




let entryCount = 0;


checkBenenficiary.addEventListener('click', function() {
    beneficiaryModal.style.display = 'flex';
})

cancelBenenficiary.addEventListener('click', function() {
    beneficiaryModal.style.display = 'none';
})


addButton.addEventListener("click", function() {
    if (entryCount < 4) {
        const newForm = document.createElement("form");
        newForm.innerHTML = entryForm.innerHTML;
        newForm.classList.add("mb-8");
        entryForm.insertAdjacentElement("afterend", newForm);
        entryCount++;
    }

    if (entryCount >= 4) {
        addButton.disabled = true;
        addButton.classList.add("text-gray-300");
    }
});


editDataAuto.addEventListener('click', function(){
    // alert('Hello')
    editDataAutoModal.style.display = 'flex';
})

cancelEdit.addEventListener('click', function(){
    // alert('Hello')
    editDataAutoModal.style.display = 'none';


})


removeAuto.addEventListener('click', () => {
    removeModal.style.display = 'flex';

})

cancelAutoModal.addEventListener('click', () => {
    removeModal.style.display = 'none';

})





closePinBtn.addEventListener('click', function(){
    modalTransactionPin.style.display = 'none';
})

function openTransactionPinModal() {
    document.getElementById('modalTransactionPin').classList.remove('hidden');
}


function formatAmount() {
    let value = amountInput.value.replace(/\D/g, ""); // Remove any non-numeric characters
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Add comma after every three digits

    // Add the Naira sign (₦) in front of the formatted value
    value = "₦" + value;

    amountInput.value = value;
  }


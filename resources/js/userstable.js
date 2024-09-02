// Get modal elements
const fullInfoBtnElements = document.getElementsByClassName('table-users-full-info-btn');
const actionBtnElements = document.getElementsByClassName('table-users-action-btn');
const fullInfoBtns = Array.from(fullInfoBtnElements);
const actionBtns = Array.from(actionBtnElements);
const modal = document.getElementById('modal');
const modalHead = document.getElementById('modal-head');
const modalBody = document.getElementById('modal-body');
const modalFooter = document.getElementById('modal-footer');
const modalBtn = document.getElementById('modal-close-btn');
const modalBtnFooter = document.getElementById('modal-close-btn-footer');

// Close modal on button click
modalBtn.addEventListener('click', function (ev) {
    ev.preventDefault();
    hideModal();
});

modalBtnFooter.addEventListener('click', function (ev) {
    ev.preventDefault();
    hideModal();
});

function showModal() {
    modal.classList.remove('d-none');
    modal.classList.add('show');
    modal.style.display = 'block';
    document.body.classList.add('modal-open');
}

function hideModal() {
    modal.classList.add('d-none');
    modal.classList.remove('show');
    modal.style.display = 'none';
    document.body.classList.remove('modal-open');
}

// Handle "View Details" button click
fullInfoBtns.forEach(function (element) {
    element.addEventListener('click', function(ev) {
        ev.preventDefault();

        showModal();
        modalFooter.innerHTML = '';

        const userData = JSON.parse(this.dataset.data);
        modalHead.querySelector('.modal-title').innerText = 'PROFILE';
        modalBody.innerHTML = Object.entries(userData).map(([key, value]) => `
            <div class="row mb-2">
                <div class="col-6 font-weight-bold">${key}:</div>
                <div class="col-6">${value}</div>
            </div>
        `).join('');

        modalFooter.appendChild(modalBtnFooter);

        const editBtn = document.createElement('button');
        editBtn.innerText = "Edit";
        editBtn.classList.add('btn', 'btn-warning', 'ms-2');
        modalFooter.appendChild(editBtn);

        editBtn.addEventListener('click', function (ev) {
            ev.preventDefault();
            console.log("Edit button clicked");
        }, false);
    }, false);
});

// Handle action button click
actionBtns.forEach(function (element) {
    element.addEventListener('click', function(ev) {
        ev.preventDefault();
        const userData = JSON.parse(this.dataset.data);
        console.log(userData);
    }, false);
});

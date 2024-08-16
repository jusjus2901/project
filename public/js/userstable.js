const fullInfoBtnElements = document.getElementsByClassName('table-users-full-info-btn');
const actionBtnElements = document.getElementsByClassName('table-users-action-btn');

const fullInfoBtns = Array.from(fullInfoBtnElements);
const actionBtns = Array.from(actionBtnElements);
const modal = document.getElementById('modal');
const modalHead = document.getElementById('modal-head');
const modalBody = document.getElementById('modal-body');
const modalFooter = document.getElementById('modal-footer');
const modalBtn = document.getElementById('modal-close-btn');
modalBtn.addEventListener('click', function (ev) {
    ev.preventDefault();
    if (!modal.classList.contains('d-none')) {
        modal.classList.add('d-none');
    }
})
fullInfoBtns.forEach(function (element) {
    element.addEventListener('click', function(ev) {
        ev.preventDefault();
        if (modal.classList.contains('d-none')) {
            modal.classList.remove('d-none');
        }
        const footerChildren = Array.from(modalFooter.children);
        footerChildren.forEach((el) => el.remove());
        const userData = JSON.parse(this.dataset.data);
        modalHead.innerHTML = `
            <span class="bg-danger">PROFILE</span>
        `;
        modalBody.innerHTML = Object.entries(userData).map(([key, value]) => `
            <div class="row">
                <div class="col-6"></div class="col-6">
                ${key}:
                </div>
                <div class="col-6">
                ${value}
                </div>
            </div>
        `).join('');
        modalFooter.appendChild(modalBtn);
        const editBtn = document.createElement('button');
        editBtn.innerText = "Edit";
        editBtn.addEventListener('click', function (ev) {
            ev.preventDefault();
            console.log("you are clicked");
        }, false);
        editBtn.classList.add('btn', 'btn-warning');
        modalFooter.appendChild(editBtn);
    }, false);
});

actionBtns.forEach(function (element) {
    element.addEventListener('click', function(ev) {
        ev.preventDefault();
        const userData = JSON.parse(this.dataset.data);
        console.log(userData);
    }, false);
});

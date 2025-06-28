console.log("Admin dashboard loaded");

function openEditModal(id, name, email) {
    const modal = document.getElementById('userModal');
    document.getElementById('nameInput').value = name;
    document.getElementById('emailInput').value = email;
    document.getElementById('userForm').action = '/admin/user/update/' + id;
    document.getElementById('formMethod').value = 'PUT';
    modal.style.display = 'block';
}

function openCreateModal() {
    const modal = document.getElementById('userModal');
    document.getElementById('nameInput').value = '';
    document.getElementById('emailInput').value = '';
    document.getElementById('userForm').action = '/admin/user/store';
    document.getElementById('formMethod').value = 'POST';
    modal.style.display = 'block';
}

function closeModal() {
    document.getElementById('userModal').style.display = 'none';
}

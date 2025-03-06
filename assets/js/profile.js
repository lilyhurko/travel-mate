document.addEventListener('DOMContentLoaded', () => {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const editProfileModal = document.getElementById('editProfileModal');
    const closeEditProfileModal = document.getElementById('closeEditProfileModal');

    const deleteProfileBtn = document.getElementById('deleteProfileBtn');
    const deleteProfileModal = document.getElementById('deleteProfileModal');
    const closeDeleteProfileModal = document.getElementById('closeDeleteProfileModal');

    editProfileBtn.addEventListener('click', () => {
        editProfileModal.style.display = 'block';
    });

    closeEditProfileModal.addEventListener('click', () => {
        editProfileModal.style.display = 'none';
    });

    deleteProfileBtn.addEventListener('click', () => {
        deleteProfileModal.style.display = 'block';
    });

    closeDeleteProfileModal.addEventListener('click', () => {
        deleteProfileModal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === editProfileModal) {
            editProfileModal.style.display = 'none';
        }
        if (event.target === deleteProfileModal) {
            deleteProfileModal.style.display = 'none';
        }
    });
});

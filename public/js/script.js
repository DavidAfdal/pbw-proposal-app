
const passwordInput = document.getElementById('password');
const togglePasswordButton = document.getElementById('togglePassword');


function showForm( element,formType) {
    // Hide all forms
    var elements = document.querySelectorAll('.switch');
    elements.forEach(function (el) {
        el.classList.remove('active');
    });

    // Add the 'active' class to the clicked element
    element.classList.add('active');
    document.getElementById('formDosen').style.display = 'none';
    document.getElementById('formMahasiswa').style.display = 'none';
    document.getElementById('formMitra').style.display = 'none';

    // Show the selected form
    document.getElementById('form' + formType.charAt(0).toUpperCase() + formType.slice(1)).style.display = 'flex';
}


togglePasswordButton.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Toggle between different images
    const currentImage = togglePasswordButton.querySelector('img');
    currentImage.src = (type === 'password') ? 'path/to/eye-icon-1.png' : 'path/to/eye-icon-2.png';
    currentImage.alt = (type === 'password') ? 'Show Password' : 'Hide Password';
});

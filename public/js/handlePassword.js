const passwordInput = document.getElementById('password');
const togglePasswordButton = document.getElementById('togglePassword');


togglePasswordButton.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Toggle between different classes
    const currentIcon = togglePasswordButton;
    currentIcon.classList.toggle('ri-eye-line');
    currentIcon.classList.toggle('ri-eye-off-line');
});



function handleShowPanduan() {
    const panduan = document.getElementById('panduan');
    panduan.classList.toggle("panduan-active");
 }

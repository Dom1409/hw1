const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
  
    this.classList.toggle('fa-eye-slash');
});


function reg(){

    location.href="registrazione.php";
}


const btn_home=document.querySelector("#btn_reg");
btn_home.addEventListener('click',reg);

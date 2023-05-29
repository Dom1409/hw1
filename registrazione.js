function check_username(event){

   let usernameinput=document.querySelector('#username');
   let errormessage=document.querySelector('#contenuto_errori');

   let username=usernameinput.value;
    let da_non_usare=/^[a-zA-Z0-9_]{1,15}$/;
    if(!da_non_usare.test(username)){
        event.preventDefault();
        errormessage.innerHTML="Username non valido";
        errormessage.classList.add('error');
    }


}


const form=document.querySelector('#nome_form').addEventListener('submit', check_username);




function reg(){

    location.href="login.php";
}


const btn_home=document.querySelector("#btn_indietro");
btn_home.addEventListener('click',reg);

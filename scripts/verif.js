let password = document.getElementById("motDePasse");
let indication = document.getElementById("indicationPassword");
let progressbar = document.getElementById("progress");
let lessThan8 = "";
let faible = "Mot de passe faible";
let moyen = "Mot de passe moyen";
let fort = "Mot de passe fort";

var progress = "";

console.log(password.value);


password.addEventListener('keyup', (e) => {
    console.log(password.value)
    verifPassword(password.value)
})

function verifPassword(password){

    if(password.length >= 8){
        indication.textContent = faible
        indication.style.color = "red"
        progress = "33";
    }

    if(password.length >= 8 && password.match(/[a-z]/) && password.match(/[A-Z]/) && password.match(/\d/) || password.match(/[^a-zA-Z\d]/)){
        indication.textContent = moyen
        indication.style.color = "orange"
        progress = "66"
    }

    if(password.length >= 8 && password.match(/[a-z]/) && password.match(/[A-Z]/) && password.match(/\d/) && password.match(/[^a-zA-Z\d]/)){
        indication.textContent = fort
        indication.style.color = "green"
        progress = "100"
    }  

    if(password.length < 8){
        indication.textContent = lessThan8
        progress = "0"
    }

    document.getElementById("progress").value = progress;

}


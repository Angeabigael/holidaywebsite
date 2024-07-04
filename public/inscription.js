document.getElementById('password').addEventListener("click",function(e){

    alert('Le mot de passe doit contenir au moins une lettre majuscule,une lettre miniscule,au moins un chiffre,au moins un caractère spécial et minimum 5 caractères!!')

})

document.getElementById("tpassword").addEventListener("input",function(){
    if(document.getElementById("tpassword").value !== document.getElementById("password").value ){
        document.getElementById("erreur").innerHTML="Les deux mots de passe ne sont pas conformes"
    }else{
        document.getElementById("erreur").innerHTML=""
    }
})

/**
 * Created by 1252991 on 14-12-16.
 */
$.validator.setDefaults({
    submitHandler: function() {
        alert("submitted!");
    }
});

$().ready(function() {

        // validate signup form on keyup and submit
        $("#inscriptionClient").validate({
            rules: {
                Prenom: "required",
                Nom: "required",
                Username: {
                    required: true,
                    minlength: 2
                },
                Password: {
                    required: true,
                    minlength: 5
                },
                Tel: {
                    required:true,
                    minlengh:13,
                    maxlength:13
                },
                Cell: {
                    required:true,
                    minlengh:13,
                    maxlength:13
                },
                Courriel: {
                    required: true,
                    email: true
                },
                DateInsc: {
                  required: true,
                  date : true
                },
                Ville:{
                    required:true,

                },
            },
            messages: {
                Prenom: "Veuillez entrez votre prénom",
                Nom: "Veuillez entrez votre nom",
                Username: {
                    required: "Veuillez Entrez un nom d'utilisateur",
                    minlength: "Votrenom d'utilisateur doit être d'au moins 2 charatères"
                },
                Password: {
                    required: "Veuillez Entrez un mot de passe",
                    minlength: "Votre mot de passe doit être d'au moins 2 charatères"
                },
                Courriel: "Veuillez Entrez une adresse courriel valide",
                DateInsc : "Veuillez entrer une date",
                Ville: "Veuillez entrer votre ville",
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#Prenom").val();
            var lastname = $("#Nom").val();
            if (firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

    });

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
            },
            messages: {
                Prenom: "Please enter your firstname",
                Nom: "Please enter your lastname",
                Username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                Courriel: "Please enter a valid email address",
                DateInsc : "Veuillez entrer une date",
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

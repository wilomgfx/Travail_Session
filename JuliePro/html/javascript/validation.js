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
                nom: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                Prenom: "Please enter your firstname",
                nom: "Please enter your lastname",
                Username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
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

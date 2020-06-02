$(function(){

    var emailPattern = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    var passwordPattern = /^[\w@#&-]{8,20}$/;

    /**
     * Login Form
    */

    var loginForm = $("form#login-form");
    var loginButton = $("button#login-button");

    let loginEmail = $("input#login-email");
    let loginPassword = $("input#login-password");

    // click button
    loginButton.click(function(e){

        e.preventDefault();
        
        /**
         * login email validation
        */

        // email check
        if(loginEmail.val() === ""){
            loginEmail.focus();
            $('p.email-help').html("Email Address is required.");
            return false;
        } else {
            $('p.email-help').html('');
            if(!emailPattern.test(loginEmail.val())){
                loginEmail.focus();
                $('p.email-help').html('Enter a valid email address e.g name@mydomain.com');
                return false;
            } else {
                $('p.email-help').html(''); 
            }
        }
        
        //////////////////////////////////////////////////


        /**
         * login password validation
        */

        // password check
        if(loginPassword.val() === ""){
            loginPassword.focus();
            $('p.pwd-help').html('Password is required.');
            return false;
        } else {
            $('p.pwd-help').html(''); 
        }

        //////////////////////////////////////////////////


        /**
         * Login form submissin
        */

        var email = loginEmail.val();
        var pwd = loginPassword.val();

        $.ajax({
            method: 'post',
            url: '../includes/signin.php',
            data: {login: 1, email :email, pwd: pwd},
            success: function (response) {

                var result = $.trim(response);

                // empty fields
                if(result === 'empty fields'){
                    $('.warning-msg-p').html('Empty Fields. ');
                    $(".warning-msg").show();
                    loginEmail.blur();
                    loginPassword.blur();
                }

                // customer does not exist
                if(result === 'customer not exist'){
                    $('.danger-msg-p').html('E-Mail Address does not exist.');
                    $(".danger-msg").show();
                    loginEmail.focus();
                    loginPassword.blur();
                }

                // customer does not exist
                if(result === 'passwords do not match'){
                    $('.danger-msg-p').html('You have entered an incorrect Password.');
                    $(".danger-msg").show();
                    loginEmail.blur();
                    loginPassword.focus();
                }

            }
        });

        //////////////////////////////////////////////////

    });

    // on keyup loginemail
    loginEmail.on('keyup', function(e){

        // check if 'keyup' is return key
        if(e.keyCode === 13){
            loginButton.click();
        } else {
            // email check
            if(loginEmail.val() === ""){
                loginEmail.focus();
                $('p.email-help').html("Email Address is required.");
                return false;
            } else {
                $('p.email-help').html('');
                if(!emailPattern.test(loginEmail.val())){
                    loginEmail.focus();
                    $('p.email-help').html('Enter a valid email address e.g name@mydomain.com');
                    return false;
                } else {
                    $('p.email-help').html(''); 
                }
            }
        }

    });

    // on keyup loginPassword
    loginPassword.on('keyup', function (e) {
        // check if 'keyup' is return key
        if(e.keyCode === 13){
            loginButton.click();
        } else {
            // password check
            if(loginPassword.val() === ""){
                loginPassword.focus();
                $('p.pwd-help').html('Password is required.');
                return false;
            } else {
                $('p.pwd-help').html(''); 
            }
        }
    });

    ////////////////////////////////////////////////////// --- //////////////////////////////

});
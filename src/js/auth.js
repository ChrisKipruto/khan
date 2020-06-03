$(function(){

    var emailPattern = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    var passwordPattern = /^[\w@#&-]{8,20}$/;
    var namePattern = /^[a-zA-Z]+$/;

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
                    $(".danger-msg").hide();
                    $(".success-msg").hide();
                    loginEmail.blur();
                    loginPassword.blur();
                }

                // customer does not exist
                if(result === 'customer not exist'){
                    $('.danger-msg-p').html('E-Mail Address does not exist.');
                    $(".danger-msg").show();
                    $(".warning-msg").hide();
                    $(".success-msg").hide();
                    loginEmail.focus();
                    loginPassword.blur();
                }

                // password does not match
                if(result === 'passwords do not match'){
                    $('.danger-msg-p').html('You have entered an incorrect Password.');
                    $(".danger-msg").show();
                    $(".warning-msg").hide();
                    $(".success-msg").hide();
                    loginEmail.blur();
                    loginPassword.focus();
                }

                // log in
                if(result === 'Log In'){
                    window.location.href = "../dashboard/index.php?login=success";
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

    /**
     * Registration form
    */

    var registerForm = $("form#register-form");
    var registerButton = $("#register-button")
    var regName = $("#reg-name");
    var regEmail = $("#reg-email");
    var regPwd = $("#reg-password");
    var confirmPassword = $("#confirm-password");
    var terms = $("#terms-conditions");

    // click button
    registerButton.on('click', function(e){

        e.preventDefault();

        // name check
        if(regName.val() == ""){
            regName.focus();
            $("p.name-help").html('Enter your full name.');
            return false;
        } else {
            $("p.name-help").html('');
        }

        // email check
        if(regEmail.val() === ""){
            regEmail.focus();
            $("p.email-help").html("E-Mail address is required");
            return false;
        } else {
            $("p.email-help").html('');
            if(!emailPattern.test(regEmail.val())){
                regEmail.focus();
                $("p.email-help").html('Enter a valid E-Mail address.');
                return false;
            } else {
                $("p.email-help").html('');
            }
        }

        // password check
        if(!passwordPattern.test(regPwd.val())){
            regPwd.focus();
            $("p.pwd-help").html('Password must be alphanumeric (special chars allowed) and be 8-20 characters.');
            return false;
        } else {
            $("p.pwd-help").html('');
        }
        
        // confirm password check
        if(regPwd.val() !== confirmPassword.val()){
            confirmPassword.focus();
            $("p.confirm-help").html('Password and Confirm Password should match.');
            return false;
        } else {
            $("p.confirm-help").html('');
        }

        /**
         * Register details
        */

        var name = regName.val();
        var email = regEmail.val();
        var pwd = regPwd.val();

        if(terms.is(":checked")){

            // AJAX
            $.ajax({
                method: 'POST',
                url: '../includes/signup.php',
                data: {register: 1, name: name, email: email, pwd: pwd},
                success: function(data){

                    var result = $.trim(data);

                    // empty details
                    if(result === "Detalis Empty"){
                        $('.warning-msg-p').html(result);
                        $(".warning-msg").show();
                    }

                    // 'Email Exist
                    if(result === "Email Exist"){
                        regEmail.focus();
                        $('.danger-msg-p').html('That email address already exists.');
                        $(".danger-msg").show();
                        $(".success-msg").hide();
                        $(".warning-msg").hide();
                    }

                    // Successful Registration
                    if(result === "Successful Registration"){
                        $('.success-msg-p').html('You have successfully signed up. You can now Log in.');
                        $(".success-msg").show();
                        $(".danger-msg").hide();
                        $(".warning-msg").hide();
                    }

                    // Failed Registration
                    if(result === "'Failed Registration"){
                        $('.warning-msg-p').html('Registration has failed.');
                        $(".warning-msg").show();
                        $(".danger-msg").hide();
                        $(".success-msg").hide();
                    }

                }
            });

        } else {

            $('.warning-msg-p').html('You must agree to the terms and conditions.');
            $(".warning-msg").show();

        }

    });

    // on keyup name
    regName.on('keyup', function(e){

        // clicked ↵
        if(e.keyCode === 13){
            registerButton.click();
        } else {

            if(regName.val() == ""){
                $("p.name-help").html('Enter your full name.');
            } else {
                $("p.name-help").html('');
            }

        }

    });
    // on keyup email
    regEmail.on('keyup', function(e){

        // clicked ↵
        if(e.keyCode === 13){
            registerButton.click();
        } else {
         
            if(regEmail.val() === ""){
                $("p.email-help").html("E-Mail address is required");
            } else {
                $("p.email-help").html('');
                if(!emailPattern.test(regEmail.val())){
                    $("p.email-help").html('Enter a valid E-Mail address.');
                } else {
                    $("p.email-help").html('');
                }
            }
            
        }

    });
    // on keyup password
    regPwd.on('keyup', function(e){

        // clicked ↵
        if(e.keyCode === 13){
            registerButton.click();
        } else {

            if(!passwordPattern.test(regPwd.val())){
                $("p.pwd-help").html('Password must be alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters and ');
            } else {
                $("p.pwd-help").html('');
            }

        }

    });
    // on keyup confirm password
    confirmPassword.on('keyup', function(e){

        // clicked ↵
        if(e.keyCode === 13){
            registerButton.click();
        } else {

            if(regPwd.val() !== confirmPassword.val()){
                $("p.confirm-help").html('Password and Confirm Password should match.');
            } else {
                $("p.confirm-help").html('');
            }

        }

    });

    ////////////////////////////////////////////////////// --- //////////////////////////////

});
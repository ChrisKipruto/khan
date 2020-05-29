$(function(){

    var dangerMsg = $("div.danger-msg");
    var warningMsg = $("div.warning-msg");
    var successMsg = $("div.success-msg");

    var dangerMsgP = $("div.danger-msg p");
    var warningMsgP = $("div.warning-msg p");
    var successMsgP = $("div.success-msg p");

    /**
     * Login Form
    */

    var loginForm = $("form#login-form");

    let loginEmail = $("input#login-email");
    let loginPassword = $("input#login-password");

    loginForm.submit(function(e){

        e.preventDefault();

        // check email
        if(loginEmail.val() === '') {
            dangerMsg.show();
            dangerMsgP.html('Email Address is required!');
            loginEmail.focus();
            return false;
        } else {
            dangerMsg.hide();
            dangerMsgP.html('');
        }

        // check password
        if(loginPassword.val() === '') {
            dangerMsg.show();
            dangerMsgP.html('Password is required!');
            loginPassword.focus();
            return false;
        } else {
            dangerMsg.hide();
            dangerMsgP.html('');
        }

    });

    //////////////////////////////////////////////////////

});
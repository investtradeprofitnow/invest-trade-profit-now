$("#register-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        if(element.is( ":checkbox" )){
            error.insertAfter(".form-check-label");
        }
        else {
            error.insertAfter(element);
        }
    },
    rules:{
        name: {
            alpha: true
        },
        email: {
            email: true
        },
        password: {
            checkPassword: true
        }
    },
    messages:{
        email: {
            email: "Please enter a Valid Email Id"
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$("#login-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        email: {
            email: true
        }
    },
    messages:{
        email: {
            email: "Please enter a Valid Email Id"
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$("#add-strategy-short-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        name:{
            alpha: true
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$("#reset-password-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        email: {
            email: true
        }
    },
    messages:{
        email: {
            email: "Please enter a Valid Email Id"
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$("#change-password-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        email: {
            email: true
        },
        password: {
            checkPassword: true
        },
        cnfm_password: {
            checkPassword: true,
            equalTo: "#password"
        }
    },
    messages:{
        email: {
            email: "Please enter a Valid Email Id"
        },
        cnfm_password: {
            equalTo: "The passwords do not match"
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$("#contact-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        name: {
            alpha: true
        },
        email: {
            email: true
        }
    },
    messages:{
        email: {
            email: "Please enter a Valid Email Id"
        },
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$.validator.addMethod("alpha", function (value, elem) {
        var re = /^[a-zA-Z ]+$/;
        return re.test(value);
    },
    "Only Capital, Small Letters and Spaces Allowed"
);

$.validator.addMethod("numeric", function (value, elem) {
        var re = /^[0-9]*$/;
        return re.test(value);
    },
    "Only Numbers Allowed"
);

$.validator.addMethod("checkPassword", function (value, elem) {
        hasFocus = document.activeElement === elem;
        if (hasFocus === false) {
            var re = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/;
            return re.test(value);
        }
        return true;
    },
    "Password should be 8-20 Characters, atleast one Capital and one Small Letter, one numberic and special characters"
);
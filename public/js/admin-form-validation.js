$("#add-coupon-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        code: {
            alphaNum: true
        },
        discount: {
            numeric: true
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$("#edit-coupon-form").validate({
    errorPlacement: function errorPlacement(error, element) {
        error.insertAfter(element);
    },
    rules:{
        code: {
            alphaNum: true
        },
        discount: {
            numeric: true
        }
    },
    submitHandler : function(form) {
        form.submit();
    }   
});

$.validator.addMethod("alphaNum", function (value, elem) {
        var re = /^([a-zA-Z0-9]+)$/;
        return re.test(value);
    },
    "Only Capital, Small Letters and Numbers Allowed"
);

$.validator.addMethod("numeric", function (value, elem) {
        var re = /^[0-9]*$/;
        return re.test(value);
    },
    "Only Numbers Allowed"
);
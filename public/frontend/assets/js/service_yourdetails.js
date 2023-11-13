function scrollToTopDynamic(val) {
    window.scrollTo(0, val);
}
function calc_vat_total(total) {
    var vat = (total * 20) / 100;
    vat = vat.toFixed(2);
    var grand_total = (parseFloat(total)) + (parseFloat(vat));
    $("#totals").html(`<strong>£${parseFloat(total).toFixed(2)}</strong>`)
    $("#vat_totals").html(`<strong>£${parseFloat(vat).toFixed(2)}</strong>`);
    $("#grand_totals").html(`<strong>£${parseFloat(grand_total).toFixed(2)}</strong>`);
    $("#totalGrandAmount").val(parseFloat(grand_total).toFixed(2));
    $("#totalVatAmount").val(parseFloat(vat).toFixed(2));

}
function phone_no_validation(input) {

    var phoneNumber = $("#phone_no").val();
    phoneNumber = phoneNumber.replace(/^0\D*|\D/g, '');
    // console.log(phoneNumber);
    $("#phone_no").val(phoneNumber);
}
function validate_yourservice_name() {


    let test_name = true;
    let name = '';
    let namePattern = /^(?!.*test).*$/i;
    let isValidName = ""
    $(".name_test").each(function() {
        let $id = $(this).attr('id');
        if ($(this).val() != '') {
            if ($id == "last_name" || $id == "first_name" || $id == "invoice_name_or_company" ||
                $id == "name_or_company" || $id == "company_name" || $id == "company_number") {
                name = $(this).val()
                isValidName = namePattern.test(name);

                if (isValidName) {
                    $(this).next("span").remove();
                    $(this).css({
                        'border-color': '#ced4da'
                    })
                } else {
                    test_name = false;
                    $(this).css({
                        'border-color': 'red'
                    })
                    $(this).next("span").remove();
                    $(this).after(`<span class="error">Please enter a valid input  </span>`);
                }
            }
        }
    })
    if (test_name == false) {
        scrollToTopDynamic(400)
    }
    return test_name
}
function validate_test_names()
{
    let test_name = true;
    let input_val = '';
    let namePattern = /^(?!.*test).*$/i;
    let isValidName = ""
    let id ='';
    $(".name_test_form").each(function() {
        input_val = $(this).val();
         id = $(this).attr('id');
        if (input_val != '') {

                isValidName = namePattern.test(input_val);

                if (isValidName) {
                    $(this).next("span").remove();
                    $(this).css({
                        'border-color': '#ced4da'
                    })
                } else {
                    test_name = false;
                    $(this).css({
                        'border-color': 'red'
                    })
                    $(this).next("span").remove();
                    $(this).after(`<span class="error">Please enter a valid input  </span>`);
                }

        }
    })
    return test_name;
}

function validate_yourservice_email() {
    let test_email = true;
    let field_name = ''
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


    $(".required_yourdetails").each(function() {
        if ($(this).val() != '') {

            field_name = $(this).attr('name')
            // console.log(field_name)
            if (field_name == "confm_email_addr" || field_name == "email_addr") {
                email = $(this).val();

                if (emailPattern.test(email)) {
                    // Valid email address
                    $(this).next("span").remove();
                    $(this).css({
                        'border-color': '#ced4da'
                    })
                } else {
                    test_email = false;
                    // Invalid email address
                    $(this).css({
                        'border-color': 'red'
                    })
                    $(this).after(`<span class="error">Please put a valid email</span>`);
                }
            }
        }
    });

    if (test_email == true) {
        let email1 = $("#email_addr").val();
        let confirm_email = $("#confm_email_addr").val();
        if (email1 != confirm_email) {
            // console.log
            test_email = false
            $("#confm_email_addr").css({
                'border-color': 'red'
            })
            $("#confm_email_addr").next("span").remove();
            $("#confm_email_addr").after(
                `<span class="error">Email and confirm email does not match</span>`);
            scrollToTopDynamic(300)

        }
    } else {
        scrollToTopDynamic(300)
    }
    return test_email;

}

function validateEmailField() {
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let test_email = true;

    $(".required_app").each(function() {
        let field_name = $(this).attr('name');
        if ($(this).val() !== '' && (field_name === 'stat_email')) {
            let email = $(this).val();

            if (!emailPattern.test(email)) {
                test_email = false;
                $(this).next("span").remove();
                $(this).css({
                    'border-color': 'red'
                });
                $(this).after(`<span class="error">Please enter a valid email</span>`);
            } else {
                $(this).next("span").remove();
                $(this).css({
                    'border-color': '#ced4da'
                });
            }
        }
    });

    if (!test_email) {
        scrollToTopDynamic(300);
    }

    return test_email;
}

function validate_yourservice() {
    let required_check_error = true;
    $(".required_yourdetails").each(function() {
        if ($(this).val() == '') {
            required_check_error = false;

            $(this).css({
                'border-color': 'red'
            })
            $(this).next("span").remove();
            $(this).after(`<span class="error">This field is required </span>`);
        } else {
            $(this).next("span").remove();
            $(this).css({
                'border-color': '#ced4da'
            })
        }
    })
    if (required_check_error == false) {
        scrollToTopDynamic(200)
    }
    if ($("#phone_no").val() != '') {
        let phone_no = $("#phone_no").val();
        if (phone_no.length != 10) {
            required_check_error = false;
            $("#phone_no").css({
                'border-color': 'red'
            })
            $("#phone_no").next("span").remove();
            $("#phone_no").after(`<span class="error">Please enter valid phone number </span>`);
            scrollToTopDynamic(200)

        } else {
            $("#phone_no").next("span").remove();
            $("#phone_no").css({
                'border-color': '#ced4da'
            })
        }
    }


    let name_validate_error = validate_yourservice_name();

    let email_validate_err = validate_yourservice_email();
    if (email_validate_err == true && name_validate_error == true && required_check_error == true) {
        required_check_error = true;
    } else {
        required_check_error = false;
    }
    return required_check_error;
}







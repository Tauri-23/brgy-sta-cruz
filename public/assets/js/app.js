/********************
// Strings Scripts
*********************/
function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}





//For Form Inputs Only Check all the Empty Fields and return all of their name or placeholder
function getEmptyFields(modal, title, body, titleString, inputsToCheck) {
    modal.removeClass('invisible');
    title.text(titleString);
    body.html('');

    let errorMessages = inputsToCheck
        .filter(function (input) {
            return isEmptyOrSpaces(input.val());
        })
        .map(function (input) {
            return input.attr('name') || input.attr('placeholder');
        });

    if (errorMessages.length > 0) {
        body.append(errorMessages.join('<br>'));
    }
}

function checkTheChanges(inputs, toCompare) {
    let count = 0;
    inputs.forEach(function (element, index) {
        if ($(element).val() != toCompare[index]) {
            count++;
        }
    });
    return count;
}





/********************
// Modals Scripts
*********************/
function showModal(modal) {
    modal.removeClass('d-none');
    $('body').css('overflow', 'hidden');
}

function closeModal(modal, reload) {
    let closeBtn = modal.find('#modal-close-btn');
    $(document).on('click', function (event) {
        if (event.target === modal[0] || event.target === closeBtn[0] || event.target === closeBtn[1]) {
            modal.addClass('d-none');
            $('body').css('overflow', 'auto');
            if (reload) {
                location.reload();
            }
        }
    });
}

function closeModalRedirect(modal, loc) {
    let closeBtn = modal.find('#modal-close-btn');
    $(document).on('click', function (event) {
        if (event.target === modal[0] || event.target === closeBtn[0]) {
            modal.addClass('d-none');
            $('body').css('overflow', 'auto');
            location.href = loc;
        }
    });
}

function closeModalNoEvent(modal) {
    modal.addClass('d-none');
    $('body').css('overflow', 'auto');
}

function showErrorModal(modal, title, body, titleString, bodyString) {
    modal.removeClass('invisible');
    title.text(titleString);
    body.text(bodyString);
}





//For Form Inputs Only Check all fields if empty
function validationNotEmpty(inputsToValidate) {
    return inputsToValidate.every(function (input) {
        return !isEmptyOrSpaces(input.val());
    });
}





//Basically format the Phone Number input +63
function formatPhoneNumIn(phoneNum) {
    phoneNum.on('input', function () {
        let rawPhoneNumber = $(this).val().replace(/\D/g, '');

        rawPhoneNumber = rawPhoneNumber.replace(/^0+/, '');

        if (rawPhoneNumber.length <= 10) {
            let formattedPhoneNumber = rawPhoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3');

            $(this).val(formattedPhoneNumber);
        }
    });
}


// Files
function checkFileType(fileName) {
    // Get the file extension
    var fileExtension = fileName.split('.').pop().toLowerCase();

    // Check if the file extension corresponds to an image or PDF
    if (fileExtension === 'jpeg' || fileExtension === 'jpg' || fileExtension === 'png' || fileExtension === 'gif') {
        return 'image'; // File is an image
    } else if (fileExtension === 'pdf') {
        return 'pdf'; // File is a PDF
    } else {
        return 'unknown'; // File type is unknown or unsupported
    }
}





//ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        "RequestVerificationToken": $('input:hidden[name="__RequestVerificationToken"]').val()
    }
});









// Functions for all
$('.nav1-pfp').click(function() {
    $('#nav-small-option').toggleClass('d-none')
});



// See Password
$('.see-pass').click(function() {
    let input = $(this).siblings('.password-input');
    let type = input.attr('type') === 'password' ? 'text' : 'password';
    if (type === 'password') {
        $(this).removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    } else {
        $(this).removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    }
    input.attr('type', type);
})

// Is Valid Email
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function calculateAge(birthDate) {
    const today = new Date();
    const birthDateObj = new Date(birthDate);
    let age = today.getFullYear() - birthDateObj.getFullYear();
    const monthDifference = today.getMonth() - birthDateObj.getMonth();
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDateObj.getDate())) {
        age--;
    }
    return age;
}
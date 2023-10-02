$(".preloader").fadeOut();

document.addEventListener("DOMContentLoaded", function () {
    const errorMessage = document.getElementById("error-message");
    const registrationForm = document.getElementById("registration-form");
    registrationForm.addEventListener("submit", function (event) {
        event.preventDefault();
        if (!isRegFormDataValid()) {
            return;
        }
        let formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/register",
            data: formData,
            success: responseJson => {
                let response = JSON.parse(responseJson);
                if (response.success) {
                    errorMessage.textContent = "";
                    alert("Registration is successful!");
                    window.location.href = "/list-users";
                    return;
                }
                errorMessage.textContent = "Error during registration. Try again.";
            },
            error: () => {
                alert("Error 500. An error occurred when sending a request to the server.");
            }
        });
    });
});

function isRegFormDataValid() {
    let name = document.forms.RegForm.name.value;
    let surname = document.forms.RegForm.surname.value;
    let email = document.forms.RegForm.email.value;
    let pass = document.forms.RegForm.password.value;
    let pass_confirm = document.forms.RegForm.password_confirm.value;
    let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
    let regName = /^[a-zA-Z]{2,32}$/;
    let patternPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/g;

    if (!regName.test(name)) {
        alert(`Please enter a valid user name. It must contain between 2 and 32 letters`);
        return false;
    }

    if (!regName.test(surname)) {
        alert(`Please enter a valid surname. It must contain between 2 and 32 letters`);
        return false;
    }

    if (!regEmail.test(email)) {
        alert(`Please enter a valid e-mail address`);
        return false;
    }

    if (!patternPass.test(pass)) {
        alert(`Please enter your password. It must contain at least one number and one uppercase and lowercase letter, and contain between 8 and 32 characters. Only English letters and numbers are allowed`);
        return false;
    }

    if (pass_confirm !== pass) {
        alert(`Passwords are not equal`);
        return false;
    }
    return true;
}
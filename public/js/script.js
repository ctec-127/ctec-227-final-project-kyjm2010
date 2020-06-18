function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var htmlPreview =
                '<img width="200" src="' + e.target.result + '" />' +
                '<p>' + input.files[0].name + '</p>';
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

            $('#alert').remove();

            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
    $('#alert').remove();
}

function closeAlert() {
    document.getElementById("alert").style.display = "none";
}

window.setTimeout(closeAlert, 3000);

// function to show/hide password
function showPassword() {
    const passwordField = document.querySelector('#password')
    const showPassword = document.querySelector('#showPassword')

    if (showPassword.innerText == 'Show Password') {
        showPassword.innerText = 'Hide Password'
        passwordField.type = 'text'
    } else if (showPassword.innerText === 'Hide Password') {
        passwordField.type = 'password'
        showPassword.innerText = 'Show Password'
    }
}

// is the user logged in or not?
fetch('helper/is_logged_in.php')
    .then(res => res.json())
    .then(function (res) {
        if (res.status == "yes") {
            if (res.role == "admin") {
                const admin = document.querySelector('#admin')
                admin.style.display = 'inline-block'
            }
            const login = document.querySelector('#login')
            login.style.display = 'none'
            const profile = document.querySelector('#profile_manager')
            profile.style.display = 'inline-block'
            const logout = document.querySelector('#logout')
            logout.style.display = 'inline-block'
            const register = document.querySelector('#register')
            register.style.display = 'none'
            const addReview = document.querySelector('#addReview')
            addReview.style.display = 'inline-block'
            logout.addEventListener('click', function (e) {
                e.preventDefault()
                fetch('helper/logout_ajax.php')
                    .then(res => res.json())
                    .then(function (res) {
                        if (res.status == 'success') {
                            login.style.display = 'inline-block'
                            logout.style.display = 'none'
                            register.style.display = 'inline-block'
                            admin.style.display = 'none'
                            profile.style.display = 'none'
                        }
                    })
            })

        } else {
            addReview.style.display = 'none'
        }
    })







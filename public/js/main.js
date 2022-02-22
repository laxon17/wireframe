let urlPath = window.location.pathname

if(urlPath === '/register') validateRegistration()
if(urlPath === '/login') validateLogin()


// VALIDATE REGISTER FORM

    function validateRegistration() {
        const firstNameRegex =  /^[A-Z]{1}[a-z]{2,14}$/
        const lastNameRegex = /^[A-Z]{1}[a-z]{5,29}$/
        const passwordRegex = /^[A-Z]{1}[a-z0-9!@#$%^.&*]{7,19}$/   
        const userMailRegex = /^[a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4})$/
        const userNameRegex = /^([a-z]{1})[a-z0-9]{4,29}$/

        const registrationForm = document.getElementById('registrationForm')
        const firstName = document.getElementById('firstName')
        const lastName = document.getElementById('lastName')
        const userPassword = document.getElementById('password')
        const passwordRepeat = document.getElementById('rePassword')
        const userMail = document.getElementById('userMail')
        const userName = document.getElementById('userName')

        registrationForm.addEventListener('submit', (event) => {
            if(!registerButton()) {
                event.preventDefault()
                checkField(firstName, 'First name', firstNameRegex) 
                checkField(lastName, 'Last name', lastNameRegex) 
                checkField(userPassword, 'Password', passwordRegex) 
                checkField(passwordRepeat, 'Repeated password', passwordRegex) 
                checkField(userMail, 'Mail', userMailRegex)
                checkField(userName, 'Username', userNameRegex)
                checkPassword(userPassword.value, passwordRepeat.value)   
            }
        })

        function registerButton() {
            if(
                checkField(firstName, 'First name', firstNameRegex) && 
                checkField(lastName, 'Last name', lastNameRegex) && 
                checkField(userPassword, 'Password', passwordRegex) && 
                checkField(passwordRepeat, 'Repeated password', passwordRegex) && 
                checkField(userMail, 'Mail', userMailRegex) &&
                checkField(userName, 'Username', userNameRegex) &&
                checkPassword(userPassword.value, passwordRepeat.value)
            )  return 1
            return 0
        }

        function checkPassword(password, repeat) {
            let infoText = passwordRepeat.nextElementSibling.nextElementSibling
            if(password !== repeat || repeat === '') {
                infoText.className = 'red-text'
                infoText.innerHTML = 'Repeated password does not match!'
                return 0
            }
            return 1
        }

        addListenerForField(firstName, 'First name', firstNameRegex, 'keyup')
        addListenerForField(firstName, 'First name', firstNameRegex, 'blur')
        addListenerForButton(firstName, registerButton, 'keyup')

        addListenerForField(lastName, 'Last name', lastNameRegex, 'keyup')
        addListenerForField(lastName, 'Last name', lastNameRegex, 'blur')
        addListenerForButton(lastName, registerButton, 'keyup')
        
        addListenerForField(userName, 'Username', userNameRegex, 'keyup')
        addListenerForField(userName, 'Username', userNameRegex, 'blur')
        addListenerForButton(userName, registerButton, 'keyup')

        addListenerForField(userMail, 'Mail', userMailRegex, 'keyup')
        addListenerForField(userMail, 'Mail', userMailRegex, 'blur')
        addListenerForButton(userMail, registerButton, 'keyup')

        addListenerForField(userPassword, 'Password', passwordRegex, 'keyup')
        addListenerForField(userPassword, 'Password', passwordRegex, 'blur')
        addListenerForButton(userPassword, registerButton, 'keyup')

        passwordRepeat.addEventListener('keyup', checkPassword)
        addListenerForField(passwordRepeat, 'Repeated password', passwordRegex, 'keyup')
        addListenerForField(passwordRepeat, 'Repeated password', passwordRegex, 'blur')
        addListenerForButton(passwordRepeat, registerButton, 'keyup')
    }

    function validateLogin() {
        const passwordRegex = /^[A-Z]{1}[a-z0-9!@#$%^.&*]{7,19}$/   
        const userIdRegex = /^(([a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4}))|(([a-z]{1})[a-z0-9]{4,29}))$/

        const loginForm = document.getElementById('loginForm')
        const userId = document.getElementById('userId')
        const userPassword = document.getElementById('userPassword')

        loginForm.addEventListener('submit', (event) => {
            if(!loginButton()) {
                event.preventDefault()
                checkField(userId, 'Your ID', userIdRegex)
                checkField(userPassword, 'Password', passwordRegex)
            }
        })

        addListenerForButton(userId, loginButton, 'keyup')
        addListenerForField(userId, 'Your ID', userIdRegex,'blur')
        addListenerForField(userId, 'Your ID', userIdRegex,'keyup')

        addListenerForField(userPassword, 'Password', passwordRegex, 'keyup')
        addListenerForField(userPassword, 'Password', passwordRegex, 'blur')
        addListenerForButton(userPassword, loginButton, 'keyup')


        function loginButton() {
            if(
                checkField(userId, 'Your ID', userIdRegex) &&
                checkField(userPassword, 'Password', passwordRegex)
            )  return 1
            return 0
        }
        
    }


    function fieldValid(field) {
        field.nextElementSibling.nextElementSibling.innerHTML = ''
    }

    function fieldInvalid(field, text) {
        field.nextElementSibling.nextElementSibling.innerText = `${text}`
        field.nextElementSibling.nextElementSibling.classList.add('red-text')
    }

    function checkField(field, fieldName, expression) {
        let fieldValue = field.value 
        return checkRegEx(expression, fieldValue, fieldName, field) 
    }

    function checkRegEx(expression, fieldValue, fieldName, field) {
        if(expression.test(String(fieldValue))) {
            fieldValid(field)
            return 1 // Is valid, return 1
        } else {
            fieldInvalid(field, `${fieldName} is not as expected!`)
            return 0 // It isn't as expected, return 0
        } 
    }

    function checkBtn(callback) {
        if(callback()) return 1
        return 0 
    }

    function addListenerForField(field, fieldName, expression, event) {
        field.addEventListener(event, () => {
            checkField(field, fieldName, expression)
        })
    }

    function addListenerForButton(field, callback, event) {
        field.addEventListener(event, () => {
            checkBtn(callback)
        })
    }


// END OF VALIDATE REGISTER FORM


// FUNCTIONS FOR ALL FORM VALIDATIONS
    
// END OF FUNCTIONS FOR ALL FORM VALIDATIONS

    function pageLoader() {
        setTimeout(() => {
            $('.preloader').fadeOut();
        }, 2000)

        setTimeout(() => {
            $('.preloader').remove();
        }, 4000)
    }

// MATERIALIZE & JQUERY DEPENDENCIES LOAD
    $(document).ready(() => {
        pageLoader()
        $('.sidenav').sidenav()
    })
// END OF MATERIALIZE & JQUERY DEPENDENCIES LOAD
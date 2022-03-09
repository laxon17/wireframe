    let urlPath = window.location.pathname

    if(urlPath === '/register') validateRegistration()
    if(urlPath === '/login') validateLogin()
    if(urlPath === '/reset') resetPasswordRequest()
    if(urlPath === '/posts') searchAjax()
    if(urlPath === '/dashboard/modify') categoryModify()
    if(urlPath === '/dashboard/surveys') addQuestion()


// VALIDATE REGISTER FORM

    function validateRegistration() {
        const firstNameRegex =  /^[A-Z]{1}[a-z]{2,14}$/
        const lastNameRegex = /^[A-Z]{1}[a-z]{4,29}$/
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

// END OF VALIDATE REGISTER FORM

// VALIDATE LOGIN FORM

    function validateLogin() {
        const userIdRegex = /^(([a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4}))|(([a-z]{1})[a-z0-9]{4,29}))$/
        const passwordRegex = /^[A-Z]{1}[a-z0-9!@#$%^.&*]{7,19}$/  

        const loginForm = document.getElementById('loginForm')
        const userId = document.getElementById('userId')
        const userPassword = document.getElementById('userPassword')

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

// END OF VALIDATE LOGIN FORM

// VALIDATE PASSWORD REQUEST 

    function resetPasswordRequest() {
        const userMailRegex = /^[a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4})$/

        const passwordResetForm = document.getElementById('resetForm')
        const mailField = document.getElementById('userMail')

        passwordResetForm.addEventListener('submit', (event) => {
            if(!resetBtn()) {
                checkField(mailField, 'E-mail', userMailRegex)
                event.preventDefault()
            }
        })

        function resetBtn() {
            if(checkField(mailField, 'E-mail', userMailRegex)) return 1
            return 0
        } 

        addListenerForButton(mailField, resetBtn, 'keyup')
        addListenerForField(mailField, 'E-mail', userMailRegex, 'blur')
        addListenerForField(mailField, 'E-mail', userMailRegex, 'keyup')
    }

// END OF VALIDATE PASSWORD REQUEST 

// FORM VALIDATION METHODS

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

// END OF FORM VALIDATION METHODS

// ADD Categories
    function categoryModify() {
        document.getElementById('addCategoryBtn').addEventListener('click', () => {            
            let inputField = document.getElementById('addCategoryField')
            if(inputField.classList.contains('hide')) {
                inputField.classList.remove('hide')
            } else inputField.classList.add('hide')
        })
    }
// END OF ADD Categories

// DEACTIVATE POLL
    document.querySelectorAll('.deactivate-survey').forEach(button => {
        button.addEventListener('click', (event) => {
            let surveyId = event.target.parentElement.parentElement.children[0].innerText
            let data = {survey_id: surveyId}
            let xhr = new XMLHttpRequest()
            xhr.open('POST', '/dashboard/surveys', true)
            xhr.setRequestHeader('Content-type', 'application/json')
            xhr.send(JSON.stringify(data)) 
            event.target.className = 'red-text material-icons'
            event.target.innerText = 'close'
        })
    })
// END OF DEACTIVATE POLL

// APPROVE POST
    document.querySelectorAll('.approve-post').forEach(button => {
        button.addEventListener('click', (event) => {
            let postId = event.target.parentElement.parentElement.children[0].innerText
            let data = {post_id: postId}
            let xhr = new XMLHttpRequest()
            xhr.open('POST', '/dashboard/posts', true)
            xhr.setRequestHeader('Content-type', 'application/json')
            xhr.send(JSON.stringify(data)) 
            event.target.className = 'green-text'
            event.target.innerText = 'Approved'
        })
    })
// END OF APPROVE POST

// CHANGE ROLE
    document.querySelectorAll('.role-change').forEach(list => {
        list.addEventListener('change', (event) => {
            let selectedRole = event.target.value
            let user = event.target.parentElement.parentElement.parentElement.children[0].innerText
            let data = {
                role_id: selectedRole,
                user_id: user
            }
            let xhr = new XMLHttpRequest()
            xhr.open('POST', '/dashboard/users', true)
            xhr.setRequestHeader('Content-type', 'application/json')
            xhr.send(JSON.stringify(data)) 
        })
    })
// END OF CHANGE ROLE

// ADD QUESTION
    function addQuestion() {
        let questionFields = document.getElementById('addQuestionField')

        document.getElementById('addQuestion').addEventListener('click', () => {
            if(questionFields.classList.contains('hide')) {
                questionFields.classList.remove('hide')
            } else questionFields.classList.add('hide')
        })
    }

// END OF ADD QUESTION



// REPLY
    document.querySelectorAll('.reply-button').forEach(btn => {
        btn.addEventListener('click', (event) => {
            let clicked = event.target
            let replyField = clicked.parentElement.parentElement.parentElement.nextElementSibling
            if(replyField.classList.contains('hide')) {
                replyField.classList.remove('scale-out')
                replyField.classList.remove('hide')
                replyField.classList.add('scale-in')
            } else {
                replyField.classList.remove('scale-in')
                replyField.classList.add('scale-out')
                replyField.classList.add('hide')
            }
        })
    })
// END OF REPLY

// AJAX FOR WRITING DATA FROM DATABASE
    
    function searchAjax() {
        document.getElementById('searchPosts').addEventListener('keyup', searchForPosts)
        const postsContainer = document.getElementById('postContainer')
        document.addEventListener('DOMContentLoaded', loadPosts)

        async function searchForPosts(event) {        
            let query = event.target.value
            let postLink = ''

            let response = (await fetch('/search?query=' + query)).json()
            response.then(posts => {
                for(let post of posts) {
                    postLink += `
                        <tr>
                            <td class="post-list">
                                <a href="/view-post?id=${post.PostId}">
                                    ${post.PostTitle}
                                </a>
                            </td>
                        </tr>
                    `
                }
                postsContainer.innerHTML = postLink ? postLink : 'No posts found'
            })  
        }

        async function loadPosts() {
            let response = (await fetch('/posts')).json()
            let postLink = ''
            response.then(posts => {
                for(let post of posts) {
                    postLink += `
                        <tr>
                            <td class="post-list">
                                <a href="/view-post?id=${post.PostId}">
                                    ${post.PostTitle}
                                </a>
                            </td>
                        </tr>
                    ` 
                }
                postsContainer.innerHTML = postLink ? postLink : 'No posts found!' 
            })
        }
    }

    
// END OF AJAX FOR WRITING DATA FROM DATABASE

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
        $('select').formSelect()
        $('.materialboxed').materialbox()
        $('.sidenav').sidenav()
        $('.parallax').parallax()
        $('.modal').modal()
    })
// END OF MATERIALIZE & JQUERY DEPENDENCIES LOAD
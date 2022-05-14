    let urlPath = window.location.pathname

    if(urlPath === '/register') validateRegistration()
    if(urlPath === '/contact') validateContact()
    if(urlPath === '/login') validateLogin()
    if(urlPath === '/reset') resetPasswordRequest()
    if(urlPath === '/posts') postsPage()
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

// CONTACT MESSAGE 

    function validateContact() {
        const userMailRegex = /^[a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4})$/

        const mailField = document.getElementById('contactMail')
        const messageBody = document.getElementById('messageBody')
        const contactForm = document.getElementById('contactForm')

        contactForm.addEventListener('submit', event => {
            if(contactButton())
            event.preventDefault()
            checkField(mailField, 'E-mail', userMailRegex) 
            checkBody()
        })

        function checkBody() {
            if(messageBody.value == 0) {
                messageBody.nextElementSibling.nextElementSibling.innerText = 'Message can\'t be empty'
                return 1
            }
            else {
                messageBody.nextElementSibling.nextElementSibling.innerText = ''
                return 0
            }
        }

        function contactButton() {
            if(
                checkField(mailField, 'E-mail', userMailRegex) && 
                checkBody()
            )  return 1
            return 0
        }

        addListenerForField(mailField, 'E-mail', userMailRegex, 'keyup')
        addListenerForField(mailField, 'E-mail', userMailRegex, 'blur')
        addListenerForButton(mailField, contactButton, 'keyup')
    }

// END OF CONTACT MESSAGE 

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

    function postsPage() {
        document.addEventListener('DOMContentLoaded', () => {
            fetchPosts(writePosts)
        })
        
        function fetchPosts(callback, page) {
            let xhr = new XMLHttpRequest()
            
            xhr.open('GET', '/posts-api', true)
            xhr.onload = function() {
                if(this.status === 200) {
                    let data = JSON.parse(this.responseText)
                    callback(data, page)
                }
            }
            xhr.send()
        }

        function paginatePosts(posts, page = 1) {
            const paginationNumbers = document.getElementById('paginationContainer')
            let perPage = 10
            let numberOfPages = Math.ceil( posts.length / perPage)
            let number = ''
            let paginatedPosts = []
            for(let i = 1; i <= numberOfPages; i++) number += `<li class="waves-effect"><span class="paginate-number blue-text text-lighten-1 p-1" data-number="${i}">${i}</span></li>`
            paginationNumbers.innerHTML = number.length ? number : ''

            document.querySelectorAll('.paginate-number').forEach(number => {
                number.addEventListener('click', event => {
                    let pageNumber = Number(event.target.dataset.number)
                    paginateChanged(pageNumber)
                })
            })

            for(let i = (page - 1) * perPage; i < page * perPage; i++) { 
                if(i >= posts.length) break
                paginatedPosts.push(posts[i])
            }

            return paginatedPosts
        }

        document.getElementById('searchPosts').addEventListener('keyup', filterChanged)

        function filterByCategory(posts) {
            let checkedCategories = document.querySelectorAll('.categories:checked')
            let categoriesIds = []

            checkedCategories.forEach(category => categoriesIds.push(Number(category.value)))

            if(!categoriesIds.length) return posts

            let filterObject = { categories: categoriesIds }

            let xhr = new XMLHttpRequest()
            xhr.open('POST', '/posts-api', true)
            xhr.onload = function() {
                if(this.status === 200) {
                    let data = JSON.parse(this.responseText)
                    writeFilteredPosts(data, 1)
                }
            }

            xhr.send(JSON.stringify(filterObject))
        }

        document.querySelectorAll('.categories')
            .forEach(category => category.addEventListener('change', filterChanged))

        function searchPosts(posts) {
            let keyword = document.getElementById('searchPosts').value.toLowerCase()
            if(!keyword) return posts
            return posts.filter(post => post.PostTitle.toLowerCase().indexOf(keyword) !== -1) 
        }

        function writeFilteredPosts(posts, page) {
            const postsTable = document.getElementById('postContainer')
            let postRow = ''

            posts = posts.sort( (a,b) => a.CreatedAt < b.CreatedAt ? 1 : -1)
            posts = searchPosts(posts)
            posts = paginatePosts(posts, page)

            for(let post of posts) {
                postRow += `
                    <tr>
                        <td>
                            <a href="/view-post?id=${post.PostId}">${post.PostTitle}</a>
                        </td>
                    </tr>
                `
            }

            postsTable.innerHTML = postRow.length ? postRow : '<tr><td>No posts found</td></tr>'
        }

        function writePosts(posts, page) {
            const postsTable = document.getElementById('postContainer')
            let postRow = ''

            posts = posts.sort( (a,b) => a.CreatedAt < b.CreatedAt ? 1 : -1)
            posts = searchPosts(posts)
            posts = filterByCategory(posts)
            posts = paginatePosts(posts, page)

            for(let post of posts) {
                postRow += `
                    <tr>
                        <td>
                            <a href="/view-post?id=${post.PostId}">${post.PostTitle}</a>
                        </td>
                    </tr>
                `
            }

            postsTable.innerHTML = postRow.length ? postRow : '<tr><td>No posts found</td></tr>'
        }

        function paginateChanged(number) {
            fetchPosts(writePosts, number)
        }

        function filterChanged() {
            fetchPosts(writePosts, 1)
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
        //pageLoader()
        $('select').formSelect()
        $('.materialboxed').materialbox()
        $('.sidenav').sidenav()
        $('.parallax').parallax()
        $('.modal').modal()
    })
// END OF MATERIALIZE & JQUERY DEPENDENCIES LOAD
/**
 * Checks if a text has an email format
 * 
 * @param {string} email The email to check
 * @return {boolean}
 */
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
    return regex.test(email)
}

/**
 * Checks if a text is empty, like ""
 * 
 * @param {string} data Data to check
 * @return {boolean}
 */
function isEmpty(data){
    return data == "" ? true : false
}

/**
 * Check if a text is alphanumeric
 * 
 * @param {string} data Data to check
 * @return {boolean}
 */
function isAlphaNum(data){
    var regex = /^[a-zA-Z0-9áéíóú_\-\.]+$/
    return regex.test(data)
}

/**
 * Check if a password is valid
 * 
 * @param {string} data Data to check
 * @return {boolean}
 */
function checkPassword(data){
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&\.,:;])[A-Za-z\d$@$!%*?&\.,:;]{6,}$/
    return regex.test(data)
}
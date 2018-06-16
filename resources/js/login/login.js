$(function(){
    $('#goLogin').click(function(){
        var validate = 0

        if(isEmpty($('#username').val())){
            $('#usernameErrorEmpty').removeClass('d-none')

            validate++
        }else{
            $('#usernameErrorEmpty').addClass('d-none')
        }

        if(isEmpty($('#password').val())){
            $('#passwordErrorEmpty').removeClass('d-none')

            validate++
        }else{
            $('#passwordErrorEmpty').addClass('d-none')
        }

        if(validate == 0){
            var user = {
                username: $('#username').val(),
                password: $('#password').val()
            }
            
            $.ajax({
                url: root + 'core/session/session.php',
                method: 'POST',
                data: {
                    action: 'login',
                    data: user
                },
                async: false,
                success: function(data){
                    try{
                        data = $.parseJSON(data)

                        if(data.status){
                            switch(data.data){
                                case true:
                                    $('#messageSection').addClass('d-none')
                                    window.location.href = root + 'home'
                                    break

                                case 'username':
                                    $('#messageSection').removeClass('d-none')
                                    $('#message').html('<div class="alert alert-danger" role="alert">El usuario introducido no existe</div>')
                                    $("#messageSection").fadeTo(4000, 500).slideUp(500, function(){
                                        $("#messageSection").addClass('d-none')
                                    })
                                    break

                                case 'password':
                                    $('#messageSection').removeClass('d-none')
                                    $('#message').html('<div class="alert alert-danger" role="alert">La contraseña introducida no es correcta</div>')
                                    $("#messageSection").fadeTo(4000, 500).slideUp(500, function(){
                                        $("#messageSection").addClass('d-none')
                                    })
                                    break
                            }
                        }else{
                            $('#messageSection').removeClass('d-none')
                            $('#message').html('<div class="alert alert-danger" role="alert">Error!</div>')
                            $("#messageSection").fadeTo(4000, 500).slideUp(500, function(){
                                $("#messageSection").addClass('d-none')
                            })
                        }
                    }catch{
                        $('#messageSection').removeClass('d-none')
                        $('#message').html('<div class="alert alert-danger" role="alert">Error!</div>')
                        $("#messageSection").fadeTo(4000, 500).slideUp(500, function(){
                            $("#messageSection").addClass('d-none')
                        })
                    }
                },
                error: function(){
                    $('#messageSection').removeClass('d-none')
                    $('#message').html('<div class="alert alert-danger" role="alert">Error!</div>')
                    $("#messageSection").fadeTo(4000, 500).slideUp(500, function(){
                        $("#messageSection").addClass('d-none')
                    })
                }
            })
        }
    })

    $(document).keypress(function(e){
        var keycode = (e.keyCode ? e.keyCode : e.which)
        // Key -> 'Enter'
        if(keycode == '13'){
            $('#goLogin').click()
        }
    })
})
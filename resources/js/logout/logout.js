$(function(){
    $('#goLogout').click(function(){
        $.ajax({
            url: root + 'core/session/session.php',
            method: 'POST',
            data: {
                action: 'logout'
            },
            async: false,
            success: function(data){
                try{
                    data = $.parseJSON(data)

                    if(data.status){
                        
                    }
                    
                    window.location.href = root + 'login'
                }catch{

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
    })

    $(document).keypress(function(e){
        var keycode = (e.keyCode ? e.keyCode : e.which)
        // Key -> 'Enter'
        if(keycode == '13'){
            $('#goLogout').click()
        }
    })
})
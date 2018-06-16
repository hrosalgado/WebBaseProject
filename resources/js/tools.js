var root = '/new/'

/** 
 * Disable back button
 */
function disableBack(){
    window.history.pushState(null, "", window.location.href);        
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    }
}

/**
 * Disable reload button
 */
function disableReload(){
    $(document).keydown(function(e){
        if(((e.which || e.keyCode) == 116) || (e.ctrlKey && (e.which || e.keyCode) == 116) || (e.ctrlKey && (e.which || e.keyCode) == 82)){
            e.preventDefault()
        }
    })
}

$(document).ready(function(){
    //disableBack()
    //disableReload()
})

$(function(){
    //disableBack()
    //disableReload()

    // SESSION
    $.ajax({
        url: root + 'core/session/session.php',
        method: 'POST',
        data: {
            action: 'checkSession'
        },
        async: false,
        success: function(data){
            try{
                data = $.parseJSON(data)

                var currentLocation = window.location.href
                if(data){
                    if(currentLocation.match(/login/)){
                        window.location.href = root + 'home'
                    }
                }else{
                    if(!currentLocation.match(/login/)){
                        window.location.href = root + 'login'
                    }
                }
            }catch(e){
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
})
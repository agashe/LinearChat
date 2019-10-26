$(document).ready(function(){
    /**
     * Password Strength
     */
    $('#InputPassword').keyup(function(){
        var txt = $('#InputPassword').val();
        if (txt.length == 0)
            $('#pass-strength').hide();
        else if (txt.length > 0 && txt.length < 6)
            $('#pass-strength').text('WEAK').css('color', 'red').show();
        else if (txt.length > 5 && txt.length < 11)
            $('#pass-strength').text('GOOD').css('color', 'yellow').show();
        else if (txt.length > 15)
            $('#pass-strength').text('STRONG').css('color', 'green').show();
    });


    /**
     * Go to homepage
     */
    $('.copyrights').click(function(){
        window.location.href = '/';
    });


    /**
     * Close Alert
     */
    $('#alert-msg').click(function(){
        $('#alert-msg').hide();
    });


    /**
     * Move the copyrights to left / alert-msg to right for the chat page.
     */
    if (window.location.href.includes('chat')) {
        $('.copyrights').addClass('copyrights-left');
        $('#alert-msg').addClass('white-box-popup');
    } else {
        $('.copyrights').removeClass('copyrights-left');
        $('#alert-msg').removeClass('white-box-popup');
    }
});
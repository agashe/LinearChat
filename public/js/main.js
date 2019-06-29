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
     * Close Alert
     */
    $('#close').click(function(){
        $('#alert-msg').hide();
    });
});
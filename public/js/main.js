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


    /**
     * Pusher Handler
     */
    if (typeof(Pusher) !== 'undefined') {
        // Pusher.logToConsole = true;
        var pusher = new Pusher('d23cc4c6ff3da4160377', {
            cluster: 'eu',
            forceTLS: true,
        });

        var channel = pusher.subscribe('join-chat-channel');

        channel.bind('join-chat-event', function(data) {
            if (document.hidden) {
                var title = document.title;
                document.title = title + ' (New Messages)';
            }

            loadMessages();
        });
    }


    /* Load the messages on the chat screen. */
    function loadMessages(){
        let chat_board = $(document).find(".chat-board-content");
        let chat_boxes = "";

        chat_board.html("");
    
        $.ajax({
            url: "/get_messages",
            method: "GET",
            dataType: "json",
            success: function (response) {
                $.each(response.messages, function(index, message) {
                    chat_boxes +=  `<div class="white-box message">
                                        <img src="storage/${message.avatar}" /> ${message.username}
                                        <p class="small mb-0">${message.sent_at.replace('T', ' ').replace('.000000Z', '')}</p>
                                        <article>
                                            ${message.content}
                                        </article>
                                    </div>`;
                });
  
                chat_board.append(chat_boxes);
                chat_board.scrollTop(chat_board[0].scrollHeight);
            },
        });
    }


    /**
     * load the messgaes when open the chat screen!
     */
    if (window.location.href.includes('chat')) {
        loadMessages();
    }


    /**
     * Update the tab title when active
     */
    window.onfocus = function () { 
        var title = document.title;
        document.title = title.replace('(New Messages)', '');
    };


    /* Send message */
    $('#send-btn').click(function(){
        if ($('#send-text').val() == '') {
            return;
        }

        $.ajax({
            url: "/send_message",
            data: {content: $("#send-text").val(), _token: $("meta[name='csrf-token']").attr("content")},
            method: "POST",
            dataType: "json"
        });

        loadMessages();
    });
});
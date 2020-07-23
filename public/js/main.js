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

            loadMessages($('.message').length);
        });
    }


    /* Load the messages on the chat screen. */
    function loadMessages(limit = 10, scroll_to_top = false){
        let chat_board = $(document).find(".chat-board-content");
        let is_user_message = "";
        let chat_boxes = "";
        
        $.ajax({
            url: "/get_messages/" + limit,
            method: "GET",
            dataType: "json",
            success: function (response) {
                chat_board.html("");
                chat_boxes +=  '<p class="text-center">Load More ... </p>';
                
                $.each(response.messages, function(index, message) {
                    if (message.user_id != response.user_id) {
                        is_user_message = 'white-box-red-border';
                    } else {
                        is_user_message = '';
                    }

                    chat_boxes +=  `<div class="white-box message ${is_user_message}">
                                        <img src="storage/${message.avatar}" /> ${message.username + ((message.user_id == response.user_id)?' (ME)':'')}
                                        <p class="small mb-0">${message.sent_at.replace('T', ' ').replace('.000000Z', '')}</p>
                                        <article>
                                            ${message.content}
                                        </article>
                                    </div>`;
                });

                chat_board.append(chat_boxes);
                if (scroll_to_top) {
                    chat_board.scrollTop(50);
                } else {
                    chat_board.scrollTop(chat_board[0].scrollHeight);
                }
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


    /**
     * load messages messgaes when the scroll reach its limits!!
     */
    $('.chat-board-content').scroll(function(){
        if ($('.chat-board-content').scrollTop() == 0) {
            // update the number of messages to fetch
            var limit = $('.message').length + 10;
            loadMessages(limit, true);
        }
    });


    /* Send message */
    $('#send-btn').click(function(){
        if ($('#send-text').val() == '') {
            return;
        }

        $.ajax({
            url: "/send_message",
            data: {message: $("#send-text").val(), _token: $("meta[name='csrf-token']").attr("content")},
            method: "POST",
            dataType: "json"
        });

        loadMessages($('.message').length);
        $('#send-text').val('');
    });
});
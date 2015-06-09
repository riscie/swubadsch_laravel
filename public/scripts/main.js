//This function removes the flashmessage after x ms
setTimeout(function()
    {
        $('#flasher').fadeOut('fast');
    }, 1500
);


$(function() {

    $( "#commentForm" ).validate({
        rules: {
            commentText: "required"
        },
        messages: {
            commentText: "Please enter the inception date."
        },
        submitHandler: function(form) {
            // do other things for a valid form
            form.submit();
        }

    });

});

$(document).ready(function () {
    $("#commentForm").validate({
        rules: {
            commentText: {
                required: true,
                minlength: 5
            }
        },

        submitHandler: function (form) {
            //form.submit();
            alert('submit');
        }
    })
});
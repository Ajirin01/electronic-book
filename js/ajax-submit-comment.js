$(document).ready(function () {
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a683c1828547b5af7c07', {
        cluster: 'mt1'
    });

    var contentId = document.getElementById('contentId').value;

    const channel = pusher.subscribe('comment-channel' + contentId);

    // Event binding logic outside the form submission callback
    channel.bind('comment-submited' + contentId, function (data) {
        let comment = data.comment;
        console.log(comment);
        const commentElement = createCommentElement(comment.username, comment.created_at, comment.comment_text);

        // Insert the comment element at the beginning of the comment area
        commentArea.insertBefore(commentElement, commentArea.firstChild);

        let commentCount = document.getElementById("commentsCount");
        commentCount.innerText = `${Number(commentCount.innerText) + 1}`;

        $("#submit").val("Submit");
        $("#submit").prop('disabled', false);
    });

    // Submit comment form
    $('#commentForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        $("#submit").val("sending...");
        $("#submit").prop('disabled', true);
        // Get form data
        var formData = $(this).serialize();

        console.log(formData);

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'handlers/submit_comment.php', // Replace with the actual URL of your PHP script
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function (response) {
                if (response.success) {
                    console.log(response.comments);
                    let comment = response.comments;

                    // Clear the comment input
                    document.getElementById("commentText").value = "";
                } else {
                    // Comment submission failed
                    alert('Failed to submit comment. Error: ' + response.error);
                }
            },
            error: function (xhr, status, error) {
                // AJAX request failed
                console.error('AJAX Request Error:');
                console.error('Status:', status);
                console.error('Error:', error);
                console.error('Response Text:', xhr.responseText);
                alert('Error in AJAX request. Check console for details.');
            }
        });
    });

    function createCommentElement(author, date, commentText) {
        // Create a new div element for the comment
        const commentDiv = document.createElement('div');
        commentDiv.classList.add('media', 'mb-4');

        // Create a nested div for the media body
        const mediaBodyDiv = document.createElement('div');
        mediaBodyDiv.classList.add('media-body');

        // Set the inner HTML for the media body
        mediaBodyDiv.innerHTML = `
            <h6>${author}<small> - <i>${date}</i></small></h6>
            <p>${commentText}</p>
        `;

        // Append the media body div to the comment div
        commentDiv.appendChild(mediaBodyDiv);

        return commentDiv;
    }
});

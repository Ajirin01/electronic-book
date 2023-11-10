$(document).ready(function () {
// Define variables for pagination
let currentCommentPage = 1;
const commentLimit = 5; // Adjust the limit as needed
var contentId = document.getElementById("contentId").value
var commentArea = document.getElementById("commentArea")

// console.log({ content_id: contentId, page: currentCommentPage, limit: commentLimit })

// Function to fetch comments with pagination
function fetchComments() {
    // Make an AJAX request to the PHP handler
    $.ajax({
        url: 'handlers/get_comments.php',
        type: 'GET',
        data: { content_id: contentId, page: currentCommentPage, limit: commentLimit },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Process the fetched comments (adjust based on your UI)
                const comments = response.comments;
                console.log(comments);
                // commentArea.innerHTML = ""
                comments.forEach(comment => {
                    // Process each comment item and append to the DOM
                    // Adjust based on your UI structure
                    // console.log(comment);
                    const commentElement = createCommentElement(comment.username, comment.created_at, comment.comment_text);

                    // Append the comment element to the comment area
                    commentArea.appendChild(commentElement);
                });

                document.getElementById("commentsCount").innerText = `${comments.length}`

                // Increment the current comment page
                currentCommentPage++;

                // Check if there are more comments to load
                if (comments.length < commentLimit) {
                    $('#loadMoreCommentsBtn').hide();
                }
            } else {
                // Handle the error (adjust based on your UI)
                console.error(response.error);
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
}

function createCommentElement(author, date, commentText) {
    // Create a new div element for the comment
    const commentDiv = document.createElement('div');
    commentDiv.classList.add('media', 'mb-4');

    // Create a nested div for the media body
    const mediaBodyDiv = document.createElement('div');
    mediaBodyDiv.classList.add('media-body');

    // Convert the timestamp to a Date object
    const commentDate = new Date(date);

    // Format the date in a human-readable format
    const formattedDate = commentDate.toLocaleString();

    mediaBodyDiv.innerHTML = `<div class="media-body">
            <h6>${author}<small> - <i>${formattedDate}</i></small></h6>
            <p>${commentText}</p>
        </div>`;

    // Append the media body div to the comment div
    commentDiv.appendChild(mediaBodyDiv);

    return commentDiv;
}



fetchComments()

// Event listener for the load more comments button
$('#loadMoreCommentsBtn').on('click', function () {
    fetchComments();
});

// Initial load (you may call this function when loading the content initially)
// const initialContentId = /* Set the appropriate content ID based on your implementation */;
// fetchComments(initialContentId);
})
// Assuming you have a function to handle the update content
function updateContent(contentId) {
    event.preventDefault();
    // console.log(contentId)
    // return

    // Get form data
    var formData = new FormData(event.target);

    // Fetch values by ID and append to the FormData
    formData.append('content_id', contentId);
    // formData.append('title', $('#title').val());
    // formData.append('subtitle', $('#subtitle').val());
    // formData.append('description', $('#description').val());

    // Get the file input element
    // var fileInput = $('#content_file')[0];

    // Check if a file is selected
    // if (fileInput.files.length > 0) {
    //     // Append the file to FormData
    //     formData.append('content_file', fileInput.files[0]);
    // }

    // Add the update flag to the data
    formData.append('update_content', true);

    console.log(formData);

    
    // Send AJAX request
    $.ajax({
        type: 'POST',
        url: 'handlers/update_content.php', // Replace with the actual URL of your PHP script
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                // Content updated successfully
                console.log(response);

                // Optionally, update the UI or perform additional actions

                // Close the modal after successful update
                $('#contentEditModal' + contentId).modal('hide');
                alert("Content successfully updated!")

                window.location.reload()
            } else {
                // Content update failed
                console.error(response.error);
                // Optionally, show an error message or perform additional actions
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

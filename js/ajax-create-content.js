
$(document).ready(function () {
    // Submit the form using AJAX
    $('#createContentForm').submit(function (e) {
        e.preventDefault();

        // Create a FormData object to handle the file upload
        var formData = new FormData($(this)[0]);

        // Add any additional data if needed
        formData.append('submit', 'submit');

        // Make an AJAX request
        $.ajax({
            type: 'POST',
            url: 'handlers/create_content.php', // Change the URL to your PHP script
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Handle the response from the server
                console.log(response);
                if(response.success){
                    $("#title").val("")
                    $("#subtitle").val("")
                    $("#description").val("")
                    $("#content_file").val("")

                    alert("Content created successfully")
                    window.location.reload()
                }else{
                    alert(response.error)
                }
                // You can redirect or perform other actions based on the response
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
});
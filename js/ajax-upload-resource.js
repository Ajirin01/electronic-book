function uploadResource() {
    event.preventDefault();
    var formData = new FormData($('#createresourceForm')[0]);
    formData.append('upload_resource', true);

    $.ajax({
        type: 'POST',
        url: 'handlers/resource_handler.php',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                console.log(response.message);
                // Optionally, update the UI or perform additional actions
                alert("Resource successfully created");
                document.getElementById("name").value = ""
                document.getElementById("resource_file").value = ""

                window.location.reload()
            } else {
                console.error(response.error);
                alert("Could not upload resource because file size exceeded limit!");
                // Optionally, show an error message or perform additional actions
            }
        },
        error: function (xhr, status, error) {
            // Display the actual errors
            console.error('AJAX Request Error:', status, error);

            // Parse the response text as JSON
            try {
                var response = JSON.parse(xhr.responseText);
                console.error('Server Response:', response);
            } catch (e) {
                console.error('Failed to parse server response as JSON:', xhr.responseText);
            }

            // Optionally, show an error message or perform additional actions
        }
    });
}

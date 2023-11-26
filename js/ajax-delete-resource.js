function deleteResource(resourceId, resourcePath) {
    let confirm_delete = confirm("Are you sure you want to delete this resource?")
    if(!confirm_delete){
        return
    }
    $.ajax({
        type: 'POST',
        url: 'handlers/resource_handler.php',
        data: { delete_resource: true, resource_id: resourceId, resource_path: resourcePath },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                console.log(response.message);
                // Optionally, update the UI or perform additional actions
                alert("Successfully deleted!")
                window.location.reload()
            } else {
                console.error(response.error);
                // Optionally, show an error message or perform additional actions
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Request Error:', status, error);
            // Optionally, show an error message or perform additional actions
        }
    });
}

// Assume contentId is the ID of the content you want to delete
function deleteContent(contentId){
    let deleteMyContent = confirm("Are you sure you want to delete this content?")
    if(deleteMyContent){
        $.ajax({
            type: 'POST',
            url: 'handlers/delete_content.php',
            data: { delete: true, contentId: contentId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Content deleted successfully
                    console.log(response.message);
                    alert("Content successfully deleted!")

                    window.location.reload()
                } else {
                    // Failed to delete content
                    console.error(response.error);
                }
            },
            error: function (xhr, status, error) {
                // AJAX request failed
                console.error('AJAX Request Error:', status, error);
                // Optionally, show an error message or perform additional actions
            }
        });
    }
}

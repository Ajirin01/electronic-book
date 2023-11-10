<div id="pdfViewer">
    <div style="height: 100px; width: 100%; text-align: center">
        <h3 style="margin-top: 30px">Please wait, content loading...</h3>
    </div>
    </div>
    <div>
    <!-- <button id="prevPage">Previous Page</button> -->
    <span id="currentPage"></span>
    <!-- <button id="nextPage">Next Page</button> -->
    <input type="number" id="pageNumberInput" placeholder="Go to Page">
    <button id="goToPageButton" class="btn btn-primary">Go</button>
    <button id="downloadButton" class="btn btn-primary">Download PDF</button> <!-- Add this button -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var pdfViewer;
        var prevButton
        var nextButton
        var goToPageButton
        var pageNumberInput
        var currentPageSpan
        var downloadButton
        var contentId


        var pdfDoc = null;
        var currentPage = 1;
        var content_title
        var content_extention

        var pdfUrl


        function renderPage(pageNumber) {
            pdfDoc.getPage(pageNumber).then(function(page) {
            pdfViewer.innerHTML = '';

            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');

            canvas.height = page.view[3];
            canvas.width = page.view[2];

            pdfViewer.appendChild(canvas);

            // Adjust the Y-axis to flip the image
            var renderContext = {
                canvasContext: context,
                viewport: page.view,
                transform: [1, 0, 0, -1, 0, page.view[3]], // Flip the Y-axis
                scale: 2, // Increase the scale for higher resolution
                antialiasing: true // Enable antialiasing
            };

            context.imageSmoothingEnabled = true;
            

            page.render(renderContext);
            currentPageSpan.textContent = 'Page ' + pageNumber + ' of ' + pdfDoc.numPages;
            });
        }
        var content = <?=$content?>

        console.log(content)

        console.log(content.title)
        content_title = content.title
        content_file = content.content_file
        contentId = content.id
        currentPage = 1

        prevButton = document.getElementById('prevPage');
        nextButton = document.getElementById('nextPage');
        goToPageButton = document.getElementById('goToPageButton');
        pageNumberInput = document.getElementById('pageNumberInput');
        currentPageSpan = document.getElementById('currentPage');
        downloadButton = document.getElementById('downloadButton')

        pdfViewer = document.getElementById('pdfViewer')

        pdfUrl = 'contents/'+ content_file;


        pdfjsLib.getDocument(pdfUrl).promise.then(function(doc) {
            pdfDoc = doc;
            renderPage(currentPage);

            prevButton.addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
            }
            });

            nextButton.addEventListener('click', function() {
            if (currentPage < pdfDoc.numPages) {
                currentPage++;
                renderPage(currentPage);
            }
            });

            goToPageButton.addEventListener('click', function() {
            var requestedPage = parseInt(pageNumberInput.value, 10);
            console.log(requestedPage)
            if (!isNaN(requestedPage) && requestedPage >= 1 && requestedPage <= pdfDoc.numPages) {
                currentPage = requestedPage;
                renderPage(currentPage);
            } else {
                alert('Invalid page number. Please enter a valid page number.');
            }
            });
        })

        pdfViewer.style.height = "inherit"
        pdfViewer.style.width = "inherit"


        // Add an event listener to the download button
        downloadButton.addEventListener('click', function () {
            // Get the current page number
            console.log("download file")
            var currentPage = pdfViewer.currentPageNumber;

            // Create a link element with a download attribute
            var link = document.createElement('a');
            link.href = pdfUrl;
            link.download = content_title+ "."+ content_extention;

            // Append the link to the body and trigger a click event
            document.body.appendChild(link);
            link.click();

            // Remove the link from the body
            document.body.removeChild(link);
        });
    })
</script>
var pdfViewer = [];
var prevButton = []
var nextButton = []
var goToPageButton = []
var pageNumberInput = []
var currentPageSpan = []
var downloadButton = []
var contentId


var pdfDoc = null;
var currentPage = 1;
var content_title
var content_file

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
    currentPageSpan[contentId].textContent = 'Page ' + pageNumber + ' of ' + pdfDoc.numPages;
    });
}

function loadPdf(content){
    console.log(content)
    content_title = content.title
    contentId = content.id
    content_file = content.content_file
    currentPage = 1

    prevButton[content.id] = document.getElementById('prevPage'+ content.id);
    nextButton[content.id] = document.getElementById('nextPage'+ content.id);
    goToPageButton[content.id] = document.getElementById('goToPageButton'+ content.id);
    pageNumberInput[content.id] = document.getElementById('pageNumberInput'+ content.id);
    currentPageSpan[content.id] = document.getElementById('currentPage'+ content.id);
    downloadButton[content.id] = document.getElementById('downloadButton'+ contentId)

    pdfViewer = document.getElementById('pdfViewer'+ content.id)

    pdfUrl = 'contents/'+ content_file;

    console.log(pdfUrl)

    pdfjsLib.getDocument(pdfUrl).promise.then(function(doc) {
        pdfDoc = doc;
        renderPage(currentPage);

        prevButton[content.id].addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderPage(currentPage);
        }
        });

        nextButton[content.id].addEventListener('click', function() {
        if (currentPage < pdfDoc.numPages) {
            currentPage++;
            renderPage(currentPage);
        }
        });

        goToPageButton[content.id].addEventListener('click', function() {
        var requestedPage = parseInt(pageNumberInput[contentId].value, 10);
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
    downloadButton[contentId].addEventListener('click', function () {
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
}
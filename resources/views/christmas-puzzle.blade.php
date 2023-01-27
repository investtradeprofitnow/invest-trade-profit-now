<!doctype html>
<html>
    <head>
        <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    </head>
    <body>
        <h1>Take screenshot of webpage with html2canvas</h1>
        <div class="container" id='container'>
            <h1>Devnote is a tutorial.</h1>
        </div>
        <input type='button' id='but_screenshot' value='Take screenshot' onclick='screenshot();'><br/>

        <!-- Script -->
        <script type='text/javascript'>
            function screenshot() {
                html2canvas(document.body).then(function(canvas) {
                document.body.appendChild(canvas);
                });
            }
        </script>
    </body>
</html>
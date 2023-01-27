@extends("christmas.app")
@section("pageTitle", "Christmas Crossword")
@section("content")
    <h1 class="py-3 text-center"><strong><i>Christmas Crossword</i></strong></h1>
    <div class="container christmas-bg">
        <div class="row">
            <div class="col-8">
                <iframe width="700" height="850" style="background-color:white; padding:5px; border:3px solid black; display:block" frameborder="0" src="https://crosswordlabs.com/embed/christmas-crossword-2435?clue_height=40"></iframe>
            </div>
            <div class="col-4">
                <p><b>Steps to submit your crossword</b></p>
                <ul>
                    <li>
                        Option 1:
                        <ol>
                            <li>Solve the crossword</li>
                            <li>Click on three lines on right bottom of crossword</li>
                            <li>Click on Print command and download the solved crossword in PDF</li>
                            <li>Email the downloaded PDF to hrinvesttradeprofitnow@gmail.com with subject as Christmas Crossword</li>
                        </ol>
                    </li>
                    <li>
                        Option 2:
                        <ol>
                            <li>Solve the crossword</li>
                            <li>Take a screenshot of the solved crossword.</li>
                            <li>Email the screenshot to email hrinvesttradeprofitnow@gmail.com with subject as Christmas Crossword</li>
                        </ol>
                    </li>
                </ul>
            </div>
    </div>
@stop
<!-- @section("js")
    <script type='text/javascript'>
        $("#submit").click(function(){
            html2canvas(document.body).then(canvas=>{
                var lnk = document.createElement('a');
                    lnk.download = "crossword.png";
                    lnk.href = canvas.toDataURL("image/png;base64");
                    if (document.createEvent) {
                        e = document.createEvent("MouseEvents");
                        e.initMouseEvent("click", true, true, window,
                        0, 0, 0, 0, 0, false, false, false,
                        false, 0, null);
                        lnk.dispatchEvent(e);
                    }
                    else if (lnk.fireEvent) {
                        lnk.fireEvent("onclick");
                    }
            });
        }); 
    </script>
@stop -->
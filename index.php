<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <style type="text/css">
        body {
            padding-top: 5rem;
        }

        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .up-next {

            width: 100%;
            position: absolute;
            z-index: 999999999999999999;
            height: 35px;
            opacity: 0.9;
            text-align: center;
            padding-top: 10px;
            display: none;
            background-color: #dc8e26;
        }

    </style>
</head>


<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <main role="main" class="container">




        <h4>LOCAL SERVER EXAMPLE</h4>
        <div class="VSC-video-container" style="width: 600px;">
            <div class='up-next'></div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="VSC-video-container-embed-responsive VSC-video-container-embed-responsive-16by9">
                        <iframe class="VSC-video-container-embed-responsive-item" id="VSC-video-container-embed-responsive-item" src="./videoWidget.php?id=Bergenstal&lang=french&autoplay=false" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/VideoWidget.js"></script>




<!--


        <h4>REMOTE SERVER EXAMPLE</h4>
        <div class="VSC-video-container" style="width: 600px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="VSC-video-container-embed-responsive VSC-video-container-embed-responsive-16by9">
                        <iframe crossorigin="anonymous" id="outVideo" class="VSC-video-container-embed-responsive-item" src="http://vpscognimed.com/video/VideoSubtitlesCaptions/videoWidget.php?id=Bergenstal&lang=all" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <script crossorigin="anonymous" src="http://vpscognimed.com/video/VideoSubtitlesCaptions/js/VideoWidget.js"></script>
-->







        <!--        EXPERIMENTAL - TRYING TO LOAD VIDEO PROPERTIES DYNAMICALLY WITHOUT HAVING TO PASTE DIVS
            <div id="VSV-Video-Area" style="width: 300px; height:500px" ></div>
            <script src="js/VideoAreaBuilder.js"></script>
            <script src="js/VideoWidget.js"></script>
-->



    </main>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


</body>




<script>
    // TIME FRAME UPDATES HANDLING FUNCTIONS BEGIN ---------------

    var iframeEl = document.getElementById('VSC-video-container-embed-responsive-item');
    $('body').append('<input type="text" onchange="report()" currentTime="0" duration="1000000000000" id="timeObserver" ended="false" style="visibility: hidden;">');

    var currentTime = 0;
    var videoDuration = 0;
    var videoEnded = false;

    //    function report() {
    //        console.log($('#timeObserver').attr('duration'));
    //        console.log($('#timeObserver').attr('currentTime'));
    //        console.log($('#timeObserver').attr('duration'));
    //        console.log($('#timeObserver').attr('currentTime'));
    //        
    //    }


    // ENABLE TIMEUPDATE DATA FEED FROM CHILD IFRAME

    setTimeout(function() {
        iFrameRequest("timeUpdate");
        upnextsize();

    }, 1000);


    function bindEvent(element, eventName, eventHandler) {
        if (element.addEventListener) {
            element.addEventListener(eventName, eventHandler, false);
        } else if (element.attachEvent) {
            element.attachEvent('on' + eventName, eventHandler);
        }
    }

    var sendMessage = function(msg) {
        // Make sure you are sending a string, and to stringify JSON
        iframeEl.contentWindow.postMessage(msg, '*');
    };

    function iFrameRequest(request) {
        sendMessage(request);
    };

    // Listen to message from child window
    bindEvent(window, 'message', function(response) {

        //        console.log(response);
        var calc = Math.round(response.data.currentTime);

        if (calc != currentTime) {
            currentTime = calc;
            $('#timeObserver').attr("currentTime", calc);
            $('#timeObserver').html(calc);
            $('#timeObserver').trigger("change");
        }

        var totalDurationCalc = Math.round(response.data.duration);
        if (totalDurationCalc != videoDuration) {
            videoDuration = totalDurationCalc;
            $('#timeObserver').attr("duration", totalDurationCalc);
            //            $('#timeObserver').html(totalDurationCalc);

        }

        var getvideoEnded = response.data.ended;
        if (getvideoEnded != videoEnded) {
            videoEnded = getvideoEnded;
            $('#timeObserver').attr("ended", getvideoEnded);
            $('#timeObserver').trigger("change");

        }


        //        $('#timeObserver').html(response.data);

        //        console.log(calc);
        //        console.log(response.data);

    });

    // TIME FRAME UPDATES HANDLING FUNCTIONS END ---------------





    function upnextsize() {
        $(".up-next").width($("#VSC-video-container-embed-responsive-item").width() + "px");
                    console.log($(".up-next").width());
    }
    
    
    

    $(window).resize(function() {
        upnextsize();
        //            console.log("resizing");
    });


    //var vid = document.getElementById("video1");
    //        var video = $(iFrameDOM).find;

    <?php if($_GET['load'] == "cast"){ ?>
    console.log("loaded");

    function report() {

        if ($('#timeObserver').attr('ended') == "true") {
            console.log($('#timeObserver').attr('ended'));
            console.log("It ended");
            nextvideo();
        }

        console.log(parseInt($('#timeObserver').attr('duration')));
        console.log(parseInt($('#timeObserver').attr('currentTime')));

        if ((parseInt($('#timeObserver').attr('duration')) - parseInt($('#timeObserver').attr('currentTime'))) < 10) {

            if ($(".up-next").hasClass("open")) {

            } else {
                $(".up-next").slideToggle(400);
            }
            $(".up-next").addClass("open");
        }
        
        
        
        
        var x = <?php echo $_GET['sub']; ?> + "";
        if ((parseInt($('#timeObserver').attr('duration')) - parseInt($('#timeObserver').attr('currentTime'))) < 10) {

                switch (x) {
                    case "1":
                        $(".up-next").html("<span class='shadow-text'>Coming up in " + Math.round((parseInt($('#timeObserver').attr('duration')) - parseInt($('#timeObserver').attr('currentTime')))) + "... Stanley E. Althof, PhD, IF</span>");
                        break;
                    case "2":
                        $(".up-next").html("<span class='shadow-text'>Coming up in " + Math.round((parseInt($('#timeObserver').attr('duration')) - parseInt($('#timeObserver').attr('currentTime')))) + "... Collaborative Discussion</span>");
                        break;
                    case "3":
                        $(".up-next").html("<span class='shadow-text'>Complete the PostTest/Evaluation to earn CME Credit!</span>");
                        break;
                    default:
                        break;
                }

            $(".up-next").addClass("open");
        }


    };


    <?php } ?>




    function nextvideo() {
        var x = <?= $_GET['sub']; ?> + 1;

        switch (x) {
            case 2:
                window.location = "http://herdesire.net/webcast/index.php?id=<?= $_GET['id']; ?>&load=cast&sub=2";
                break;
            case 3:
                window.location = "http://herdesire.net/webcast/index.php?id=<?= $_GET['id']; ?>&load=cast&sub=3";
                break;
            default:
                window.location = "http://herdesire.net/webcast/index.php?id=<?= $_GET['id']; ?>&load=cast&sub=<?= $_GET['sub']; ?>";
        }

    }





    function nextvideoold() {
        var x = <?php echo $_GET['sub']; ?> + "";
        setTimeout(function() {
            if (<?php echo $_GET['id']; ?> == 1) {
                switch (x) {
                    case "1":
                        window.location = "http://herdesire.net/webcast/index.php?id=1&load=cast&sub=2"
                        break;
                    case "2":
                        window.location = "http://herdesire.net/webcast/index.php?id=1&load=cast&sub=3"
                    default:
                        break;
                }

            }
        }, 2000);
    }

</script>


</html>

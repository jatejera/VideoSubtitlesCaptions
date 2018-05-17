<?php


// EXPERIMENTAL - TRYING TO ALLOW PHP TO HANDLE SCRIPS LOADING FOR DIFFERENT BROWSERS
//include('./vendors/Browser.php/lib/Browser.php');
//$browser = new Browser();
//if( $browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() >= 8 ) 
//{
//    echo "Your browser is Internet explorer version 8";                                                                                                                                    
//}

$video_ID = $_GET['id'];
$video_Lang = $_GET['lang'] ? $_GET['lang'] : "all";



if($video_ID == "Bergenstal"){
    
    $video_source = '<source src="../../simple-embed/videos/Bergenstal_Webcast_07_14_17_3.mp4" type="video/mp4">';
    
    switch($video_Lang){
        case "german":
            $video_track[0] = '<track kind="subtitles" src="http://localhost/simple-embed/translation/Bergenstal_Webcast-de.vtt" srclang="de" label="German" default>';
            break;
        case "german2":
            $video_track[0] = '<track kind="subtitles" src="http://localhost/simple-embed/translation/Bergenstal_Webcast-de2.vtt" srclang="de" label="German2" default>';
            break;
        default:
             $video_track[0] = '<track kind="subtitles" src="http://localhost/simple-embed/translation/Bergenstal_Webcast-de2.vtt" srclang="de" label="German" default>';
            $video_track[1] = '<track kind="subtitles" src="http://localhost/simple-embed/translation/Bergenstal_Webcast-de.vtt" srclang="de" label="German2" default>';
    }
    
    
   
    
}else{
    
     $video_source = 'No Video to load';
}


?>

    <!DOCTYPE html>
    <html lang="en-IE">

    <head>

        <title>Video.js | HTML5 Video Player</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <meta charset="utf-8" />
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <link src="/allbrowsersresources/styles.css" rel="stylesheet">

        <style>
            html,
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            #VSC-video-container-for-IE,
            #VSC-video-container-all-browsers {
                margin: 0;
                padding: 0;

            }

        </style>


    </head>

    <body>

        <figure id="VSC-video-container-all-browsers" data-fullscreen="false" style="display: none">
            <video id="VSC-video-container-all-browsers-video" controls preload="metadata">
                

                <?= $video_source ?>
                
                
                
                <?php foreach($video_track as $track){
                    echo $track;
                } ?>
                
                
            </video>
        </figure>

        <figure id="VSC-video-container-for-IE" data-fullscreen="false" style="display: none">

            <video id="VSC-video-container-IEVideo" class="video-js vjs-default-skin vjs-fluid" controls preload="none" data-setup='{"fluid": true}'>
                <!--       <video id="IEVideo" class="video-js vjs-default-skin vjs-fluid" controls preload="none" poster="http://vjs.zencdn.net/v/oceans.png" data-setup='{"fluid": true}'>-->

                <?= $video_source ?>
                
                
                <?php foreach($video_track as $track){
                    echo $track;
                } ?>
                
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a> href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
            </video>
        </figure>



    </body>



    <script>
        $(document).ready(function() {


            // BROWSER DETECTION CODES. ENABLE AS DESIRE
            //    
            //    var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            //    // Firefox 1.0+
            //    var isFirefox = typeof InstallTrigger !== 'undefined';
            //    // Safari 3.0+
            //    var isSafari = /constructor/i.test(window.HTMLElement) || (function(p) {
            //        return p.toString() === "[object SafariRemoteNotification]";
            //    })(!window['safari'] || safari.pushNotification);
            //    // Internet Explorer 6-11
            var isIE = /*@cc_on!@*/ false || !!document.documentMode;
            // Edge 20+
            var isEdge = !isIE && !!window.StyleMedia;
            //    // Chrome 1+
            //    var isChrome = !!window.chrome && !!window.chrome.webstore;
            //    // Blink engine detection
            //    var isBlink = (isChrome || isOpera) && !!window.CSS;

            var isiPad = navigator.userAgent.match(/iPad/i) != null;




            if (isIE || isEdge) {

                //        alert("internet Explorer");

                var ieCss = document.createElement('link');
                ieCss.href = './vendors/internetexplorerresources/video-js.css';
                ieCss.rel = "stylesheet";
                $('head').append(ieCss);

                var script1 = document.createElement('script');
                script1.src = './vendors/internetexplorerresources/videojs-ie8.min.js';
                $('head').append(script1);

                var script2 = document.createElement('script');
                script2.src = './vendors/internetexplorerresources/video.js';
                $('head').append(script2);

                $('#VSC-video-container-for-IE').show();
                var vid = $("#VSC-video-container-IEVideo");


            } else {


                var allBrowsersCss = document.createElement('link');
                allBrowsersCss.href = './vendors/allbrowsersresources/styles.css';
                allBrowsersCss.rel = "stylesheet";
                $('head').append(allBrowsersCss);

                $('#VSC-video-container-all-browsers').show()
                var vid = $("#VSC-video-container-all-browsers-video");


            }


            //      IPAD SUPPORT
            //          if(!isiPad){
            //              
            //              alert("This is not an ipad");
            //              
            //          }
            //            if(isiPad){
            //                
            //                
            //              alert("This is an ipad");
            //          }






            $('video#VSC-video-container-all-browsers-video').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
                var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
                var event = state ? 'FullscreenOn' : 'FullscreenOff';

                var s = document.createElement("style");

                console.log(event);

                if (event == 'FullscreenOn') {
                    s.id = "cueFormat";
                    s.type = "text/css";
                    s.innerHTML = "::cue  {" +
                        "font-size: 2rem;" +
                        "}";

                }

                if (event == 'FullscreenOff') {

                    $('#cueFormat').remove();

                }

                document.head.appendChild(s);

            })




            // OPTION FOR SENDING THE CURRENT VIDEO TIME TO PARENT BROWSER.
            var timeUpdate = false;

            // addEventListener support for IE8
            function bindEvent(element, eventName, eventHandler) {
                if (element.addEventListener) {
                    element.addEventListener(eventName, eventHandler, false);
                } else if (element.attachEvent) {
                    element.attachEvent('on' + eventName, eventHandler);
                }
            }



            // Send a message to the parent
            var sendMessage = function(msg) {
                window.parent.postMessage(msg, '*');
            };


            // Listen to messages from parent window
            bindEvent(window, 'message', function(input) {

                if (input.data == "timeUpdate") {
                    timeUpdate = true;
                    console.log("Time Update Activated");
                }

            });


            // Send random message data on every button click
            function respond(message) {
                sendMessage(message);
            };




            vid.on("timeupdate", function() {

                if (timeUpdate == true) {
                    
//                    console.log(vid)
                    var data = {
                        ended: vid[0].ended,
                        currentTime: vid[0].currentTime,
                        duration: vid[0].duration
                    }
                    
                    
                    sendMessage(data);
                    
                }

            });







        });

    </script>


    <!--
cgmEDUCATION.net Video Translation (Subtitles/Captions). 
Features: 
- Dynamically Detects and fetches JavaScript and CSS dependencies depending on the browser.
- Utilizes Video.js on Edge and Internet Explorer.
- Utilizes native WebVTT for all other modern browsers on both mobile and Desktop environments

Created on: 05.04.18
by: Julian A Tejera
-->


    </html>

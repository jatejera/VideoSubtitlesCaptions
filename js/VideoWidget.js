var VideoHead = document.getElementsByTagName('head')[0];
var jqueryCDN = document.createElement('script');
jqueryCDN.crossOrigin = 'anonymous';
jqueryCDN.src = "https://code.jquery.com/jquery-3.3.1.min.js";
jqueryCDN.id = "videojQuery";
jqueryCDN.integrity = 'sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=';
VideoHead.appendChild(jqueryCDN);

var VideoStyle = document.createElement('link');
VideoStyle.href = "css/VideoWidget.css";
VideoStyle.rel = "stylesheet";
VideoStyle.id = "videoStyle";
VideoHead.appendChild(VideoStyle);
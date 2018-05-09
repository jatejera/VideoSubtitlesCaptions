var VideoHead = document.getElementsByTagName('head')[0];
var jqueryCDN = document.createElement('script');
jqueryCDN.crossOrigin = 'anonymous';
jqueryCDN.src = "https://code.jquery.com/jquery-2.2.4.min.js"; //compatible with old versions of bootstrap
jqueryCDN.id = "videojQuery";
jqueryCDN.integrity = 'sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=';
VideoHead.appendChild(jqueryCDN);

var VideoStyle = document.createElement('link');

VideoStyle.href = "./css/VideoWidget.css"; //absolute link to this CSS

VideoStyle.rel = "stylesheet";
VideoStyle.id = "videoStyle";
VideoStyle.crossOrigin = "anonymous";
VideoHead.appendChild(VideoStyle);

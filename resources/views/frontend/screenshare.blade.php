
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>getScreenId | Capture Screen on Any Domain!</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="author" type="text/html" href="https://plus.google.com/+MuazKhan">
        <meta name="author" content="Muaz Khan">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- <link rel="stylesheet" href="https://cdn.webrtc-experiment.com/style.css"> -->

        <style>
            
        </style>
        <script>
            document.createElement('article');
            document.createElement('footer');
        </script>

        <!-- script used to capture sourceId of the screen -->
        <script src="https://cdn.webrtc-experiment.com/getScreenId.js"> </script>
        <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    </head>

    <body>
        <article>
            

            

            <section class="experiment" style="text-align:center;">
        <div id="chrome-extension-status"></div>
                <br><button id="capture-screen">Capture Your Own Screen</button><hr>
                <video controls autoplay playsinline style="width: 100%;background-repeat: no-repeat;background-size: 100%;background-image: url(https://lh5.googleusercontent.com/6U-gmL_hG9bbquDZdW_ajiA-1bgkfSlHOkzR24aigkyPQzXWXNoRNfyLjXS3rqV92iwq395JSQ=s640-h400-e365-rw);"></video>
            </section>

            <script>
        var maxTries = 0;
        function showChromeExtensionStatus() {
          if(typeof window.getChromeExtensionStatus !== 'function') return;
          
          
          
          
          maxTries++;
          if(maxTries > 15) return;
          setTimeout(function() {
            if(!gotResponse) showChromeExtensionStatus();
          }, 1000);
        }
        
        showChromeExtensionStatus();
        
                // via: https://bugs.chromium.org/p/chromium/issues/detail?id=487935#c17
                // you can capture screen on Android Chrome >= 55 with flag: "Experimental ScreenCapture android"
                window.IsAndroidChrome = false;
                try {
                    if (navigator.userAgent.toLowerCase().indexOf("android") > -1 && /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor)) {
                        window.IsAndroidChrome = true;
                    }
                } catch (e) {}

                document.getElementById('capture-screen').onclick = function() {
                    document.getElementById('capture-screen').disabled = true;

                    setTimeout(function() {
                      if(document.getElementById('capture-screen').disabled && !document.querySelector('video').src) {
                        document.getElementById('capture-screen').disabled = false;
                      }
                    }, 5000);

                    // edge 17 or higher
                    if(navigator.userAgent.indexOf('Edge') !== -1 && (!!navigator.msSaveOrOpenBlob || !!navigator.msSaveBlob)) {
                        navigator.getDisplayMedia(screen_constraints).then(stream => {
                            document.querySelector('video').srcObject = stream;
                         }, error => {
                           alert('Please make sure to use Edge 17 or higher.');
                         });
                         return;
                    }

                    getScreenId(function(error, sourceId, screen_constraints) {
                        // error    == null || 'permission-denied' || 'not-installed' || 'installed-disabled' || 'not-chrome'
                        // sourceId == null || 'string' || 'firefox'
                        // getUserMedia(screen_constraints, onSuccess, onFailure);

                        document.getElementById('capture-screen').disabled = false;

                        if (IsAndroidChrome) {
                            screen_constraints = {
                                mandatory: {
                                    chromeMediaSource: 'screen'
                                },
                                optional: []
                            };
                            
                            screen_constraints = {
                                video: screen_constraints
                            };

                            error = null;
                        }

                        if(error == 'not-installed') {
                          alert('Please install Chrome extension. See the link below.');
                          return;
                        }

                        if(error == 'installed-disabled') {
                          alert('Please install or enable Chrome extension. Please check "chrome://extensions" page.');
                          return;
                        }

                        if(error == 'permission-denied') {
                          alert('Please make sure you are using HTTPs. Because HTTPs is required.');
                          return;
                        }

                        console.info('getScreenId callback \n(error, sourceId, screen_constraints) =>\n', error, sourceId, screen_constraints);

                        document.getElementById('capture-screen').disabled = true;
                        navigator.mediaDevices.getUserMedia(screen_constraints).then(function(stream) {
                            // share this "MediaStream" object using RTCPeerConnection API

                            document.querySelector('video').srcObject = stream;

                            stream.oninactive = stream.onended = function() {
                                document.querySelector('video').src = null;
                                document.getElementById('capture-screen').disabled = false;
                            };

                            document.getElementById('capture-screen').disabled = false;
                        }).catch(function(error) {
                            console.error('getScreenId error', error);

                            alert('Failed to capture your screen. Please check Chrome console logs for further information.');
                        });
                    }/*, ['screen', 'audio']*/);
                };
            </script>

            

        

      
            

           
        </article>

        <!-- <a href="https://github.com/muaz-khan/getScreenId" class="fork-left"></a> -->

    

        <!-- commits.js is useless for you! -->
        <script>
            window.useThisGithubPath = 'muaz-khan/getScreenId';
        </script>
        <script src="https://cdn.webrtc-experiment.com/commits.js" async> </script>

        <script src="https://cdn.webrtc-experiment.com/syntax/sh_main.min.js" type="text/javascript"> </script>
        <script src="https://cdn.webrtc-experiment.com/syntax/sh_javascript.min.js" type="text/javascript"> </script>
        <script src="https://cdn.webrtc-experiment.com/syntax/sh_html.min.js" type="text/javascript"> </script>
        <link href="https://cdn.webrtc-experiment.com/syntax/sh_style.css" type="text/css" rel="stylesheet">

        <script>
          sh_highlightDocument();
        </script>
    </body>
</html>

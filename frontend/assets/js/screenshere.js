function screenshotPage() {
  // 1. Rewrite current doc's imgs, css, and script URLs to be absolute before
  // we duplicate. This ensures no broken links when viewing the duplicate.
  urlsToAbsolute(document.images);
  urlsToAbsolute(document.querySelectorAll("link[rel='stylesheet']"));
  urlsToAbsolute(document.scripts);

  // 2. Duplicate entire document tree.
  var screenshot = document.documentElement.cloneNode(true);

  // 3. Screenshot should be readyonly, no scrolling, and no selections.
  screenshot.style.pointerEvents = 'none';
  screenshot.style.overflow = 'hidden';
  screenshot.style.userSelect = 'none'; // Note: need vendor prefixes

  // 4. ... read on ...

  // 5. Create a new .html file from the cloned content.
  var blob = new Blob([screenshot.outerHTML], {type: 'text/html'});

  // Open a popup to new file by creating a blob URL.
  window.open(window.URL.createObjectURL(blob));
}

// 4. Preserve current x,y scroll position of this page. See addOnPageLoad().
screenshot.dataset.scrollX = window.scrollX;
screenshot.dataset.scrollY = window.scrollY;

// 4.5. When screenshot loads (e.g. in blob URL), scroll it to the same location
// of this page. Do this by appending a window.onDOMContentLoaded listener
// which pulls out the screenshot (dupe's) saved scrollX/Y state on the DOM.
var script = document.createElement('script');
script.textContent = '(' + addOnPageLoad_.toString() + ')();'; // self calling.
screenshot.querySelector('body').appendChild(script);

// NOTE: Not to be invoked directly. When the screenshot loads, scroll it
// to the same x,y location of original page.
function addOnPageLoad() {
  window.addEventListener('DOMContentLoaded', function(e) {
    var scrollX = document.documentElement.dataset.scrollX || 0;
    var scrollY = document.documentElement.dataset.scrollY || 0;
    window.scrollTo(scrollX, scrollY);
  });

var IMG_MIMETYPE = 'images/jpeg'; // Update to image/webp when crbug.com/112957 is fixed.
var IMG_QUALITY = 80; // [0-100]
var SEND_INTERVAL = 250; // ms

var ws = new WebSocket('ws://...', 'dumby-protocol');
ws.binaryType = 'blob';

function captureAndSendTab() {
  var opts = {format: IMG_MIMETYPE, quality: IMG_QUALITY};
  chrome.tabs.captureVisibleTab(null, opts, function(dataUrl) {
    // captureVisibleTab returns a dataURL. Decode it -> convert to blob -> send.
    ws.send(convertDataURIToBlob(dataUrl, IMG_MIMETYPE));
  });
}

var intervalId = setInterval(function() {
  if (ws.bufferedAmount == 0) {
    captureAndSendTab();
  }
}, SEND_INTERVAL);
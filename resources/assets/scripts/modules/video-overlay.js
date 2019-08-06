export default class VideoOverlay {
   constructor() {
     let videoLink = $('.sa--home-hero .video-overlay-link');
     let videoOverlay = $('.sa--home-hero .video-overlay-container');
     let videoCloseIcon = $('.sa--home-hero .close-video-overlay');
     let videoPlayer = $('.video-player')[0];

     videoLink.click(() => {
       videoOverlay.addClass('active');
       videoPlayer.contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
     });

     videoCloseIcon.click(() => {
      videoOverlay.removeClass('active')
      videoPlayer.contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
     })
   }
}
import Search from '../modules/search';
import VideoOverlay from '../modules/video-overlay';
import SubscribePopup from '../modules/subscribe-popup';

export default {
  init() {
    new Search();
    new VideoOverlay();
    new SubscribePopup();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

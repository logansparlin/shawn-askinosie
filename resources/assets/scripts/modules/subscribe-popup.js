const LOCAL_STORAGE_KEY = 'subscribe_popup_should_be_hidden'

export default class SubscribePopup {
  constructor() {
    this.shouldBeHidden = localStorage.getItem(LOCAL_STORAGE_KEY)
    this.popup = $('.subscribe-popup--container');
    this.closeIcon = $('.subscribe-popup--popup .close-icon');
    this.subscribeButton = $('.subscribe-popup--container #subscribe-submit');

    this.closeIcon.on('click', () => {
      this.closeOverlay();
    });

    $(document).on('submit', '.subscribe-popup--container form', () => {
      console.log('submitted')
      this.closeOverlay();
    });

    if( !this.shouldBeHidden ) {
      this.popup.addClass('popup--visible');
    }
  }

  closeOverlay() {
    this.popup.removeClass('popup--visible');
    localStorage.setItem(LOCAL_STORAGE_KEY, true);
  }
}
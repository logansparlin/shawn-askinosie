export default class Search {
  constructor() {
    let menuIcon = $('.menu-icon');
    let searchIcon = $('.search-icon');
    let searchCloseIcon = $('.search-bar--close-icon');
    
    menuIcon.click(function() {
      $('body').toggleClass('menu--open')
    })

    searchIcon.click(function() {
      $('body').toggleClass('search--open')
    })

    searchCloseIcon.click(function() {
      $('body').removeClass('search--open')
    })
  }
}
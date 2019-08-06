export default class FeaturedStories {
  constructor() {
    this.slider = $('.sa--featured-stories-slider');
    this.slides = $('.sa--featured-stories-slider .featured-story');
    this.nextButton = $('.sa--featured-stories-slider .story-navigation .nav-arrow.next');
    this.previousButton = $('.sa--featured-stories-slider .story-navigation .nav-arrow.previous');
    this.activeIndex = 0;

    this.slides.eq(this.activeIndex).addClass('active-story')
    
    this.setupListeners();
  }

  setupListeners() {
    this.nextButton.on('click', this.next.bind(this))
    this.previousButton.on('click', this.previous.bind(this))
  }

  next() {
    if(this.activeIndex < this.slides.length - 1) {
      this.slides.removeClass('active-story')
      this.activeIndex = this.activeIndex + 1
      this.slides.eq(this.activeIndex).addClass('active-story')
    }
  }
  
  previous() {
    if(this.activeIndex > 0) {
      this.slides.removeClass('active-story')
      this.activeIndex = this.activeIndex - 1
      this.slides.eq(this.activeIndex).addClass('active-story')
    }
  }

}
export default class FeaturedPosts {
  constructor() {
    this.slider = $('.sa--featured-posts-slider');
    this.slides = $('.sa--featured-posts-slider .featured-post');
    this.nextButton = $('.sa--featured-posts-slider .post-navigation .nav-arrow.next');
    this.previousButton = $('.sa--featured-posts-slider .post-navigation .nav-arrow.previous');
    this.activeIndex = 0;

    this.slides.eq(this.activeIndex).addClass('active-post')
    
    this.setupListeners();
  }

  setupListeners() {
    this.nextButton.on('click', this.next.bind(this))
    this.previousButton.on('click', this.previous.bind(this))
  }

  next() {
    if(this.activeIndex < this.slides.length - 1) {
      this.slides.removeClass('active-post')
      this.activeIndex = this.activeIndex + 1
      this.slides.eq(this.activeIndex).addClass('active-post')
    }
  }
  
  previous() {
    if(this.activeIndex > 0) {
      this.slides.removeClass('active-post')
      this.activeIndex = this.activeIndex - 1
      this.slides.eq(this.activeIndex).addClass('active-post')
    }
  }

}
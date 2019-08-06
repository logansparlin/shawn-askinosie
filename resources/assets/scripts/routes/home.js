import FeaturedStories from '../modules/featured-stories';
import FeaturedPosts from '../modules/featured-posts';

export default {
  init() {
    new FeaturedStories();
    new FeaturedPosts();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

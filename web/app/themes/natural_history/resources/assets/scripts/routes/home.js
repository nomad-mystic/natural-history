export default {
  init() {
    // JavaScript to be fired on the home page



    let showMoreButton = window.document.getElementById('j-show-more-button');
    let showMoreContent = window.document.getElementById('j-show-more-content');

    showMoreButton.addEventListener('click', () => {
        if (showMoreContent.classList.contains('is-invisible')) {
            showMoreContent.classList.remove('is-invisible');
        } else {
            showMoreContent.classList.add('is-invisible');
        }
    }, false);



  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS

  },
};

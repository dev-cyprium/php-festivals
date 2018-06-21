import $ from 'jquery';

function debounce(func, wait, immediate) {
  let timeout;
  return function() {
    let context = this;
    let args = arguments;
    let later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    let callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}

class SearchFestival {
  initializeSearchBar() {
    this.searchInput = $("#search-festivals");
    this.searchInput.keyup(debounce(this.handleSearch.bind(this), 250))
  }

  handleSearch() {
    let val = this.searchInput.val();
    $.ajax({
      method: 'GET',
      dataType: 'JSON',
      url: `/api/search?term=${val}`,
      success: (data) => {
        if(val === '') {
          history.pushState('festivali', '', `festivali`);
        } else {
          history.pushState('festivali', '', `festivali?term=${val}`);
        }
        console.log(data);
      }
    })
  }
}

export default new SearchFestival();
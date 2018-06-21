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

function template(festival) {
  return `<div class='festival'>
          <figure class='festival__slika'>
            <img src='${festival.putanja}' />
            <figcaption>
              <h2>${festival.naziv}</h2>
              <h3><i class="far fa-calendar-alt"></i>
                ${formatDate(festival.datum)}</h3>
              <h3><i class="fas fa-users"></i> 12 000</h3>
            </figcaption>
          </figure>
          <p>${festival.opis}</p>
        </div>`;
}

function formatDate(rawDate) {
  var datum = rawDate.split(" ")[0];
  var date = new Date(datum);
  var final =
    date.getUTCDate() + " / " +
    (date.getUTCMonth()+1) + " / " +
    date.getUTCFullYear();
  return final;
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
        this.redrawPage(data);
      }
    })
  }

  redrawPage(data) {
    const timing = 300;
    $('.festivali__list').html('');
    data.forEach((festival, i) => {
      let festDOM = $(template(festival));
      festDOM.hide();
      $('.festivali__list').append(festDOM);
      festDOM.fadeIn(timing + i * timing);
    });
  }
}

export default new SearchFestival();
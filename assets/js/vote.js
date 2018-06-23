import $ from 'jquery';

export default function initVoteSystem() {
  $(".vote-button").click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    alert('Glasam! ' + id);
  });
}
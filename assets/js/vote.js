import $ from 'jquery';

export default function initVoteSystem() {
  $(".vote-button").click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    $.ajax({
      dataType: 'json',
      method: 'POST',
      url: '/api/glasaj',
      data: {
        id: id
      },
      success: (data) => {
        console.log(data);
      }
    });
  });
}
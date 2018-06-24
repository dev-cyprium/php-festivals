import $ from 'jquery';

export default function initVoteSystem() {
  $(".vote-button").click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    $(this).attr('disabled', 'true');
    $.ajax({
      dataType: 'json',
      method: 'POST',
      url: '/api/glasaj',
      data: {
        id: id
      },
      success: (data) => {
        App.alerts.createAlert(data.message);
      },
      error: (xhr) => {
        let ovde = `<a class='ukini' href='#'>ovde</a>`;
        App.alerts.createAlert(JSON.parse(xhr.responseText).message +
          ` (mozete ukinuti glas ${ovde})`);
        $('.ukini').click(function(e) {
          e.preventDefault();
          App.alerts.closeAll();
          $.ajax({
            dataType: 'json',
            method: 'DELETE',
            url: '/api/glasaj',
            success: () => {
              console.log('Yo?');
              App.alerts.createAlert('Uspesno obrisan glas');
            }
          });
        });
      }
    });
  });
}
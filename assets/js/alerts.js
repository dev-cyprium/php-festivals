import $ from 'jquery'

function template(message) {
    return `
      <div class='alert'>
        <span class='message'>${message}</span>
        <span class='closebtn' onclick="this.parentElement.style.display='none';">
        &times;</span>
      </div>
    `;
}

let el = null;

const Alerts = {
    createAlert: (message) => {
        if(el) {
            el.css("display", "block");
            el.find('.message').html(message);
        } else {
            el = $(template(message));
            $('body').append(el)
        }
    },
    closeAll: () => {
      $(".alert").css('display', 'none');
    }
};

export default Alerts;
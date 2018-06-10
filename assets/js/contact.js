import $ from 'jquery'

export default class Contact {
    constructor() {
        this.form = $('.contact-form form')
        this.form.submit((e) => this.handle(e))
        this.form.find('#message').on('keyup', (e) => this.handleKeyUp(e))
        this.firstKey = true
    }

    handleKeyUp(e) {
        if(this.firstKey) {
            this.firstKey = false
            this.form.find(".form-wrap:last-of-type").append(`<span class='counter'></span>`);
        }
        var count = 100 - this.form.find('#message').val().length;
        if(count < 10) {
            this.form.find('.counter').addClass('danger');
        }

        if(count > 10) {
            this.form.find('.counter').removeClass('danger');
        }
        this.form.find('.counter').text(count);
    }

    handle(e) {
        e.preventDefault()
        this._removeErr()
        $.ajax({
            url: '/api/message',
            method: 'POST',
            data: {
                email: this.form.find('#email').val(),
                message: this.form.find("#message").val()
            }, 
            success: (data, textStatus, xhr) => {
                this.receiveData(data, xhr.status)
            },
            error: (xhr) => {
                this.receiveData(JSON.parse(xhr.responseText), xhr.status)
            }
        })
    }

    _removeErr() {
        this.form.find('#err-message').text("")
        this.form.find('#message').removeClass('form-error')  
        this.form.find("#err-email").text("")
        this.form.find("#email").removeClass('form-error')
    }

    receiveData(data, status) {
        if(status == 400) {
            if (data["message"]) {
                this.form.find('#err-message').text(data['message'])
                this.form.find('#message').addClass('form-error')
            }

            if (data["email"]) {
                this.form.find("#err-email").text(data['email'])
                this.form.find("#email").addClass('form-error')
            }
        } else if(status == 200) {
            this.form.find('#message').val('')
            this.form.find('#email').val('')
            App.alerts.createAlert("Hvala Vam! U najkracem roku ćemo Vam odgovoriti")
        }
    }
}
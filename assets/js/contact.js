import $ from 'jquery'

export default class Contact {
    constructor() {
        this.form = $('.contact-form form')
        this.form.submit((e) => this.handle(e))
    }

    handle(e) {
        e.preventDefault()
        $.ajax({
            url: '/v1/message',
            method: 'POST',
            success: (data, _, xhr) => {
                this.receiveData(data, xhr.status, xhr)
            },
            error: (_, status, xhr) => {
                this.receiveData(null, xhr.status, xhr)
            }
        })
    }

    receiveData(data, status, xhr) {
        console.log(status)
    }
}
import $ from 'jquery';

const VALIDATIONS = {
  email: (value) => value.match(/^[a-z0-9\._\+\-]+@[a-z0-9\._]+$/),
  password: (value) => value.match(/^(?=.*[$%^@#]).{5,100}$/)
}



/**
 * Generic form validator
 */

export default class Validator {
  static validateField(input, validatorName, errField) {
    let validator = VALIDATIONS[validatorName]
    let value = input.val()
    if(validator(value)) {
      input.removeClass('form-error')
      errField.text('')
    } else {
      input.addClass('form-error')
      errField.text(`Field ${validatorName} has invalid format`)
    }
  }

  static initializeFormValidators() {
    /**
     * First we find all the forms in the document
     * and throw away the ones without the data validator
     */
    let validatorForms = $("form").filter(function() { return $(this).data("validator-namespace") } )
    validatorForms.each(this._handle_form);
  }

  static _handle_form() {
    let form = $(this)
    let inputs = form.find('input')
    form.submit(function(event) {
      event.preventDefault()
      let validations = []
      inputs.each(function() {
        let input = $(this)
        let name  = input.data('validator-name')
        let errF  = input.parent().find('.form__errors')
        /**
         * We need to check if the data-validator-name is present
         * and also make sure it's one of the valid filters.
         * 
         * If we don't have a filter, we let the developer know
         * that he made a misatke via an usefull error message.
         */
        if(!name) {
          console.error(input)
          throw new Error(`Input does not have a data-validator-name`)
          event.preventDefault()
        }

        if(!VALIDATIONS[name]) {
          throw new Error(`[${name}] doesn't exist as a valid validator options
            Try using one of the following:
            ${Object.keys(VALIDATIONS).join(", ")}  
          `)
          event.preventDefault()
        }

        /**
         * No errors happaned at this point so we continue 
         * validating the form
         */
        Validator.validateField(input, name, errF)
      })
    })
  }
}

export const validations = VALIDATIONS;
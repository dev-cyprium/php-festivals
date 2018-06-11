import $ from 'jquery';

const VALIDATIONS = {
  mail: {
    fn: (value) => value.match(/^[a-z0-9\._\+\-]+@[a-z0-9\._]+$/),
    msg: "Mail nije u dobrom formatu"
  },
  lozinka: {
    fn: (value) => value.match(/^(?=.*[$%^@#]).{5,100}$/),
    msg: "Lozinka mora da zadrzi bar jedan od [$, %, ^, @, #]"
  },
  ime: {
    fn: (value) => value.match(/^[A-ZŠĐČĆŽ][a-zšđčćž]+(\s[A-ZŠĐČĆŽ][a-zšđčćž]+)+$/),
    msg: "Ime nije u dobrom formatu"
  }
}


/**
 * Generic form validator
 */

export default class Validator {
  static validateField(input, validatorName, errField) {
    let validator = VALIDATIONS[validatorName]
    let value = input.val()
    let result = validator.fn(value)
    if(result) {
      input.removeClass('form-error')
      errField.text('')
    } else {
      input.addClass('form-error')
      errField.text(validator.msg)
    }

    return result
  }

  static validateEqual(inputOne, inputTwo, errField) {
    let valueOne = inputOne.val()
    let valueTwo = inputTwo.val()
    let result = valueOne == valueTwo
    if(result) {
      inputOne.removeClass('form-error')
      errField.text('')
    } else {
      inputOne.addClass('form-error')
      errField.text("Polje se ne poklapa")
    }
    return result
  }

  static initializeFormValidators() {
    /**
     * First we find all the forms in the document
     * and throw away the ones without the data validator
     */
    let validatorForms = $("form").filter(function() { return $(this).data("validator-namespace") } )
    validatorForms.each(this._handle_form);
  }

  /**
   * We need to check if the data-validator-name or data-validator-same-as is present
   * and also make sure it's one of the valid filters.
   * 
   * If we don't have a filter, we let the developer know
   * that he made a misatke via an usefull error message.
   */
  static _compile_form_input(event, input) {
    let errF = input.parent().find('.form__errors')
    if (input.data('validator-name')) {
      let name = input.data('validator-name')
 
      if (!VALIDATIONS[name]) {
        throw new Error(`[${name}] doesn't exist as a valid validator option.
            Try using one of the following:
            ${Object.keys(VALIDATIONS).join(", ")}  
          `)
        event.preventDefault()
      }

      /**
       * No errors happaned at this point so we continue 
       * validating the form
       */
      if (!Validator.validateField(input, name, errF)) {
        event.preventDefault()
      }
    } else if (input.data('validator-same-as')) {
      let asInput = $(input.data('validator-same-as'))
      if (!Validator.validateEqual(input, asInput, errF)) {
        event.preventDefault()
      }
    } else {
      console.error(input)
      throw new Error("Input does not have a data-validator-* class")
      event.preventDefault()
    }
  }

  static _handle_form() {
    let form = $(this)
    let inputs = form.find('input')
    form.submit(function(event) {
      inputs.each(function() {
        let input = $(this)
        Validator._compile_form_input(event, input)
      })
    })
  }
}

export const validations = VALIDATIONS;
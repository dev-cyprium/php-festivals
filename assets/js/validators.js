import $ from 'jquery';

const VALIDATIONS = {
  email: (value) => value.match(/^[a-z0-9\._\+\-]+@[a-z0-9\._]+$/)
}

/**
 * Generic form validator
 */

export default class Validator {
  static validateForm(form, validations) {
    let errors = []
    for(let field in validations) {
      let value = form.find(`#${field}`).val()
      const fn = validations[field]

      if(!fn(value)) {
        let msg = `Field ${field} supplid in wrong format`
        if(!errors[field]) {
          errors[field] = []
        }
        errors[field].push(msg)
      }
    }
  }

  static initializeFormValidators() {
    /**
     * First we find all the forms in the document
     * and throw away the ones without the data validator
     */
    let forms = $("form").filter(function() { return $(this).data("validator-namespace") } )
    console.log(forms);
  }
}

export const validations = VALIDATIONS;
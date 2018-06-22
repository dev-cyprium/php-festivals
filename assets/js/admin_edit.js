import $ from 'jquery';
import select2 from 'select2';

select2($);

class AdminEdit {
  initializeAdminEdit() {
    $("#fetival-select").select2();
  }
}

export default new AdminEdit();
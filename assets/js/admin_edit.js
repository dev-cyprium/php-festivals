import $ from 'jquery';
import select2 from 'select2';
import 'pickadate/lib/picker';
import 'pickadate/lib/picker.date';

select2($);

class AdminEdit {
  initializeAdminEdit() {
    $("#fetival-select").select2();
    $("#fetival-select").change((ev) => {
      this.handleChange(ev)
    });
    this.form = $(".site-form--admin_edit form");
  }

  handleChange(ev) {
    const id = $("#fetival-select").val();
    $.ajax({
      url: '/api/festival',
      method: 'POST',
      data: {
        id: id
      },
      success: (data) => {
        const naziv  = this.form.find("#naziv");
        const datum  = this.form.find("#datum");
        const opis   = this.form.find("#opis");
        const slika  = this.form.find("#slika");
        const izmeni = this.form.find("#izmeni");
        this.form.find("#festID").val(id);
        this.updateInput(naziv, data.naziv);
        this.updatePicker(datum, data.datum);
        this.updateInput(opis,  data.opis);
        this.updateInput(slika, null);
        this.updateInput(izmeni, null);
        $("#preview").attr('src', data.putanja);
      }
    });
  }

  updatePicker(input, rawDate) {
    let picker = input.pickadate('picker');
    const date = rawDate.split(" ")[0];
    picker.set('select', date, {format: 'yyyy-mm-dd'});
    input.removeAttr('disabled');
    input.removeClass('disabled');
  }

  updateInput(input, val) {
     input.val(val);
     input.removeAttr('disabled');
     input.removeClass('disabled');
  }
}

export default new AdminEdit();
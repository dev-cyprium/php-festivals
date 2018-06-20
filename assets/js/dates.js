import $ from 'jquery';
import 'pickadate/lib/picker';
import 'pickadate/lib/picker.date';

export default function transform() {
  $(".date-input").pickadate({
    container: this,
    formatSubmit: 'yyyy/mm/dd',
    hiddenName: true
  });
}
/*==============================
=            DELETE FORM        =
==============================*/
function deleteModal(url, id, title, token) {
  var modal = '<div id="modal_delete' + id + '">';
      modal +=  '<div class="modal modal_area fade" id="delete_form' + id + '" tabindex="-1" role="dialog" aria-labelledby="delete_' + id + '">';
      modal +=    '<div class="modal-dialog" role="document">';
      modal +=         '<div class="modal-content">';
      modal +=            '<div class="modal-header">';
      modal +=                '<h4 class="modal-title" id="delete_' + id + '">Hapus Data</h4>';
      modal +=                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
      modal +=                  '<span aria-hidden="true">×</span>';
      modal +=                '</button>';
      modal +=            '</div>';
      modal +=           '<div class="modal-body">';
      modal +=             'Apakah anda ingin menghapus data <b>' + title + '</b> ?';
      modal +=           '</div>';
      modal +=           '<div class="modal-footer">';
      modal +=            '<form method="POST" action="' + url + '" role="form" accept-charset="utf-8">';
      modal +=              '<input type="hidden" name="_method" value="DELETE">';
      modal +=              '<input type="hidden" name="_token" value="' + token + '">';
      modal +=              '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
      modal +=              '<button type="submit" class="btn btn-danger">Hapus</button>';
      modal +=            '<form>';
      modal +=          '</div>';
      modal +=        '</div>';
      modal +=      '</div>';
      modal +=    '</div>';
      modal +=  '</div>';

  var check_data = $('#modal_delete' + id).length;
  if(check_data == 0){
    $('#area_modal' + id).append(modal);
  }
}

function popupUnauthorized(){

  var logout_url = "window.location = '/login'";
  var modal = '<div class="modal modal_area fade" id="ErrUnauthorized" tabindex="-1" role="dialog" aria-labelledby="ErrUnauthorizedLabel">';
      modal += '      <div class="modal-dialog" role="document">';
      modal += '              <div class="modal-content">';
      modal +=            '<div class="modal-header">';
      modal +=                '<h4 class="modal-title" id="ErrUnauthorizedLabel">Informasi</h4>';
      modal +=                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
      modal +=                  '<span aria-hidden="true">×</span>';
      modal +=                '</button>';
      modal +=            '</div>';
      modal += '                  <div class="modal-body">';
      modal += '                      Sesi Anda telah berakhir. Anda akan dialihkan ke halaman masuk.';
      modal += '                  </div>';
      modal += '                  <div class="modal-footer">';
      modal += '                      <button onclick="'+logout_url+'" type="button" class="btn btn-flat btn-primary">Log Masuk</button>';
      modal += '                  </div>';
      modal += '              </div>';
      modal += '      </div>';
      modal += '   </div>';
  
  var $element = $('#modals');
  if(!$element.length)
      $element = $('<div id="modals"></div>').appendTo('body');

  $("#modals").append(modal)
  $('#ErrUnauthorized').modal('show');
}
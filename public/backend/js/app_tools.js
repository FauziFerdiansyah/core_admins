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


// <div class="modal">
//   <div class="modal-dialog" role="document">
//     <div class="modal-content">
//       <div class="modal-header">
//         <h5 class="modal-title">Modal title</h5>
//         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
//           <span aria-hidden="true">×</span>
//         </button>
//       </div>
//       <div class="modal-body">
//         <p>Modal body text goes here.</p>
//       </div>
//       <div class="modal-footer">
//         <button type="button" class="btn btn-secondary mobtn" data-dismiss="modal">Close</button>
//         <button type="button" class="btn btn-primary mobtn">Save changes</button>
//       </div>
//     </div>
//   </div>
// </div>





{/* <div id="modals">
  <div class="modal modal_area fade show" id="delete_form1" tabindex="-1" role="dialog" aria-labelledby="delete_form1Label" style="padding-right: 15px; display: block;">
  <div class="modal-dialog" role="document">
    <input type="hidden" name="delete" id="delete_data" value="http://inventory.localhost/users/delete">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-titles" id="delete_form1Label">Hapus Data</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
  Apakah Anda yakin ingin menghapus data <b>Fauzi Ferdiansyah</b> ?
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Batal</button>
  <button onclick="destroy(event, 1)" type="button" class="btn btn-flat btn-danger" id="delete1">Ya, hapus</button>
</div>
</div>      </div>   </div></div> */}
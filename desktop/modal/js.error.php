<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

if (!isConnect()) {
  throw new Exception('{{401 - Accès non autorisé}}');
}
?>

<div id="md_jsError" data-modalType="md_jsError">
  <div class="input-group pull-right" style="display:inline-flex">
    <span class="input-group-btn">
      <a class="btn btn-default btn-sm" id="bt_refreshJSError"><i class="fas fa-sync icon-white"></i> {{Rafraichir}}</a><a class="btn btn-danger roundedRight btn-sm" id="bt_clearJSError"><i class="far fa-trash-alt icon-white"></i> {{Vider}}</a>
    </span>
  </div>
  <table class="table table-condensed table-bordered tablesorter" id="table_jsError" style="margin-top: 5px;">
    <thead>
      <tr>
        <th>{{Fichier}}</th>
        <th>{{Ligne}}</th>
        <th>{{Message}}</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<script>
function refreshJsError() {
  var tr = ''
  for (var i in jeedomUtils.JS_ERROR) {
    tr += '<tr>';
    tr += '<td>';
    if (jeedomUtils.JS_ERROR[i].filename) {
      tr += jeedomUtils.JS_ERROR[i].filename
    }
    tr += '</td>'
    tr += '<td>'
    if (jeedomUtils.JS_ERROR[i].lineno) {
      tr += jeedomUtils.JS_ERROR[i].lineno
    }
    tr += '</td>'
    tr += '<td>'
    if (jeedomUtils.JS_ERROR[i].message) {
      tr += jeedomUtils.JS_ERROR[i].message
    }
    tr += '</td>'
    tr += '</tr>'
  }
  $('#table_jsError tbody').empty().append(tr)
}

refreshJsError()

$('#bt_refreshJSError').on('click',function() {
  refreshJsError()
})

$('#bt_clearJSError').on('click',function() {
  jeedomUtils.JS_ERROR = []
  $('#bt_jsErrorModal').hide()
  refreshJsError()
})
</script>
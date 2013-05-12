<?php include_partial('noteheader') ?>
  <div class="hero-unit">
    <p>all notes.</p>
    <p class="btn" id="addNote">
      <a id="addNoteModalButton" href="#doNoteModal" role="button" class="btn-block" data-toggle="modal" onclick="showEmptyNote();">add note</a>
    </p>
  </div>

  <div class="row">
    <div id="noteBody"></div>
  </div>
  <hr>


  <div id="doNoteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>ノート追加</h3>
    </div>
    <div class="modal-body">
      <form>
        <table id="note_form">
          <tbody id="detailBody">
          </tbody>
          <tfoot>
          <tr>
            <td colspan="2">
              <input type="button" id="addNoteTrigger" value="update note" />
            </td>
          </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>

  <script id="tmplNote" type="text/x-jquery-tmpl">
    {{each value}}
    <div class="well span2">
      <h4><a id="detailNoteModal-${id}" href="#doNoteModal" role="button" class="btn-block" data-toggle="modal" note-id="${id}" onclick="showDetail(this);">${title}</a></h4>
      <div>${description}</div>
      <!--
            <p class="btn" id="detailNote">
              <a id="detailNoteModalButton" href="#doDetailModal" role="button" class="btn-block" data-toggle="modal">view details &raquo;</a>
      </p>
      <p class="btn"><?php echo link_to('delete this note &raquo;', '/notes/delete') ?></p>
      <p class="btn"><?php echo link_to('view settings &raquo;', '/notes/notesetting') ?></p>
      <p class="btn"><?php echo link_to('like this &raquo;', '/notes/likenote') ?></p>
      <p class="btn"><?php echo link_to('add tags &raquo;', '/notes/addtags') ?></p>
-->
    </div>
    {{/each}}
  </script>
<?php include_partial('notefooter') ?>

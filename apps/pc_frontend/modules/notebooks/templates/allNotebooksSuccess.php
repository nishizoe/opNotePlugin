<?php include_partial('notebooksheader') ?>
  <div class="hero-unit">
    <p>all notebooks.</p>
    <p class="btn" id="addNotebook">
      <a id="addNotebookModalButton" href="#doNotebookModal" role="button" class="btn-block" data-toggle="modal" onclick="showEmptyNotebook();">add notebook</a>
    </p>
  </div>

  <div class="row">
    <div id="notebookBody"></div>
  </div>
  <hr>

  <div id="doNotebookModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>ノート追加</h3>
    </div>
    <div class="modal-body">
      <form>
        <table id="notebook_form">
          <tbody id="detailBody">
          </tbody>
          <tfoot>
          <tr>
            <td colspan="2">
              <input type="button" id="addNotebookTrigger" value="update notebook" />
            </td>
          </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>

  <script id="tmplNotebook" type="text/x-jquery-tmpl">
    {{each value}}
    <div class="well span2">
      <h4><a id="detailNotebookModal-${id}" href="#doNotebookModal" role="button" class="btn-block" data-toggle="modal" notebook-id="${id}" onclick="showDetail(this);">${title}</a></h4>
      <div>${description}</div>
      <p class="btn" id="delete-notebook-${id}" notebook-id="${id}" onclick="deleteNotebook(this);">delete &raquo;</p>
      <!--
            <p class="btn" id="detailNotebook">
              <a id="detailNotebookModalButton" href="#doDetailModal" role="button" class="btn-block" data-toggle="modal">view details &raquo;</a>
      </p>
      <p class="btn"><?php echo link_to('delete this notebook &raquo;', '/notebooks/delete') ?></p>
      <p class="btn"><?php echo link_to('view settings &raquo;', '/notebooks/notebooksetting') ?></p>
      <p class="btn"><?php echo link_to('like this &raquo;', '/notebooks/likenotebook') ?></p>
      <p class="btn"><?php echo link_to('add tags &raquo;', '/notebooks/addtags') ?></p>
-->
    </div>
    {{/each}}
  </script>
<?php include_partial('notebooksfooter') ?>

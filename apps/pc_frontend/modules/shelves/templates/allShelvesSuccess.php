<?php include_partial('shelvesheader') ?>
  <div class="hero-unit">
    <p>all shelves.</p>
    メンバーのコミュニティ参加状況を取得するAPIがあるのでそれを使用して、参加コミュニティを取得する<br>
    http://houou.github.io/api.php/member_community.html<br>
    本棚ごとにどのコミュニティに所属するかを作成時と変更時に選択できる。<br>
    

    <p class="btn" id="addShelf">
      <a id="addShelfModalButton" href="#doShelfModal" role="button" class="btn-block" data-toggle="modal" onclick="showEmptyShelf();">add shelf</a>
    </p>
  </div>

  <div class="row">
    <div id="shelfBody"></div>
  </div>
  <hr>

  <div id="doShelfModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>ノート追加</h3>
    </div>
    <div class="modal-body">
      <form>
        <table id="shelf_form">
          <tbody id="detailBody">
          </tbody>
          <tfoot>
          <tr>
            <td colspan="2">
              <input type="button" id="addShelfTrigger" value="update shelf" />
            </td>
          </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>

  <script id="tmplShelf" type="text/x-jquery-tmpl">
    {{each value}}
    <div class="well span2">
      <h4><a id="detailShelfModal-${id}" href="#doShelfModal" role="button" class="btn-block" data-toggle="modal" shelf-id="${id}" onclick="showDetail(this);">${title}</a></h4>
      <div>${description}</div>
      <p class="btn" id="delete-shelf-${id}" shelf-id="${id}" onclick="deleteShelf(this);">delete &raquo;</p>
      <!--
            <p class="btn" id="detailShelf">
              <a id="detailShelfModalButton" href="#doDetailModal" role="button" class="btn-block" data-toggle="modal">view details &raquo;</a>
      </p>
      <p class="btn"><?php echo link_to('delete this shelf &raquo;', '/shelves/delete') ?></p>
      <p class="btn"><?php echo link_to('view settings &raquo;', '/shelves/shelfsetting') ?></p>
      <p class="btn"><?php echo link_to('like this &raquo;', '/shelves/likeshelf') ?></p>
      <p class="btn"><?php echo link_to('add tags &raquo;', '/shelves/addtags') ?></p>
-->
    </div>
    {{/each}}
  </script>
<?php include_partial('shelvesfooter') ?>

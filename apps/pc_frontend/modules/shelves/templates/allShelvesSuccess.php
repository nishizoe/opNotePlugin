<?php $params['menu'] = 'shelves'; ?>
<?php include_partial('noteheader', $params) ?>
  <div class="hero-unit">
    <input type="hidden" id="pageType" name="page_type" value="shelf" />
    <p>all shelves.</p>
<!--//
    メンバーのコミュニティ参加状況を取得するAPIがあるのでそれを使用して、参加コミュニティを取得する<br>
    http://houou.github.io/api.php/member_community.html<br>
    本棚ごとにどのコミュニティに所属するかを作成時と変更時に選択できる。<br>
//-->

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
      <h3>add shelf</h3>
    </div>
    <div class="modal-body">
      <form>
        <table id="shelf_form">
          <tbody id="detailBody">
            <tr>
              <th>title</th>
              <td><input type="text" id="shelf_name" name="shelf_name" value="" /></td>
            </tr>
            <tr>
              <th>description</th>
              <td><textarea id="shelf_description" name="shelf_description"></textarea></td>
            </tr>
            <tr>
              <th>tag</th>
              <td><input type="text" id="shelf_tag" name="shelf_tag" value="" /></td>
            </tr>
            <tr>
              <th>public ?</th>
              <td><input type="checkbox" id="shelf_is_public" name="shelf_is_public" value="1" /></td>
            </tr>
          </tbody>
          <tfoot>
          <tr>
            <td colspan="2" style="text-align: right;">
              <input class="btn" type="button" id="addShelfTrigger" value="create shelf" />
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
<?php include_partial('notefooter') ?>

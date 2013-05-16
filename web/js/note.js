var modalType = 0;
$(document).ready(function(){
  // notesの取得
  $.ajax({
    type: 'GET',
    url: openpne.apiBase + '/note/getnote.json',
    data:  {apiKey: openpne.apiKey},
    dataType: 'json',
    success: function(data){
      $('#noteBody > *').remove();
      $('#tmplNote').tmpl({value: data['data']}).appendTo('#noteBody');
    },
    error: function(data){
      // 何もしない
    }
  });

  $('#addNoteTrigger').on('click', function(){
    addNote();
  });

  $('#doNoteModal').on('show', function(){
    if (1 == modalType){
      $('.modal-header > h3').text('ノート追加');
      $('#addNoteTrigger').val('add note');
    }
  });
});

function showDetail(link){
  modalType = 2;
  $('.modal-header > h3').text('ノート詳細');
  $('#addNoteTrigger').val('update note');
  var id = link.id;
  var data = {};
  data['apiKey'] = openpne.apiKey;
  data['id'] = $('#' + id).attr('note-id');
  $.ajax({
    type: 'GET',
    url: openpne.apiBase + 'note/getone.json',
    data:  data,
    dataType: 'html',
    success: function(data){
      $('#detailBody > *').remove();
      $('#detailBody').html(data);
      $('#note_id').val($('#' + id).attr('note-id'));
    },
    error: function(data){
      // 何もしない
    }
  });
};

function showEmptyNote(){
  modalType = 1;
  $('.modal-header > h3').text('ノートtuika');
  $('#addNoteTrigger').val('tuika note');
  var data = {};
  data['apiKey'] = openpne.apiKey;
  $.ajax({
    type: 'GET',
    url: openpne.apiBase + 'note/emptynote.json',
    data:  data,
    dataType: 'html',
    success: function(data){
      $('#detailBody > *').remove();
      $('#detailBody').html(data);
    },
    error: function(data){
      // 何もしない
    }
  });
};

function addNote(){
  var data = {};
  data['apiKey'] = openpne.apiKey;
  data['note[note_type_id]'] = $('#note_note_type_id').val();
  data['note[title]'] = $('#note_title').val();
  data['note[is_public]'] = $('#note_is_public').val();
  data['note[tag]'] = $('#note_tag').val();
  data['note[description]'] = $('#note_description').val();
  data['note[member_id]'] = '';

  var url = '';
  if (1 == modalType){
    url = 'note/addnote.json';
  }else if (2 == modalType){
    url = 'note/updatenote.json';
    data['note[id]'] = $('#note_id').val();
  }
  $.ajax({
    type: 'POST',
    url: openpne.apiBase + url,
    data:  data,
    dataType: 'json',
    success: function(data){
      $('#noteBody > *').remove();
      $('#tmplNote').tmpl({value: data['data']}).appendTo('#noteBody');
      $('#doNoteModal').modal('hide');
    },
    error: function(data){
      // 何もしない
    }
  });
};

function deleteNote(obj){
  alert('Do you want to delete this item, really?');
  var id = obj.id;
  var data = {};
  data['apiKey'] = openpne.apiKey;
  data['id'] = $('#' + id).attr('note-id');
  $.ajax({
    type: 'POST',
    url: openpne.apiBase + 'note/deletenote.json',
    data:  data,
    dataType: 'json',
    success: function(data){
      $('#noteBody > *').remove();
      $('#tmplNote').tmpl({value: data['data']}).appendTo('#noteBody');
    },
    error: function(data){
      // 何もしない
    }
  });
};

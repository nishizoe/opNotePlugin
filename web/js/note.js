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
  var form = $('#addNoteForm')
  var url = '';
  if (1 == modalType){
    url = 'note/addnote.json';
  }

  $('#apiKey').val(openpne.apiKey);
  $.ajax({
    type: 'POST',
    url: openpne.apiBase + url,
    data:  form.serialize(),
    dataType: 'json',
    success: function(data){
      $('#noteBody > *').remove();
      $('#tmplNote').tmpl({value: data['data']}).appendTo('#noteBody');
      $('#doNoteModal').modal('hide');
    },
    error: function(data){
    }
  });
};

function deleteNote(obj){
  alert('Do you want to delete this item, really?');
  var id = obj.id;
  var data = {};
  data['apiKey'] = openpne.apiKey;
  data['id'] = $('#' + id).attr('note-id');
  data['note[member_id]'] = $('#note_member_id').val();
  data['note[_csrf_token]'] = $('#note__csrf_token').val();
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



$(function() {
  'use strict';

  $('#new_todo').focus();


  // update
  $("#todos").on('click', '.update_todo', function() {
    // id取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    $.post('_ajax.php', {
      id: id,
      mode: 'update'
    }, function(res) {
      if (res.state === '1') {
        $('#todo_' + id).find('.todo_title').addClass('done');
      } else {
        $('#todo_' + id).find('.todo_title').removeClass('done');
      }
    })
  });
  // delete
  $("#todos").on('click', '.delete_todo', function() {
    // id取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    $.post('_ajax.php', {
      id: id,
      mode: 'delete'
    }, function() {
      $('#todo_' + id).fadeOut(800);
    })
  });
  // create
  $("#new_todo_form").on('submit', function() {
    // title
    var title = $('#new_todo').val();
    // ajax処理
    $.post('_ajax.php', {
      title: title,
      mode: 'create'
    }, function(res) {
      var $li = $('todo_template').clone();
      $li
        .attr('id', 'todo_' + res.id)
        .data('id', res.id)
        .find('.todo_title').text(title);
      $('#todos').prepend($li.fadeIn());
      $('#new_todo').val('').focus();
    });
    return false;
  });
});

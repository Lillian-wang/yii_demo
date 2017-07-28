$(document).ready(function(){
  var todoForm = $('.todo-form');
  todoForm.on('submit',function(e){
    e.preventDefault();
    $.ajax({
      method: todoForm.attr('method'),
      data: todoForm.serialize(),
      dataType: 'json',
      url: todoForm.attr('action'),
      success: function(data) {
        $('.todos-list').prepend(data.newTodoHtml);
        todoForm[0].reset();
      }
    })
  });
});
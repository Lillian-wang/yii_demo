<?php
  use yii\helpers\Html;
?>
<div class="todos">
  <?= Html::beginForm($action="/index.php?r=todo%2Fupdate", 'post', $options=['class' => 'todo-form form-horizontal']); ?>
    <fieldset>
      <legend>Create a Todo Item!</legend>
      <div class="form-group">
        <label for="title" class="col-sm-2 control-label"> Title </label>
        <div class="col-sm-7">
          <input type="text" value="" id="title" name="title" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="content" class="col-sm-2 control-label"> Content </label>
        <div class="col-sm-7">
          <textarea id="content" name="content" class="form-control"></textarea>
        </div>
      </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-5">
        <button type="submit" class="btn btn-default">Create</button>
      </div>
    </div>
  </fieldset>
  <?= Html::endForm(); ?>
  
  <h1>Todo items</h1>
  <ul class="todos-list list-group">
  <?php foreach ($todos as $todo): ?>
      <?=$this->render('_todoitem.php', [
      'title' => $todo->title,
      'content' => $todo->content,
      'timestamp' => $todo->createdTime])?>
  <?php endforeach; ?>
  </ul>
</div>
<?php $this->registerJsFile('js/todo.js', ['depends' => [yii\web\JqueryAsset::className()]]); ?>
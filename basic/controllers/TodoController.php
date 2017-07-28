<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Todo;
use Yii;


class TodoController extends Controller
{
    public function actionIndex()
    {

        $query = Todo::find();
        $todos = $query->orderBy('createdTime')->all();
        return $this->render('index', [
            'todos' => $todos
        ]);
    }

    public function actionUpdate()
    {
      $request = Yii::$app->request;
      $title = $request->post('title');
      $content = $request->post('content');
      $newTodo = new Todo;
      $newTodo->title = $title;
      $newTodo->content = $content;
      $newTodo->save();
      if ($request->isAjax) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $renderedHtml = Yii::$app->controller->renderPartial('_todoitem', [
            'title' => $newTodo->title,
            'content' => $newTodo->content,
            'timestamp' => $newTodo->createdTime
          ]);
        return ['newTodoHtml' => $renderedHtml];
      } else {
        $this->redirect(array('todo/index'));
      }
    }
}
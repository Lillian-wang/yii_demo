<?php

namespace app\models;

use yii\db\ActiveRecord;

class Todo extends ActiveRecord
{
}

use app\models\Todo;

// get all rows from the toDo table and order them by "createdTime"
$todos = Todo::find()->orderBy('createdTime')->all();


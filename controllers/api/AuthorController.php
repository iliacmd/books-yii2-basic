<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 05/09/2018
 * Time: 12:19
 */

namespace app\controllers\api;

use app\models\Author;
use yii\rest\ActiveController;

class AuthorController extends ActiveController
{

    public $modelClass = Author::class;

}
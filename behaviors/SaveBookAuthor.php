<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 05/09/2018
 * Time: 15:31
 */

namespace app\behaviors;

use app\models\Author;
use Yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;

class SaveBookAuthor extends Behavior
{

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
        ];
    }

    public function afterSave($event)
    {
        $data = Yii::$app->request->post();
        if (isset($data["Book"]["authors"])) {
            $authorIds = $data["Book"]["authors"];
            $this->owner->unlinkAll('authors', true);
            if ($authorIds) {
                foreach ($authorIds as $authorId) {
                    $author = Author::findOne($authorId);
                    $this->owner->link('authors', $author);
                }
            }
        }
    }
}
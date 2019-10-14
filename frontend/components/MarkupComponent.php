<?php


namespace frontend\components;


use Yii;
use yii\base\Component;

class MarkupComponent extends Component
{

    public $asideBlocks = ['top-places', 'news', 'articles'];
    public $asidePosition = 'left';
    public $showFilters = false;

    /**
     *
     */
    public function init() {
        parent::init();

        switch (Yii::$app->controller->id.'/'.Yii::$app->controller->action->id) {
            case 'places/index':
                $this->asideBlocks = ['top-places', 'news', 'articles'];
                $this->asidePosition = 'left';
                $this->showFilters = true;
                break;
            default:
                $this->asideBlocks = ['new-places', 'top-places', 'news'];
                $this->asidePosition = 'right';
                break;
        }
    }

}

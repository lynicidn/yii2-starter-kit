<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\i18n\models\search\I18nMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'I18n Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-message-index">

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'I18n Message',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute'=>'language',
                'filter'=>\yii\helpers\ArrayHelper::map(
                        \backend\modules\i18n\models\I18nMessage::find()->select('DISTINCT `language`')->all(),
                        'language',
                        'language'
                )
            ],
            [
                'attribute'=>'category',
                'filter'=>\yii\helpers\ArrayHelper::map(
                    \backend\modules\i18n\models\I18nSourceMessage::find()->select('DISTINCT `category`')->all(),
                    'category',
                    'category'
                )
            ],
            'sourceMessage',
            'translation:ntext',
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update} {delete}'],
        ],
    ]); ?>

</div>
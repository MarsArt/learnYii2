<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Управление бизнесом',
                'brandUrl' => Url::toRoute('/MainManager'),
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Вход', 'url' => ['/MainManager']],
                    ['label' => 'Выручки', 'url' => ['/MainManager/viruchki'],
                     'items'=>[
                            ['label'=>'Выручки через SQLdataProvider', 'url'=>['/MainManager/viruchki/index',['id'=>'1']]],
                            ['label'=>'Выручки через View', 'url'=>['/MainManager/viruchki/index1']],
                        ],
                     ],
                    ['label' => 'Деньги', 'url' => ['/MainManager/dengi']],
                    ['label' => 'Товары', 'url' => ['/MainManager/tovari/index']],
                    ['label' => 'Магазины', 'url' => ['/MainManager/shop']],
                    ['label' => 'Сотрудники', 'url' => ['/MainManager/user']],
                    ['label' => 'Заявки', 'url' => ['/MainManager/zajavki']],

                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Busines <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

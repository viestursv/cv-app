<?php

use yii\helpers\Html;

$this->title = 'CV saraksts';
?>
<?php if (Yii::$app->session->hasFlash('cvDeleteSuccess')): ?>
  <div class="row justify-content-md-center">
      <div class="col">
          <div class="panel panel-default">
              <div class="alert alert-success">
                  CV ieraksts veiksmīgi izdzēsts.
              </div>
          </div>
      </div>
  </div>
<?php elseif (Yii::$app->session->hasFlash('cvDeleteError')): ?>
  <div class="row justify-content-md-center">
      <div class="col">
          <div class="panel panel-default">
              <div class="alert alert-success">
                  Kļūda dzēšot CV ierakstu.
              </div>
          </div>
      </div>
  </div>
<?php endif; ?>
<h1 class="page-title">CV Saraksts</h1>
<a class="btn btn-success page-title-button" href="/index.php?r=cv-form/create" role="button">Pievienot jaunu</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Vārds</th>
      <th scope="col">E-pasts</th>
      <th scope="col">Tālrunis</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php if (count($cv_results) === 0) { ?>
    <tr class="cv-table-row">
      <td colspan="6">CV ierakstu tabula ir tukša</td>
    </tr>
    <?php } ?>
    <?php foreach ($cv_results as $cv_result): ?>
    <tr class="cv-table-row">
      <td class="align-middle"><?= Html::encode("{$cv_result->name} {$cv_result->last_name}") ?></td>
      <td class="align-middle"><?= Html::encode("{$cv_result->e_mail}") ?></td>
      <td class="align-middle"><?= Html::encode("{$cv_result->phone}") ?></td>
      <td class="align-middle"><a class="btn btn-primary" href="/index.php?r=cv-view&id=<?=$cv_result->id?>" role="button">Skatīt</a></td>
      <td class="align-middle"><a class="btn btn-info" href="/index.php?r=cv-form/edit&id=<?=$cv_result->id?>" role="button">Rediģēt</a></td>
      <td class="align-middle"><a class="btn btn-danger" href="/index.php?r=cv-list/delete&id=<?=$cv_result->id?>" role="button">Dzēst</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

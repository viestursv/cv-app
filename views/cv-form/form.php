<?php
    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;

    if (Yii::$app->controller->action->id === 'create') {
        $this->title = 'Jauns CV';
    } else if (Yii::$app->controller->action->id === 'edit') {
        $this->title = 'Rediģēt CV';
    }
    ?>
    <div class="row justify-content-md-center">
       <div class="col-lg-5">
            <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
            <a class="btn btn-success page-title-button" href="/index.php?r=cv-list" role="button">Atpakaļ</a>
        </div>
    </div>
    <?php if(Yii::$app->session->hasFlash('cvSaveError')): ?>
    <div class="row justify-content-md-center">
       <div class="col-lg-5">
            <p><?= ($error);?></p>
       </div>
    </div>
    <?php endif; ?>
    
    <?php if (Yii::$app->session->hasFlash('cvFormSubmitted')): ?>
    <div class="row justify-content-md-center">
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="alert alert-success">
                    CV saglabāts
                </div>
                <div class="panel-body">
                    <h3>Pamatdati</h3>
                    <p><b>Vārds:</b> <?=$cv_personal_info->name?> </p>
                    <p><b>Uzvārds:</b> <?=$cv_personal_info->last_name?> </p>
                    <p><b>E-pasts:</b> <?=$cv_personal_info->e_mail?> </p>
                    <p><b>Tālrunis:</b> <?=$cv_personal_info->phone?> </p>

                    <h3>Izglītība</h3>
                    <?php foreach ($education_models as $index => $cv_education_data): ?>
                        <?php if (isset($cv_education_data->institution_name)) { ?>
                        <p><b>Izglītības iestādes nosaukums:</b> <?= Html::encode("{$cv_education_data->institution_name}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_education_data->faculty)) { ?>
                        <p><b>Fakultāte:</b> <?= Html::encode("{$cv_education_data->faculty}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_education_data->study_programme)) { ?>
                        <p><b>Studiju programma:</b> <?= Html::encode("{$cv_education_data->study_programme}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_education_data->education_level)) { ?>
                        <p><b>Izglītības līmenis:</b> <?= Html::encode("{$cv_education_data->education_level}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_education_data->status)) { ?>
                        <p><b>Statuss:</b> <?= Html::encode("{$cv_education_data->status}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_education_data->years_studied)) { ?>
                        <p><b>Mācībās pavadītais laiks:</b> <?= Html::encode("{$cv_education_data->years_studied}") ?> </p>
                        <?php } ?>
                    <?php endforeach; ?>
                    
                    <h3>Darba pieredze</h3>
                    <?php foreach ($employment_models as $index => $cv_employment_history): ?>
                        <?php if (isset($cv_employment_history->company_name)) { ?>
                        <p><b>Darba vietas nosaukums:</b> <?= Html::encode("{$cv_employment_history->company_name}") ?></td> </p>
                        <?php } ?>
                        <?php if (isset($cv_employment_history->position)) { ?>
                        <p><b>Ieņemamais amats:</b> <?= Html::encode("{$cv_employment_history->position}") ?></td> </p>
                        <?php } ?>
                        <?php if (isset($cv_employment_history->employment_type)) { ?>
                        <p><b>Slodzes apmērs:</b> <?= Html::encode("{$cv_employment_history->employment_type}") ?></td> </p>
                        <?php } ?>
                        <?php if (isset($cv_employment_history->years_worked)) { ?>
                        <p><b>Darba stāžs:</b> <?= Html::encode("{$cv_employment_history->years_worked}") ?></td> </p>
                        <?php } ?>
                    <?php endforeach; ?>
                    

                    <h3>Prasmes un sasniegumi</h3>
                    <?php foreach ($skills_and_achievemements_models as $index => $cv_skills_and_achievements): ?>
                        <?php if (isset($cv_skills_and_achievements->description)) { ?>
                        <p><b>Prasmju aprkasts:</b> <?= Html::encode("{$cv_skills_and_achievements->description}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_skills_and_achievements->type)) { ?>
                        <p><b>Veids:</b> <?= str_replace("_"," ",$cv_skills_and_achievements->type); ?> </p>
                        <?php } ?>
                    <?php endforeach; ?>
                    

                    <h3>Adreses</h3>
                    <?php foreach ($address_models as $index => $cv_address): ?>
                        <?php if (isset($cv_address->country)) { ?>
                        <p><b>Valsts:</b> <?= Html::encode("{$cv_address->country}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_address->city)) { ?>
                        <p><b>Pilsēta:</b> <?= Html::encode("{$cv_address->city}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_address->street)) { ?>
                        <p><b>Iela:</b> <?= Html::encode("{$cv_address->street}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_address->number)) { ?>
                        <p><b>Numurs:</b> <?= Html::encode("{$cv_address->number}") ?> </p>
                        <?php } ?>
                        <?php if (isset($cv_address->zip_code)) { ?>
                        <p><b>Pasta indekss:</b> <?= Html::encode("{$cv_address->zip_code}") ?> </p>
                        <?php } ?>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="row justify-content-md-center">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'cv-form']); ?>

                <!-- Personal Info -->
                <h3>Pamatdati</h3>
                <?= $form->field($cv_personal_info, 'name') ?>
                <?= $form->field($cv_personal_info, 'last_name') ?>
                <?= $form->field($cv_personal_info, 'e_mail') ?>
                <?= $form->field($cv_personal_info, 'phone') ?>

                <!-- Education Data -->
                <h3>Izglītība</h3>
                <?php foreach ($education_models as $index => $cv_education_data): ?>
                <p>#<?=$index+1?></p>
                <?= $form->field($cv_education_data, '['.$index.']institution_name') ?>
                <?= $form->field($cv_education_data, '['.$index.']faculty') ?>
                <?= $form->field($cv_education_data, '['.$index.']study_programme') ?>
                <?= $form->field($cv_education_data, '['.$index.']education_level') ?>
                <?= $form->field($cv_education_data, '['.$index.']status')->dropDownList(
                    ['PABEIGTAS' => 'Pabeigtas', 'PĀRTRAUKTAS' => 'Pārtrauktas', 'MĀCĀS' => 'Mācās'],
                    ['prompt'=>'Izvēlēties statusu']
                ); ?>
                <?= $form->field($cv_education_data, '['.$index.']years_studied') ?>
                <?php endforeach; ?>

                <!-- Employmeny History -->
                <h3>Darba pieredze</h3>
                <?php foreach ($employment_models as $index => $cv_employment_history): ?>
                <p>#<?=$index+1?></p>
                <?= $form->field($cv_employment_history, '['.$index.']company_name') ?>
                <?= $form->field($cv_employment_history, '['.$index.']position') ?>
                <?= $form->field($cv_employment_history, '['.$index.']employment_type') ?>
                <?= $form->field($cv_employment_history, '['.$index.']years_worked') ?>
                <?php endforeach; ?>
                
                <!-- Skills and achievements -->
                <h3>Prasmes un sasniegumi</h3>
                <?php foreach ($skills_and_achievemements_models as $index => $cv_skills_and_achievements): ?>
                <p>#<?=$index+1?></p>
                <?= $form->field($cv_skills_and_achievements, '['.$index.']description') ?>
                <?= $form->field($cv_skills_and_achievements, '['.$index.']type')->dropDownList(
                    ['PAMATDARBS' => 'Pamatdarbs', 'SASNIEGUMS' => 'Sasniegums', 'PAPILDUS_PRASME' => 'Papildu prasme'],
                    ['prompt'=>'Izvēlēties statusu']
                ); ?>
                <?php endforeach; ?>
                
                <!-- Address -->
                <h3>Adreses</h3>
                <?php foreach ($address_models as $index => $cv_address): ?>
                <p>#<?=$index+1?></p>
                <?= $form->field($cv_address, '['.$index.']country') ?>
                <?= $form->field($cv_address, '['.$index.']city') ?>
                <?= $form->field($cv_address, '['.$index.']street') ?>
                <?= $form->field($cv_address, '['.$index.']number') ?>
                <?= $form->field($cv_address, '['.$index.']zip_code') ?>
                <?php endforeach; ?>

                <div class="form-group">
                    <?= Html::submitButton('Iesniegt', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php endif; ?>
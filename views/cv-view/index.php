<?php
use yii\helpers\Html;

$this->title = 'CV skats';
?>

<div class="row justify-content-md-center">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <h1 class="mb-3 page-title"><?= Html::encode("{$selected_cv->name} {$selected_cv->last_name} CV") ?></h1>
            <a class="btn btn-success page-title-button" href="/index.php?r=cv-list" role="button">Atpakaļ</a>
            <div class="panel-body">

                <h3 class="mb-3 mt-4">Pamatdati</h3>
                <p><b>Vārds:</b> <?= Html::encode("{$selected_cv->name}") ?></td> </p>
                <p><b>Uzvārds:</b> <?= Html::encode("{$selected_cv->last_name}") ?></td> </p>
                <p><b>E-pasts:</b> <?= Html::encode("{$selected_cv->e_mail}") ?></td> </p>
                <p><b>Tālrunis:</b> <?= Html::encode("{$selected_cv->phone}") ?></td> </p>
                
                <h3 class="mb-3 mt-4">Izglītība</h3>
                <?php foreach ($selected_cv->cvEducationData as $index => $cv_education_data): ?>
                    <p>#<?=$index+1?></p>
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
                

                <h3 class="mb-3 mt-4">Darba pieredze</h3>
                <?php foreach ($selected_cv->cvEmploymentHistory as $index => $cv_employment_history): ?>
                    <p>#<?=$index+1?></p>
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
                    <div class="divider-<?=$index?>"></div>
                <?php endforeach; ?>
                

                <h3 class="mb-3 mt-4">Papildu prasmes</h3>
                <?php foreach ($selected_cv->cvSkillsAndAchievements as $index => $cv_skills_and_achievements): ?>
                    <p>#<?=$index+1?></p>
                    <?php if (isset($cv_skills_and_achievements->description)) { ?>
                    <p><b>Prasmju aprkasts:</b> <?= Html::encode("{$cv_skills_and_achievements->description}") ?> </p>
                    <?php } ?>
                    <?php if (isset($cv_skills_and_achievements->type)) { ?>
                    <p><b>Veids:</b> <?= str_replace("_"," ",$cv_skills_and_achievements->type); ?> </p>
                    <?php } ?>
                <?php endforeach; ?>

                <h3 class="mb-3 mt-4">Adrese</h3>
                <?php foreach ($selected_cv->cvAddress as $index => $cv_address): ?>
                    <p>#<?=$index+1?></p>
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
    
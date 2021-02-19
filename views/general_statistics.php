<?php

defined('C5_EXECUTE') or die('Access Denied.');

/** @var int $totalUsers */
/** @var int $totalActive */
/** @var int $totalInactive */
/** @var int $totalValidated */
/** @var int $totalNotValidated  */
/** @var int $totalGroups  */
/** @var int $totalGroupSets  */
?>

<div class="row table-container">
    <div class="col-sm-12 col-lg-6">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr><td style="width: 180px;"><?php echo t('Users') ?>:</td><td><?php echo $totalUsers ?></td></tr>
                <tr><td><?php echo t('Users Active') ?>:</td><td><?php echo $totalActive ?></td></tr>
                <tr><td><?php echo t('Users Inactive') ?>:</td><td><?php echo $totalInactive ?></td></tr>
                <tr><td><?php echo t('Users Validated') ?>:</td><td><?php echo $totalValidated ?></td></tr>
                <tr><td><?php echo t('Users not Validated') ?>:</td><td><?php echo $totalNotValidated ?></td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12 col-lg-6">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr><td style="width: 180px;"><?php  echo t('Groups') ?>:</td><td><?php echo $totalGroups ?></td></tr>
                <tr><td><?php echo t('Group Sets') ?>:</td><td><?php echo $totalGroupSets ?></td></tr>
            </tbody>
        </table>
    </div>
</div>

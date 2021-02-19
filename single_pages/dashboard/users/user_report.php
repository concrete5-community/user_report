<?php

defined('C5_EXECUTE') or die('Access Denied.');

// Charts
/** @var string $usersCreatedChart */
/** @var string $usersActivityChart */

// Other statistics
/** @var string $generalStatistics */
/** @var string $userGroups */
/** @var string $userLocales */
/** @var string $usersLastOnline */
?>

<div class="ccm-dashboard-content-inner">
    <?php
    echo $generalStatistics;
    ?>

    <div class="charts-container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <?php
                echo $usersCreatedChart;
                ?>

                <header>
                    <?php
                    echo t('Number of users created over time');
                    ?>
                </header>
            </div>
            <div class="col-sm-12 col-lg-6">
                <?php
                echo $usersActivityChart;
                ?>
            </div>
        </div>
    </div>

    <div class="row table-container">
        <div class="col-sm-12 col-lg-6">
            <?php echo $userGroups; ?>
        </div>
        <div class="col-sm-12 col-lg-6">
            <?php echo $userLocales; ?>
        </div>
    </div>

    <hr>

    <div class="row table-container">
        <div class="col-sm-12 col-lg-6">
            <?php echo $usersLastOnline; ?>
        </div>
    </div>
</div>


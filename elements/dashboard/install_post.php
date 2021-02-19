<?php

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\Support\Facade\Url;
?>
<p><?php echo t('Congratulations, the add-on has been installed!'); ?></p>
<br>

<p>
    <a class="btn btn-default" href="<?php echo Url::to('/dashboard/users/user_report') ?>">
        <?php
        echo t('Go to Dashboard / Users / User Report');
        ?>
    </a>
</p>

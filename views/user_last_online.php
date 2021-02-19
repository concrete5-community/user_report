<?php

defined('C5_EXECUTE') or die('Access Denied.');

/** @var \Concrete\Core\Localization\Service\Date[] $dh */
/** @var \A3020\UserReport\Result\UserLastOnlineResult[] $users */
?>

<table class="table table-striped table-bordered" id="tbl-user-last-online">
    <thead>
        <tr>
            <th>
                <?php echo t('User') ?>
                <?php
                if (count($users) === 100) {
                    echo ' <small class="text-muted">('.t('limited to %d', 100).')</small>';
                }
                ?>
            </th>
            <th style="width: 180px"><?php  echo t('Last Online') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td>
                    <?php
                    echo '<a target="_blank" href="'.$user->getLink().'">'.e($user->getName()).' ('.e($user->getEmail()).')</a>';
                    ?>
                </td>
                <td>
                    <?php
                    echo $dh->formatDateTime($user->getDate());
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tbl-user-last-online').DataTable({
            searching: false,
            lengthChange: false,
            info: false,
            order: [],
            <?php echo count($users) > 10 ? '' : 'paging: false,'; ?>
            dom: 'rtp'
        });
    })
</script>

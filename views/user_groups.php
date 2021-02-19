<?php

defined('C5_EXECUTE') or die('Access Denied.');

/** @var \A3020\UserReport\Result\UserGroupResult[] $groups */
?>

<table class="table table-striped table-bordered" id="tbl-user-groups">
    <thead>
        <tr>
            <th><?php echo t('User Group') ?></th>
            <th style="width: 180px"><?php  echo t('Users') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($groups as $group) {
            ?>
            <tr>
                <td>
                    <?php
                    echo '<a target="_blank" href="'.$group->getLink().'">'.e($group->getName()).'</a>';
                    ?>
                </td>
                <td><?php echo $group->getNumberOfUsers() ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tbl-user-groups').DataTable({
            searching: false,
            lengthChange: false,
            info: false,
            order: [],
            <?php echo count($groups) > 10 ? '' : 'paging: false,'; ?>
            dom: 'rtp'
        });
    })
</script>

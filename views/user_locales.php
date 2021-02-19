<?php

defined('C5_EXECUTE') or die('Access Denied.');

/** @var \A3020\UserReport\Result\UserLocaleResult[] $locales */
?>

<table class="table table-striped table-bordered" id="tbl-user-locales">
    <thead>
        <tr>
            <th><?php echo t('Locale') ?></th>
            <th style="width: 180px"><?php  echo t('Users') ?></th>
        </tr>
        </thead>
    <tbody>
        <?php
        foreach ($locales as $locale) {
            ?>
            <tr>
                <td>
                    <?php
                    echo $locale->getLocale();
                    ?>
                </td>
                <td><?php echo $locale->getNumberOfUsers() ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tbl-user-locales').DataTable({
            searching: false,
            lengthChange: false,
            info: false,
            order: [],
            <?php echo count($locales) > 10 ? '' : 'paging: false,'; ?>
            dom: 'rtp'
        });
    })
</script>

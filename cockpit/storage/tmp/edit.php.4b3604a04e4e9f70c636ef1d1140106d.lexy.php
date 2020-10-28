<div>
    <ul class="uk-breadcrumb">
        <li><a href="<?php $app->route('/settings'); ?>"><?php echo $app("i18n")->get('Settings'); ?></a></li>
        <li class="uk-active"><span><?php echo $app("i18n")->get('System Settings'); ?></span></li>
    </ul>
</div>


<div class="uk-margin-top" riot-view>

    <?php if  ($configexists) { ?>

        <?php if  (!is_writable($configexists)) { ?>
        <div class="uk-alert uk-alert-danger">
            <?php echo $app("i18n")->get('Custom config file is not writable'); ?>.
        </div>
        <?php } ?>

        <picoedit path="<?php echo  str_replace(COCKPIT_SITE_DIR.'/', '', $configexists) ; ?>" height="auto" readonly="{ <?php echo  !is_writable($configexists) ? 'true':'false'; ?> }"></picoedit>


    <?php } else { ?>
    <div class="uk-alert">
        <?php echo $app("i18n")->get('Custom config file does not exist'); ?>.
        <a class="uk-button uk-button-link" href="<?php $app->route('/settings/edit/true'); ?>"><i class="uk-icon-magic"></i> <?php echo $app("i18n")->get('Create config file'); ?></a>
    </div>
    <?php } ?>

</div>


<style>

    picoedit .CodeMirror {
        height: auto;
    }

</style>

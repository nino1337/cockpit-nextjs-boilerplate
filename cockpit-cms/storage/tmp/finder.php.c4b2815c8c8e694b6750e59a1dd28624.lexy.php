<div>
    <ul class="uk-breadcrumb">
        <li class="uk-active"><span><?php echo $app("i18n")->get('Finder'); ?></span></li>
    </ul>
</div>

<div riot-view>
    <cp-finder root="<?php echo  $app->module("cockpit")->getGroupVar("media.path", '/') ; ?>"></cp-finder>
</div>

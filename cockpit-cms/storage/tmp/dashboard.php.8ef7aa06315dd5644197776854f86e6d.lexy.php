<div>

    <div class="uk-panel-box uk-panel-card">

        <div class="uk-panel-box-header uk-flex uk-flex-middle">
            <strong class="uk-panel-box-header-title uk-flex-item-1">
                <?php echo $app("i18n")->get('Forms'); ?>

                <?php if ($app->module("cockpit")->hasaccess('forms', 'create')) { ?>
                <a href="<?php $app->route('/forms/form'); ?>" class="uk-icon-plus uk-margin-small-left" title="<?php echo $app("i18n")->get('Create Form'); ?>" data-uk-tooltip></a>
                <?php } ?>
            </strong>

            <?php if (count($forms)) { ?>
            <span class="uk-badge uk-flex uk-flex-middle"><span><?php echo  count($forms) ; ?></span></span>
            <?php } ?>
        </div>

        <?php if (count($forms)) { ?>

            <div class="uk-margin">

                <ul class="uk-list uk-list-space uk-margin-top">
                    <?php foreach (array_slice($forms, 0, count($forms) > 5 ? 5: count($forms)) as $form) { ?>
                    <li class="uk-text-truncate">
                        <a class="uk-link-muted" href="<?php $app->route('/forms/entries/'.$form['name']); ?>">

                            <img class="uk-margin-small-right uk-svg-adjust" src="<?php echo $app->pathToUrl(isset($form['icon']) && $form['icon'] ? 'assets:app/media/icons/'.$form['icon']:'forms:icon.svg'); ?>" width="18px" alt="icon" data-uk-svg>

                            <?php echo  htmlspecialchars(@$form['label'] ? $form['label'] : $form['name'], ENT_QUOTES, 'UTF-8') ; ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>

            </div>

            <?php if (count($forms) > 5) { ?>
            <div class="uk-panel-box-footer uk-text-center">
                <a class="uk-button uk-button-small uk-button-link" href="<?php $app->route('/forms'); ?>"><?php echo $app("i18n")->get('Show all'); ?></a>
            </div>
            <?php } ?>

        <?php } else { ?>

            <div class="uk-margin uk-text-center uk-text-muted">

                <p>
                    <img src="<?php echo $app->pathToUrl('forms:icon.svg'); ?>" width="30" height="30" alt="Forms" data-uk-svg />
                </p>

                <?php echo $app("i18n")->get('No forms'); ?>

            </div>

        <?php } ?>

    </div>

</div>

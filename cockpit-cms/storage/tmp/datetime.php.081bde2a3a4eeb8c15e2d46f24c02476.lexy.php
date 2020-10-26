<div>

    <div class="uk-panel-box uk-panel-card date-time-widget">

        <?php
            $i18ndata = $app->helper('i18n')->data($app("i18n")->locale);
            $weekdays = $i18ndata['@meta']['date']['shortdays'] ?? ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            $weekday  = date('N') + 0;
            $uid      = uniqid('weekdays');
        ?>

        <style type="text/css">

            .date-widget-weekdays span {
                margin-right: 5px;
            }
            .date-widget-weekdays span.active {
                color: #000;
                font-weight: bold;
            }

        </style>

        <div class="uk-panel-box-header">
            <strong class="uk-h3 uk-text-uppercase"><?php echo  date('d. M Y') ; ?></strong>
        </div>

        <div id="<?php echo  $uid ; ?>" class="uk-grid">

            <div class="uk-width-medium-1-1">

                <div ref="weekdays" class="uk-text-small uk-text-muted uk-margin uk-text-uppercase date-widget-weekdays uk-margin">
                    <span class="<?php echo  $weekday == 1 ? 'active' : '' ; ?>"><?php echo  $weekdays[0] ; ?></span>
                    <span class="<?php echo  $weekday == 2 ? 'active' : '' ; ?>"><?php echo  $weekdays[1] ; ?></span>
                    <span class="<?php echo  $weekday == 3 ? 'active' : '' ; ?>"><?php echo  $weekdays[2] ; ?></span>
                    <span class="<?php echo  $weekday == 4 ? 'active' : '' ; ?>"><?php echo  $weekdays[3] ; ?></span>
                    <span class="<?php echo  $weekday == 5 ? 'active' : '' ; ?>"><?php echo  $weekdays[4] ; ?></span>
                    <span class="<?php echo  $weekday == 6 ? 'active' : '' ; ?>"><?php echo  $weekdays[5] ; ?></span>
                    <span class="<?php echo  $weekday == 7 ? 'active' : '' ; ?>"><?php echo  $weekdays[6] ; ?></span>
                </div>

            </div>
        </div>

    </div>
</div>

<div>
    <ul class="uk-breadcrumb">
        <li><a href="<?php $app->route('/lokalize'); ?>"><?php echo $app("i18n")->get('Lokalize'); ?></a></li>
        <li class="uk-active"><span><?php echo $app("i18n")->get('Project'); ?></span></li>
    </ul>
</div>

<div riot-view>

    <form class="uk-form uk-width-medium-1-2 uk-container-center" onsubmit="{ submit }">

        <div class="uk-panel uk-panel-space uk-panel-box uk-panel-card">

           <span class="uk-badge"><?php echo $app("i18n")->get('General'); ?></span>

           <div class="uk-margin">
               <label class="uk-text-small"><?php echo $app("i18n")->get('Name'); ?></label>
               <input class="uk-width-1-1 uk-form-large" type="text" ref="name" bind="project.name" required>
           </div>

           <div class="uk-margin">
               <label class="uk-text-small"><?php echo $app("i18n")->get('Color'); ?></label>
               <div class="uk-margin-small-top">
                   <field-colortag bind="project.color" title="<?php echo $app("i18n")->get('Color'); ?>" size="20px"></field-colortag>
               </div>
           </div>

           <div class="uk-margin">
               <label class="uk-text-small"><?php echo $app("i18n")->get('Description'); ?></label>
               <textarea class="uk-width-1-1 uk-form-large" name="description" bind="project.info" bind-event="input" rows="5"></textarea>
           </div>

           <div class="uk-margin">
               <label class="uk-text-small"><?php echo $app("i18n")->get('Default Language'); ?></label>
               <div class="uk-margin-small-top">
                   <select class="uk-select uk-width-1-1" bind="project.lang">
                       <?php foreach ($app->module('lokalize')->languages() as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                       <?php } ?>
                   </select>
               </div>
           </div>

       </div>


        <div class="uk-margin-large-top" show="{ project.name }">

            <div class="uk-button-group uk-margin-right">
                <button class="uk-button uk-button-large uk-button-primary"><?php echo $app("i18n")->get('Save'); ?></button>
                <a class="uk-button uk-button-large" href="<?php $app->route('/lokalize/project'); ?>/{ project._id }" if="{ project._id }"><i class="uk-icon-list"></i> <?php echo $app("i18n")->get('Manage keys'); ?></a>
            </div>

            <a href="<?php $app->route('/lokalize'); ?>">
                <span show="{ !project._id }"><?php echo $app("i18n")->get('Cancel'); ?></span>
                <span show="{ project._id }"><?php echo $app("i18n")->get('Close'); ?></span>
            </a>
        </div>


    </form>



    <script type="view/script">

        var $this = this;

        this.mixin(RiotBindMixin);

        this.project = <?php echo  json_encode($project) ; ?>;
        this.aclgroups = <?php echo  json_encode($aclgroups) ; ?>;

        this.on('mount', function(){

            this.trigger('update');

            // bind clobal command + save
            Mousetrap.bindGlobal(['command+s', 'ctrl+s'], function(e) {

                e.preventDefault();
                $this.submit();
                return false;
            });
        });


        submit(e) {

            if (e) e.preventDefault();

            App.request('/lokalize/save_project', {project: this.project}).then(function(project) {

                App.ui.notify("Saving successful", "success");
                $this.project = project;
                $this.update();

            }).catch(function() {
                App.ui.notify("Saving failed.", "danger");
            });
        }

    </script>
</div>

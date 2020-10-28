
<style>
<?php if ($collection['color']) { ?>
.app-header { border-top: 8px <?php echo  $collection['color'] ; ?> solid; }
<?php } ?>
</style>

<script>

function CollectionHasFieldAccess(field) {

    var acl = field.acl || [];

    if (field.name == '_modified' ||
        App.$data.user.group == 'admin' ||
        !acl ||
        (Array.isArray(acl) && !acl.length) ||
        acl.indexOf(App.$data.user.group) > -1 ||
        acl.indexOf(App.$data.user._id) > -1
    ) { return true; }

    return false;
}

</script>


<script type="riot/tag" src="<?php $app->base('collections:assets/entries-batchedit.tag'); ?>"></script>

<div>

    <ul class="uk-breadcrumb">
        <li><a href="<?php $app->route('/collections'); ?>"><?php echo $app("i18n")->get('Collections'); ?></a></li>
        <li class="uk-active" data-uk-dropdown="mode:'hover', delay:300">

            <a><i class="uk-icon-bars"></i> <?php echo  htmlspecialchars(@$collection['label'] ? $collection['label']:$collection['name'], ENT_QUOTES, 'UTF-8') ; ?></a>

            <?php if ($app->module('collections')->hasaccess($collection['name'], 'collection_edit')) { ?>
            <div class="uk-dropdown">
                <ul class="uk-nav uk-nav-dropdown">
                    <li class="uk-nav-header"><?php echo $app("i18n")->get('Actions'); ?></li>
                    <li><a href="<?php $app->route('/collections/collection/'.$collection['name']); ?>"><?php echo $app("i18n")->get('Edit'); ?></a></li>
                    <?php if ($app->module('collections')->hasaccess($collection['name'], 'entries_delete')) { ?>
                    <li class="uk-nav-divider"></li>
                    <li><a href="<?php $app->route('/collections/trash/collection/'.$collection['name']); ?>"><?php echo $app("i18n")->get('Trash'); ?></a></li>
                    <?php } ?>
                    <li class="uk-nav-divider"></li>
                    <li class="uk-text-truncate"><a href="<?php $app->route('/collections/export/'.$collection['name']); ?>" download="<?php echo  $collection['name'] ; ?>.collection.json"><?php echo $app("i18n")->get('Export entries'); ?></a></li>
                    <li class="uk-text-truncate"><a href="<?php $app->route('/collections/import/collection/'.$collection['name']); ?>"><?php echo $app("i18n")->get('Import entries'); ?></a></li>
                </ul>
            </div>
            <?php } ?>

        </li>
    </ul>

</div>

<?php echo $app->view('collections:views/partials/entries'.($collection['sortable'] ? '.sortable':'').'.php', compact('collection')); ?>

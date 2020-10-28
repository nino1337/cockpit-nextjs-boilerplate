<script type="riot/tag" src="<?php $app->base('collections:assets/collection-entrypreview.tag'); ?>?nc=<?php echo  $app['debug'] ? time() : $app['cockpit/version'] ; ?>"></script>
<script type="riot/tag" src="<?php $app->base('collections:assets/collection-linked.tag'); ?>?nc=<?php echo  $app['debug'] ? time() : $app['cockpit/version'] ; ?>"></script>

<style>
    <?php if (isset($collection['color']) && $collection['color']) { ?> 

    .app-header {
        border-top: 8px <?=$collection['color']?> solid;
    }

    <?php } ?>
</style>

<script>
    window.__collectionEntry = <?=json_encode($entry)?>;
    window.__collection = <?=json_encode($collection)?>;
</script>

<div riot-view>

    <div class="header-sub-panel">

        <div class="uk-container uk-container-center">

            <ul class="uk-breadcrumb">
                <li><a href="<?php $app->route('/collections'); ?>"><?php echo $app("i18n")->get('Collections'); ?></a></li>
                <li data-uk-dropdown="mode:'hover', delay:300">
                    <a href="<?php $app->route('/collections/entries/'.$collection['name']); ?>"><i class="uk-icon-bars"></i> <?php echo  htmlspecialchars(@$collection['label'] ? $collection['label']:$collection['name'], ENT_QUOTES, 'UTF-8') ; ?></a>

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

            <div class="uk-flex uk-flex-middle uk-text-bold uk-h3">
                <div class="uk-margin-small-right">
                    <img src="<?php echo $app->pathToUrl($collection['icon'] ? 'assets:app/media/icons/'.$collection['icon']:'collections:icon.svg'); ?>" width="40" alt="icon">
                </div>
                <div class="uk-margin-right">{ App.i18n.get(entry._id ? 'Edit Entry':'Add Entry') }</div>
                <div class="uk-flex-item-1"></div>
            </div>
        </div>

        <ul class="uk-tab header-sub-panel-tab uk-flex uk-flex-center" divider="true" if="{ App.Utils.count(_groups) > 1 && App.Utils.count(_groups) < 6 }">
            <li class="{ !group && 'uk-active'}"><a class="uk-text-capitalize" onclick="{ toggleGroup }">{ App.i18n.get('All') }</a></li>
            <li class="{ group==parent.group && 'uk-active'}" each="{group, idx in _groups}" show="{ parent.groups[group].length }"><a class="uk-text-capitalize" onclick="{ toggleGroup }">{ App.i18n.get(group) }</a></li>
        </ul>

        <ul class="uk-tab header-sub-panel-tab uk-flex uk-flex-center" divider="true" if="{ App.Utils.count(_groups) > 5 }">
            <li class="uk-active" data-uk-dropdown="mode:'click', pos:'bottom-center'">
                <a>{ App.i18n.get(group || 'All') } <i class="uk-margin-small-left uk-icon-angle-down"></i></a>
                <div class="uk-dropdown uk-dropdown-scrollable uk-dropdown-close">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li class="uk-nav-header"><?php echo $app("i18n")->get('Groups'); ?></li>
                        <li class="{ !group && 'uk-active'}"><a class="uk-text-capitalize" onclick="{ toggleGroup }">{ App.i18n.get('All') }</a></li>
                        <li class="uk-nav-divider"></li>
                        <li class="{ group==parent.group && 'uk-active'}" each="{group in _groups}" show="{ parent.groups[group].length }"><a class="uk-text-capitalize" onclick="{ toggleGroup }">{ App.i18n.get(group) }</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>

    <div class="uk-alert" if="{ !fields.length }">
        <?php echo $app("i18n")->get('No fields defined'); ?>. <a href="<?php $app->route('/collections/collection'); ?>/{ collection.name }"><?php echo $app("i18n")->get('Define collection fields'); ?>.</a>
    </div>

    <div class="uk-grid">

        <div class="uk-grid-margin uk-width-medium-3-4 uk-width-large-4-5">

            <form class="uk-form" if="{ fields.length }" onsubmit="{ submit }">

                <div class="uk-grid uk-grid-match uk-grid-gutter" if="{ !preview }">

                    <div class="uk-width-medium-{field.width}" each="{field,idx in fields}" show="{checkVisibilityRule(field) && (!group || (group == field.group)) }" if="{ hasFieldAccess(field.name) }" no-reorder>

                        <cp-fieldcontainer>

                            <label title="{ field.name }">

                                <span class="uk-text-bold"><i class="uk-icon-pencil-square uk-margin-small-right"></i> { field.label || App.Utils.ucfirst(field.name) }</span>
                                <span class="uk-text-muted" show="{field.required}">&mdash; <?php echo $app("i18n")->get('required'); ?></span>

                                <span if="{ field.localize }" data-uk-dropdown="mode:'click'">
                                    <a class="uk-icon-globe" title="<?php echo $app("i18n")->get('Localized field'); ?>" data-uk-tooltip="pos:'right'"></a>
                                    <div class="uk-dropdown uk-dropdown-close">
                                        <ul class="uk-nav uk-nav-dropdown">
                                            <li class="uk-nav-header"><?php echo $app("i18n")->get('Copy content from:'); ?></li>
                                            <li show="{parent.lang}"><a onclick="{parent.copyLocalizedValue}" lang="" field="{field.name}">{App.$data.languageDefaultLabel}</a></li>
                                            <li show="{parent.lang != language.code}" each="{language,idx in languages}" value="{language.code}"><a onclick="{parent.parent.copyLocalizedValue}" lang="{language.code}" field="{field.name}">{language.label}</a></li>
                                        </ul>
                                    </div>
                                </span>

                            </label>

                            <div class="uk-margin-top">
                                <cp-field type="{field.type || 'text'}" bind="entry.{ field.localize && parent.lang ? (field.name+'_'+parent.lang):field.name }" opts="{ field.options || {} }" required="{ field.required || false }"></cp-field>
                            </div>

                            <div class="uk-margin-top uk-text-small uk-text-muted" if="{field.info}">
                                { field.info || ' ' }
                            </div>

                        </cp-fieldcontainer>

                    </div>

                </div>

                <cp-actionbar>
                    <div class="uk-container uk-container-center">
                        <button class="uk-button uk-button-large uk-button-primary"><?php echo $app("i18n")->get('Save'); ?></button>
                        <a class="uk-button uk-button-link" href="<?php $app->route('/collections/entries/'.$collection['name']); ?>">
                            <span show="{ !entry._id }"><?php echo $app("i18n")->get('Cancel'); ?></span>
                            <span show="{ entry._id }"><?php echo $app("i18n")->get('Close'); ?></span>
                        </a>
                    </div>
                </cp-actionbar>

            </form>

        </div>

        <div class="uk-grid-margin uk-width-medium-1-4  uk-width-large-1-5 uk-flex-order-first uk-flex-order-last-medium">

            <div class="uk-button-group uk-flex uk-margin" if="{entry._id}">
                <a class="uk-button" onclick="{showPreview}" if="{ collection.contentpreview && collection.contentpreview.enabled }"><?php echo $app("i18n")->get('Preview'); ?></a>
                <a class="uk-button" onclick="{showLinkedOverview}"><?php echo $app("i18n")->get('Linked'); ?></a>
                <?php if ($app->module('cockpit')->isSuperAdmin()) { ?>
                <a class="uk-button" onclick="{showEntryObject}"><?php echo $app("i18n")->get('Json'); ?></a>
                <?php } ?>
            </div>

            <div class="uk-panel uk-panel-box uk-panel-framed uk-width-1-1 uk-form-select uk-form" if="{ languages.length }">

                <div class="uk-text-bold {lang ? 'uk-text-primary' : 'uk-text-muted'}">
                    <i class="uk-icon-globe"></i>
                    <span class="uk-margin-small-left">{ lang ? _.find(languages,{code:lang}).label:App.$data.languageDefaultLabel }</span>
                </div>

                <select bind="lang" onchange="{persistLanguage}">
                    <option value="">{App.$data.languageDefaultLabel}</option>
                    <option each="{language,idx in languages}" value="{language.code}">{language.label}</option>
                </select>
            </div>

            <div class="uk-margin">
                <label class="uk-text-small"><?php echo $app("i18n")->get('Last Modified'); ?></label>
                <div class="uk-margin-small-top uk-text-muted" if="{entry._id}">
                    <i class="uk-icon-calendar uk-margin-small-right"></i> { App.Utils.dateformat( new Date( 1000 * entry._modified )) }
                </div>
                <div class="uk-margin-small-top uk-text-muted" if="{!entry._id}"><?php echo $app("i18n")->get('Not saved yet'); ?></div>
            </div>

            <div class="uk-margin" if="{entry._id}">
                <label class="uk-text-small"><?php echo $app("i18n")->get('Revisions'); ?></label>
                <div class="uk-margin-small-top">
                    <span class="uk-position-relative">
                        <cp-revisions-info class="uk-badge uk-text-large" rid="{entry._id}"></cp-revisions-info>
                        <a class="uk-position-cover" href="<?php $app->route('/collections/revisions/'.$collection['name']); ?>/{entry._id}"></a>
                    </span>
                </div>
            </div>

            <div class="uk-margin" if="{entry._id && entry._mby}">
                <label class="uk-text-small"><?php echo $app("i18n")->get('Last update by'); ?></label>
                <div class="uk-margin-small-top">
                    <cp-account account="{entry._mby}"></cp-account>
                </div>
            </div>

            <?php $app->trigger('collections.entry.aside', [$collection['name']]); ?>

        </div>

    </div>

    <collection-entrypreview collection="{collection}" entry="{entry}" groups="{ groups }" fields="{ fields }" fieldsidx="{ fieldsidx }" excludeFields="{ excludeFields }" languages="{ languages }" lang="{ lang }" settings="{ collection.contentpreview }" if="{ preview }"></collection-entrypreview>
    <cp-inspectobject ref="inspect"></cp-inspectobject>
    <collection-linked ref="entrylinked"></collection-linked>

    <script type="view/script">

        var $this = this;

        this.mixin(RiotBindMixin);

        this.collection   = window.__collection;
        this.fields       = this.collection.fields;
        this.fieldsidx    = {};
        this.excludeFields = <?php echo  json_encode($excludeFields) ; ?>;

        this.entry        = window.__collectionEntry;

        this.languages    = App.$data.languages;
        this.groups       = {Main:[]};
        this.group        = '';

        if (this.languages.length) {
            this.lang = App.session.get('collections.entry.'+this.collection._id+'.lang', '');
        }

        // fill with default values
        this.fields.forEach(function(field) {

            $this.fieldsidx[field.name] = field;

            if ($this.entry[field.name] === undefined) {
                $this.entry[field.name] = field.options && field.options.default || null;
            }

            if (field.localize && $this.languages.length) {

                $this.languages.forEach(function(lang) {

                    var key = field.name+'_'+lang.code;

                    if ($this.entry[key] === undefined) {

                        if (field.options && field.options['default_'+lang.code] === null) {
                            return;
                        }

                        $this.entry[key] = field.options && field.options.default || null;
                        $this.entry[key] = field.options && field.options['default_'+lang.code] || $this.entry[key];
                    }
                });
            }

            if (field.type == 'password') {
                $this.entry[field.name] = '';
            }

            if ($this.excludeFields.indexOf(field.name) > -1) {
                return;
            }

            if (field.group && !$this.groups[field.group]) {
                $this.groups[field.group] = [];
            } else if (!field.group) {
                field.group = 'Main';
            }

            $this.groups[field.group || 'Main'].push(field);
        });

        this._groups = Object.keys(this.groups).sort(function (a, b) {
            return a.toLowerCase().localeCompare(b.toLowerCase());
        });

        this.on('mount', function(){

            // bind global command + save
            Mousetrap.bindGlobal(['command+s', 'ctrl+s'], function(e) {

                if (App.$('.uk-modal.uk-open').length) {
                    return;
                }

                $this.submit(e);
                return false;
            });

            // wysiwyg cmd + save hack
            App.$(this.root).on('submit', function(e, component) {
                if (component) $this.submit(e);
            });

            // lock resource
            var idle = setInterval(function() {

                if (!$this.entry._id) return;

                Cockpit.lockResource($this.entry._id, function(e){
                    window.location.href = App.route('/collections/entry/'+$this.collection.name+'/'+$this.entry._id);
                });

                clearInterval(idle);

            }, 60000);

        });

        toggleGroup(e) {
            this.group = e.item && e.item.group || false;
        }

        submit(e) {

            if (e) {
                e.preventDefault();
            }

            var required = [], val;

            this.fields.forEach(function(field) {

                val = $this.entry[field.name];

                if (field.required && (!val || (Array.isArray(val) && !val.length))) {

                    if (!(val===false || val===0)) {
                        required.push(field.label || field.name);
                    }
                }
            });

            if (required.length) {
                App.ui.notify([
                    App.i18n.get('Fill in these required fields before saving:'),
                    '<div class="uk-margin-small-top">'+required.join(',')+'</div>'
                ].join(''), 'danger');
                return;
            }

            App.request('/collections/save_entry/'+this.collection.name, {entry:this.entry}).then(function(entry) {

                if (entry) {

                    App.ui.notify("Saving successful", "success");

                    _.extend($this.entry, entry);

                    $this.fields.forEach(function(field){

                        if (field.type == 'password') {
                            $this.entry[field.name] = '';
                        }
                    });

                    if ($this.tags['cp-revisions-info']) {
                        $this.tags['cp-revisions-info'].sync();
                    }

                    $this.update();

                } else {
                    App.ui.notify("Saving failed.", "danger");
                }
            }, function(res) {
                App.ui.notify(res && (res.message || res.error) ? (res.message || res.error) : 'Saving failed.', 'danger');
            });

            return false;
        }

        showPreview() {
            this.preview = true;
        }

        hasFieldAccess(field) {

            var acl = this.fieldsidx[field] && this.fieldsidx[field].acl || [];

            if (this.excludeFields.indexOf(field) > -1) {
                return false;
            }

            if (field == '_modified' ||
                App.$data.user.group == 'admin' ||
                !acl ||
                (Array.isArray(acl) && !acl.length) ||
                acl.indexOf(App.$data.user.group) > -1 ||
                acl.indexOf(App.$data.user._id) > -1
            ) {
                return true;
            }

            return false;
        }

        persistLanguage(e) {
            App.session.set('collections.entry.'+this.collection._id+'.lang', e.target.value);
        }

        copyLocalizedValue(e) {

            var field = e.target.getAttribute('field'),
                lang = e.target.getAttribute('lang'),
                val = JSON.stringify(this.entry[field+(lang ? '_':'')+lang]);

            this.entry[field+(this.lang ? '_':'')+this.lang] = JSON.parse(val);
        }

        checkVisibilityRule(field) {

            if (field.options && field.options['@visibility']) {

                try {
                    return (new Function('$', 'v','return ('+field.options['@visibility']+')'))(this.entry, function(key) {
                        var f = this.fieldsidx[key] || {};
                        return this.entry[(f.localize && this.lang ? (f.name+'_'+this.lang):f.name)];
                    }.bind(this));
                } catch(e) {
                    return false;
                }

                return this.data.check;
            }

            return true;
        }

        showEntryObject() {
            $this.refs.inspect.show($this.entry);
            $this.update();
        }

        showLinkedOverview() {

            console.log(this.refs)

            $this.refs.entrylinked.show($this.entry);
            $this.update();

        }

    </script>

</div>

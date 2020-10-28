<div id="loginmodal" class="uk-modal" riot-view>

    <style>
        .uk-modal-login { 
            max-width: 400px;
            padding: 30px;
        }

    </style>

    <div class="uk-modal-dialog uk-modal-login uk-form" ref="loginDialog">

        <form class="uk-form" method="post" action="<?php $app->route('/auth/check'); ?>" onsubmit="{ submit }">

            <div class="uk-h2 uk-text-bold">
                <?php echo  $app->retrieve('app.name') ; ?>
            </div>

            <div class="uk-form-row uk-h4 uk-text-muted uk-margin-top uk-text-small uk-text-upper">
                <?php echo $app("i18n")->get('Your session has expired.'); ?>
            </div>

            <hr>

            <div class="uk-margin-top">
                <label class="uk-text-small uk-text-bold uk-text-upper uk-margin-small-bottom"><?php echo $app("i18n")->get('Username'); ?></label>
                <input ref="user" class="uk-form-large uk-form-blank uk-width-1-1" type="text" placeholder="..." required>
            </div>

            <div>
                <label class="uk-text-small uk-text-bold uk-text-upper uk-margin-small-bottom"><?php echo $app("i18n")->get('Password'); ?></label>
                <input ref="password" class="uk-form-large uk-form-blank uk-width-1-1" type="password" placeholder="..." required>
            </div>

            <div class="uk-margin-top">
                <button class="uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo $app("i18n")->get('Authenticate'); ?></button>
            </div>

        </form>

    </div>

    <script type="view/script">

        var $this = this;

        this.on('mount', function() {

            this.modal = UIkit.modal($this.root, {
                keyboard: false,
                bgclose: false
            });

            // check session
            var check = function() {

                App.request('/check-backend-session').then(function(resp) {

                    if (resp && resp.status && $this.modal.isActive()) {
                        $this.modal.hide();
                    }

                    if (resp && !resp.status && !$this.modal.isActive()) {
                        $this.modal.show();
                    }
                });
            }

            setInterval(check, 30000);

            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) check();
            }, false);
        });

        submit(e) {

            e.preventDefault();

            App.request('/auth/check', {
                auth : {user:this.refs.user.value, password:this.refs.password.value},
                csfr : "<?php echo  $app('csfr')->token('login') ; ?>"
            }).then(function(data) {

                if (data && data.success) {

                    if (data.user._id != App.$data.user._id) {
                        App.reroute('/');
                    } else {
                        $this.modal.dialog.find('form')[0].reset();
                        $this.modal.hide();
                    }

                } else {

                    $this.modal.dialog.removeClass('uk-animation-shake');

                    setTimeout(function(){
                        $this.modal.dialog.addClass('uk-animation-shake');
                    }, 50);
                }

            }, function(res) {
                App.ui.notify(res && (res.message || res.error) ? (res.message || res.error) : 'Login failed.', 'danger');
            });

            return false;
        }

    </script>

</div>

<a id="mallon-totop" href="#"></a>
<div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog block-popup-login">
        <a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">Close</a>
        <div class="tt_popup_login"><strong>Sign in Or Register</strong></div>
        <div class="woocommerce-notices-wrapper"></div>
        <form method="post" class="login" id="login_ajax" action="">
            <div class="block-content">
                <div class="col-reg registered-account">
                    <div class="email-input">
                        <input type="text" class="form-control input-text username" name="username" id="username"
                            placeholder="Username" />
                    </div>
                    <div class="pass-input">
                        <input class="form-control input-text password" type="password" placeholder="Password"
                            name="password" id="password" />
                    </div>
                    <div class="ft-link-p">
                        <a href="my-account/lost-password/index.html" title="Forgot your password">Forgot your
                            password?</a>
                    </div>
                    {{-- login button --}}
                    <div class="actions">
                        <div class="submit-login">
                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                                value="1dd6c66cfa" /><input type="hidden" name="_wp_http_referer" value="/" />
                            <input type="submit" class="button btn-submit-login" name="login" value="Login" />
                        </div>
                    </div>
                    <div id="login_message"></div>

                </div>
                <div class="col-reg login-customer">
                    <h2>NEW HERE?</h2>
                    <p class="note-reg">Registration is free and easy!</p>
                    <ul class="list-log">
                        <li>Faster checkout</li>
                        <li>Save multiple shipping addresses</li>
                        <li>View and track orders and more</li>
                    </ul>
                    <a href="my-account/index.html" title="Register" class="btn-reg-popup">Create an account</a>
                </div>
            </div>
        </form>
        <div class="clear"></div>

    </div>
</div>

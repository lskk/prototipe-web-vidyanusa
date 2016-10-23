<style type="text/css">
    .metro .grid .row{
        margin-top:0px;
    }
    .error{
        color:red;
    }
    #frm_daftar span.error {
        margin-left: 10px;
        width: auto;
        display: inline;
    }
</style>

<div class="grid">
    <div class="row">
        <div class="span6 padding10" style="background-color: white;margin-top: 1.3em;">
            <form id="frm_daftar" method="POST" action="<?= base_url('index.php/main/login') ?>">
                <fieldset>
                    <legend>Login</legend>
                     <?= isset($msg) ? "<div class=\"alert alert-error notice bg-amber fg-white marker-on-bottom\">".$msg."</div>" : "" ?>
                    <label for="nama">Username</label>
                    <div class="input-control text" data-role="input-control">
                        <input name="username" id="usernamereg" type="text" placeholder="username" autofocus="" required>
                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>
                   
                    <label for="password1">Password</label>
                    <div class="input-control password" data-role="input-control">                           
                        <input name="password" id="password" type="password" placeholder="password" required>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>
                   
                    <div class="input-control button" data-role="input-control">
                        <input type="submit" value="Login" id="btn_submit">
                    </div>
                    <div class="input-control button" data-role="input-control">
                        <input type="button" value="Batal" id="btn_cancel">
                    </div>

                </fieldset>
            </form>
        </div>

    </div>
</div>
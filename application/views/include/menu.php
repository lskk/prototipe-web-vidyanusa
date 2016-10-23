<header>
    <nav class="navigation-bar">
        <div class="navigation-bar-content container">
            <a href="<?= base_url() ?>" class="element" style="vertical-align: top"><img src="<?= $this->config->item('assets') ?>/images/VidyaNusaLogo.png" ></a>
            <span class="element-divider"></span>
            <a class="element1 pull-menu" href="#"></a>
            <?php
            if (!isset($_SESSION['USER'])) {
                ?>
            <ul class="element-menu">
                <li style="background-color: #6666ff"> <a style="color: #ffffcc" class="element brand" href="<?= base_url('index.php/registration') ?>"><strong>Daftar Sebagai Guru</strong></a></li>
                <li> <span class="element-divider"></span></li>
                <li style="background-color: gray"> <a class="element brand" href="<?= base_url('index.php/registration/registrasi_siswa') ?>"><strong>Daftar Sebagai Murid</strong></a></li>
                <li> <span class="element-divider"></span></li>
                <li style="background-color: #009999"> <a class="element brand" href="<?= base_url('index.php/main/login_page') ?>"><strong>Login</strong></a></li>
                <li> <span class="element-divider"></span></li>
            </ul>

            <?php
            }
            if (isset($_SESSION['USER'])) {
                ?>
                <div class="no-tablet-portrait no-phone">
                    <span class="element-divider place-right"></span>
                    <a class="element place-right" href="<?= base_url('index.php/main/logout') ?>">[logout]</a>
                    <span class="element-divider place-right"></span>
                    <a class="element place-right" href="#">Selamat datang <?= $_SESSION['USER']['USERNAME'] ?></a>
                    <span class="element-divider place-right"></span>
                </div>
                <?php
            }
            ?>

        </div>
    </nav>
</header>
<script type="text/javascript">
    $(function () {
        $("#frm_login").submit(function () {
            $("#btn_login").attr("disabled", "disabled");
            $("#btn_login").attr("value", "memproses...");
            $.ajax({
                url: BASE_URL + "main/login",
                type: "POST",
                data: $("#frm_login").serialize(),
                success: function (data) {
                    if (data === "success") {
                        window.location.replace(BASE_URL + 'dashboard/');
                    } else {
                        alert("login gagal");
                        document.getElementById("frm_login").reset();
                        $("#btn_login").removeAttr("disabled");
                        $("#btn_login").attr("value", "Login");
                    }
                },
                error: function () {
                    alert('terjadi error');
                }
            });
            return false;
        });
    });
</script>

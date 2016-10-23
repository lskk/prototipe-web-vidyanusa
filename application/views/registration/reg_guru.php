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
        <div class="span4">
            <br>
            <div class="span5 bg-cobalt fg-white">
                <i><img class="on-left"  src="<?= $this->config->item('assets') ?>/images/siswa.png"></i>
                <b>.: Registrasi Guru .:</b>                              
            </div>  
            <div style="text-align: center" class="bg-white padding10 span5">                          
                Membuat Akun Siswa <br>
                Mendaftarkan Sekolah <br>
                Bermain Game <br>
                Chatting <br>
                Evaluasi Dashboard Siswa <br>
            </div>
        </div>

        <div class="span10 padding10" style="height: 45em;background-color: white;margin-top: 1.3em;margin-left: 8em">
            <form id="frm_daftar" method="POST">
                <fieldset>
                    <legend>Form pendaftaran Guru</legend>
                    <label for="nama">Username</label>
                    <div class="input-control text" data-role="input-control">
                        <input name="username" id="usernamereg" type="text" placeholder="username" autofocus="" required>
                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>
                    <label for="nama">Nama</label>
                    <div class="input-control text" data-role="input-control">
                        <input name="nama" id="nama" type="text" placeholder="nama lengkap" autofocus="" required>
                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="input-control select" data-role="input-control">
                        <select name="jenis_kelamin" style="width: 5em">
                            <option value="PRIA">Pria</option>
                            <option value="WANITA">Wanita</option>
                        </select>
                        <span></span>
                    </div>
                    <label for="email">Email</label>
                    <div class="input-control text" data-role="input-control">                           
                        <input name="email" id="email" type="text" placeholder="email" required>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>
                    <label for="password1">Password</label>
                    <div class="input-control password" data-role="input-control">                           
                        <input name="password1" id="password1" type="password" placeholder="password" required>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>
                    <label for="password2">Ulangi Password</label>
                    <div class="input-control password" data-role="input-control">                           
                        <input name="password2" id="password2" type="password" placeholder="ketik password" required>
                        <button class="btn-clear" tabindex="-1" type="button"></button>
                        <span></span>
                    </div>    
                    <label for="nama">Sekolah</label>
                    <div class="input-control text" data-role="input-control">
                        <input name="kode_sekolah" id="kode_sekolah" type="text" placeholder="nama/kode sekolah..." class="search-query" autofocus="" required>
                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                        <span id="ket_sekolah"></span>
                    </div>
                    <div class="input-control checkbox" data-role="input-control">
                        <label for="tou"> 
                            <input type="checkbox" name="tou" id="tou" checked="checked" required>
                            <span class="check"></span>
                            Saya menyatakan data diatas adalah valid</label>
                        <span></span>
                    </div><br>
                    <div class="input-control button" data-role="input-control">
                        <input type="submit" value="Daftar" id="btn_submit">
                    </div>
                    <div class="input-control button" data-role="input-control">
                        <input type="button" value="Batal" id="btn_cancel">
                        
                    </div>
                    Sudah terdaftar?silahkan <a href="<?= base_url('index.php/main/login_page') ?>">Login</a>
                </fieldset>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    var sekolah = {
        kode_sekolah: '',
        nama_sekolah: '',
        alamat_sekolah: ''
    };
    $(function () {
        //sekolah
        
        $("#kode_sekolah").select2({
            placeholder: "ketik kode/nama sekolah",
            minimumInputLength: 4,
            dataType: 'json',
            width: '100%',
            ajax: {
                url: BASE_URL + "store/sekolah_store",
                dataType: 'json',
                quietMillis: 1000,
                data: function (term, page) {
                    return {
                        term: term, //search term
                        page_limit: 10, // page size
                        page: page
                    };
                },
                results: function (data, page) {
                    var more = (page * 10) < data.total;
                    return {results: data.results, more: more};
                }

            },
            escapeMarkup: function (m) {
                return m;
            },
            formatResult: function (data) {
                var tpl = "<b>" + data.obj.kode_sekolah + "</b>";
                tpl += "<br><span>" + data.obj.nama_sekolah + "</span>";
                tpl += "<br><span>" + data.obj.alamat_sekolah + "</span>";
                return tpl;
            },
            formatSelection: function (data) {
                return data.text;
            },
            dropdownCssClass: "bigdrop",
            initSelection: function (element, callback) {
                var data = {id: element.val(), text: element.val()};
                callback(data);
            }
        });

        $("#kode_sekolah").on("select2-blur", function (e) {
            sekolah.kode_sekolah = $("#kode_sekolah").select2('data').id;
            sekolah.nama_sekolah = $("#kode_sekolah").select2('data').text;
            $("#ket_sekolah").html('kode sekolah : ' + sekolah.kode_sekolah);
        });
        
        //form validation
        var cek = $("#frm_daftar").validate({
            rules: {
                nama: "required",
                username: {
                    required: true,
                    remote: {
                        url: BASE_URL + "registration/cek_username",
                        type: "post",
                        data: {
                            username: function () {
                                return $("#usernamereg").val();
                            }
                        }
                    }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: BASE_URL + "registration/cek_email",
                        type: "post",
                        data: {
                            email: function () {
                                return $("#email").val();
                            }
                        }
                    }
                },
                password1: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password1"
                },
                tou: "required"
            },
            messages: {
                nama: "Silahkan isi nama",
                username: {
                    required: "Silahkan isi username",
                    remote: "username sudah digunakan"
                },
                email: {required: "Silahkan isi email",
                    email: "format email tidak benar",
                    remote: "email sudah digunakan"
                },
                password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password2: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                tou: "Please accept our policy"
            },
            errorElement: "span"

        });
        $("#frm_daftar").submit(function () {
            if (cek.valid()) {
                $("#btn_submit").attr("value", "memproses...");
                $("#btn_submit").attr("disabled", "disabled");
                var data = $("#frm_daftar").serialize();
                $.ajax({
                    url: BASE_URL + "registration/process_guru",
                    data: data,
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        if (data === "success") {
                            alert("pendaftaran berhasil,silahkan login");
                            window.location.href = BASE_URL;
                        } else {
                            alert("data gagal disimpan" + data);
                        }
                        $("#btn_submit").attr("value", "login");
                        $("#btn_submit").removeAttr("disabled");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#btn_submit").attr("value", "login");
                        $("#btn_submit").removeAttr("disabled");
                    }
                });
            }
            return false;
        });
        $("#btn_cancel").click(function () {
            window.location.href = BASE_URL;
        });
    });
</script>
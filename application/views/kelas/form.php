<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            include APPPATH . "/views/sidebar.php";
            ?>
        </div>

        <div class="span10">
            <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
                    <form id="frm_kelas" method="POST">
                        <fieldset>
                            <legend>Tambah Kelas</legend>
                            <label for="nama">Nama Kelas</label>
                            <div class="input-control text" data-role="input-control">
                                <input name="nama_kelas" id="usernamereg" type="text" placeholder="nama_kelas" autofocus="" required>
                                <button class="btn-reveal" tabindex="-1" type="button"></button>
                                <span></span>
                            </div>
                            <label for="nama">Tingkat Kelas</label>
                            <div class="input-control text" data-role="input-control">
                                <input name="kode_tingkatkelas" id="kode_tingkatkelas" type="text" placeholder="tingkat kelas" class="search-query" autofocus="" required>
                                <button class="btn-reveal" tabindex="-1" type="button"></button>
                                <span id="ket_kode"></span>
                            </div>
                            <div class="input-control button" data-role="input-control">
                                <input type="submit" value="Simpan" id="btn_submit">
                                <button type="submit" value="Batal" onclick="history.back('-1')"></button>
                            </div>

                        </fieldset>
                    </form>
                </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    var tingkat_kelas = {
        kode_tingkatkelas: '',
        keterangan_tingkatkelas: ''
    };

    $(function () {
        //sekolah

        $("#kode_tingkatkelas").select2({
            placeholder: "ketik kode/nama sekolah",
            minimumInputLength: 4,
            dataType: 'json',
            width: '100%',
            ajax: {
                url: BASE_URL + "store/tingkatkelas_store",
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
                var tpl = "<b>" + data.obj.kode_tingkatkelas + "</b>";
                tpl += "<br><span>" + data.obj.keterangan_tingkatkelas + "</span>";
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

        $("#kode_tingkatkelas").on("select2-blur", function (e) {
            tingkat_kelas.kode_tingkatkelas = $("#kode_tingkatkelas").select2('data').id;
            tingkat_kelas.keterangan_tingkatkelas = $("#kode_tingkatkelas").select2('data').text;
            $("#ket_kode").html('kode tingkat kelas : ' + tingkat_kelas.kode_tingkatkelas);
        });

        //form validation
        var cek = $("#frm_kelas").validate({
            rules: {
                nama_kelas: "required",
                kode_tingkatkelas: {
                    required: true
                }
            },
            messages: {
                nama: "Silahkan isi nama kelas",
                nama: "Silahkan pilih tingkat kelas"
            },
            errorElement: "span"

        });
        $("#frm_kelas").submit(function () {
            if (cek.valid()) {
                $("#btn_submit").attr("value", "memproses...");
                $("#btn_submit").attr("disabled", "disabled");
                var data = $("#frm_kelas").serialize();
                $.ajax({
                    url: BASE_URL + "kelas/save",
                    data: data,
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        if (data === "success") {
                            alert("kelas berhasil ditambah");
                            window.location.href = BASE_URL + 'kelas/index';
                        } else {
                            alert("data gagal disimpan" + data);
                            $("#btn_submit").attr("value", "login");
                            $("#btn_submit").removeAttr("disabled");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#btn_submit").attr("value", "login");
                        $("#btn_submit").removeAttr("disabled");
                    }
                });
            }
            return false;
        });
    });
</script>
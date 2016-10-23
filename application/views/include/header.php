<!DOCTYPE html>
<html>
    <head>
        <title>.:VidyaNusa :.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= $this->config->item('assets') ?>/metro-ui/min/metro-bootstrap.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('assets') ?>/metro-ui/min/metro-bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('assets') ?>/metro-ui/min/iconFont.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('assets') ?>/select2/select2.css"/>
        <link rel="stylesheet" href="<?= $this->config->item('assets') ?>/select2/select2-bootstrap.css"/>
        <style type="text/css">
            body{
                background-color: #d4d4d4;
            }
            .metro .grid .row{
                margin-top:0.2em;
            }
            .metro .panel .panel-header{
                margin-top:0.2em;
            }

            .panel_button{
                width:33.3%;

            }
            .kontainer{
                margin-left:4em;
                margin-right:4em;
                margin-top:0.3em;
                margin-bottom:0.3em

            }
            .metro .grid .row{
                margin-top:0px;
            }
            .error{
                color:red;
            }
            #frm_kelas span.error {
                margin-left: 10px;
                width: auto;
                display: inline;
            }
        </style>
        <script src="<?= $this->config->item('assets') ?>/js/jquery.min.js"></script>
        <script src="<?= $this->config->item('assets') ?>/js/jquery.widget.min.js"></script>
        <script src="<?= $this->config->item('assets') ?>/js/prettify.js"></script>
        <script src="<?= $this->config->item('assets') ?>/metro-ui/min/metro.min.js"></script>
        <script src="<?= $this->config->item('assets') ?>/jq-validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets') ?>/select2/select2.js"></script>
        <script type="text/javascript">
            var BASE_URL = '<?= base_url() ?>index.php/';
        </script>
        <script src="<?= $this->config->item('assets') ?>/highcharts/js/highcharts.js"></script>
        <script src="<?= $this->config->item('assets') ?>/highcharts/js/highcharts-3d.js"></script>
        <script src="<?= $this->config->item('assets') ?>/highcharts/js/modules/exporting.js"></script>
    </head>
    <body class="metro">
        <div class="kontainer">
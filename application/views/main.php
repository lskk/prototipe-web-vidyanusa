<div class="grid">
    <div class="row">
        <div class="carousel" style="height: 30em !important"> 
            <div class="slide" align="center">
                <img src="<?= $this->config->item('assets') ?>/images/map.png" style="width:100%">
            </div>
            <div class="slide" align="center">
                <img src="<?= $this->config->item('assets') ?>/images/environment1.png" style="width:100%; height:100%">
            </div>

            <div class="slide" align="center">
                <img src="<?= $this->config->item('assets') ?>/images/environment2.png" style="width:100%; height:100%">
            </div>

            <div class="slide" align="center">
                <img src="<?= $this->config->item('assets') ?>/images/quest.png" style="width:100%; height:100%">
            </div>

            <div class="slide" align="center">
                <img src="<?= $this->config->item('assets') ?>/images/header1.jpg" style="width:100%; height:100%">
            </div>

            <a class="controls left"><i class="icon-arrow-left-4"></i></a>
            <a class="controls right"><i class="icon-arrow-right-4"></i></a>
        </div>
    </div>
    <div class="row bg-cyan fg-white" style="height:2.5em;">
        <div class="padding10">User Online :</div>
    </div>
    <div class="row fluid" style="margin-top: 0.3em">
        <div class="grid fluid">
            <div class="row fluid">
                <div class="span6 shadow" >                          
                    <div style="width: 100%; height: 20em;padding:2px; text-align: center" class="bg-white padding10">                          
                        <video src="<?= base_url('/assets/video/iu.mp4') ?>" class="span12" style="width: 100%" controls="true"></video>
                    </div>
                </div>

                <div class="span6 shadow bg-white padding10" style="height: 24em;">
                    <div class="grid">
                        <div class="row">
                            <div class="span6" style="height:20em; font-family: fantasy ">Peta Vidyanusa
                                <img src="<?= $this->config->item('assets') ?>/images/map.png" style="width:100%; height:100%">
                            </div>

                            <div class="row" style="height:20em; font-family: fantasy " > Tokoh Karakter Vidyanusa <br>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/aruna.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/biyu.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/abiya.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/kepalasuku.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/aptana.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/pataka.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/chula.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/cewek.png" style="width:100%; height:100%"> </div>
                                <div class="span2" > <img src="<?= $this->config->item('assets') ?>/images/cowok.png" style="width:100%; height:100%"> </div>
                            
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="bg-cyan fg-white" style="height:2em;text-align:center;width: 100%">
        <div style="padding:0.1em">&copy; vidyaNusa 2015</div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function () {
        $('.carousel').carousel();
    });
</script>
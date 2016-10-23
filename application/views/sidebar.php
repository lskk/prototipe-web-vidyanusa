<?php 
if (isset($_SESSION['USER'])) {
$username = $_SESSION['USER']['USERNAME'];
$password = $_SESSION['USER']['PASSWORD'];

$json['username'] = $username;
$json['password'] = $password;
$json['ip'] = $_SERVER['REMOTE_ADDR'];
}
?>
<nav class="sidebar light">
                <ul>
                    <li><a href="<?php echo base_url('index.php/dashboard') ?>"><i class="icon-home"></i>Dashboard Guru</a></li>
                    <li><a href="<?php echo("http://tadj.lskk.ee.itb.ac.id/blog/login_blog_vidyanusa.php?username=" . $username . "&status=1"); ?>" target="_blank">Blog Wordpress</a></li>
                    <li><a href="<?php echo('http://tadj.lskk.ee.itb.ac.id/forum/login_forum_vidyanusa.php?username='.$username.'&password='.$password.'&ip='.$json['ip']. '&status=1'); ?>" target="_blank">Forum Diskusi</a></li>
                    <li><a href="http://tadj.lskk.ee.itb.ac.id/moodle" target="_blank">Moodle</a></li>
                    <li><a href="http://tadj.lskk.ee.itb.ac.id/yoopa" target="_blank">Yoopa</a></li>
                    
                    <li class="title">.: Pengaturan :.</li>

                    <li class="stick bg-yellow">
                        <a class="dropdown-toggle" href="#"><i class="icon-menu"></i>Pengaturan Kelas</a>
                        <ul class="dropdown-menu" data-role="dropdown">
                            <li><a href="<?php echo base_url('index.php/kelas') ?>">Kelas</a></li>
                            <li><a href="<?php echo base_url('index.php/siswa') ?>">Siswa</a></li>
                        </ul>
                    </li>
                    
                    <li class="title">.: Grafik dan Laporan :.</li>
                    <li>            
                        <a class="dropdown-toggle" href="#">Grafik Tiap Siswa</a>
                        <ul class="dropdown-menu" data-role="dropdown">
                              <li><a href="<?php echo base_url('index.php/dashboard/grafik_akurasi') ?>">Akurasi</a></li>
                              <li><a href="<?php echo base_url('index.php/dashboard/grafik_waktu') ?>"> Waktu </a></li>
                              <li><a href="<?php echo base_url('index.php/dashboard/grafik_riwayat') ?>">Riwayat Permainan</a></li>
                        </ul>
                        <a class="dropdown-toggle" href="#">Grafik Tiap Kelas</a>
                        <ul class="dropdown-menu" data-role="dropdown">
                              <li><a href="<?php echo base_url('index.php/dashboard/grafik_skor') ?>">Akurasi</a></li>
                              <li><a href="<?php echo base_url('index.php/dashboard/table_percobaan') ?>">Tabel Aktifitas</a></li>
                        </ul>
                    </li>

                    <li class="title">Games</li>
                   <li><a href="<?php echo base_url('index.php/game/play') ?>" target="_blank">PLAY VIDYANUSA</a></li>
                   <li><a href="<?php echo base_url('index.php/game') ?>">Deskripsi Game</a></li>
                    <li>
                        <a class="dropdown-toggle" href="#">Coba Game</a>
                        <ul class="dropdown-menu" data-role="dropdown">
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Misi Segitiga Segiempat.swf">Membuka Lahan Kebun</a></li> 
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Pecahan level 1.swf">Membagi Kue level 1</a></li> 
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Pecahan level 2.swf">Membagi Kue level 2</a></li> 
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Pecahan level 3.swf">Membagi Kue level 3</a></li>                     
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Bruto Tara Netto level 1 asset baru.swf">Menimbang dan Mengangkut Buah</a></li>
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Phytagoras.swf">Menyusun dan Mengangkut Box</a></li>
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Misi Pangkat dan Akar.swf">Membasmi Hama Ulat</a></li>
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Aritmatika Sosial (Diskon, Harga beli).swf">Menimbang dan Membeli Buah</a></li>
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Misi Kesebangunan dan Kongruen.swf">Mencari Batu Kristal</a></li>                         
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Deret Hama Geometri.swf">Membasmi Hama Bakteri</a></li>
                            <li><a target="_blank" href="<?php echo $this->config->item('swf') ?>/SWF/Misi Bilangan Bulat.swf">Membuang Sampah</a></li>
   
                        </ul>
                    </li>
                </ul>
            </nav>
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class game extends CI_Controller {

    function __construct() {
        parent::__construct();
        session_start();
         if (!isset($_SESSION['USER'])) {
            redirect(base_url(''));
        }
    }

    function index() {
        $judul = array(
            0 => 'Misi 1 : Tolong ladangku!',
            1 => 'Misi 2 : Dimana kelompokku?',
            2 => 'Misi 3 : Menanam Jeruk',
            3 => 'Misi 4 : Membasmi hama',
            4 => 'Misi 5 : Panen cabe',
            5 => 'Misi 6 : Panen wortel',
            6 => 'Misi 7 : Menyeberangi jembatan',
            7 => 'Misi 8 : Membuat irigasi',
            8 => 'Misi 9 : Mengemas buah',
            9 => 'Misi 10 : Menyusun peti',
            10 => 'Misi 11:Mengganti roda ban pecah',
            11 => 'Misi 12 :Serangan ulat bulu',
            12 => 'Misi 13 :Pecahkan kode pintu pasar ',
            13 => 'Misi 14 :Mari Berdagang',
            14 => 'Misi 15 :Bantu menimbang dan membeli strawberry',
            15 => 'Misi 16 : Membagi kue pie',
            16 => 'Misi 17 : Berburu resep pie',
            17 => 'Misi 18 : Menakar porsi makan ',
            18 => 'Misi 19 : Membuat jus ',
            19 => 'Misi 20 : Berburu batu',
            20 => 'Misi 21 : Membangun bendungan',
            21 => 'Misi 22 : Menakar porsi buah',
            22 => 'Misi 23 : Menghidupkan listrik'
        );

        $warna = array(
            0 => 'orange',
            1 => 'red',
            2 => 'purple',
            3 => 'pink',
            4 => 'lime',
            5 => 'blue',
            6 => 'orange',
            7 => 'green',
            8 => 'magenta',
            9 => 'purple',
            10 => 'lime',
            11 => 'blue',
            12 => 'orange',
            13 => 'darkgreen',
            14 => 'magenta',
            15 => 'red',
            16 => 'pink',
            17 => 'blue',
            18 => 'orange',
            19 => 'cyan',
            20 => 'purple',
            21 => 'cyan',
            22 => 'lime'
        );
        
        $icon = array(
            0 => 'icon-earth',
            1 => 'icon-diamond',
            2 => 'icon-cars',
            3 => 'icon-camera',
            4 => 'icon-android',
            5 => 'icon-apple',
            6 => 'icon-earth',
            7 => 'icon-diamond',
            8 => 'icon-cars',
            9 => 'icon-camera',
            10 => 'icon-android',
            11 => 'icon-apple',
            12 => 'icon-earth',
            13 => 'icon-diamond',
            14 => 'icon-cars',
            15 => 'icon-camera',
            16 => 'icon-android',
            17 => 'icon-apple',
            18 => 'icon-earth',
            19 => 'icon-diamond',
            20 => 'icon-cars',
            21 => 'icon-camera',
            22 => 'icon-android'
         
        );
        
        $data['judul'] = $judul;
        $data['warna'] = $warna;
        $data['icon'] = $icon;
        $data['jml'] = count($icon);
        $this->load->view('include/header');
        $this->load->view('include/menu');
        if ($_SESSION['USER']['KODE_GURU'] == "") {
            $this->load->view('game/list_siswa',$data);
        } else {
            $this->load->view('game/list_guru',$data);
        }
        $this->load->view('include/footer');
    }

    function detail() {
        $idx = $this->uri->segment(3);
        $penjelasan = array(
            0 => '<p> <strong> Misi 1. Membuat lahan kebun sesuai dengan jenis tanaman </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>Siswa diminta meletakkan bibit rumput yang tepat sesuai dengan nilai luas dan keliling segitiga dan segiempat yang ada di ladang agar ladang tersebut tertata rapi agar kemudian dapat ditanami bibit tanaman</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Luas dan Keliling Segitiga dan Segiempat'
            . '<p> <strong> TIU : </strong> <br> Siswa mampu menyelesaikan masalah dengan konsep luas dan keliling segitiga dan segiempat </p>'
            . '<p> <strong> TIK : </strong><br> Siswa mampu menganalisis dan menyimpulkan unsur-unsur rumus luas dan keliling dari segitiga dan segiempat dalam situasi atau fenomena alam serta aktifitas sosial sehari-hari </p>'     
            ,    
            1 => '<p> <strong> Misi 2. Memasukkan bibit tanaman ke dalam kemasan yang sesuai </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>Fulan memisahkan bibit tanaman berdasarkan jenisnya, yaitu jenis buah-buahan dan jenis sayuran, dilanjutkan dengan mencatat mana yang termasuk buah atau sayur</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> - Memahami pengertian Himpunan <br> - Himpunan Bagian <br> - Komplemen Himpunan <br> - Operasi Himpunan dan Menunjukan contoh dan bukan contoh Himpunan <br>'
            . '<p> <strong> TIU : </strong> <br> Siswa mampu menyelesaikan masalah dengan konsep himpunan</p>'
            . '<p> <strong> TIK : </strong><br> Siswa mampu menyelesaikan masalah dengan konsep himpunan melalui bibit tanaman buah-buahan dan sayuran</p>'     
            ,   
            2 => '<p> <strong> Misi 3. Menanam Jeruk </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>-------------------------</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> - ------------------------<br>'
            . '<p> <strong> TIU : </strong> <br> ---------------------------</p>'
            . '<p> <strong> TIK : </strong><br> --------------------------------</p>'     
            ,   
            3 => '<p> <strong> Misi 4. Tangkap hama yang ada di sekitar tanaman </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>-------------------------</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Barisan Aritmetika <br>'
            . '<p> <strong> TIU : </strong> <br> Standar Kompetensi (Sesuai Kur 2013):Menunjukkan perilaku konsisten dan teliti dalam melakukan aktivitas di rumah, sekolah, dan masyarakat sebagai wujud implementasi mempelajari barisan, deret aritmetika dan geometri</p>'
            . '<p> <strong> TIK : </strong><br> Siswa mampu menentukan nilai suku pada barisan aritmetika.</p>'     
            ,   
            4 => '<p> <strong> Misi 5. Panen Cabe </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>User diminta untuk membantu Byu mengambil cabe hasil panen. Byu kesulitan karena jalannya dihalangi kaktus. Untuk mempermudah langkah, user dapat menggunakan bantuan per. Masing-masing per memiliki jumlah lompatan berbeda.</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Penjumlahan dan Pengurangan Bilangan Bulat <br>'
            . '<p> <strong> TIU : </strong> <br> Standar Kompetensi (Sesuai Kur 2013): Membandingkan dan mengurutkan berbagai jenis bilangan serta menerapkan operasi hitung bilangan bulat dan bilangan pecahan dengan memanfaatkan berbagai sifat operasi.</p>'
            . '<p> <strong> TIK : </strong><br> Siswa mampu menentukan hasil penjumlahan dan pengurangan suatu bilangan bulat </p>'     
            ,   
            5 => '<p> <strong> Misi 6. Memetik Wortel </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>Fulan  diminta  untuk  membantu  Chula dalam memetik dan menentukan lokasi wortel sesuai dengan lokasi yang sudah diberi tahu sebelumnya</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Sistem Koordinat dan Koordinat Cartesius <br>'
            . '<p> <strong> TIU : </strong> <br> ---------------------------------</p>'
            . '<p> <strong> TIK : </strong><br> ----------------------------------------</p>'     
            ,  
            6 => '<p> <strong> Misi 7. Membuat jembatan </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>-------------------------------</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Mean Median Modus <br>'
            . '<p> <strong> TIU : </strong> <br> ---------------------------------</p>'
            . '<p> <strong> TIK : </strong><br> ----------------------------------------</p>'     
            ,  
            7 => '<p> <strong> Misi 8.Menyalurkan buah melewati pipa-pipa pengalir agar buah dapat sampai di tujuan </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>-------------------------------</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> --------------- <br>'
            . '<p> <strong> TIU : </strong> <br> ---------------------------------</p>'
            . '<p> <strong> TIK : </strong><br> ----------------------------------------</p>'     
            , 
            8 => '<p> <strong> Misi 9.Mengemas buah ke dalam kaleng dan ke dalam dus kemasan </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Chula harus mengemas buah-buah hasil panen kedalam kardus. Namun gerobak pengangkut memiliki muatan terbatas. Sehingga chula harus memastikan berat buah dalam kemasan harus sama dengan berat maksimal gerobak agar gerobak dapat jalan.  </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Bruto, Tara, Netto <br>'
            . '<p> <strong> TIU : </strong> <br> ---------------------------------</p>'
            . '<p> <strong> TIK : </strong><br> ----------------------------------------</p>'     
            , 
            9 => '<p> <strong> Misi 10.Menyusun peti hasil perkebunan agar muat ketika diangkut roda </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Siswa diminta menghitung sisi miring dari bentuk segitiga dan segiempat di dalam gerobak</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Teorema Phytagoras <br>'
            . '<p> <strong> TIU : </strong> <br> Memahami Teorema Pythagoras melalui simulasi peraga dan penyelidikan</p>'
            . '<p> <strong> TIK : </strong><br> Menggunakan Teorema Pythagoras untuk menyelesaikan berbagai masalah </p>'     
            , 
            10 => '<p> <strong> Misi 11. Mengganti roda gerobak yang pecah </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Siswa diminta menghitung sisi miring dari bentuk segitiga dan segiempat di dalam gerobak</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Memahami unsur, keliling, dan luas dari lingkaran <br> Memahami hubungan sudut pusat, panjang busur, dan luas juring <br> Menyelesaikan permasalahan nyata yang terkait penerapan hubungan sudut pusat, panjang busur, dan luas juring </p>'
            . '<p> <strong> TIU : </strong> <br> Siswa mampu menyelesaikan masalah dengan konsep lingkaran </p>'
            . '<p> <strong> TIK : </strong><br> Siswa mampu menyelesaikan masalah dengan konsep lingkaran yang diterapkan pada roda gerobak</p>'     
            , 
            11 => '<p> <strong> Misi 12. Mengalihkan perhatian ulat-ulat yang akan memakan buah-buahan </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Siswa diminta menghitung sisi miring dari bentuk segitiga dan segiempat di dalam gerobak</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Pangkat dan Akar </p>'
            . '<p> <strong> TIU : </strong> <br> 1. Siswa mampu kreatif mengkombinasikan angka relefan <br>
              2. Siswa memahami bahwa ulat (notabene dianggap sebagai hama yang merugikan) tidak perlu dibunuh tapi disingkirkan dengan mengalihkan perhatian pada makanan yang lain. </p>'
            . '<p> <strong> TIK : </strong><br> Siswa memahami konsep pangkat dan akar melalui pola kombinasi angka yang dioperasikan. </p>'     
            , 
            12 => '<p> <strong> Misi 13. Menekan tombol untuk membuka pintu gerbang pasar </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>Fulan diminta membantu aruna untuk menentukan kapan waktu ketiganya menyala berwarna hijau secara bersamaan agar gerbang dapat terbuka. </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Bilangan, sub KPK </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            13 => '<p> <strong> Misi 14. Menjual buah dan sayuran </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br>------------------------</p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Harga penjualan, untung, rugi, persentase untung rugi </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            14 => '<p> <strong> Misi 15. Menimbang buah strawberry <br> Menghitung harga dan berat strawberry yang dibeli </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Agar dapat membuat pie strawberry, Aruna perlu membeli strawberry dengan takaran yang pas. Setelah ditimbang, Aruna harus membayar strawberry sesuai dengn berat yang dibeli. Jika uang belum pas, Aruna belum dapat membeli strawberry tersebut. </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>1. membandingkan pecahan lebih besar dan kecil, penjumlahan pecahan <br> 2. Menghitung perkalian pecahan dan konsep diskon (aritmatika sosial)</p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            15 => '<p> <strong> Misi 16. Berbagi kue Pie Strawberry </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Akhirnya Aruna berhasil membuat pie strawberry yang lezat. Namun Aruna harus membagi kue tersebut kepada teman-temannya. Tiap orang memiliki porsi yang berbeda. Tugas kali ini adalah bagaimana agar Aruna dapat membagi kue pie sesuai dengan porsi temannya masing-masing. </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Pecahan ( Pembagian, penjumlahan, pengurangan, pecahan) </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            16 =>  '<p> <strong> Misi 17. Berburu resep kue dipasar </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Setelah membeli strawberry, langkah berikutnya adalah 
                    mencari bahan untuk membuat kue pie strawberry. 
                    Fulan membantu Aruna untuk mencari bahan-bahan tersebut. 
                    Di antara banyak toko yg menjual bumbu dengan takaran yg berbeda, 
                    Fulan harus mencari toko yg menjual bumbu dengan takaran 
                    yang sesuai dengan petunjuk yg sudah diberikan Aruna. </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Deret Geometri </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            17 => '<p> <strong> Misi 18. Membagi buah-buahan kepada tokoh Vidyanusa sesuai takaran permintaan masing-masing. </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> ---------------------------- </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Perbandingan dan Skala </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            18 => '<p> <strong> Misi 19. Olah hasil perkebunan dengan membuat jus </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> ---------------------------- </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Sistem persamaan linear 1 dan 2 variabel </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            19 => '<p> <strong> Misi 20. Menyatukan 4 jenis batu yg sama yg akan dipakai untuk membangun bendungan </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> ---------------------------- </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br>Kesebangunan dan Kongruen </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            20 => '<p> <strong> Misi 21. Membangun bendungan irigasi </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> Setelah berhasil mengumpulkan bebatuan, tugas berikutnya adalah membangun bendungan sesuai dengan desain bendungan yang ada.  </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> 1. Relasi dua himpunan <br> 2. Pemetaan <br> a. Syarat pemetaan A ke B </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            21 => '<p> <strong> Misi 21. Menimbang buah </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> ------------------- </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Fungsi </p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            22 => '<p> <strong> Misi 22. Menghidupkan listrik </strong><br>'
            . '<p> <strong> Deskripsi Game : </strong> <br> ------------------- </p>'
            . '<p> <strong> Materi yang dipelajari : </strong> <br> Pangkat Tidak sebenarnya</p>'
            . '<p> <strong> TIU : </strong> <br> --------------------------<br></p>'
            . '<p> <strong> TIK : </strong><br>------------------------------</p>'     
            , 
            
        );
        $data['deskripsi'] = $penjelasan[$idx];
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('game/detail',$data);
        $this->load->view('include/footer');
    }
    
    function play(){
        $data['username'] = $_SESSION['USER']['USERNAME'];
         $this->load->view('game',$data);
    }
    
    //07/06/2015 utk partial game
     function playGame(){
        $swf = $this->uri->segment(3);
        $data['username'] = $_SESSION['USER']['USERNAME'];
        $data['swf'] = $swf;
        $this->load->view('game_partial',$data);
    }

}

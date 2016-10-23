/*
Created by   : A. Wisnu Mulyadi
Created Date : 11/02/2015
Purpose		 : Komunikasi data antara PHP - AS3.0 berkenaan dengan User
*/
package actions
{
	import flash.net.*;
	import flash.events.Event;
	import com.adobe.serialization.json.JSON;

	public class UserController
	{
		//Deklarasi variabel
		public var isLoaded:Boolean = false;
		public var userModelArray:Array = new Array();
		public var phpLoader:URLLoader;

		public function doGetUserData()
		{
			//Deklarasi variabel PHP untuk komunikasi data
			var phpVars:URLVariables = new URLVariables();
			//Deklarasi file request ke alamat PHP sesuai dengan kebutuhan
			var phpFileRequest:URLRequest = new URLRequest("http://localhost/vidyanusa_lokal/php/retrieve.php");
			phpFileRequest.method = URLRequestMethod.POST;
			//Masukkan variabel PHP untuk ikut dalam request
			phpFileRequest.data = phpVars;
			
			//Siapkan loader untuk kembalian dari request
			phpLoader = new URLLoader();
			//Data Format sebagai TEXT, PHP akan mengembalikan data dalam bentuk JSON
			phpLoader.dataFormat = URLLoaderDataFormat.TEXT;
			//Tambahkan listener ketika sudah beres melakukan load
			phpLoader.addEventListener(Event.COMPLETE,doParseUserData);
			//Lakukan load
			phpLoader.load(phpFileRequest);
		}
		public function doParseUserData(e:Event)
		{
			//Decode kembalian dari PHP yang masih berupa JSON
			var dataPengguna:Object = JSON.decode(e.target.data);
			//Loop untuk setiap kembalian
			for (var i = 0; i < dataPengguna.players.length; i++)
			{
				//Deklarasi variabel UserModel
				var u:UserModel = new UserModel();
				//Assignments ke dalam objek uData
				u.KODE_RIWAYAT = dataPengguna.players[i].KODE_RIWAYAT;
				u.USERNAME = dataPengguna.players[i].USERNAME;
				u.KODE_PERMAINAN = dataPengguna.players[i].KODE_PERMAINAN;
				u.TANGGAL_RIWAYAT = dataPengguna.players[i].TANGGAL_RIWAYAT;
				u.RIWAYAT_WAKTUMAIN = dataPengguna.players[i].RIWAYAT_WAKTUMAIN;
				u.RIWAYAT_EXP = dataPengguna.players[i].RIWAYAT_EXP;
				u.RIWAYAT_GOLD = dataPengguna.players[i].RIWAYAT_GOLD;
				u.RIWAYAT_KLIK = dataPengguna.players[i].RIWAYAT_KLIK;
				u.RIWAYAT_ACCURACY = dataPengguna.players[i].RIWAYAT_ACCURACY;
				u.RIWAYAT_STATUS = dataPengguna.players[i].RIWAYAT_STATUS;
				u.STATUS_RIWAYAT = dataPengguna.players[i].STATUS_RIWAYAT;
				u.KODE_AKTIFITAS = dataPengguna.players[i].KODE_AKTIFITAS;
				u.POSISI_X = dataPengguna.players[i].POSISI_X;
				u.POSISI_Y = dataPengguna.players[i].POSISI_Y;
				
				
				//Push ke dalam Array
				userModelArray.push(u);				
			}
			isLoaded = true;
		}

	}
}

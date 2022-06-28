<?php

    //koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "eosamsat";


    //buat koneksi

$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

    //jika tombol simpan di klik
if(isset($_POST['Tsimpan'])){
//pengujian data edit
if(isset($_GET['hal']) == "edit" ){
      //data akan edit data
      $edit = mysqli_query($koneksi, "UPDATE tmotor SET
                                            plat_kendaraan = '$_POST[nkendaraan]',
                                            nomor_plat = '$_POST[nplat]',
                                            nomor_seri = '$_POST[nseri]',
                                            nomor_rangka = '$_POST[nrangka]',
                                            provinsi = '$_POST[nprovinsi]'

                                      WHERE id_motor = '$_GET[id]'
                                              
                                              ");

//jika simpan sukses
        if  ($edit) {
          echo "<script>
                    alert('Edit Data Sukses!');
                    document.location='tambah.php';
                </script>";

      }else{
          echo "<script>
                    alert('Edit Data Gagal!');
                    document.location ='tambah.php';
                </script>";
            }

          }else{

            $simpan = mysqli_query($koneksi, "INSERT INTO tmotor (plat_kendaraan, nomor_plat, nomor_seri, nomor_rangka, provinsi)
            VALUE (  '$_POST[nkendaraan]', '$_POST[nplat]', '$_POST[nseri]', '$_POST[nrangka]', '$_POST[nprovinsi]')
            ");

      //uji jika simpan sukses
            if  ($simpan) {
            echo "<script>
            alert('Simpan Data Sukses!');
            document.location='tambah.php';
            </script>";

            }else{
            echo "<script>
            alert('Simpan Data Gagal!');
            document.location ='tambah.php';
            </script>";
        }

    }           
  }
             //deklarasi variabel data edit

$vplat_kendaraan =" ";
$vnomor_plat =" ";
$vnomor_seri =" ";
$vnomor_rangka =" ";
$vprovinsi =" ";


    //pengujian edit & hapus

  if(isset($_GET['hal'])){
    if($_GET['hal'] == "edit"){

      $tampil = mysqli_query ($koneksi, "SELECT * FROM tmotor WHERE id_motor = '$_GET[id]' ");
      $data = mysqli_fetch_array($tampil);
      if ($data){

        $vplat_kendaraan= $data['plat_kendaraan'];
        $vnomor_plat = $data['nomor_plat'];
        $vnomor_seri = $data['nomor_seri'];
        $vnomor_rangka = $data['nomor_rangka'];
        $vprovinsi = $data['provinsi'];
      }

    }else if ($_GET['hal'] == "hapus"){
      //hapus data
      $hapus = mysqli_query ($koneksi, "DELETE FROM tmotor WHERE id_motor = '$_GET[id]'");

       //uji jika hapus sukses
       if  ($hapus) {
        echo "<script>
        alert('Hapus Data Sukses!');
        document.location='tambah.php';
        </script>";

        }else{
        echo "<script>
        alert('Hapus Data Gagal!');
        document.location ='tambah.php';
        </script>";
    }

} 


    }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-SAMSAT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/d394af271e.js" crossorigin="anonymous"></script>
  <link href="assets/css/tambahset.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-around">

      <div class="logo">
        <h1><a href="index.php">EO-SAMSAT</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="tambah.html">Tambah Kendaraan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="inner-page.html">Login/Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column  align-items-center ">
    <div id="heroCarousel" data-bs-interval="2000" class="container carousel carousel-fade" data-bs-ride="carousel">
      <div class="carousel-item active">
        <div class="carousel-container">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <br>
    <div class="container">
        <h3 class="text-center">Data Motor</h3>
        <h3 class="text-center">Kawasan Yogyakarta</h3>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header text-light" style ="background-color: #2E3040">
                       Form Input Data Motor
                    </div>

      <div class="card-body ">
        <form method="POST">
        <div class="mb-3">
          <select class="form-select" name="nkendaraan">
          <option selected="" disabled="" value="">Sumatra</option>
            <option value="BL">BL</option>
            <option value="BB">BB</option>
            <option value="BK">BK</option>
            <option value="BA">BA</option>
            <option value="BM">BM</option>
            <option value="BH">BH</option>
            <option value="BD">BD</option>
            <option value="BP">BP</option>
            <option value="BG">BG</option>
            <option value="BN">BN</option>
            <option value="BE">BE</option>
              <option selected="" disabled="">DKI Jakarta, Banten, Jawa Barat</option>
              <option value="A">A</option>
            <option value="B">B</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="T">T</option>
            <option value="Z">Z</option>
          <option selected="" disabled="">Jawa Tengah dan DI Yogyakarta</option>					
          <option value="G">G</option>
            <option value="H">H</option>
            <option value="K">K</option>
            <option value="R">R</option>
            <option value="AA">AA</option>
            <option value="AB">AB</option>
            <option value="AD">AD</option>	
            
          <option selected="" disabled="">Jawa Timur</option>					
            <option value="AE">AE</option>
            <option value="AG">AG</option>
            <option value="L">L</option>
            <option value="M">M</option>
            <option value="N">N</option>
            <option value="P">P</option>
            <option value="S">S</option>	
            <option value="W">W</option>				
          <option selected="" disabled="">Bali dan Nusa Tenggara</option>					
            <option value="DK">DK</option>
            <option value="DR">DR</option>
            <option value="EA">EA</option>
            <option value="DH">DH</option>
            <option value="EB">EB</option>
            <option value="ED">ED</option>
          <option value="KB">KB
            </option><option value="DA">DA</option>
            <option value="KH">KH</option>
            <option value="KT">KT</option>
         <option selected="" disabled="">Sulawesi</option>					
            <option value="DB">DB</option>
            <option value="DC">DC</option>
            <option value="DD">DD</option>
            <option value="DL">DL</option>								
            <option value="DM">DM</option>					
            <option value="DN">DN</option>	
            <option value="DT">DT</option>	
            
            <option selected="" disabled="">Maluku dan Papua</option>					
            <option value="DE">DE</option>
            <option value="DG">DG</option>
            <option value="DS">DS</option>
          <option selected="" value="<?=$vplat_kendaraan?>"><?=$vplat_kendaraan?></option>
       
        </select>
        </div>

          <div class="row">
            <div class="col">
              <div class="mb-3">
              <input type="number" name="nplat" value="<?=$vnomor_plat ?>"  class="form-control " placeholder="Nomor Plat"   /> 
            </div>
          </div>

        <div class="col">
               <div class="mb-3">
               <input type="number"  name="nseri" value="<?=$vnomor_seri ?>" class="form-control " placeholder="Nomor Seri"   /> 
             </div>
            </div>
         </div>
				 
				
        <div class="row">
          <div class="col">
            <div class="mb-3">     
              <input type="number"  name="nrangka" value="<?=$vnomor_rangka ?>" class="form-control " placeholder="Digit Terakhir 5 Nomor Rangka"   /> 
          </div>
        </div>

        
				<div class="col">
          <div class="mb-3">
          <select class="form-select" name="nprovinsi">
          <!-- <option selected="" disabled="">Pilih Provinsi</option> -->
          <option value="<?=$vprovinsi?>"><?=$vprovinsi?></option>
				<option value="Aceh">Aceh</option>
									<option value="Bali">Bali</option>
									<option value="Banten">Banten</option>
									<option value="Bengkulu">Bengkulu</option>
									<option value="DI Yogyakarta">DI Yogyakarta</option>
				<option value="Gorontalo">Gorontalo</option>
									<option value="DKI Jakarta">DKI Jakarta</option>
							
				<option value="JAMBI">JAMBI</option>
									<option value="Jawa Barat">Jawa Barat</option>
									<option value="Jawa Tengah">Jawa Tengah</option>
									<option value="Jawa Timur">Jawa Timur</option>
				<option value="Kalimantan Barat">Kalimantan Barat</option>
				<option value="KALIMANTAN SELATAN">KALIMANTAN SELATAN</option>
									<option value="Kalimantan Tengah">Kalimantan Tengah</option>
				
				<option value="Kalimantan Timur">Kalimantan Timur</option>
				<option value="KALIMANTAN UTARA">KALIMANTAN UTARA</option>
				<option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
				<option value="Kepulauan Riau">Kepulauan Riau</option>
				<option value="Lampung">Lampung</option>
				<option value="Maluku">Maluku</option>
									<option value="Maluku Utara">Maluku Utara</option>
				<option value="NTB">NTB</option>
				<option value="NTT">NTT</option>
				<option value="Papua">Papua</option>	
				<option value="Papua Barat">Papua Barat</option>
									<option value="Riau">Riau</option>		
				<option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
				<option value="Sulawesi Selatan">Sulawesi Selatan</option>	
				<option value="Sulawesi Barat">Sulawesi Bara</option>
				<option value="Sulawesi Tengah">Sulawesi Tengah</option>
				<option value="Sulawesi Utara">Sulawesi Utara</option>	
				<option value="Sumatra Barat">Sumatra Barat</option>
				<option value="Sumatra Selatan">Sumatra Selatan</option>
				<option value="Sumatra Utara">Sumatra Utara</option>
           </select>
        </div>
      </div>
      </div>
      
						
        <div class="text-center">
          <hr>
          <button class="btn btn-dark" name="Tsimpan" type="submit">Simpan</button>
          <button class="btn btn-danger" name="Tkosongkan" type="reset">Hapus</button>
        </div>
      </div>
      <div class="card-footer text-light" style ="background-color: #2E3040"></div>
    </form>

        
        
        <div class="card mt-5">
            <div class="card-header text-light" style ="background-color: #2E3040">
                Data Motor
            </div>
            <div class="card-body">
              <div class="col-md-6 mx-auto">
                <form method="POST">
                  <div class="input-group mb-3">
                    <input type ="text" name="tcari"class="form-control" placeholder="Masukan Kata Kunci Pencarian">
                    <button class="btn btn-primary" name="bcari"type="submit">Cari</button>
                    <button class="btn btn-danger" name="breset"type="submit">Reset</button>
                  </div>
                </form>

              </div>
            <table class="table table-striped table-hover table-bordered">
              <tr>
                <th>No</th>
                <th>Plat Kendaraan</th>
                <th>Nomor Plat</th>
                <th>Nomor Seri</th>
                <th>Nomor Rangka</th>
                <th>Provinsi</th>
                <th>Aksi</th>
              </tr>

              <?php
              //menampilkan data
                
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tmotor order by id_motor desc");
                while($data = mysqli_fetch_array($tampil)) : 

              ?>

              <tr>
                <td><?= $no++ ?></td>
                <td><?=$data ['plat_kendaraan']?></td>
                <td><?=$data ['nomor_plat']?></td>
                <td><?=$data ['nomor_seri']?></td>
                <td><?=$data ['nomor_rangka']?></td>
                <td><?=$data ['provinsi']?></td>
                <td>
                  <a href="tambah.php?hal=edit&id=<?=$data['id_motor'] ?>" class="btn btn-warning">Edit</a>

                  <a href="tambah.php?hal=hapus&id=<?=$data['id_motor'] ?>" 
                  class="btn btn-dark" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
                </td>
              </tr>
              <?php endwhile;?>

            </table>
                
                </div>
                <div class="card-footer text-light" style ="background-color: #2E3040"></div>
            </div>
        </div>
        
    </div>

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>
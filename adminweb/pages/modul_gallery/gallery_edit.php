<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit gallery</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<script>
  function validateForm() {
      var a = document.forms["myForm"]["nama"].value;
      var b = document.forms["myForm"]["seo"].value;
      var c = document.forms["myForm"]["keterangan"].value;
      if (a == "0") {
          alert("Silahkan isi nama");
          return false;
      }
      if (b == "") {
          alert("seo tidak boleh kosong");
          return false;
      }
      if (c == "") {
          alert("keterangan tidak boleh kosong");
          return false;
      }
  }
</script>
<?php
  $query="SELECT * FROM gallery WHERE id = '$_GET[id]' ";
  $result = $crud->getData($query);

  $id="";
  $judul="";
  $isi="";
  $author="";
  $tgl="";
  $foto="";

  foreach ($result as $res) {
    $id = $res['id'];
    $nama = $res['nama_gallery'];
    $keterangan = $res['keterangan'];
    $seo = $res['gallery_seo'];
    $foto = $res['gbr_gallery'];
  }
?>

<form name="myForm" onsubmit="return validateForm()" action="modul_gallery/act_edit_gallery.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
	  <label for="exampleInputJudul">Nama</label>
	  <input type="hidden" name="id" value="<?php echo $id; ?>" >
    <input type="hidden" name="nmFile" value="<?php echo $foto; ?>" >

    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" >
	</div>
	<div class="form-group">
	  <label for="exampleInputIsi">Isi</label>	  
	  <textarea name="keterangan" class="form-control" id="my-textarea-id"> <?php echo $keterangan; ?> </textarea>
		<script type="text/javascript">
			CKEDITOR.replace('my-textarea-id', {
				"extraPlugins": "imagebrowser"
			});
		</script>
	</div>
	<div class="form-group">
	  <label for="exampleInputAuthor">SEO</label>
	  <input type="text" name="seo" class="form-control" placeholder="" value="<?php echo $seo; ?>">
	</div>
	
  <div class="form-group">
    <label for="exampleInputTanggal">Upload Foto</label>
    <p>
    <img src="../../img_gallery/<?php echo $foto; ?>" width=300 height=200>
    <br> *) Upload file PNG/JPG. Ukuran maksimal <b>5 MB</b>
    <br> *) Upload file foto jika ada perubahan <b>5 MB</b>
    <input type="file" name="file">
  </div>
	<div class="form-group">
	  <input type="submit" class="btn btn-success" value="Simpan">
	  <a href="?module=gallery"><input type="button" class="btn btn-warning" value="Batal"></a>
	</div>
</form>


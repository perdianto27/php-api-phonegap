<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah gallery</h1>
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
<form name="myForm" onsubmit="return validateForm()" 
      action="modul_gallery/act_tambah_gallery.php" method="POST" 
      enctype="multipart/form-data">
      
	<div class="form-group">
	  <label for="exampleInputJudul">Nama Geallery</label>
	  <input type="text" name="nama" class="form-control" placeholder="">
	</div>
  <div class="form-group">
    <label for="exampleInputAuthor">Gallery SEO</label>
    <input type="text" name="seo" class="form-control" placeholder="">
  </div>
	<div class="form-group">
	  <label for="exampleInputIsi">Keterangan</label>	  
	  <textarea name="keterangan" class="form-control" id="my-textarea-id"> </textarea>
		<script type="text/javascript">
			CKEDITOR.replace('my-textarea-id', {
				"extraPlugins": "imagebrowser"
			});
		</script>
	</div>
	
  <div class="form-group">
    <label for="exampleInputTanggal">Upload Gambar</label>
    <br> *) Upload file PNG/JPG. Ukuran maksimal <b>5 MB</b>
    <input type="file" name="file" required>
  </div>                    

	<div class="form-group">
	  <input type="submit" class="btn btn-success" value="Simpan">
	  <a href="?module=gallery"><input type="button" class="btn btn-warning" value="Batal"></a>
	</div>
</form>


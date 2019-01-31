<?php
	$query="SELECT * FROM gallery";
	$result = $crud->getData($query);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data gallery</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<a href="?module=gallery_tambah">
  <input type="button" class="btn btn-primary" value="Tambah Data">
</a>
<p>                                  
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Nama Gallery</th>
            <th>Gallery SEO</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
	<?php
		foreach ($result as $res) {
			echo "<tr>";
				echo "<td>".$res['nama_gallery']."</td>";
				echo "<td>".$res['gallery_seo']."</td>";				
				echo "<td>
					  <a href='?module=gallery_edit&id=$res[id]'><input type='button' class='btn btn-success' value='Edit'></a>
					  "; ?>

					  <a href="modul_gallery/act_delete_gallery.php?id=<?php echo $res['id']; ?>" onclick="return confirm('Are you sure?')">
					    <input type='button' class='btn btn-danger' value='Delete'>
					  </a>
					  
					  <?php 
					  echo "</td>";
			echo "</tr>";
		}
	?>
</tbody>
</table>

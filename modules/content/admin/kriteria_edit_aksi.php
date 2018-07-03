<?php 
if (!empty($_POST['kriteria'])) 
pr($_POST['id'],$_POST['kriteria'])
{
  $id = $_POST['id'];
  $kriteria = $_POST['kriteria'];

  $update = $db->Execute("UPDATE kriteria SET kriteria='$kriteria' WHERE id='$id'");
  if ($update) 
  {
    echo '<script>alert("Data berhasil diubah")</script>';
    header('Location:');
  }else{
    echo '<script>alert("Ubah data gagal")</script>';
  }
}
?>
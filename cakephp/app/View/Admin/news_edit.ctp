<br><br>
<b>PATRZ TU -></b>
<?php
  if($element['News']['Photo']){
    echo '<img src="'.$element['News']['Photo'].'"/>';
  }
?>
<br><br>
<form method="post" action="" enctype="multipart/form-data">
  <input name="data[News][id]" type="hidden" value="<?php echo $element['News']['id']; ?>">
  <input class="News_form" name="data[News][title]" value="<?php echo $element['News']['title']; ?>"><br>
  <textarea class="News_form" name="data[News][description]" rows="10"><?php echo $element['News']['description']; ?></textarea><br>
  <input type="file" name="data[News][Photo]" value=""><br>
  <input class="News_btn" type="submit">
</form>

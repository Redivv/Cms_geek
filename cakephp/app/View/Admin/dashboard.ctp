<h3>Strona Główna</h3>
<form class="" action="" method="post" style="margin:1%;">
  <input type="text" name="data[Settings][2][value]" placeholder="Tytuł firmy" style="width:100%;" value="<?php echo $app['Settings'][2]; ?>">
  <br><br>
  <textarea style="width:100%;" type="text" name="data[Settings][1][value]" rows="20"><?php echo $app['Settings'][1]?></textarea>
  <input class="News_btn" type="submit" style="float:right;">
</form>
<h3>O nas</h3>
<form class="" action="" method="post" style="margin:1%;">
  <input type="text" name="data[Settings][3][value]" placeholder="Tytuł" style="width:100%;" value="<?php echo $app['Settings'][3]; ?>">
  <br><br>
  <textarea style="width:100%;" type="text" name="data[Settings][4][value]" rows="20" placeholder="tekst"><?php echo $app['Settings'][4]; ?></textarea>
  <input class="News_btn" type="submit" style="float:right;">
</form>

<a href="/admin/news_edit/0">Dodaj nowy</a><br>

<table width="100%" border="1">
  <tr>
    <th>lp</th>
    <th>tytuł</th>
    <th>dodano</th>
    <th>opcje</th>
  </tr>
  <?php foreach ($element['News'] as $key => $value) {      // pętla for each dla newsów w element
    echo '
  <tr>
    <td>'.($key+1).'</td>
    <td>'.$value['title'].'</td>
    <td>'.$value['created'].'</td>
    <td>
      <a href="/admin/news_edit/'.$value['id'].'">Edytuj</a>
    </td>
  </tr>
  ';
  } ?>
</table>

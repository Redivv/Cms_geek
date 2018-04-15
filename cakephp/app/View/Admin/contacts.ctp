<table border="1" width="100%">
  <thead>
    <tr>
      <th>Lp</th>
      <th colspan="2">Dane</th>
      <th>Opcje</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($element['Contacts'] as $k => $v) {
      echo '
    <!-- START -->
    <tr>
      <td rowspan="2">'.$v['id'].'</td>
      <td>'.$v['name'].'</td>
      <td>'.$v['email'].'</td>
      <td rowspan="2">
      <a href="/admin/delete_contact/'.$v['id'].'">Usuń</a>
      </td>
    </tr>
    <tr>
      <td colspan="2">'.$v['message'].'</td>
    </tr>
    <!-- STOP -->
    ';
  } ?>
  </tbody>
</table>

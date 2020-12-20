<?php 
if(isset($_GET['file'])){
  
  libxml_disable_entity_loader(true);
  $xml = file_get_contents("./uploads/" . $_GET['file']);
  $dom = new DOMDocument(); 
  
  $dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
  $students = simplexml_import_dom($dom);
?>
<table>
  <tr>
    <th>Name</th>
    <th>Age</th>
    <th>School</th>
  </tr> 
<?php
  foreach ($students->student as $student) {
    echo '<tr><td>' . $student->name  . '</td>';
    echo '<td>' . $student->age  . '</td>';
    echo '<td>' . $student->school  . '</td> </tr>';
  }
}
?>
</table>
<!-- showing list of campaigns from DB for livesearch -->
<?php
$con=mysqli_connect('localhost','root','111111','issuebreakers');
$sql= "select * from campaigns";
$res= mysqli_query($con, $sql);
$xml= new XMLWriter();
$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);
$xml->startElement('campaigns');
while($row=mysqli_fetch_assoc($res))
{
  $xml->startElement('campaigns');
  $xml->startElement('cam_name');
  $xml->writeRaw($row['cam_name']);
  $xml->endElement();
  $xml->startElement('url');
  $xml->writeRaw("http://192.168.1.110/issuebreakers/cam_detail.php?cam_id=".$row['cam_id']);
  $xml->endElement();
  $xml->endElement();
}
$xml->endElement();
header('content-type: text/xml');
$xml->flush();
 ?>

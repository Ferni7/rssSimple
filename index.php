<?
header('Content-type: application/xml');

$feed = implode(file($_GET['feed']));

$xml = simplexml_load_string($feed);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
echo "<?xml version=\"1.0\"?>\n\r"
?>
<rss version="2.0">
  <channel>
<?
echo "\t<title>" . htmlspecialchars($array[channel][title]) . "</title>\r\n";
echo "\t<link>" . htmlspecialchars($array[channel][link]) . "</link>\r\n";
echo "\t<description>" . htmlspecialchars($array[channel][description]) . "</description>\r\n";

foreach ( $array[channel][item] as $item ) {
  echo "\t<item>\r\n";
  echo "\t\t<title>" . htmlspecialchars($item[title]) . "</title>\r\n";
  echo "\t\t<link>" . htmlspecialchars($item[link]) . "</link>\r\n";
  echo "\t</item>\r\n";
}
?>
  </channel>
</rss>
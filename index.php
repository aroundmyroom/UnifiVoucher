<header>
<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
</header>
<?php

$filename = 'voucher.json';

if (file_exists($filename)) {
    $message = "The voucher does exist and is probably not used yet. See the code below<br />";
} else {
    $message = "The voucher was used and will be created<br />";

include("/var/www/html/create_voucher.php");

}
echo $message;

$content = file_get_contents("voucher.json");
$decoded = json_decode($content, true);

//var_dump($decoded);


?>
<br /><br />
<b>Use Voucher Code to enable Guest access to the Hotspot</b>
<br /><br />
<table border="1">
<thead>
    <tr>
        <th>Voucher code</th>
        <th>WiFi Network</th>
        <th>admin_name</th>
        <th>quota</th>
        <th>Valid for Day(s)</th>
        <th>used</th>
        <th>qos_overwrite</th>
        <th>note</th>
        <th>status</th>
        <th>status_expires</th>
	<th>ID</th>
        <th>site_id</th>
        <th>Voucher Created</th>
    </tr>
</thead>    
<tbody>
<?php
    foreach($decoded as $result){

	$output[0] = substr($result['code'], 0, 5);
        $output[1] = substr($result['code'], 5);

?>
        <tr>
            <td><b><?php echo $output[0] ?> - <?php echo $output[1]; ?></b></td>
            <td><?php echo "Your WiFi Spot" ?></td>
	    <td><?php echo $result['admin_name']; ?></td>
 	    <td><?php echo $result['quota']; ?></td>
	    <td><center><?php echo round($result['duration']/1440,2); ?></center></td>
	    <td><?php echo $result['used']; ?></td>
	    <td><?php echo $result['qos_overwrite']; ?></td>
	    <td><?php echo $result['note']; ?></td>
	    <td><?php echo $result['status']; ?></td>
	    <td><?php echo $result['status_expires']; ?></td>
            <td><?php echo $result['_id']; ?></td>
            <td><?php echo $result['site_id']; ?></td>
            <td><?php echo date("Y-m-d - H:i:s", $result['create_time']); ?></td>
        </tr>
<br />
<br />
<?php
}
?>
</tbody>
</table>
<?php
    if (isset($_GET['delete'])) {
        unlink($_GET['delete']);
    }
?>
<html>
<?php
?>
<br />
   <a href="?delete=/var/www/html/voucher.json">Mark the Voucher as used</a><br/> Reload the page to see a new Voucher
</html>
<br /><br />
<a href=/index.php>Reload page</>

<?php
$result=file_get_contents('https://spreadsheets.google.com/feeds/list/1_x7LV_BwpTS5C661IDGmGdHRZ9b-2HdCuLjMNTnMGP0/od6/public/basic?alt=json');

$arr=json_decode($result,true);
$data=$arr['feed']['entry'];
?>
<table>
	<tr>
		<td>S.No</td>
		<td>Name</td>
		<td>Email</td>
		<td>Mobile</td>
	</tr>
	<?php 
	$i=1;
	foreach($data as $list){
		$str=$list['content']['$t'];
		$arr=explode(",",$str);
		$emailArr=explode(":",$arr[0]);
		$mobileArr=explode(":",$arr[1]);
		echo "<tr>
			<td>$i</td>
			<td>".$list['title']['$t']."</td>
			<td>".$emailArr[1]."</td>
			<td>".$mobileArr[1]."</td>
		</tr>";
		$i++;
	}
	?>
</table>



<div>
<table id='linkData'>
<th>Link</th>
<th>Url</th>
<th>Visits</th>
<?php
	$stats=mysql_query('SELECT * FROM `'.DB_PREFIX.'urls`');
	while($stats_row=mysql_fetch_array($stats)){
		print('<tr id="odd"><td>/'.$stats_row['short_link'].'</td><td class="url">'.$stats_row['url'].'</td><td>'.$stats_row['visits'].'</td></tr>');
		$stats_row=mysql_fetch_array($stats);
		if($stats_row)
		print('<tr  id="even"><td>/'.$stats_row['short_link'].'</td><td class="url">'.$stats_row['url'].'</td><td>'.$stats_row['visits'].'</td></tr>');
		}
?>
</table>
<table id='visitData'>
<th>Link</th>
<th>IP</th>
<th>Referrer</th>
<th>Date & Time</th>
<?php
	$visit_stats=mysql_query('SELECT * FROM `'.DB_PREFIX.'log`');
	while($visit_stats_row=mysql_fetch_array($visit_stats)){
		print('<tr id="odd"><td>/'.$visit_stats_row['short_link'].'</td><td>'.$visit_stats_row['ip'].'</td><td  class="ref">'.$visit_stats_row['referrer'].'</td><td>'.$visit_stats_row['datetime'].'</td></tr>');
		$visit_stats_row=mysql_fetch_array($visit_stats);
		if($visit_stats_row)
		print('<tr  id="even"><td>/'.$visit_stats_row['short_link'].'</td><td>'.$visit_stats_row['ip'].'</td><td class="ref">'.$visit_stats_row['referrer'].'</td><td>'.$visit_stats_row['datetime'].'</td></tr>');
		}
	
?>
</table>
</div>
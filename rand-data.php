<?php
	$json = file_get_contents('https://www.land.mlit.go.jp/webland/api/TradeListSearch?from=20211&to=20222&city=10449');
	// $json = json_decode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	// json_encode(json_decode($json), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	// json_encode(json_decode($json));
	var_dump($json);
	
?>

<script>
	const js_array2 = JSON.parse('<?php echo $json; ?>');
	// console.log(js_array2.data[0]);
	const data_list = js_array2.data;
	console.log(data_list);
	console.log(data_list.length);
</script>
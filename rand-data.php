<?php
	$json = file_get_contents('https://www.land.mlit.go.jp/webland/api/TradeListSearch?from=20211&to=20222&city=10449');
	// $json = json_decode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	// json_encode(json_decode($json), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	// json_encode(json_decode($json));
	var_dump($json);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rand-data</title>
</head>
<body>
<table class="content_table" id ="content_table">
    <thead>
      <tr>
        <th>コード</th>
        <th>間</th>
        <th>建築年</th>
        <th>都市計画</th>
        <th>分類</th>
        <th>Coverage ratio</th>
        <th>向き</th>
        <th>床面積比</th>
        <th>間口</th>
        <th>土地形</th>
        <th>市区町村</th>
        <th>地域</th>
        <th>町コード</th>
        <th>期間</th>
        <th>都道府県</th>
        <th>目的</th>
        <th>分類</th>
        <th>構造</th>
        <th>延床面積</th>
        <th>卸値</th>
        <th>地目</th>
        <th>利用用途</th>




        <div id = "test"></div>
      </tr>
    </thead>
    <tbody id="out_data_list"></tbody>  <!-- ここに配列の中身を表示させる -->
  </table>
  


  <script>
	const js_array2 = JSON.parse('<?php echo $json; ?>');
	// console.log(js_array2.data[0]);
	const data_list = js_array2.data;
	console.log(data_list);
	console.log(data_list.length);
  document.getElementById('test').textContent = 'textContentでHTMLを書き換えています';
  const out_data_list = document.getElementById("out_data_list");

  const key =[
    'Area',
    'Breadth',
    'BuildingYear',
    'CityPlanning',
    'Classification',
    'CoverageRatio',
    'Direction',
    'FloorAreaRatio',
    'Frontage',
    'LandShape',
    'Municipality',
    'DistrictName',
    'MunicipalityCode',
    'Period',
    'Prefecture',
    'Purpose',
    'Region',
    'Structure',
    'TotalFloorArea',
    'TradePrice',
    'Type',
    'Use'
  ];


  console.log(key);

  // || は左側が一致しなかった時に右側にする
  // const trim_data = data_list.map( t => key.map(k => t[k] || '?'));
  // console.log(trim_data);

  var trim_data = [];
  data_list.forEach(t => {
    const tr = document.createElement("tr"); 
    out_data_list.appendChild(tr);

    const row = [];
    key.forEach(k => {
      const td = document.createElement("td");
      td.textContent = t[k] || "?";
      tr.appendChild(td);
      // row.push(t[k] || "?")
    })
    // console.log(row)
    trim_data.push(row)
  })
  console.log(trim_data)




  // data_list.forEach((land) => {
  //   const tr = document.createElement("tr");  
  //   out_data_list.appendChild(tr);  //表に行を追加
  //   行の中を生成
  //   .forEach((arr) => {
  //     const td = document.createElement("td");
  //     td.textContent = arr[1];
  //     tr.appendChild(td);
  //   });
  // });
</script>
</body>
</html>


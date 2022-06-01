<?php
	$json = file_get_contents('https://www.land.mlit.go.jp/webland/api/TradeListSearch?from=20211&to=20222&city=10449');
	//$json2 = file_get_contents('https://www.land.mlit.go.jp/webland/api/TradeListSearch?from=20191&to=20204&city=10449');

  //カウント数が記録してあるファイルを読み書きできるモードで開く
  $fp = fopen('count.txt', 'r+b');

  //ファイルからカウント数を取得する
  $count = fgets($fp);

  //カウント数を1増やす
  $count++;

  //カウント数の分割
  $count_ary = str_split($count);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>rand-data</title>
</head>
<body>
<div class="access_area">
  <h1>アクセスカウンタ</h1>
  <div class="counter-area">
    <ul class="access-count">
      <?php
      //ループ処理でアクセス数の数字を1つづつli要素に入れる
      for($i = 0; $i < count($count_ary); $i++){
        echo'<li>'.$count_ary[$i] .'</li>';
      }
      ?>
    </ul>
  </div>
</div>

<div class="table1">
  <h1>2021年1月~2022年2月</h1>
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
</div>


<!-- <div class="table2">
  <h1>2019年1月~2021年12月</h1>
  <table class="content_table2" id ="content_table2">
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
      <tbody id="out_data_list2"></tbody>  <!-- ここに配列の中身を表示させる -->
  </table>
</div> -->



<?php
  //ポインターをファイルの先頭に戻す
  rewind($fp);

  //最新のアクセス数をファイルに書き込む
  fwrite($fp, $count);

  //ファイルを閉じる
  fclose($fp);
?>





  <script>
	const js_array2 = JSON.parse('<?php echo $json; ?>');
	const data_list = js_array2.data;
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

  // || は左側が一致しなかった時に右側にする 一番短い書き方
  // const trim_data = data_list.map( t => key.map(k => t[k] || '?'));
  // console.log(trim_data);

  data_list.forEach(t => {
    const tr = document.createElement("tr"); 
    out_data_list.appendChild(tr);

    key.forEach(k => {
      const td = document.createElement("td");
      td.textContent = t[k] || "?";
      tr.appendChild(td);
    })
  })



  // function creataTable(jsonlist, outlist){
  //   jsonlist.forEach(t => {
  //     const tr = document.createElement("tr");
  //     outlist.appendChild(tr);

  //     key.forEach(k => {
  //       const td = document.createElement("td");
  //       td.textContent = t[k] || "?";
  //       tr.appendChild(td);
  //     })
  //   })
  // }

  // const js_array1 = JSON.parse('<?php echo $json2; ?>');
	// const data_list2 = js_array1.data;
  // const out_data_list2 = document.getElementById("out_data_list2");
  // creataTable(data_list2, )

</script>
</body>
</html>


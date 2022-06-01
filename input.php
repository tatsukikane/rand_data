<!-- 入力画面 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力画面</title>
</head>
<body>
  <form action="write.php" method="post">
    <div>
        <label for="name">名前</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="adress">住所</label>
        <input type="text" id="adress" name="adress">
    </div>
    <div>
        <label for="tel">電話番号</label>
        <input type="number" id="tel" name="tel">
    </div>
    <div>
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email">
    </div>
    <input type="submit" value="送信する">
  </form>
  
</body>
</html>
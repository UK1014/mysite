<!DOCTYPE html>
<?php
    $link = mysqli_connect("localhost","root","","recipe_table");
    if($link == null){die("接続に失敗しました");}
    mysqli_set_charset($link,"utf8");
    $rid = $_GET["rid"];
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>recipe sample site4</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- jQueryの読み込み -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<!--header部分-->
    <header class="header clearfix">
            <div class="header-title"><h1>RECIPE SITE</h1></div>
            <!--<span class="fa fa-bars menu-icon"></span>-->
            <div class="header-right"><a id="login-show">login</a></div>
            <div class="header-right"><a class="signup signup-show">新規登録</a></div>
            <div class="header-right"><a href="index.php">トップページへ</a></div>
    </header>
    
    
 <div class="signup-modal-wrapper" id="signup-modal">
    <div class="modal">
      <div class="close-modal">
        <i class="fa fa-2x fa-times"></i>
      </div>
      <div id="signup-form">
        <h2>Emailで新規登録</h2>
        <form action="index10.php" method="post">
          <input class="form-control" type="text" name="f1" placeholder="ユーザーネーム">
          <input class="form-control" type="text" name="f2" placeholder="メールアドレス">
          <input class="form-control" type="password" name="f3" placeholder="パスワード">
          <input id="submit-btn" type="submit" value="新規登録">
        </form>
      </div>
    </div>   
</div>
    
    <!-- 「login-modal」というidを追加してください -->
  <div class="login-modal-wrapper" id="login-modal">
    <!-- ログインのモーダル部分のHTMLを貼り付けてください -->
    <div class="modal">
      <div class="close-modal">
        <i class="fa fa-2x fa-times"></i>
      </div>
      <div id="login-form">
        <h2>Emailログイン</h2>
        <form action="#">
          <input class="form-control" type="text" placeholder="メールアドレス">
          <input class="form-control" type="password" placeholder="パスワード">
          <div id="submit-btn">ログイン</div>
        </form>
      </div>
    </div>    
  </div>
  
    

<div class="wrapper clearfix">
<!--main部分-->

    <div class="keep-wrapper">
    <div class="side-wrapper">
        <div class="logo"></div>
        <nav class="nav">
            <ul>
                <li class="item"><a href="index.php">Home</a></li>
                <li class="item"><a href="index2.php">レシピ投稿</a></li>
                <li class="item"><a href="index5.php">レシピ編集</a></li>
                <li class="item"><a href="index8.php">レシピ削除</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-wrapper">
        <h2>レシピ表示</h2>
        <div class="main-wrapper2">    
        <?php
                    $result=mysqli_query($link, "SELECT * FROM recipe");
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        if($row['recipe_no'] == $rid){
                            echo '<h4>料理名</h4>';
                            echo "<p>".$row['recipe_name']."</p>";
                            echo '<div class="recepi_food">';
                            echo '<h4>材料</h4>';
                            echo "<p>".$row['recipe_food']."</p>";
                            echo '<h4>手順</h4>';
                            echo "<p>".$row['information']."</p>";
                            echo '</div>';
                        }
                    }
                    mysqli_free_result($result);
                    mysqli_close($link);
        ?>
        </div>
    </div>
    </div>
</div>
    <footer class="footer">
        <p class="copyright">Copyright © 2017 COCK SITE</p>
    </footer>
  <script src="script.js"></script>

</body>
</html>
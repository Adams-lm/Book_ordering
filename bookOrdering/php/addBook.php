<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>Add A New Book</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <h2>增加新书籍</h2>
<?php
  if (isset($_POST['submit'])) {
    // Grab the message data from the POST
    $title = $_POST['title'];
    $author = $_POST['author'];
    $version = $_POST['version'];
    $press = $_POST['press'];
    $isbn = $_POST['isbn'];
    $price = $_POST['price'];
   
    if (!empty($title) && !empty($author) && !empty($version) && !empty($press) && !empty($isbn) && !empty($price)) {
        include "conn.php";
        // Write the data to the database
        $query = "INSERT INTO book (title,author,version,press,isbn,price) VALUES ( '$title', '$author', '$version', '$press','$isbn','$price')";
        mysqli_query($conn, $query);
        $query_nowid = "select max(book_id) from book";
        $nowid = mysqli_fetch_array(mysqli_query($conn, $query_nowid));
        $id = $nowid[0];
        $querys = "INSERT INTO stock VALUES ('$id', '0')";
        mysqli_query($conn, $querys);
        // Confirm success with the user
        echo '<p>添加成功!</p>';
        echo '<p><a href="../func/sellerFunc/bookManage.php">&lt;&lt; 返回书籍管理界面</a></p>';
        //  清空输入框
        $title = "";
        $author = "";
        $version = "";
        $press = "";
        $isbn = "";
        $price = "";
        mysqli_close($conn);
    }
    else {
      echo '<p class="error">请输入所有与书籍相关的信息.</p>';
    }
  }
?>

  <hr>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="title">书籍名称:</label>
    <input type="text" id="title" name="title" value="<?php if (!empty($title)) echo $title; ?>" /><br>
    <br>
    <label for="author">书籍作者:</label>
    <input type="text" id="author" name="author" value="<?php if (!empty($author)) echo $author; ?>"> <br>
    <br>
    <label for="version">书籍版本号:</label>
    <input type="text" id="version" name="version" value="<?php if (!empty($version)) echo $version; ?>"> <br>
    <br>
    <label for="press">书籍出版社:</label>
    <input type="text" id="press" name="press" value="<?php if (!empty($press)) echo $press; ?>"> <br>
    <br>
    <label for="isbn">书籍isbn:</label>
    <input type="text" id="isbn" name="isbn" value="<?php if (!empty($isbn)) echo $isbn; ?>"> <br>
    <br>
    <label for="price">书籍价格:</label>
    <input type="text" id="price" name="price" value="<?php if (!empty($price)) echo $price; ?>"> <br>
    <br>                
    <hr>
    <input type="submit" value="增加" name="submit" />
  </form>
</body> 
</html>
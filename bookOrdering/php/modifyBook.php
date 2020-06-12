<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>Modify A Book</title>
  <!-- <link rel="stylesheet" href="../css/style.css" /> -->
</head>
<body>
  <h2>Modify A Book</h2>
<?php
  include "conn.php";
  $bookId = $_GET["book_id"];
  $query = "select * from book where book_id = $bookId";
  $row = mysqli_fetch_array(mysqli_query($conn,$query));
?>
  <form method="post" action="updateBook.php">
    <input type='hidden' name='book_id' value="<?php echo $bookId;?>"/>
    <label for="title">书籍名称:</label>
    <input type="text" id="title" name="title" value="<?php echo $row[1]; ?>" /><br>
    <br>
    <label for="author">书籍作者:</label>
    <input type="text" id="author" name="author" value="<?php echo $row[2]; ?>"> <br>
    <br>
    <label for="version">书籍版本号:</label>
    <input type="text" id="version" name="version" value="<?php echo $row[3]; ?>"> <br>
    <br>
    <label for="press">书籍出版社:</label>
    <input type="text" id="press" name="press" value="<?php echo $row[4]; ?>"> <br>
    <br>
    <label for="isbn">书籍isbn:</label>
    <input type="text" id="isbn" name="isbn" value="<?php echo $row[5]; ?>"> <br>
    <br>
    <label for="price">书籍价格:</label>
    <input type="text" id="price" name="price" value="<?php echo $row[6]; ?>"> <br>
    <br>
    <hr>
    <input type="submit" value="修改" name="submit" />                
  </form>
</body> 
</html>
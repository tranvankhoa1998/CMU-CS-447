<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php
    session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: dang-nhap.php');
		exit();
	  }
	  echo 'Username : ' . $_SESSION['username'];
	  if (!isset($_SESSION['user_id'])) {
		header('Location: dang-nhap.php');
		exit();
	  }
	  echo ' ID : ' . $_SESSION['user_id'];
	// Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
	$sql = "select * from posts where is_public = 1 order by createdate desc limit 16";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
        ?>   
<?php
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
	// Lấy ra nội dung bài viết theo điều kiện id
	$sql = "select * from posts where id = $id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
	
?>
<table width="100%" border="1">
	<tr>
	<li><a href="indexuser.php">Trang chủ</a></li>
	<li><a href="admin/them-bai-viet-ck.php">thêm bài viết</a></li>
</table>
			<div class="innertube">
			<?php 
				while ( $data = mysqli_fetch_array($query) ) {
			?>
				<h3><?php echo $data['title']; ?></h3></div></ br>
				<i> Ngày tạo : <?php echo $data['createdate']; ?></i>
				<p><?php echo $data['content']; ?></p>
			<?php } ?>
			<form method="post" action="">
  <textarea name="comment" placeholder="bình luận tại đây"></textarea>
  <button type="submit">thêm</button>
</form>
<div id="comment-container">
  <?php include 'binh-luan.php'; ?>
</div>
			</div>
		</main>
	<?php include "includes/menu.php" ?>
<?php include "includes/footer.php" ?>
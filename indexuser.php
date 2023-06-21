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
</div>
<nav>
<table width="100%" border="1">
	<tr>
	<li><a href="indexuser.php">Trang chủ</a></li>
	<li><a href="admin/them-bai-viet-ck.php">thêm bài viết</a></li>
</table>
			
</h2>
			  <h3 align="center">Danh sách bài viết </h3>
			  <html>
    <body>
	<div align="center">Tìm kiếm bài viết </div>
        <form method="get" action="search.php">
  <input type="text" name="query" placeholder="Search...">
  <button type="submit">Search</button>
</form>
        </div>
		</body>
</html>
	</ul>
	    </nav>
		    <main>
			<div class="innertube">
				<table width="100%" border="1">
					<tr>
					<?php
						// Khởi tạo biến đếm $i = 0
						$i = 0;
						// Lặp dữ liệu lấy data từ cơ sở dữ liệu
						while ( $data = mysqli_fetch_array($query)) {
							if ($i == 4) {
								echo "</tr>";
								$i = 0;
							}
					?>
						<td >
							<b><?php echo $data["title"];// In ra title bài viết ?></b>
							<p><?php echo substr($data["content"], 0, 100)." ...";// In ra nội dung bài viết lấy chỉ 100 ký tự ?></p>
							<a href="display.php?id=<?php echo $data["id"]; // Tạo liên kết đến trang display.php và truyền vào id bài viết ?>"> Xem thêm</a>
						</td>
					
					<?php
							$i++;
						}
						?>
					</table>	
				</div>
			</main>
	<section>
		<aside>
				<div class="innertube">
				<h1>Bài viết liên quan</h1>
                   <ul class="list-content">
                      <li><a href="#">Link 1</a></li>
                      <li><a href="#">Link 2</a></li>
                      <li><a href="#">Link 3</a></li>
                   </ul>
         </aside>
	</section>
	<?php include "includes/footer.php" ?>
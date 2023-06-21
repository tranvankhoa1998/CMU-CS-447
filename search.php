<?php include "includes/header.php" ?>
<?php require_once("includes/connection.php"); ?>
<?php
	if (isset($_GET['query'])) {
        $query = $_GET['query'];
      
        // escape special characters in the query
        $escaped_query = mysqli_real_escape_string($conn, $query);
      
        // search the posts table
        $sql = "SELECT * FROM posts WHERE title LIKE '%{$escaped_query}%'";
        $result = mysqli_query($conn, $sql);
      
        // display the results
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p>' . $row['content'] . '</p>';
          }
        } else {
          echo 'No results found';
        }
      
        // free the result set
        mysqli_free_result($result);
      }
      
      // close the connection
      mysqli_close($conn);
      ?>
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

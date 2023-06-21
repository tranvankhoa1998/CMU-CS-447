<?php require_once("includes/connection.php"); ?>
<?php session_start();
?>
<?php
$sql = "SELECT * FROM comments ORDER BY date DESC";
$result = mysqli_query($conn, $sql);

// display the comments
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="comment">';
    echo '<p class="comment-text">' . $row['comment'] . '</p>';
    echo '<p class="comment-date">' . $row['date'] . '</p>';
    echo '</div>';
  }
} else {
  echo 'No comments yet';
}

// free the result set
mysqli_free_result($result);

// close the connection
mysqli_close($conn);
?>
  
?>

<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" onerror="this.src='php/images/Default.png'" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['about']; ?></p>
            <input class="user-active" type="text" value="<?php echo $row['unique_id']; ?>" hidden>
          </div>
        </div>
        <a href="edit.php" class="logout">Edit</a>
        <a href="php/logout.php" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
        <button onclick="shareId()"><i class="fas fa-id-card"></i></button>
        <div class="popup">
        <span class="popuptext" id="myPopup">Copied!</span></div>
        <input type="text" name="share" id="share" value="http://localhost/ChatApp/share.php?user_id=<?php echo $row['unique_id']; ?>">
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>

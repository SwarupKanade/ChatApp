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
    <section class="chat-area">
      <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $chk = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($chk) <= 0){
            header("location: users.php");
          }
        ?>
        <input class="user-active" type="text" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
      <header class="header-info">
    
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <label for="image-att"><i class="fas fa-paperclip" style="margin-top: 12px;margin-right: 15px;"></i></label>
        <input type="file" id="image-att" name="image-att" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>

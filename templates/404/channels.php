<div id="error-block">
  <img src="/images/404.png">
  <span class="error-message">Uh-oh! You took a wrong turn.</span>
  <?php if($_GET['id'] != "") {?>
    <div class="create-channel">
      <button onclick="document.getElementById('create-channel-pop-up').style.display='block'" >Create Channel</button>
    </div>
    <div id="create-channel-pop-up" class="pop-up">
      <form method="post" class="pop-up-content animate" action="/../actions/create_channel.php">
        <div class="close-button">
          <span onclick="document.getElementById('create-channel-pop-up').style.display='none'" class="close">&times;</span>
        </div>
        <div class="container">
          <label><a>Name</a></label>
          <input type="text" name="name" placeholder="<?=$_GET['id']?>" required>
          <label><a>Description</a></label>
          <input type="textarea" name="description" placeholder="Description" required>
          <button type="submit">Create channel</button>
        </div>
      </form>
    </div>
  <?php }?>
</div>

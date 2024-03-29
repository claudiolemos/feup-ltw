<div id="search">
  <form method="get" action="/search.php">
    <input type="text" name="query" placeholder="Search..." required>
    <button type="submit">
      <i class="fa fa-search fa-2x"></i>
    </button>
  </form>
</div>
<aside id="sidebar">
  <div id="channel-id">
      <div class="name"><?=$channel['name']?></div>
      <p class="description"><?=$channel['description']?></p>
      <div class="subscribers">
        <?php if(($no_subscribers = getChannelSubscribers($channel['id'])) == 0){ ?>
          Nobody has subscribed yet! Be the first one.
        <?php } else{?>
          <?=$no_subscribers?>
          <?=$no_subscribers == 1? "subscriber" : "subscribers"?>
        <?php } ?>
      </div>
      <div class="creation">A community for <?=time_elapsed($channel['creation_day'])?></div>
  </div>
  <?php if(isset($_SESSION['username'])){ ?>
    <div class="subscription">
      <button><?=isSubscribed($_SESSION['username'], $channel['name'])? Unsubscribe : Subscribe?></button>
    </div>
    <div class="add-text-post">
      <button onclick="document.getElementById('add-text-post-pop-up').style.display='block'" >Add text post</button>
    </div>
    <div id="add-text-post-pop-up" class="pop-up">
      <form method="post" class="pop-up-content animate" action="/../actions/add_text_post.php">
        <div class="close-button">
          <span onclick="document.getElementById('add-text-post-pop-up').style.display='none'" class="close">&times;</span>
        </div>
        <div class="container">
          <label><a>Title</a></label>
          <input type="text" name="title" placeholder="Title" required>
          <label><a>Content</a></label>
          <textarea name="content" rows="15" placeholder="Content" required></textarea>
          <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
          <input type="hidden" name="channel" value="<?=$channel['name']?>">
          <button type="submit">Submit post</button>
        </div>
      </form>
    </div>
    <div class="add-link-post">
      <button onclick="document.getElementById('add-link-post-pop-up').style.display='block'" >Add link post</button>
    </div>
    <div id="add-link-post-pop-up" class="pop-up">
      <form method="post" class="pop-up-content animate" action="/../actions/add_link_post.php">
        <div class="close-button">
          <span onclick="document.getElementById('add-link-post-pop-up').style.display='none'" class="close">&times;</span>
        </div>
        <div class="container">
          <label><a>Title</a></label>
          <input type="text" name="title" placeholder="Title" required>
          <label><a>Link</a></label>
          <input type="url" name="link" placeholder="https://example.com" required>
          <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
          <input type="hidden" name="channel" value="<?=$channel['name']?>">
          <button type="submit">Submit post</button>
        </div>
      </form>
    </div>
  <?php } else{ ?>
    <div class="subscription">
      <button onclick="document.getElementById('login-pop-up').style.display='block'">Subscribe</button>
    </div>
    <div class="add-text-post">
      <button onclick="document.getElementById('login-pop-up').style.display='block'" >Add text post</button>
    </div>
    <div class="add-link-post">
      <button onclick="document.getElementById('login-pop-up').style.display='block'" >Add link post</button>
    </div>
  <?php }?>
</aside>

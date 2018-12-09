let postUpvote = document.querySelectorAll('#posts article .upvote, #posts article .upvoted');
let postDownvote = document.querySelectorAll('#posts article .downvote, #posts article .downvoted');

for(var i = 0; i < postUpvote.length; i++) {
  postUpvote[i].addEventListener('click', function(event) {
    event.preventDefault();
    let post_id = this.parentNode.parentNode.id;

    let request = new XMLHttpRequest();
    request.open("post", "/../actions/api_post_voting.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({post_id: post_id, vote: 1}));

    let upvoteClass = this.className;
    let downvoteClass = this.parentNode.querySelector('span + button').className;
    let votes = parseInt(this.parentNode.querySelector('span').innerHTML);

    if(upvoteClass == "upvote" && downvoteClass == "downvote"){
      this.parentNode.querySelector('span').innerHTML = votes + 1;
      this.className = "upvoted";
    }
    else if(upvoteClass == "upvoted" && downvoteClass == "downvote"){
      this.parentNode.querySelector('span').innerHTML = votes - 1;
      this.className = "upvote";
    }
    else if(upvoteClass == "upvote" && downvoteClass == "downvoted"){
      this.parentNode.querySelector('span').innerHTML = votes + 2;
      this.className = "upvoted";
      this.parentNode.querySelector('span + button').className = "downvote"
    }

  })
}

for(var i = 0; i < postDownvote.length; i++) {
  postDownvote[i].addEventListener('click', function(event) {
    event.preventDefault();
    let post_id = this.parentNode.parentNode.id;

    let request = new XMLHttpRequest();
    request.open("post", "/../actions/api_post_voting.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({post_id: post_id, vote: -1}));

    let upvoteClass = this.parentNode.querySelector('button').className;
    let downvoteClass = this.className;
    let votes = parseInt(this.parentNode.querySelector('span').innerHTML);

    if(upvoteClass == "upvote" && downvoteClass == "downvote"){
      this.parentNode.querySelector('span').innerHTML = votes - 1;
      this.className = "downvoted";
    }
    else if(upvoteClass == "upvote" && downvoteClass == "downvoted"){
      this.parentNode.querySelector('span').innerHTML = votes + 1;
      this.className = "downvote";
    }
    else if(upvoteClass == "upvoted" && downvoteClass == "downvote"){
      this.parentNode.querySelector('span').innerHTML = votes - 2;
      this.className = "downvoted";
      this.parentNode.querySelector('button').className = "upvote"
    }

  })
}
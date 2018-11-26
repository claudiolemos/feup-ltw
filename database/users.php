<?php
  include_once('database/connection.php');

  /**
   * Gets the karma of one user
   * @param  int $user_id id of the user
   * @return int user's karma
   */
  function getUserKarma($user_id){
    global $db;
    $stmt = $db->prepare('SELECT SUM(karma) as karma
                          FROM (
                          	SELECT SUM(votes) as karma
                          	FROM (
                          		SELECT VoteOnPost.post_id as id, SUM(VoteOnPost.value) as votes
                          		FROM Users, Posts, VoteOnPost
                          		WHERE Users.id = Posts.user_id AND Posts.id = VoteOnPost.post_id AND Posts.user_id = ?
                          		GROUP BY VoteOnPost.post_id
                          	)

                          	UNION ALL

                          	SELECT SUM(votes) as karma
                          	FROM (
                          		SELECT VoteOnComment.comment_id as id, SUM(VoteOnComment.value) as votes
                          		FROM Users, Comments, VoteOnComment
                          		WHERE Users.id = Comments.user_id AND Comments.id = VoteOnComment.comment_id AND Comments.user_id = ?
                          		GROUP BY VoteOnComment.comment_id
                          	)
                          )');
    $stmt->execute(array($user_id));
    return $stmt->fetchAll();
  }
?>

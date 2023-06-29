<?php

class Post extends User
{
  protected $pdo;

  function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function posts($user_id, $profileId, $num)
  {
    $userData = $this->userData($user_id);
    $stmt = $this->pdo->prepare("SELECT * FROM users LEFT JOIN profile ON users.user_id = profile.userId LEFT JOIN post ON post.userId = users.user_id WHERE post.userId = :user_id ORDER BY post.postedOn DESC LIMIT :num");

    $stmt->bindParam(":user_id", $profileId, PDO::PARAM_INT);
    $stmt->bindParam(":num", $num, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($posts as $post) {

?>
<div class="profile-timeLine">
  <div class="card news-feed-component border-0 mb-2">
    <div class="card-header bg-transparent news-feed-text">
      <div class="nf-1">
        <div class="nf-1-left">
          <div class="nf-1-profile-pic-wrapper">
            <a href="<?php echo BASE_URL . $post->userLink; ?>"></a>
            <img src="<?php echo BASE_URL . $post->profilePic; ?>" class="nf-1-profile-pic img-fluid"
              alt="<?php echo '' . $post->firstName . ' ' . $post->lastName . ''; ?>"
              title="<?php echo '' . $post->firstName . ' ' . $post->lastName . ''; ?>">
          </div>
          <div class="nf-1-profile-name-time-wrapper">
            <div class="nf-1-profile-name">
              <h6 class="nf-1-profile-name-text">
                <a href="<?php echo BASE_URL . $post->userLink; ?>">
                  <?php echo '' . $post->firstName . ' ' . $post->lastName . ''; ?>
                </a>
              </h6>
            </div>
            <div class="nf-1-profile-time-privacy grey-color">
              <div class="nf-1-profile-time">
                <span>
                  <?php echo $this->timeAgo($post->postedOn); ?>
                </span>
              </div>
              <div class="nf-1-profile-privacy">
                <i class="bi bi-globe-central-south-asia"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="nf-1-right">
          <div class="post-option">
            <div class="post-option-icon" data-postid="<?php echo $post->post_id; ?>"
              data-userid="<?php echo $user_id ?>">
              <i class="bi bi-three-dots grey-color"></i>
            </div>
            <div class="post-option-details-container"></div>
          </div>
        </div>
      </div>
      <div class="nf-2">
        <div class="nf-2-text" data-postid="<?php echo $post->post_id; ?>" data-userid="<?php echo $user_id; ?>"
          data-profilepic="<?php echo $post->profilePic; ?>">
          <p class="post-text"><?php echo $post->post; ?></p>
        </div>
        <div class="nf-2-img" data-postid="<?php echo $post->post_id; ?>" data-userid="<?php echo $user_id; ?>"
          data-profilepic="<?php echo $post->profilePic; ?>">
          <?php
                $imgJson = json_decode($post->postImage);
                $count = 0;
                if (is_array($imgJson)) {
                  for ($i = 0; $i < count($imgJson); $i++) {
                    echo '<div class="post-img-box" data-postimgid="' . $post->id . '" ><img src="' . BASE_URL . $imgJson['' . $count++ . '']->imageName . '" class="postImage img-fluid" data-userid="' . $user_id . '" data-postid="' . $post->post_id . '" data-profileid="' . $profileId . '"></div>';
                  }
                }
                ?>
        </div>
      </div>

    </div>
    <div class="card-body p-0">
      <div class="nf-3"></div>
      <div class="nf-4">
        <div class="action-wrap">
          <div class="like-action ra">
            <div class="like-action-icon">
              <img src="assets/image/likeAction.JPG" class="action-img img-fluid" alt="">
            </div>
            <div class="like-action-text grey-color">
              <span>Like</span>
            </div>
          </div>
          <div class="comment-action ra">
            <div class="comment-action-icon">
              <img src="assets/image/commentAction.JPG" class="action-img img-fluid" alt="">
            </div>
            <div class="comment-action-text grey-color">
              <div class="comment-wrap"></div>
              <div class="comment-text">Comment</div>
            </div>
          </div>
          <div class="share-action ra" data-postid="<?php echo $post->post_id; ?>" data-userid="<?php echo $user_id; ?>"
            data-profileid="<?php echo $profileId ?>" data-profilepic="<?php echo $post->profilePic; ?>">
            <div class="share-action-icon">
              <img src="assets/image/shareAction.JPG" class="action-img img-fluid" alt="">
            </div>
            <div class="share-action-text grey-color">
              <span>Share</span>
            </div>
          </div>
        </div>
      </div>
      <div class="nf-5"></div>
    </div>
    <div class="card-footer news-feed-photo bg-transparent"></div>
  </div>
</div>
<?php
    }
  }
  public function postUpd($user_id, $post_id, $editText)
  {
    $stmt = $this->pdo->prepare('UPDATE post SET post = :editText WHERE post_id =:post_id AND userId = :user_id');
    $stmt->bindParam(":editText", $editText, PDO::PARAM_STR);
    $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
?>
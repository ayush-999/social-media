<?php

include 'connect/login.php';
include 'core/load.php';

if (login::isLoggedIn()) {
  $userId = login::isLoggedIn();
} else {
  header('location: signIn.php');
}

if (isset($_GET['username']) == true && empty($_GET['username']) === false) {
  $username = $loadFromUser->checkInput($_GET['username']);
  $profileId = $loadFromUser->userIdByUsername($username);
} else {
  $profileId = $userId;
}
$profileData = $loadFromUser->userData($profileId);
$userData = $loadFromUser->userData($userId);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo '' . $profileData->firstName . ' ' . $profileData->lastName . ''; ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/image/favicon.ico" type="image/x-icon" />
  <!-- CDN CSS-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
  <!-- Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome-6/css/all.min.css" />
  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/dist/emojionearea.min.css" />
</head>

<body>
  <div class="u_p_id" data-uid="<?php echo $userId ?>" data-pid="<?php echo $profileId ?>"></div>
  <header id="header">
    <div class="header-wrapper">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-7 col-lg-7">
            <div class="logo-wrapper">
              <img src="assets/image/logo.png" class="img-fluid logo" alt="">
            </div>
            <div class="search-wrap">
              <div class="search">
                <input type="text" class="searchTerm" placeholder="Search here..">
                <button type="submit" class="searchButton">
                  <i class="fa-regular fa-magnifying-glass"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-lg-5">
            <ul class="d-flex align-items-center m-0 p-0">
              <li class="header-vertical-line">
                <a href="profile.php?username=<?php echo $userData->userLink; ?>" class="d-flex align-items-center">
                  <img src="<?php echo $userData->profilePic; ?>" class="img-fluid header-profile-picture"
                    alt="<?php echo '' . $userData->firstName . ' ' . $userData->lastName . ''; ?>"
                    title="<?php echo '' . $userData->firstName . ' ' . $userData->lastName . ''; ?>">
                  <h3 class="header-profile-text"><?php echo $userData->firstName; ?></h3>
                </a>
              </li>
              <li class="d-flex align-items-center header-vertical-line">
                <a href="index.php">
                  <span class="header-profile-text">Home</span>
                </a>
              </li>
              <li class="d-flex align-items-center header-vertical-line">
                <a href="#">
                  <span class="header-profile-text">Create</span>
                </a>
              </li>
              <li class="d-flex align-items-center header-vertical-line">
                <div class="icon-wrapper">
                  <a href="#">
                    <i class="fa-solid fa-user-group header-icon"></i>
                  </a>
                  <div class="custom-badge">1</div>
                </div>
              </li>
              <li class="d-flex align-items-center header-vertical-line">
                <div class="icon-wrapper">
                  <a href="#">
                    <i class="fa-brands fa-facebook-messenger header-icon"></i>
                  </a>
                  <div class="custom-badge">10</div>
                </div>
              </li>
              <li class="d-flex align-items-center header-vertical-line">
                <div class="icon-wrapper">
                  <a href="#">
                    <i class="fa-solid fa-bell header-icon"></i>
                  </a>
                  <div class="custom-badge">100</div>
                </div>
              </li>
              <li class="d-flex align-items-center header-vertical-line">
                <a href="#">
                  <i class="fa-solid fa-circle-info header-icon"></i>
                </a>
              </li>
              <li class="d-flex align-items-center dropdown">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-gear header-icon"></i>
                </a>
                <ul class="dropdown-menu border-0 rounded-0 p-0">
                  <li>
                    <a class="dropdown-item p-2" href="#">
                      <i class="fa-regular fa-gear me-2"></i>Settings
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item p-2" href="logout.php">
                      <i class="fa-regular fa-right-from-bracket me-2"></i>Logout
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main id="main">
    <div class="container">
      <div class="main-wrapper">
        <div class="row gap-2">
          <div class="col-md-9 col-lg-9">
            <div class="profile-left-wrap">
              <div class="profile-cover-main">
                <div class="profile-cover-wrap" style="background-image: url(<?php echo $profileData->coverPic; ?>)">
                  <div class="upload-cover-option-wrap">
                    <?php if ($profileId == $userId) { ?>
                    <div class="add-cover-photo">
                      <i class="fa-solid fa-camera"></i>
                      <p>update</p>
                    </div>
                    <?php } else { ?>
                    <div class="dont-add-cover-photo">
                    </div>
                    <?php } ?>
                    <div class="add-cover-option">
                      <!-- <div class="select-cover-photo">Change Photo</div> -->
                      <div class="file-upload">
                        <label for="cover-upload" class="file-upload-label-1">
                          <i class="fa-solid fa-plus me-1"></i>Upload Photo
                        </label>
                        <input type="file" name="file-upload" class="file-upload-input" id="cover-upload">
                      </div>
                    </div>
                  </div>
                  <div class="cover-photo-rest-wrap">
                    <div class="profile-main-wrapper">
                      <div class="profile-pic-wrapper">
                        <?php
                        if ($profileId == $userId) {
                        ?>
                        <div class="profile-pic-upload">
                          <div class="add-pro">
                            <i class="fa-solid fa-camera"></i>
                            <div class="update-text">
                              <p>Update</p>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                        <img src="<?php echo $profileData->profilePic; ?>"
                          alt="<?php echo '' . $profileData->firstName . ' ' . $profileData->lastName . ''; ?>"
                          title="<?php echo '' . $profileData->firstName . ' ' . $profileData->lastName . ''; ?>"
                          class="profile-pic">
                      </div>
                      <div class="profile-name-wrapper">
                        <h5><?php echo '' . $profileData->firstName . ' ' . $profileData->lastName . ''; ?></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cover-bottom-part">
                <div class="d-flex align-items-center justify-content-end m-0 p-0">
                  <a href="#">
                    <div class="timeline-button cover-bottom-button" data-userid="<?php echo $userId; ?>"
                      data-profileid="<?php echo $profileId; ?>">
                      <h6 class="cover-bottom-text">Timeline</h6>
                    </div>
                  </a>
                  <a href="#">
                    <div class="about-button cover-bottom-button" data-userid="<?php echo $userId; ?>"
                      data-profileid="<?php echo $profileId; ?>">
                      <h6 class="cover-bottom-text">About</h6>
                    </div>
                  </a>
                  <a href="#">
                    <div class="friend-button cover-bottom-button" data-userid="<?php echo $userId; ?>"
                      data-profileid="<?php echo $profileId; ?>">
                      <h6 class="cover-bottom-text">Friend</h6>
                    </div>
                  </a>
                  <a href="#">
                    <div class="photo-button cover-bottom-button" data-userid="<?php echo $userId; ?>"
                      data-profileid="<?php echo $profileId; ?>">
                      <h6 class="cover-bottom-text">Photo</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="bio-timeline">
                <div class="row">
                  <div class="col-md-4 col-lg-4">
                    <div class="bio-wrap card border-0 mb-2">
                      <div class="card-body p-2 bio-intro">
                        <div class="intro-wrap">
                          <i class="fa-solid fa-earth-asia blue-color"></i>
                          <h6>Intro</h6>
                        </div>
                        <div class="intro-icon-text text-center">
                          <i class="fa-light fa-message-smile grey-color"></i>
                          <div class="add-bio-text">
                            <p>Add a short bio to tell people more yourself !</p>
                          </div>
                          <div class="add-bio-click">
                            <a href="#" class="btn add-bio-btn">Add Bio</a>
                          </div>
                        </div>
                        <div class="bio-details">
                          <div class="bio-location mb-2">
                            <i class="fa-solid fa-location-dot grey-color"></i>
                            <div class="live-text">
                              <p class="grey-color">Live in <span class="live-text-css blue-color">Bilaspur</span>
                            </div>
                          </div>
                          <div class="bio-follow">
                            <i class="fa-solid fa-square-rss grey-color"></i>
                            <div class="follow-text">
                              <p class="grey-color">Followed by <span class="follow-text-css blue-color">65
                                  people</span>
                            </div>
                          </div>
                        </div>
                        <div class="bio-feature text-center">
                          <div class="feature-icon">
                            <i class="fa-solid fa-stars blue-color"></i>
                          </div>
                          <div class="feature-text">
                            <p class="mb-2">
                              Showcase what's important to you by adding photos, pages, groups and more to your
                              featured section on you public profile.
                            </p>
                            <div class="add-feature-click">
                              <a href="#" class="btn add-feature-btn">Add to Featured</a>
                            </div>
                          </div>
                          <div class="add-feature-link">
                            <i class="fa-solid fa-plus feature-plus-icon me-1"></i>
                            <div class="add-feature-link-text">
                              <span>Add Instagram, Website, Other Links</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="status-timeline-wrap card border-0 mb-2">
                      <div class="card-body p-2"></div>
                    </div> -->
                  </div>
                  <div class="col-md-8 col-lg-8">
                    <div class="status-timeline-wrap">
                      <?php if ($profileId == $userId) { ?>
                      <div class="profile-status-write card border-0 mb-2">
                        <div class="card-header status-top-wrap bg-transparent">
                          <div class="status-header">
                            <h5>Create Post</h5>
                          </div>
                        </div>
                        <div class="card-body status-middle-wrap">
                          <div class="status-middle">
                            <div class="status-profile-pic">
                              <img src="<?php echo $profileData->profilePic; ?>" class="img-fluid"
                                alt="<?php echo '' . $profileData->firstName . ' ' . $profileData->lastName . ''; ?>"
                                title="<?php echo '' . $profileData->firstName . ' ' . $profileData->lastName . ''; ?>">
                            </div>
                            <div class="status-profile-textarea">
                              <textarea name="textStatus" id="statusEmoji" cols="59" rows="5"
                                class="status status-textarea" placeholder="What's going on your mind?"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer status-bottom-wrap bg-transparent p-0">
                          <div class="status-bottom">
                            <div class="file-upload-remImage">
                              <label for="multiple_files" class="file-upload-label-2">
                                <div class="status-bot-1">
                                  <img src="assets/image/photo.JPG" class="img-fluid" alt="">
                                  <div class="status-bot-text">
                                    <span>Photo/ Video</span>
                                  </div>
                                </div>
                              </label>
                              <input type="file" name="file-upload" id="multiple_files" class="file-upload-input"
                                data-multiple-caption="{count} files selected" multiple="">
                            </div>
                            <div class="file-upload-tag">
                              <label for="tag" class="file-upload-label-2">
                                <div class="status-bot-1">
                                  <img src="assets/image/tag.JPG" class="img-fluid" alt="">
                                  <div class="status-bot-text">
                                    <span>Tag Friend</span>
                                  </div>
                                </div>
                              </label>
                              <input type="file" name="file-upload" id="tag" class="file-upload-input">
                            </div>
                            <div class="file-upload-activity">
                              <label for="tag" class="file-upload-label-2">
                                <div class="status-bot-1">
                                  <img src="assets/image/activities.JPG" class="img-fluid" alt="">
                                  <div class="status-bot-text">
                                    <span>Feeling/Activities</span>
                                  </div>
                                </div>
                              </label>
                              <input type="file" name="file-upload" id="tag" class="file-upload-input">
                            </div>
                          </div>
                          <div id="sortable" class="row sortable mb-0"></div>
                          <div id="error_multiple_files"></div>
                          <div class="status-share-wrapper">
                            <div class="status-share-top">
                              <div class="newsFeed-wrapper">
                                <div class="rightSign-icon">
                                  <i class="fa-solid fa-newspaper blue-color"></i>
                                </div>
                                <div class="newsFeed-text">
                                  <h5>News Feed</h5>
                                </div>
                              </div>
                              <div class="privacy">
                                <select name="" id="" class="privacy-select">
                                  <option selected value="1">
                                    <i class="fa-solid fa-globe me-1"></i>
                                    <span>Public</span>
                                  </option>
                                  <option value="2">
                                    <i class="fa-solid fa-lock me-1"></i>
                                    <span>Private</span>
                                  </option>
                                  <option value="3">
                                    <i class="fa-solid fa-user-group me-1"></i>
                                    <span>Friends</span>
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="status-share-bottom">
                              <div class="seeMore-wrapper me-2">
                                <select name="" id="" class="seeMore-select">
                                  <option selected value="1">
                                    See more
                                  </option>
                                </select>
                              </div>
                              <div class="share-btn-wrapper">
                                <div class="d-grid gap-2">
                                  <div class="share-button status-share-button">Share</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="postShow-wrapper">
                      <?php $loadFromPost->posts($userId, $profileId, 20); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="profile-right-wrap"></div>
          </div>
        </div>
      </div>
      <div class="top-box-show"></div>
      <div class="edit-popup"></div>
      <div class="profile-popup-show"></div>
      <div id="adv_dem"></div>
    </div>
  </main>
  <footer id="footer"></footer>

  <!-- CDN JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
  </script>
  <script src="assets/dist/emojionearea.min.js"></script>
  <script>
  $(function() {
    $('.profile-pic-upload').on('click', function() {
      $('.profile-popup-show').html(
        '<div class="top-box align-vertical-middle profile-dialog-show"> <div class="profile-pic-upload-action"> <div class="pro-pic-up "> <div class="file-upload"> <label for="profile-upload" class="file-upload-label-1"> <snap class="upload-plus-text"><snap class="upload-plus-sign"><i class="fa-solid fa-plus me-1"></i></snap>Upload Photo</snap> </label> <input type="file" name="file-upload" id="profile-upload" class="file-upload-input"> </div> </div> <div class="pro-pic-choose"></div> </div> </div>'
      )
    })

    $(document).on('change', '#profile-upload', function() {
      var name = $('#profile-upload').val().split('\\').pop();
      var file_data = $('#profile-upload').prop('files')[0];
      var file_size = file_data['size'];
      var file_type = file_data['type'].split('/').pop();
      var userId = '<?php echo $userId ?>';
      var imgName = 'user/' + userId + '/profilePhoto/' + name + '';
      var form_data = new FormData();
      form_data.append('file', file_data);

      if (name != '') {
        $.post('<?php echo $localhost; ?>core/ajax/profilePhoto.php', {
          imgName: imgName,
          userId: userId
        }, function(data) {})
        $.ajax({
          url: '<?php echo $localhost; ?>core/ajax/profilePhoto.php',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(data) {
            $('.profile-pic').attr('src', " " + data + " ");
            $('.profile-dialog-show').hide();
          }
        })
      }
    })


    $(".add-cover-photo").on('click', function() {
      $('.add-cover-option').toggle();
    })

    $('#cover-upload').on('change', function() {
      var name = $('#cover-upload').val().split('\\').pop();
      var file_data = $('#cover-upload').prop('files')[0];
      var file_size = file_data["size"];
      var file_type = file_data['type'].split('/').pop();

      var userId = '<?php echo $userId ?>';
      var imgName = 'user/' + userId + '/coverPhoto/' + name + '';

      var form_data = new FormData();

      form_data.append('file', file_data);

      if (name != '') {
        $.post('<?php echo $localhost; ?>core/ajax/profile.php', {
          imgName: imgName,
          userId: userId
        }, function(data) {})
      }
      $.ajax({
        url: '<?php echo $localhost; ?>core/ajax/profile.php',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(data) {
          $('.profile-cover-wrap').css('background-image', "url('" + data + "')");
          $('.add-cover-option').hide();
        }

      })
    })

    $(document).mouseup(function(e) {
      var container = new Array();
      container.push($('.add-cover-option'));
      container.push($('.profile-dialog-show'));

      $.each(container, function(key, value) {
        if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
          $(value).hide()
        }
      })
    })

    $(document).mouseup(function(e) {
      var container = new Array();
      container.push($('.post-option-details-container'));
      container.push($('.edit-popup'));

      $.each(container, function(key, value) {
        if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
          $(value).empty()
        }
      })
    })

    $(document).mouseup(function(e) {
      var container = new Array();
      container.push($('.profile-status-write'));

      $.each(container, function(key, value) {
        if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
          $('.status-share-wrapper').hide('0.2')
        }
      })
    })

    $(document).mouseup(function(e) {
      var container = new Array();
      container.push($('.post-img-wrap'));

      $.each(container, function(key, value) {
        if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
          $('.top-box-show').empty();
        }
      })
    })

    $('#statusEmoji').emojioneArea({
      pickPosition: "right",
      spellcheck: true
    })

    $(document).on('click', '.emojionearea-editor', function() {
      $('.status-share-wrapper').show('0.5');
    })

    $(document).on('click', '.status-bottom', function() {
      $('.status-share-wrapper').show('0.5');
    })

    var fileCollection = new Array();

    $(document).on("change", "#multiple_files", function(e) {
      var count = 0;
      var files = e.target.files;
      $(this).removeData();
      var text = "";

      $.each(files, function(i, file) {
        fileCollection.push(file);
        var reader = new FileReader();

        reader.readAsDataURL(file);

        reader.onload = function(e) {
          var name = document.getElementById("multiple_files").files[i].name;
          var template = '<div class="col-2 p-0 ui-state-default del"><img id="' + name +
            '" class="status-share-multi-img" src="' + e.target.result + '"></div>';
          $("#sortable").append(template);
        }
      })

      $("#sortable").append(
        '<div class="remImg"><i class="bi bi-x-circle-fill"></i></div>'
      )
    })

    $(document).on('click', '.remImg', function() {
      $('#sortable').empty();
      $('.input-restore').empty().html(
        '<label for="multiple_files" class="file-upload-label-2"><div class="status-bot-1"><img src="assets/image/photo.JPG" class="img-fluid" alt=""><div class="status-bot-text"><span>Photo/ Video</span></div></div></label><input type="file" name="file-upload" id="multiple_files" class="file-upload-input"data-multiple-caption="{count} files selected" multiple="">'
      );
    })

    $('.status-share-button').on('click', function() {
      var statusText = $('.emojionearea-editor').html();

      var formData = new FormData()

      var storeImage = [];

      var error_images = [];

      var files = $('#multiple_files')[0].files;

      if (files.length != 0) {
        if (files.length > 6) {
          error_images += 'You can not select more than 6 images';
        } else {
          for (var i = 0; i < files.length; i++) {
            var name = document.getElementById('multiple_files').files[i].name;

            storeImage += '{\"imageName\":\"user/' + <?php echo $userId ?> + '/postImage/' + name + '\"},';

            var ext = name.split('.').pop().toLowerCase();

            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'mp4']) == -1) {
              error_images += '<p>Invalid ' + i + ' File </p>';
            }

            var ofReader = new FileReader();

            ofReader.readAsDataURL(document.getElementById('multiple_files').files[i]);

            var f = document.getElementById('multiple_files').files[i];

            var fSize = f.size || f.fileSize;

            if (fSize > 10000000) {
              error_images += '<p>' + i + ' File Size is more then 10 MB</p>';
            } else {
              formData.append('file[]', document.getElementById('multiple_files').files[i]);
            }

          }
        }

        if (files.length < 1) {} else {
          var str = storeImage.replace(/,\s*$/, "");
          var stIm = '[' + str + ']';
        }

        if (error_images == '') {
          $.ajax({
            url: '<?php echo $localhost; ?>core/ajax/uploadPostImage.php',
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
              $('#error_multiple_files').html('<br/><label> Uploading...</label>');
            },
            success: function(data) {
              $('#error_multiple_files').html(data);
              $('#sortable').empty();
            }
          })
        } else {
          $('#multiple_files').val('');
          $('#error_multiple_files').html("<span> " + error_images + "</span>");
          return false;
        }
      } else {
        var stIm = '';
      }

      // var mention_user = statusText.match(regex);

      if (stIm == '') {
        $.post('<?php echo $localhost; ?>core/ajax/postSubmit.php', {
          onlyStatusText: statusText,
          // mention_user: mention_user
        }, function(data) {
          // $('adv_dem').html(data);
          $('#adv_dem').html(data);
          location.reload();
        })
      } else {
        $.post('<?php echo $localhost; ?>core/ajax/postSubmit.php', {
          stIm: stIm,
          statusText: statusText,
          // mention_user: mention_user
        }, function(data) {
          $('#adv_dem').html(data);
          location.reload();
        })
      }
    });

    // ------------------------ Post Option Start ------------------------ //
    $(document).on('click', '.post-option-icon', function() {
      $('.post-option-icon').removeAttr('id');
      $(this).attr('id', 'opt-click');
      var postId = $(this).data('postid');
      var userId = $(this).data('userid');
      var postDetails = $(this).siblings('.post-option-details-container');

      $(postDetails).show().html(
        '<ul class="post-option-details p-0 m-0"><li class="post-edit post-option-item" data-postid="' +
        postId + '" data-userid="' + userId +
        '"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</li><li class="post-delete post-option-item" data-postid="' +
        postId +
        '" data-userid="' + userId +
        '"><i class="fa-solid fa-trash me-1"></i>Delete</li><li class="post-privacy post-option-item" data-postid="' +
        postId + '" data-userid="' + userId + '"><i class="fa-solid fa-lock me-1"></i>Privacy</li></ul>');
    })

    $(document).on('click', 'li.post-edit', function() {
      var statusTextContainer = $(this).parents('.nf-1').siblings('.nf-2').find('.nf-2-text');
      var addId = $(statusTextContainer).attr('id', 'editPostPut');
      var getPostText1 = $(statusTextContainer).text();
      var postid = $(statusTextContainer).data('postid');
      var userid = $(statusTextContainer).data('userid');
      var getPostImg = $(this).parents('.nf-1').siblings('.nf-2').find('.nf-2-img');
      var thiss = $(this).parents('.nf-1').siblings('.nf-2').find('.nf-2-img');
      var profile_pic = $(statusTextContainer).data('profilepic');
      var getPostText = getPostText1.replace(/\s+/g, " ").trim();
      $('.edit-popup').html(
        '<div class="top-box edit-dialog-show"><div class="w-100"><div class="edit-post-header"> <div class="edit-post-text">Edit Post</div><div class="edit-post-close"><i class="bi bi-x"></i></div> </div> <div class="edit-post-value"><div class="status-med"> <div class="status-prof"> <div class="top-pic"><img src="' +
        profile_pic +
        '" alt=""></div> </div> <div class="status-prof-textarea"><textarea data-autoresize rows="5" columns="12" placeholder="" data-text name="textStatus" id="editStatus" class="editStatus">' +
        getPostText +
        '</textarea></div> </div> </div> <div class="edit-post-submit"> <div class="status-privacy-wrap"> <div class="status-privacy "> <div class="privacy-icon"><img src="assets/image/profile/publicIcon.JPG" alt=""></div> <div class="privacy-text">Public</div> <div class="privacy-downarrow-icon"><i class="bi bi-caret-down-fill"></i></div> </div> <div class="status-privacy-option"></div> </div> <div class="edit-post-save" data-postid="' +
        postid + '" data-userid="' + userid + '" data-tag="' + thiss + '">Save</div> </div> </div></div>');
    })

    $(document).on('click', '.edit-post-save', function() {
      var postid = $(this).data('postid');
      var userid = $(this).data('userid');
      var editedText = $(this).parents('.edit-post-submit').siblings('.edit-post-value').find(
        '.editStatus');
      var editedTextVal = $(editedText).val();

      $.post('<?php echo $localhost; ?>core/ajax/editPost.php', {
        editedTextVal: editedTextVal,
        postid: postid,
        userid: userid
      }, function(data) {
        $('#editPostPut').html(data).removeAttr('id');
        $('.edit-popup').empty();
        location.reload();
      })
    })

    $(document).on('click', '.post-delete', function() {
      var postid = $(this).data('postid');
      var userid = $(this).data('userid');
      var postContainer = $(this).parents('.profile-timeline');
      var r = confirm("Do you want to delete the post?");

      if (r == true) {
        $.post('<?php echo $localhost; ?>core/ajax/editPost.php', {
          deletePost: postid,
          userid: userid
        }, function(data) {
          $(postContainer).empty();
          location.reload();
        })
      }
    })
    // ------------------------ Post Option End ------------------------ //

    // ------------------------ Main React Start ------------------------ //
    $(document).on('click', '.like-action', function() {
      var likeActionIcon = $(this).find('.like-action-icon img');
      var likeReactParent = $(this).parents('.like-action-wrap');
      var nf4 = $(likeReactParent).parents('.nf-4');
      var nf_3 = $(nf4).siblings('.nf-3').find('.react-count-wrap');
      var reactCount = $(nf4).siblings('.nf-3').find('.nf-3-react-username');
      var reactNumText = $(reactCount).text();
      var postId = $(likeReactParent).data('postid');
      var userId = $(likeReactParent).data('userid');
      var typeText = $(this).find('.like-action-text span');
      var typeR = $(typeText).text();
      var spanClass = $(this).find('.like-action-text').find('span');

      if ($(spanClass).attr('class') !== undefined) {
        if ($(likeActionIcon).attr('src') == 'assets/image/likeAction.JPG') {
          (spanClass).addClass('like-color');
          $(likeActionIcon).attr('src', 'assets/image/react/like.png').addClass('reactIconSize');
          spanClass.text('like');
          mainReactSubmit(typeR, postId, userId, nf_3);
        } else {
          $(likeActionIcon).attr('src', 'assets/image/likeAction.JPG');
          spanClass.removeClass();
          spanClass.text('Like');
          mainReactDelete(typeR, postId, userId, nf_3);
        }
      } else if ($(spanClass).attr('class') === undefined) {
        (spanClass).addClass('like-color');
        $(likeActionIcon).attr('src', 'assets/image/react/like.png').addClass('reactIconSize');
        spanClass.text('like');
        mainReactSubmit(typeR, postId, userId, nf_3);
      } else {
        (spanClass).addClass('like-color');
        $(likeActionIcon).attr('src', 'assets/image/react/like.png').addClass('reactIconSize');
        spanClass.text('like');
        mainReactSubmit(typeR, postId, userId, nf_3);
      }
    })

    function mainReactSubmit(typeR, postId, userId, nf_3) {
      var profileid = <?php echo $profileId; ?>;
      $.post('<?php echo $localhost; ?>core/ajax/react.php', {
        reactType: typeR,
        postid: postId,
        userid: userId,
        profileid: profileid
      }, function(data) {
        $(nf_3).empty().html(data);
        location.reload();
      })
    }

    function mainReactDelete(typeR, postId, userId, nf_3) {
      var profileid = <?php echo $profileId; ?>;
      $.post('<?php echo $localhost; ?>core/ajax/react.php', {
        deleteReactType: typeR,
        postid: postId,
        userid: userId,
        profileid: profileid
      }, function(data) {
        $(nf_3).empty().html(data);
        location.reload();
      })
    }

    $('.like-action-wrap').hover(function() {
      var mainReact = $(this).find('.react-bundle-wrap');
      $(mainReact).html(
        '<div class="react-bundle"> <div class="like-react-click d-flex align-items-center justify-content-center"> <img class="main-icon-css" src="<?php echo ' ' . BASE_URL . 'assets/image/react/like.png'; ?>" alt=""> </div> <div class="love-react-click d-flex align-items-center justify-content-center"> <img class="main-icon-css" src="<?php echo ' ' . BASE_URL . 'assets/image/react/love.png'; ?>" alt=""> </div> <div class="haha-react-click d-flex align-items-center justify-content-center"> <img class="main-icon-css" src="<?php echo ' ' . BASE_URL . 'assets/image/react/haha.png'; ?>" alt=""> </div> <div class="wow-react-click d-flex align-items-center justify-content-center"> <img class="main-icon-css" src="<?php echo ' ' . BASE_URL . 'assets/image/react/wow.png'; ?>" alt=""> </div> <div class="sad-react-click d-flex align-items-center justify-content-center"> <img class="main-icon-css" src="<?php echo ' ' . BASE_URL . 'assets/image/react/sad.png'; ?>" alt=""> </div> <div class="angry-react-click d-flex align-items-center justify-content-center"> <img class="main-icon-css" src="<?php echo ' ' . BASE_URL . 'assets/image/react/angry.png'; ?>" alt=""> </div> </div>'
      );
    }, function() {
      var mainReact = $(this).find('.react-bundle-wrap');
      $(mainReact).html('');
    })

    $(document).on('click', '.main-icon-css', function() {
      var likeReact = $(this).parent();
      reactReply(likeReact);
    })

    function reactReply(sClass) {
      if ($(sClass).hasClass('like-react-click')) {
        mainReactSub('like', 'blue');
      } else if ($(sClass).hasClass('love-react-click')) {
        mainReactSub('love', 'red');
      } else if ($(sClass).hasClass('haha-react-click')) {
        mainReactSub('haha', 'yellow');
      } else if ($(sClass).hasClass('wow-react-click')) {
        mainReactSub('wow', 'yellow');
      } else if ($(sClass).hasClass('sad-react-click')) {
        mainReactSub('sad', 'yellow');
      } else if ($(sClass).hasClass('angry-react-click')) {
        mainReactSub('angry', 'red');
      } else {
        console.log('Not found');
      }
    }

    function mainReactSub(typeR, color) {
      var reactColor = '' + typeR + '-color';
      var pClass = $('.' + typeR + '-react-click');
      var likeReactParent = $(pClass).parents('.like-action-wrap');
      var nf4 = $(likeReactParent).parents('.nf-4');
      var nf_3 = $(nf4).siblings('.nf-3').find('.react-count-wrap');
      var reactCount = $(nf4).siblings('.nf-3').find('.nf-3-react-username');
      var reactNumText = $(reactCount).text();

      var postId = $(likeReactParent).data('postid');
      var userId = $(likeReactParent).data('userid');
      var likeAction = $(likeReactParent).find('.like-action');
      var likeActionIcon = $(likeAction).find('.like-action-icon img');
      var spanClass = $(likeAction).find('.like-action-text').find('span');

      if ($(spanClass).hasClass(reactColor)) {
        $(spanClass).removeClass();
        spanClass.text('Like');
        $(likeActionIcon).attr('src', 'assets/image/likeAction.JPG');
        mainReactDelete(typeR, postId, userId, nf_3);
      } else if ($(spanClass).attr('class') !== undefined) {
        $(spanClass).removeClass().addClass(reactColor);
        spanClass.text(typeR);
        $(likeActionIcon).removeAttr('src').attr('src', 'assets/image/react/' + typeR + '.png').addClass(
          'reactIconSize');
        mainReactSubmit(typeR, postId, userId, nf_3);
      } else {
        $(spanClass).addClass(reactColor);
        //                        $(likeActionIcon).attr('src', 'assets/image/react/' + typeR + '.png').addClass('reactIconSize');
        spanClass.text(typeR);
        $(likeActionIcon).removeAttr('src').attr('src', 'assets/image/react/' + typeR + '.png').addClass(
          'reactIconSize');
        mainReactSubmit(typeR, postId, userId, nf_3);
      }
    }
    // ------------------------ Main React End ------------------------ //

    $(document).on('click', '.postImage', function() {
      var userId = $(this).data('userid');
      var postId = $(this).data('postid');
      var profileId = $(this).data('profileid');
      var imageSrc = $(this).attr('src');
      $.post('<?php echo $localhost; ?>core/ajax/imgFetchShow.php', {
        fetchImgInfo: userId,
        postId: postId,
        imageSrc: imageSrc,
      }, function(data) {
        $('.top-box-show').html(data);
      })

    })
  })
  </script>
</body>

</html>
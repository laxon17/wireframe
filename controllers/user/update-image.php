<?php

    session_start();

    $image_path = $_FILES['image_path']['name'];
    $target = 'public/img/users/' . basename($image_path);

    $cover = $database->selectFilteredRecord('Users', 'UserId', $_SESSION['user_id']);
    $old_cover = $cover->ProfilePicture;

    $database->updateRecord('Users', 'ProfilePicture', $image_path, 'UserId', $_SESSION['user_id']);

    move_uploaded_file($_FILES['image_path']['tmp_name'], $target);

    if($old_cover !== 'blank-profile.png') unlink("public/img/users/" . $cover['ProfilePicture']);

    Utilities::redirect('/profile?username=' . $_SESSION['username']);
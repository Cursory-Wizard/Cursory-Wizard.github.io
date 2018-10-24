<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pw = filter_input(INPUT_POST, 'password');
    $phone = filter_input(INPUT_POST, 'phone');

    if (isset($_POST['heard_from'])){
        $advert = $_POST['heard_from'];
    } else {
        $advert = 'Unknown';
    }

    if (isset($_POST['wants_updates'])){
        $updates = 'Yes';
    } else {
        $updates = 'No';
    }
   
    $selected = $_POST['contact_via'];
    switch($selected)
    {
        case "email": $contact = 'Email'; break;
        case "text": $contact = 'Text Message'; break;
        case "phone": $contact = 'Phone'; break;
    }
    $comment = nl2br(htmlspecialchars($_POST['comments']), false);
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($pw); ?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo $advert ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo $updates ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo $contact ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo $comment ?></span><br>        
    </main>
</body>
</html>
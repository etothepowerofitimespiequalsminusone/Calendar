<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="static/css/home.css"/>
</head>
<body>
<div id="profilearea">
    <h1>Welcome, <?php echo $name ?>!</h1>
    <form class="logout" method="POST">
        <button id="logout" type="submit" name="logout">Logout</button>
    </form>
    <div class="form">
        <h2>Edit user profile</h2>
        <form method="POST">
            <select name="attribute">
                <?php foreach($attributes as $item){?>
                    <option value="<?php echo $item['attribute_id'] ?>"><?php echo $item["attribute_name"]?></option>
                <?php } ?>
            </select>
            <input name="value" type="text" required>
            <input type="submit" name="user_attribute" value="Send">
        </form>

    </div>
    <div class="form">
        <h2>Add a new attribute</h2>
        <form method="POST">
            <label for="attribute_name">Name</label>
            <input name="attribute_name" type="text" required>
            <input type="submit" value="Add" name="add">
        </form>
    </div>
    <p><?php if(isset($message)) echo $message ?></p>
</div>
</body>
</html>

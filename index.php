<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        print_r($_FILES);
        // move_uploaded_file($_FILES['photo']['tmp_name'],'upload/sohan.jpg');
        
        if($_FILES['photo']){
            $allowed = ['image/jpeg','image/jpg','image/png'];
            if(!in_array($_FILES['photo']['type'] , $allowed)){
                echo 'only jpeg, png and jpg files allowed';
                exit;
            }

            if($_FILES['photo']['size'] > 1*1024*1024 ){
                echo 'you passed the file size';
                exit;
            }
            move_uploaded_file($_FILES['photo']['tmp_name'],'upload/'.$_FILES['photo']['name']);
        }
        ?>
    </pre>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
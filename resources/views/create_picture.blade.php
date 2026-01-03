<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create picture</title>
</head>
<body>
<form action="" method="post">
 @csrf

<input type="text" name="name" placeholder="Nama">
  <br>
<input type="file" name="file" >
<br>
</form>

<button type="submit">Submit</button>
   

</body>
</html>
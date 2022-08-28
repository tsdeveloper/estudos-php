
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="./" name="upload" method="post" enctype="multipart/form-data">
    <input name="send" value="<?= ($formSend ?? ""); ?>"/>
    <input name="name" type="text" value="Nome do arquivo" required/>
    <input name="file" type="file" required/>
    <button class="green"><?= $formSend; ?></button>
</form>

</body>

</html>

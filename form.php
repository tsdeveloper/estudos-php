
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<form action="./" method="post" enctype="multipart/form-data" novalidate>
    <?= ($error ?? ""), csrf_input(); ?>
    <p>First name: <input type="text" name="first_name" /></p>
    <p>Last name: <input type="text" name="last_name" /></p>
    <p>Email: <input type="email" name="email" /></p>
    <p>Password: <input type="password" name="password" /></p>
    <button>Save</button>
</form>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $(function () {
        /*  swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      swal("Poof! Your imaginary file has been deleted!", {
                          icon: "success",
                      });
                  } else {
                      swal("Your imaginary file is safe!");
                  }
              });*/
    })
</script>
</body>

</html>
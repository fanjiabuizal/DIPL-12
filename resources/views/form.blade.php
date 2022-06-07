<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>userform</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="assets/css/pages/auth.css">
    
    </head>
    <body style="width:95%">
    <div class="row justify-content-center" style="margin-top:13%">
    <div class="col-3">
        <h4>Form</h4>
        <form class="border" style="padding:20px" method="POST">
        @csrf
        <input type="hidden" name="_method"/>
        <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control"/>
        </div>
        <div class="form-group">
        <label>Telpon</label>
        <input type="number" name="telpon" class="form-control"/>
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="text" name="price" class="form-control"/>
        </div>
        <div style="text-align:center">
        <button class="btn btn-success">Simpan</button>
        </div>
        </form>
    </div>
    </div>
    </body>
</html>
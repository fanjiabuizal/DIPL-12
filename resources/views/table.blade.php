<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/pages/auth.css">
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    table {
      width: 50%;

    }

    p {
      margin-left: auto; 
      margin-right: auto;
      width: 50%;
      margin-top: 13%;
    }

    table.center {
      margin-left: auto; 
      margin-right: auto;
    }
  </style>
</head>

<body>
  <table class="center">
    <thead>
      <p><a href="form.html" ><button type="button" class="btn btn-primary">Tambah</button></a></p>
      <tr>
        <th scope="col">Hapus</th>
        <th scope="col">Edit</th>
        <th scope="col">Username</th>
        <th scope="col">Nama</th>
        <th scope="col">Telpon</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="form.html" scope="row"><button type="button" class="btn btn-primary">Hapus</button></a></td>
        <td><a href="form.html" scope="row"><button type="button" class="btn btn-primary">Edit</button></a></td>
        <td>$username</td>
        <td>$nama</td>
        <td>$telpon</td>
      </tr>
    </tbody>
  </table>

</body>
</html>
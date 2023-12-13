<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/admin/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/admin/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/compiled/css/iconly.css') }}">
    <title>Email</title>
</head>

<body>
    <h3 class="">{{ $mailData['title'] }}</h3>
    <p>{{ $mailData['body'] }}</p>
    <a href="{{ route('admin.barang') }}" class="btn btn-primary">Verifikasi Akun</a>


</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Berhasil</title>
</head>

<body>
    <h2>Halo, {{ $userData['name'] }}!</h2>
    <p>Anda telah berhasil terdaftar di aplikasi Buku. Berikut adalah detail akun Anda:</p>
    <ul>
        <li><strong>Nama:</strong> {{ $userData['name'] }}</li>
        <li><strong>Email:</strong> {{ $userData['email'] }}</li>
    </ul>
    <p>Terima kasih telah bergabung!</p>
</body>

</html>
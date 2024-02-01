<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penilaian Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.header')
    <div class="menu">
        <a href="/" class="active">Home</a>
    </div>

    <div class="kiri-atas">
        <fieldset>
            <center>
                <button onclick="tampilkan_login_admin()" class="button-primary">Admin</button>
                <button onclick="tampilkan_login_guru()" class="button-primary">Guru</button>
                <button onclick="tampilkan_login_siswa()" class="button-primary">Siswa</button>

                <hr>
                Pilih sesuai dengan posisi
            </center>

            <div class="container-login" id="login_admin" style="display: none">
                <center>
                    <b>Login Admin</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_admin" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>Kode Admin</strong></td>
                            <td width="25%"><input type="text" name="id_admin" id="id_admin"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%"><input type="password" name="password" id="password"></td>
                        </tr>
                    </table>
                    <button class="button-submit" name="button" type="submit">Login</button>
                </form>
            </div>

            <div class="container-login" id="login_guru" style="display: none">
                <center>
                    <b>Login Guru</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_guru" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>NIP</strong></td>
                            <td width="25%"><input type="text" name="nip" id="nip"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%"><input type="password" name="password" id="password"></td>
                        </tr>
                    </table>
                    <button class="button-submit" name="button" type="submit">Login</button>
                </form>
            </div>

            <div class="container-login" id="login_siswa" style="display: none">
                <center>
                    <b>Login Siswa</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_siswa" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>NIS</strong></td>
                            <td width="25%"><input type="text" name="nis" id="nis"></td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%"><input type="password" name="password" id="password"></td>
                        </tr>
                    </table>
                    <button class="button-submit" name="button" type="submit">Login</button>
                </form>
            </div>
        </fieldset>
    </div>

    <div class="kanan">
        <center>
            <h1>Selamat Datang <br>
                Di SMK 1 Cibinong
            </h1>
        </center>
    </div>

    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mer">Gallery</p>
                <div class="gallery">
                    <img src="{{ asset('img/g2.jpg') }}" alt="">
                    <div class="deskripsi">SMK BISA || {{ date('Y') }}</div>
                </div>
            </b>
        </center>
    </div>

    @include('partials.footer')
</body>
<script src="{{ asset('js/script.js') }}"></script>
</html>

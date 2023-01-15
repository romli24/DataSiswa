<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>LOGIN</title>
    </head>

    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card{
            width: 400px;
        }
    </style>

    <body>
        <h1 class="mt-3 text-center">LogIn</h1>

        <div class="container">
            <div class="card mt-5">
                <div class="card-body">

                    <form class="justify-content-center" action="" method="">

                        <div class="form-group mt-3">
                            <strong>Email</strong>
                            <input type="email" name="" class="form-control">
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <strong>Password</strong>
                            <input type="password" name="" class="form-control">
                        </div>

                        <div class="mb-3">
                            <span>Belum Mempunyai Akun?</span> <a href="#">Daftar</a>
                        </div>

                        <a href="{{ route('siswa') }}" type="submit" class="btn btn-primary" style="width: 367px">LogIn</a>
                    </form>

                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>

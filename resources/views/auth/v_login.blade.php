<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('halaman_login/asset/login.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 login-form">
                <div class="form-login-container">
                    <div class="form-login-box text-center">
                        <form action="/login/proses" method="POST" class="form-login">
                            @csrf
                            <h4><i class="fa-solid fa-bag-shopping ml-5"></i> SIMS Web App</h4>

                            <h2 class="pb-5 pt-4">Masuk atau buat akun untuk memulai</h2>
                            <div class="mb-3 form-input">
                                <i class="fa-solid fa-at fa-icon"></i>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="masukan email anda">
                            </div>
                            <div class="mb-3 form-input">
                                <i class="fa-solid fa-lock fa-icon"></i>
                                <input type="password" name="password" class="form-control"
                                    placeholder="masukan password anda" id="myInput">
                                <span class="show-password" onclick="myFunction()">
                                    <i id="hide1" class="fas fa-eye"></i>
                                    <i id="hide2" class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="d-grid pt-2">
                                <button class="btn btn-danger btn-masuk" type="submit">
                                    <span class="text-masuk">
                                        Masuk
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0">
                <img src="{{ asset('halaman_login/CMS Assets/Frame 98699.png') }}" alt="" class="img-side">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");
            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>

</html>

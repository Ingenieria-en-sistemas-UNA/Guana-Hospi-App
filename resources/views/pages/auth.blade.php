<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    @include('includes.head')
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column justify-content-center">
        <main id="content px-3">
            <div class="form-signin">
                <form>
                  <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
                  <label for="inputEmail" class="visually-hidden">Email address</label>
                  <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus>
                  <label for="inputPassword" class="visually-hidden">Password</label>
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                  <p class="mt-5 mb-3 text-muted">&copy; Bases de datos 2020</p>
                </form>
            </div>
        </main>
    </div>
    <script src="https://kit.fontawesome.com/f71f072137.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</body>

</html>

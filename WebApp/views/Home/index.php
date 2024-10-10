<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Startup Page</title>
</head>

<body class="text-center">
  <div class="bg-dark w-75 py-5 my-5 container rounded-pill">
    <h1 class="h1 mb-3 pb-4 fw-normal text-white">Please sign in</h1>
    <form class="w-75 p-3 d-grid gap-2 col-6 mx-auto bg-secondary rounded" action="../User/homePage.php" method="post">

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-primary py-2 w-100" type="submit">Sign in</button>
      <echo>or</echo>
      <button class="btn btn-primary py-2 w-100" type="submit">Sign up with new account</button>
    </form>
  </div>
</body>
</html>

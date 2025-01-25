<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="form.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ejemplo Form</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto ms-3 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <img src="logo.png" alt="logo" />
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Registration Form</h1>
        <?php
            if (isset($_POST["submit"]) && $_POST["submit"] === "Register") {
                $email = htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES);
                $password = htmlspecialchars($_POST["password"] ?? "", ENT_QUOTES);
                $comments = nl2br(htmlspecialchars($_POST["comments"] ?? "", ENT_QUOTES));
                $customertype = htmlspecialchars($_POST["customergender"] ?? "", ENT_QUOTES);
                $tos = htmlspecialchars($_POST["tos"] ?? "", ENT_QUOTES);
                $layout = htmlspecialchars($_POST["layout"] ?? "", ENT_QUOTES);
                $interests = (isset($_POST["interests"]) && is_array($_POST["interests"])) ?
                htmlspecialchars(implode(", ", $_POST["interests"]), ENT_QUOTES) : "";
                echo "<div class=\"mb-3\">Email: $email<br>Password: $password<br>Comments: $comments
                <br>Layout: $layout<br>Interests: $interests<br>
                <br>Customer type: $customertype<br>Accept TOS: $tos</div>";
            }

        ?>
        <form method="post" action="" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="layout" class="form-label">Layout</label>
                <select name="layout" id="layout" class="form-select">
                    <option value="">-- Please choose --</option>
                    <option value="dark">Dark</option>
                    <option value="light">Light</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="interests" class="form-label">Interests</label>
                <select multiple size="3" name="interests[]" id="interests" class="form-select">
                    <option value="1">IT</option>
                    <option value="2">Sports</option>
                    <option value="3">Education</option>
                </select>
            </div>
            <div class="input-group mb-1">
                <label class="form-label me-5">Customer gender</label>
                <div class="mb-3 me-4 form-check">
                    <input type="radio" name="customergender" value="female" id="female" class="form-check-input">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="radio" name="customergender" value="male" id="male" class="form-check-input">
                    <label class="form-check-label" for="male">Male</label>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="tos" value="ok" id="tos" class="form-check-input">
                <label class="form-check-label" for="tos">Accept TOS</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="comments">Comments</label>
                <textarea name="comments" id="comments" class="form-control">
                </textarea>
            </div>
            <input type="submit" name="submit" value="Register" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
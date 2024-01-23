<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php include  BASE_PATH.'resources/views/include/styles.php';  ?>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">پردازش همکاران پارسه</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="#">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">جدید</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm-6">
            <table class="table">
                <thead>
                <tr>
                    <th >#</th>
                    <th >نام</th>
                    <th >نام  خانوادگی</th>
                    <th >ایمیل</th>
                    <th>موبایل</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?= foreach ($contacts as $contact): ?>
                <tr>
                    <th><?= $contact['id'] ?></th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><a href="#">حذف</a> <a href="#">ویرایش</a></td>
                </tr>
                <?= endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


    <?php include BASE_PATH.'resources/views/include/scripts.php';  ?>
</body>
</html>
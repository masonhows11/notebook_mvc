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
        <a class="navbar-brand" href="/">پردازش همکاران پارسه</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="/">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">جدید</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row d-flex justify-content-center align-items-center h-75   alert-message">
        <div class="col-8 my-2">
            <div class="alert alert-success text-center" role="alert">
              کاربر جدید ذخیره شد
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-sm-6">
            <div class="row d-flex flex-column">

                <div class="col">
                    <form action="">
                        <div class="mb-3">
                            <label for="search" class="form-label">نام کاربری</label>
                            <input type="text" name="search" id="search" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">جستجو</button>
                    </form>
                </div>

                <div class="col mt-2">
                    <form action="<?= site_url('store/user') ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">نام کاربری</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">نام</label>
                            <input type="text" name="first_name" id="first_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">موبایل</label>
                            <input type="text" name="mobile" class="form-control" id="mobile">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">رمز عبور</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-sm-6">
            <table class="table">
                <thead>
                <tr>
                    <th >#</th>
                    <th >نام کاربری</th>
                    <th >نام</th>
                    <th >ایمیل</th>
                    <th>موبایل</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <th><?= $contact['id'] ?></th>
                    <td><?= $contact['name'] ?></td>
                    <td><?= $contact['first_name'] ?></td>
                    <td><?= $contact['email'] ?></td>
                    <td><?= $contact['mobile'] ?></td>
                    <td><a href="#">حذف</a> <a href="#">ویرایش</a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


    <?php include BASE_PATH.'resources/views/include/scripts.php';  ?>
</body>
</html>
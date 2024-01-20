<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get Employee</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Get Employee</h1>
            <a href="/employeescreate" class="btn btn-primary mb-3">Add Employee</a>
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Employee Salary</th>
                            <th scope="col">Employee Age</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results['data'] as $result) : ?>
                            <tr>
                                <td><?= $result['id'] ?></td>
                                <td><?= $result['employee_name'] ?></td>
                                <td><?= $result['employee_salary'] ?></td>
                                <td><?= $result['employee_age'] ?></td>
                                <td><?= $result['profile_image'] ?></td>
                                <td>
                                    <a href="/employees/<?= $result['id'] ?>" class="btn btn-primary">Detail</a>
                                    <a href="/employees/<?= $result['id'] ?>/edit" class="btn btn-warning">Edit</a>
                                    <form action="/employees/<?= $result['id'] ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get Employee By Id</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Get Employee By Id</h1>
            <a href="/employees" class="btn btn-primary mb-3">Back</a>
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Employee Salary</th>
                            <th scope="col">Employee Age</th>
                            <th scope="col">Profile Image</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><?= $results['data']['id'] ?></td>
                                <td><?= $results['data']['employee_name'] ?></td>
                                <td><?= $results['data']['employee_salary'] ?></td>
                                <td><?= $results['data']['employee_age'] ?></td>
                                <td><?= $results['data']['profile_image'] ?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
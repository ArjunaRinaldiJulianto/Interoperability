<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Employee</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Edit Employee</h1>
            <a href="/employees" class="btn btn-primary mb-3">Back</a>
            <form method="put" action="/employees/<?= $results['data']['id'] ?>">
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="employee_name" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" id="employee_name" name="employee_name" value="<?= $results['data']['employee_name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="employee_salary" class="form-label">Employee Salary</label>
                    <input type="number" class="form-control" id="employee_salary" name="employee_salary" value="<?= $results['data']['employee_salary'] ?>">
                </div>
                <div class="mb-3">
                    <label for="employee_age" class="form-label">Employee Age</label>
                    <input type="number" class="form-control" id="employee_age" name="employee_age" value="<?= $results['data']['employee_age'] ?>">
                </div>
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" value="<?= $results['data']['profile_image'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
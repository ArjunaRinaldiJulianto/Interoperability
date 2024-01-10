<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Get Request XML By Id</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <div class="container">
            <h1>Get Request XML By Id</h1>
            <a href="/posts/get-request-xml" class="btn btn-primary mb-3">Back</a>
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $results['id'] ?></td>
                            <td><?= $results['user_id'] ?></td>
                            <td><?= $results['status'] ?></td>
                            <td><?= $results['title'] ?></td>
                            <td><?= $results['content'] ?></td>
                            <td><?= $results['created_at'] ?></td>
                            <td><?= $results['updated_at'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel E-Commerce Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-5">

                    <h1 class="mb-3">
                        Laravel E-Commerce Management System
                    </h1>

                    <p class="text-muted mb-3">
    Manage categories, products, users, product images, and admin operations from a single dashboard.
</p>

<hr>

<h5 class="mt-3">Project Information</h5>

<p class="mb-1">
    <strong>Developer:</strong> Cengizhan Karakaş
</p>

<p class="mb-4">
    <strong>Student ID:</strong> 20222022437
</p>

                    <div class="row text-center mb-4">
                        <div class="col-md-4">
                            <h4>Categories</h4>
                            <p class="text-muted">Organize product groups.</p>
                        </div>

                        <div class="col-md-4">
                            <h4>Products</h4>
                            <p class="text-muted">Create and update products.</p>
                        </div>

                        <div class="col-md-4">
                            <h4>Users</h4>
                            <p class="text-muted">Manage system users.</p>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5">
                        Sign In
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
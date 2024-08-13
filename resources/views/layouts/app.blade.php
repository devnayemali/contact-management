<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('contacts.list') }}">Contact Management</a>
                    </nav>
                </div>
                <div class="col-lg-6">
                    <ul class="nav justify-content-end">
                        <li><a href="{{ route('contacts.list') }}"
                                class="text-decoration-none ms-4 {{ Request::routeIs('contacts.list') ? 'text-primary' : 'text-dark' }}">Contact
                                list</a></li>

                        <li><a href="{{ route('contacts.create') }}"
                                class="text-decoration-none ms-4 {{ Request::routeIs('contacts.create') ? 'text-primary' : 'text-dark' }}">Contact
                                create</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

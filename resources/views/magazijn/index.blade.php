@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen</title>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">

        
            <h2 class="my-3">{{ $title }}</h2>

            {{ var_dump($products) }}
                           
        </div>
    </div>
</body>
</html>

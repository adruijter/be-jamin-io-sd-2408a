@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen</title>
</head>
<body>
    <h1>{{ $title }}</h1>

    <table class="table">
        <thead>
            <th>Naam</th>
            <th>Omschrijving</th>
        </thead>
        <tbody>            
            @forelse ($allergenen as $allergeen) 
                <tr>
                    <td>{{ $allergeen->Naam }}</td>
                    <td>{{ $allergeen->Omschrijving}} </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Geen allergenen beschikbaar</td>
                </tr>  
            @endforelse          
        </tbody>
    </table>
</body>
</html>

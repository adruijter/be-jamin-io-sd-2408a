@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen</title>
</head>
<body>
    <div class="container">
        <h2>{{ $title }}</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
            </div>
            <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
        @endif

        <a href="{{ route('allergeen.create') }}" class="btn btn-primary my-3">Nieuw Allergeen</a>
    
        <table class="table">
            <thead>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Verwijder</th>
            </thead>
            <tbody>            
                @forelse ($allergenen as $allergeen) 
                    <tr>
                        <td>{{ $allergeen->Naam }}</td>
                        <td>{{ $allergeen->Omschrijving }} </td>
                        <td>
                            <form action="{{ route('allergeen.destroy', $allergeen->Id) }}" method="POST" 
                                onsubmit="return confirm('Weet je zeker dat je dit allergeen wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Geen allergenen beschikbaar</td>
                    </tr>  
                @endforelse          
            </tbody>
        </table>
    </div>
</body>
</html>

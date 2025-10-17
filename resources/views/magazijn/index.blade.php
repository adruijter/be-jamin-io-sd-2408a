@vite(['resources/css/app.css', 'resources/js/app.js']);
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
</head>
<body>
    <div class="container d-flex justify-content-center">

        <div class="col-md-9">

            <h3>{{ $title }}</h3>
            
            <div class="mt-3 d-flex gap-2">   
                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm me-auto">Terug</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('product.index') }}">
            @endif

        
            <table class="table table-striped table-bordered table-hover mt-4 align-middle shadow-sm">
                <thead>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th class="text-center">Verpakkingseenheid (kg)</th>
                    <th class="text-center">Aantal Aanwezig</th>
                    <th class="text-center">Allergenen Info</th>
                    <th class="text-center">Leverantie Info</th>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->Barcode }}</td>
                            <td>{{ $product->Naam }}</td>
                            <td class="text-center">{{ $product->VerpakkingsEenheid }}</td>
                            <td class="text-center">{{ $product->AantalAanwezig }}</td>
                            <td class="text-center">
                                <form action="{{ route('magazijn.allergenenInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-sm">Allergenen Info</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('magazijn.leverantieInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success btn-sm">Leverantie Info</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen allergenen bekent</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
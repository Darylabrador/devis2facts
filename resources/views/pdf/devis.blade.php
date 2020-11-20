<!DOCTYPE html>
<html lang="en">
<head>
    <title>DE-2020-11-1</title>
</head>
<body>

    <div>
        {{ $company->name }}, 
        <br>
        Adresse : {{ $company->address }}, 
        <br>
        Ville :{{ $company->city }}, 
        <br>
        Code postal :{{ $company->postcode }}, 
        <br>
        Siret : {{ $company->siret }}, 
        <br>
        TVA : {{ $devisResource[0]->devis->tva }}
    </div>

    <br><br>

    <div>
        <h1>Information du client</h1>
        {{ $devisResource[0]->devis->clients->clientAddress->address }}
        {{ $devisResource[0]->devis->clients->clientAddress->city }}
        {{ $devisResource[0]->devis->clients->clientAddress->postcode }}
        <br>
        {{ $devisResource[0]->devis->clients->name }}, 
        <br>
        {{ $devisResource[0]->devis->clients->email }}, 
    </div>

    <div style="background: grey;">
    </div>


    <table>
        <thead>
            <tr>
                <th> Produit </th>
                <th> Quantité </th>
                <th> Prix unitaire HT </th>
                <th> Total HT </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($devisResource as $value)
        <tr>
            <td> {{ $value->products->name }}</td> 
            <td> {{ $value->quantity }}</td> 

            @if ($value->price == null)
            <td> {{ $value->products->default_price }}</td> 
            @else
            <td> {{ $value->price }}</td> 
            @endif
            
            @if ($value->price == null)
            <td> {{ $value->products->default_price * $value->quantity }}</td> 
            @else
            <td> {{ $value->price * $value->quantity  }}</td> 
            @endif
            
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
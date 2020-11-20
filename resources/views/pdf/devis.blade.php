<!DOCTYPE html>
<html lang="en">
<head>
    <title>DE-2020-11-1</title>
</head>
<body>

    
<div style="background: grey;">
    TVA : {{ $ressource[0]->devis->tva }}
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
    @foreach ($ressource as $value)
    <tr>
        <td> {{ $value->product }}</td> 
        <td> {{ $value->product }}</td> 
        <td> {{ $value->quantity }}</td> 
        <td> {{ $value->price }}</td> 
    </tr>
    @endforeach
    </tbody>
</table>


</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>

    <style>
        .fontStyle{
            font-size: 13px;
        }
        .fontBold {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <div>
        <table>
            <tr>
                <td class="fontStyle fontBold"> {{ $company->name }} </td>
            </tr>
            <tr>
                <td class="fontStyle">{{ $company->address }}</td>
            </tr>
            <tr>
                <td class="fontStyle">{{ $company->city }}, {{ $company->postcode }}</td>
            </tr>
            <tr>
                <td class="fontStyle">Siret : {{ $company->siret }}</td>
            </tr>            
            <tr>
                <td class="fontStyle">TVA : {{ $devisResource[0]->devis->tva }}</td>
            </tr>
        </table>

     
        <table style="margin-left: 500px !important; margin-top: -100px !important;">
            <tr>
                <td class="fontStyle fontBold"> Devis n°{{ $devisResource[0]->devis->id }} </td>
            </tr>
            <tr>
                <td class="fontStyle">Date creation : 
                    {{  Carbon\Carbon::parse($devisResource[0]->devis->created_at)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td class="fontStyle">Date expiration : 
                    {{  Carbon\Carbon::parse($devisResource[0]->devis->date_expiration)->format('d-m-Y') }}
                </td>
            </tr>
        </table>
    </div>

      <div style="margin-top: 30px; margin-left: 500px;">
        <table>
            <tr>
                <td class="fontStyle fontBold"> {{ $devisResource[0]->devis->clients->name }} </td>
            </tr>
            <tr>
                <td class="fontStyle">{{ $devisResource[0]->devis->clients->clientAddress->address }}</td>
            </tr>
            <tr>
                <td class="fontStyle">{{ $devisResource[0]->devis->clients->clientAddress->city }}, {{ $devisResource[0]->devis->clients->clientAddress->postcode }}</td>
            </tr>
            <tr>
                <td class="fontStyle">E-mail : {{ $devisResource[0]->devis->clients->email }}</td>
            </tr>            
        </table>
    </div>
   

    <table style="margin-top: 45px !important; margin-left: 10px; width: 100%; padding: 0;" class="fontStyle">
        <thead>
            <tr style="padding: 0;">
                <th style="border: 1px solid black;"> Produit </th>
                <th style="border: 1px solid black;"> Quantité </th>
                <th style="border: 1px solid black;"> Prix unitaire HT </th>
                <th style="border: 1px solid black;"> Total HT </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($devisResource as $value)
        <tr style="outline: 0;">
            <td style="border: 1px solid black; padding-left: 5px;"> {{ $value->products->name }}</td> 
            <td style="border: 1px solid black; padding-left: 5px;"> {{ $value->quantity }}</td> 

            @if ($value->price == null)
            <td style="border: 1px solid black; padding-left: 5px;"> {{ $value->products->default_price }}</td> 
            @else
            <td style="border: 1px solid black; padding-left: 5px;"> {{ $value->price }}</td> 
            @endif
            
            @if ($value->price == null)
            <td style="border: 1px solid black; padding-left: 5px;"> {{ $value->products->default_price * $value->quantity }}</td> 
            @else
            <td style="border: 1px solid black; padding-left: 5px;"> {{ $value->price * $value->quantity  }}</td> 
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
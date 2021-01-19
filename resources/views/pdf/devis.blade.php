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

        .tableData {
            table-layout:fixed;
            word-wrap: break-word; 
            overflow-wrap: break-word;
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
                <td class="fontStyle fontBold"> {{ $infoClient->name }} </td>
            </tr>
            <tr>
                <td class="fontStyle">{{ $clientAdresse->address }}</td>
            </tr>
            <tr>
                <td class="fontStyle">{{ $clientAdresse->city }}, {{ $clientAdresse->postcode }}</td>
            </tr>
            <tr>
                <td class="fontStyle">E-mail : {{ $infoClient->email }}</td>
            </tr>
        </table>
    </div>

    <table style="margin-top: 45px !important; margin-left: 10px; width: 100%; padding: 0;" class="fontStyle tableData">
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
          @if($value->description != null)
            <tr>
                <td style="border: 1px solid black; padding: 5px;" colspan="4"> {{ $value->description }}</td> 
            </tr>
          @endif
        @endforeach
        </tbody>
    </table>

    <div style="margin-left: 485px; margin-top: 10px;">
        <table class="fontStyle" style="width: 218px;">
            <tr style="border: 1px solid black; padding-left: 5px;">
                <th style="text-align: left; border: 1px solid black; padding-left: 5px; width: 40%; font-size: 11px;">Remise</th>
                <td style="border: 1px solid black; padding-left: 5px;font-size: 11px;"> {{ $devisResource[0]->devis->remise }}</td>
            </tr>
            <tr style="border: 1px solid black; padding-left: 5px;">
                <th style="text-align: left; border: 1px solid black; padding-left: 5px; width: 40%; font-size: 11px;">Montant TVA</th>
                <td style="border: 1px solid black; padding-left: 5px;font-size: 11px;"> {{ $devisResource[0]->devis->montantTva }} </td>
            </tr>
            <tr style="border: 1px solid black; padding-left: 5px;">
                <th style="text-align: left; border: 1px solid black; padding-left: 5px; width: 40%; font-size: 11px;">THT</th>
                <td style="border: 1px solid black; padding-left: 5px;font-size: 11px;"> {{ $devisResource[0]->devis->tht }} </td>
            </tr>
            <tr style="border: 1px solid black; padding-left: 5px;">
                <th style="text-align: left; border: 1px solid black; padding-left: 5px; width: 40%; font-size: 11px;">TTC</th>
                <td style="border: 1px solid black; padding-left: 5px;font-size: 11px;"> {{ $devisResource[0]->devis->ttc }} </td>
            </tr>
        </table>
    </div>

    <div style="margin-left: 485px;">
        <p class="fontStyle">Bon pour accord</p>
    </div>
</body>
</html>
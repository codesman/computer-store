<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                /*display: flex;*/
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            
        </style>
    </head>
    <body>
        <div class="container">
           <h1>Computer Store!</h1>
            <h2>All Products</h2>

            @foreach ($products as $product)
                <p>{{ $product->name }}</p>
            @endforeach

            <h2>Products With Prices</h2>
            <table>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>${{ $product->price }} </td>
                    </tr>
                @endforeach
            </table>

            <h2>Products Under $200</h2>
            <table>
                @foreach ($productsUnder200 as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>${{ $product->price }} </td>
                    </tr>
                @endforeach
            </table>

            <h2>Products Between 200 & 400</h2>
            <table>
                @foreach ($productsBetween as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>${{ $product->price }} </td>
                    </tr>
                @endforeach
            </table>

            <h2>Products In Cents</h2>
            <table>
                @foreach ($productsCents as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->price }} </td>
                    </tr>
                @endforeach
            </table>

            <h2>Product Average Price: ${{ $productsAveragePrice }}</h2>

            <h2>{{ $manufacturer->name }} Products Average Price: ${{ $productsAveragePriceForManufacturer }}</h2>

            <h2>Products $180 or more By Price DESC</h2>
            <table>
                @foreach ($moreThan180SortedByPrice as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->price }} </td>
                    </tr>
                @endforeach
            </table>


            <h2>Products $180 or more By Name ASC</h2>
            <table>
                @foreach ($moreThan180SortedByName as $product)
                    <tr>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->price }} </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>

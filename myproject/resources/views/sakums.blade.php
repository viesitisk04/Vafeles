<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Burbuļvafeļu Piedāvājums</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #fafafa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .item {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 240px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .item h2 {
            margin: 0 0 10px;
            color: #444;
        }
        .item p {
            color: #666;
        }
        .item strong {
            display: block;
            margin-top: 10px;
            font-size: 18px;
            color: #222;
        }
    </style>
</head>
<body>

    <h1>Mūsu burbuļvafeļu piedāvājums</h1>

    <div class="container">
        @foreach($vafeles as $vafele)
            <div class="item">
                <h2>{{ $vafele['name'] }}</h2>
                <p>{{ $vafele['description'] }}</p>
                <strong>{{ number_format($vafele['price'], 2) }} €</strong>
            </div>
        @endforeach
    </div>

</body>
</html>

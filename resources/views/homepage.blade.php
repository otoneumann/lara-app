<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hi FROM BLADE tEMPLATE</h1>

    <p>A great number is {{ 2 + 2 }}</p>
    <p>The current year is {{ date('Y') }}</p>

    <h3>eldaras name is {{ $surname }}</h3>
    <h3>my name is {{ $name }}</h3>
    <h3>catos name {{ $catname }}</h3>

    <ul>
        @foreach ($animals as $animal)
            <li>{{ $animal }}</li>
        @endforeach

    </ul>

    <a href="/about">Back to about</a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: "Times New Roman";
            font-size: 12pt;
            line-height: 1.6;
        }
        table {
            width: 100%;
        }
    </style>
</head>
<body>

@include('surat.header')

{!! $konten !!}

@include('surat.ttd')

</body>
</html>

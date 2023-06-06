<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" xml:lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hi</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        .header {
            margin-bottom: 0;
        }

        footer {
            position: fixed;
            text-align: center;
            line-height: 35px;
        }

    </style>
</head>
<body>
<div class="header">
    {!! $header->isi !!}
</div>

<div class="page-break"></div>
<p>{{ $date }}</p>
<p><img src="data:image/png;base64, {!! $qr !!}" alt="qr"></p>

</body>
</html>

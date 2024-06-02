<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AidMeUk</title>
</head>

<body style="margin: 0; padding: 0;">

    <style>
        @media (max-width: 768px) {
            tr {
                display: flex;
                flex-direction: column;
                text-align: left;
                align-items: flex-start;
                text-align: left;
            }
            tr td {
                width: 100%;
                text-align: unset !important;
                background: none !important;
            }
            tr td:before {
                content: attr(data-label);
                font-weight: bold;
                float: left;
                display: block;
                width: 100%;
            }
            thead tr {
                display: none;
            }
        }
    </style>

    <div style="  margin:0 auto; padding: 25px;    font-family: system-ui; ">
        <div style="background-color: #F6FBFB;padding: 25px;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('gogiving.png'))) }}" style="display: block;  width: 130px; margin: 0 auto;">


            {!! $array['message'] !!}

        </div>
        <div style="text-align:center; background:  #f3f3f3;padding: 15px; margin-top: 5px;">
            <span style="color: #143157;">&copy; AidMeUk, all right reserved 2023</span>
        </div>
       
    </div>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido a LAG</title>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
</head>
<style>
    .button {
        display: inline-block;
        border-radius: 4px;
        background-color: #2E323E;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 16px;
        padding: 10px;
        width: 160px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 4px;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }

    body {
        margin: 0;
        background: #FFFFFF;
        font-family: 'Roboto', sans-serif;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>

<body>
    <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="100%">
        <tbody>
            <tr>
                <td>
                    <table cellpadding="10" cellspacing="0" bgcolor="#FFFFFF" width="80%" style="margin:2rem auto;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">
                                    <img src="http://167.172.149.82/images/black_logo.png" width="250">
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">
                                    <h2 style="color: #222222;">
                                        Bienvenido, {{$notifiable->name}}
                                    <h2>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center; font-size: 20px;  font-weight: normal;">
                                    <p> Tu contraseña fue cambiada por la siguiente:
                                    </p>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center; font-weight: bold;">
                                    <p> {{$password}}</p>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">
                                    No responda a este correo electr&oacute;nico. Este buz&oacute;n no se supervisa y no recibir&aacute;
                                    respuesta.
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td style="color: #37474F; font-size: .8rem; font-weight: normal; padding: .5rem 2rem; text-align: center;">
                    LAG© 2020. All rights reserved.
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>


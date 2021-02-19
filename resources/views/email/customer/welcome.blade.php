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
        <thead class="thead-thead" style="background-size: cover; background-position: 50% 40%;
        background-image: url('http://167.172.149.82/images/bg.jpg');">
            <tr>
                <th style="text-align: center; padding: 15vh 0;">
                </th>
            </tr>
        </thead>
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
                                    <p> Gracias por suscribirte a LAG. De ahora en adelante eres parte de la
                                        experiencia.
                                    </p>
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center; font-weight: bold;">
                                    <h2> Da click al siguiente botón para <strong>verificar:</strong></h2>
                                </th>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';box-sizing:border-box">
                                    <a href="{{$button}}"
                                    class="m_-2387207807455711479button m_-2387207807455711479button-primary"
                                    style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3490dc;border-top:10px solid #3490dc;border-right:18px solid #3490dc;border-bottom:10px solid #3490dc;border-left:18px solid #3490dc"
                                    target="_blank">Verificar Correo Electr&oacute;nico</a>
                                </td>
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
                        Si tienes problemas al dar click en el bot&oacute;n "Verificar Correo Electr&oacute;nico", copia y pega la URL en
                        tu buscador:
                        {{$button}}
                </td>
            </tr>
            <tr>
                <td style="color: #37474F; font-size: .8rem; font-weight: normal; padding: .5rem 2rem; text-align: center;">
                    LAG© 2020. All rights reserved.
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>


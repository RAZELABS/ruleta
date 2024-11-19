@php

$mensaje = '
<div style="color: #24304F; margin: 4% 10% 2%; text-align: left;font-family: sans-serif;font-size: 15px ">
    <h2 style=" margin: 0 0 20px; line-height: 25px">Hola <span style="color:#326AF9">'.ucfirst($nombre_cliente).'
            '.ucfirst($apellido_cliente).'</span>, Gracias por confiar en: '.ucfirst($razon_social_empresa).'</h2>
    <p style="margin: 2px 0 10px 0; font-size: 15px ; line-height: 20px">
        Se te ha generado una cotizacion de venta a tu empresa <strong><span
                style="color:#326AF9">'.ucfirst($razon_social_cliente).'</span> - '.$ruc_cliente.'</strong> con los
        siguientes datos: <br>
        <li>Monto: <strong>'.numberFormat($monto).' '.$divisa.'</strong></li>
        <li>Cantidad de Productos: <strong>'.$cantidad_productos.' Und</strong></li>
        <li>Fecha: <strong>'.$fecha.'</strong></li>
    </p>
</div>
';

$descripcion_estado = 'Para mas información te invitamos a ver el archivo adjunto en este correo';
$footer1 = ucfirst($razon_social_empresa).' / '.$ruc_empresa.' / '.$email_empresa;
$footer2 = 'Si tienes alguna duda o inconveniente llamanos al, '.$ruc_cliente;
$boton = "Ir a página web";
$titulo = "Informe de Cotización";
$banner_img = "https://www.cratibusiness.com/proyectos/ventas/public/img/cotizacion-banner.jpg";
$img1= "https://www.cratibusiness.com/proyectos/ventas/public/img/top-rounded.png";
$img2= "https://www.cratibusiness.com/proyectos/ventas/public/img/bottom-rounded.png";
$logo_crati = "https://cratibusiness.com/proyectos/ventas/public/img/logoC.png";
$web_crati= "https://www.crati.com.pe";
@endphp

<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        @media (max-width:620px) {
            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }

            .fullMobileWidth,
            .row-content {
                width: 100% !important;
            }

            .image_block img.big {
                width: auto !important;
            }

            .column .border {
                display: none;
            }

            .stack .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body style="background-color: #ffc107; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation" width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:35px;padding-left:30px;padding-right:30px;padding-top:10px;width:100%;">
                                                                <!-- <div align="center" style="line-height:10px"><img src="https://www.qamwanft.com/emails/logoQ.png" style="display: block; height: auto; border: 0; width: 150px; max-width: 100%;" width="150" /></div> -->
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td style="width:100%;padding-right:0px;padding-left:0px;">
                                                                <div align="center" style="line-height:10px"><img
                                                                        class="fullMobileWidth big" src="{{ $img1 }}"
                                                                        style="display: block; height: auto; border: 0; width: 600px; max-width: 100%;"
                                                                        width="600" /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; background-position: center top; color: #000000; width: 600px;"
                                        width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;width:100%;">
                                                                <div align="center" style="line-height:10px"><img
                                                                        src="{{ $banner_img }}"
                                                                        style="display: block; height: auto; border: 0; width: 541px; max-width: 100%;"
                                                                        width="541" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 600px;"
                                        width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="heading_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:5px;padding-top:15px;text-align:center;width:100%;">
                                                                <h1
                                                                    style="margin: 0; color: #24304f; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 36px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
                                                                    <strong>{{ $titulo }} </strong>
                                                                </h1>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                                        role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="mso-line-height-alt: 25.2px; color: #737487; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                                        {!! $mensaje !!}
                                                                        <h4
                                                                            style="margin: 5% 10% 0%; text-align: center;font-weight:bolder">
                                                                            {{ $descripcion_estado }}</h4>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- <table border="0" cellpadding="0" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                        <tr>
                                                            <td style="padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;">
                                                                <div align="center"> -->
                                                    <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" style="height:52px;width:220px;v-text-anchor:middle;" arcsize="8%" stroke="false" fillcolor="#24304f"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
                                                    <!-- <a href="https://www.qamwanft.com">
                                                                        <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#24304f;border-radius:4px;width:auto;border-top:1px solid #24304f;border-right:1px solid #24304f;border-bottom:1px solid #24304f;border-left:1px solid #24304f;padding-top:10px;padding-bottom:10px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
                                                                            <span style="padding-left:60px;padding-right:60px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">{{$boton}}</span></span>
                                                                        </div>
                                                                    </a> -->
                                                    <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                    <!-- </div>
                                                            </td>
                                                        </tr>
                                                    </table> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top; color: #000000; width: 600px;"
                                        width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td style="width:100%;padding-right:0px;padding-left:0px;">
                                                                <div align="center" style="line-height:10px"><img
                                                                        class="fullMobileWidth big" src="{{ $img2 }}"
                                                                        style="display: block; height: auto; border: 0; width: 600px; max-width: 100%;"
                                                                        width="600" /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                                        role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:5px;padding-left:5px;padding-right:5px;padding-top:30px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #262b30; line-height: 1.2;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <span style="font-size:12px;">{{ $footer1
                                                                                }}</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                                                        role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:35px;padding-left:10px;padding-right:10px;padding-top:5px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #262b30; line-height: 1.2;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <span style="font-size:12px;">{{ $footer2
                                                                                }}</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color:#fff"
                        width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;"
                                        width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="icons_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
                                                                <table cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td
                                                                            style="vertical-align: middle; text-align: center;">
                                                                            <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                                                            <!--[if !vml]><!-->
                                                                            <table cellpadding="0" cellspacing="0"
                                                                                class="icons-inner" role="presentation"
                                                                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;">
                                                                                <!--<![endif]-->
                                                                                <tr>

                                                                                    <td
                                                                                        style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle; letter-spacing: undefined; text-align: center;">
                                                                                        <p style="color: #9d9d9d;">Power
                                                                                            by</p>
                                                                                    </td>
                                                                                    <td
                                                                                        style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;">
                                                                                        <a href="{{ $web_crati }}"
                                                                                            style="text-decoration: none;"
                                                                                            target="_blank"><img
                                                                                                align="center"
                                                                                                alt="Crati" class="icon"
                                                                                                src="{{ $logo_crati }}"
                                                                                                style="display: block; height: auto; margin: 0 auto; border: 0;"
                                                                                                width="100" /></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table><!-- End -->
</body>

</html>

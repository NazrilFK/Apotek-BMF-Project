<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak Website</title>
</head>
<body style="margin:0; padding:0; background-color:#f3f4f6; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0;">
        <tr>
            <td align="center">

                <!-- CARD -->
                <table width="100%" cellpadding="0" cellspacing="0"
                       style="max-width:600px; background:#ffffff; border-radius:12px;
                              overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.08);">

                    <!-- HEADER -->
                    <tr>
                        <td style="
                            background:linear-gradient(135deg, #16a34a, #22c55e);
                            padding:28px 24px;
                            text-align:center;
                        ">
                            <!-- ICON -->
                            <div style="
                                width:56px;
                                height:56px;
                                background:#ffffff;
                                border-radius:50%;
                                display:inline-flex;
                                align-items:center;
                                justify-content:center;
                                margin-bottom:12px;
                                font-size:28px;
                            ">
                                💬
                            </div>

                            <!-- TITLE -->
                            <h2 style="
                                margin:0;
                                color:#ffffff;
                                font-size:22px;
                                font-weight:bold;
                                letter-spacing:0.3px;
                            ">
                                Pesan Baru dari Website
                            </h2>

                            <!-- SUBTITLE BRAND -->
                            <p style="
                                margin:8px 0 0;
                                font-size:14px;
                                font-weight:bold;
                            ">
                                <span style="color:#dcfce7;">Apotek</span>
                                <span style="color:#22c55e;"> Bhakti</span>
                                <span style="color:#3b82f6;"> Medika Farma</span>
                            </p>
                        </td>
                    </tr>



                    <!-- CONTENT -->
                    <tr>
                        <td style="padding:24px; color:#374151; font-size:14px; line-height:1.6;">

                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:8px 0; width:140px;"><strong>Nama</strong></td>
                                    <td style="padding:8px 0;">: {{ $nama }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;"><strong>Email</strong></td>
                                    <td style="padding:8px 0;">: {{ $email }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;"><strong>Telepon</strong></td>
                                    <td style="padding:8px 0;">: {{ $telepon ?? '-' }}</td>
                                </tr>
                            </table>

                            <hr style="margin:20px 0; border:none; border-top:1px solid #e5e7eb;">

                            <p style="margin:0 0 8px;"><strong>Pesan:</strong></p>

                            <div style="background:#f9fafb; border-left:4px solid #facc15;
                                        padding:16px; border-radius:6px; color:#111827;">
                                {{ $pesan }}
                            </div>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#f9fafb; padding:16px 24px; text-align:center;
                                   font-size:12px; color:#6b7280;">
                            Email ini dikirim otomatis dari website<br>
                            <strong>Apotek Bhakti Medika Farma</strong>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FORMULIR PENDAFTARAN SISWA BIMBEL LASKARA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        body {
            font-family: "等线", "DengXian", "Microsoft YaHei", "SimSun", sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 160px 20px 40px;
            background-image: url('assets/img/background.jpg');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .content-container {
            position: relative;
            padding: 20px;
            border-radius: 8px;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
        }

        .main-table td {
            padding: 4px 8px;
            vertical-align: top;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            text-align: start;
            padding-top: 46px !important;
            color: #7030a0;
        }

        .label {
            width: 200px;
            font-size: 16px;
        }

        .colon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .value {
            font-size: 16px;
        }

        .main-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding-top: 0;
            color: #451d64;
        }

        .sub-title {
            font-size: 18px;
            font-weight: normal;
            text-align: center;
            padding-bottom: 16px;
            color: #451d64;
        }

        .signature {
            text-align: right;
            padding-top: 40px !important;
        }

        .signature-text {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 80px !important;
            color: #7030a0;
        }

        .signature-line {
            border-bottom: 1px dotted #000;
            width: 200px;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="max-w-4xl mx-auto content-container">
        <table class="main-table">
            <tr>
                <td colspan="3" class="main-title">FORMULIR PENDAFTARAN SISWA BIMBEL LASKARA</td>
            </tr>
            <tr>
                <td colspan="3" class="sub-title">
                    TAHUN AJARAN
                    {{ \Carbon\Carbon::now()->format('Y') }}/{{ \Carbon\Carbon::now()->addYear()->format('Y') }}
                </td>
            </tr>
            <tr>
                <td colspan="3" class="section-title">DATA DIRI SISWA</td>
            </tr>
            <tr>
                <td class="label">NAMA</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->nama_siswa }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->nik }}</td>
            </tr>
            <tr>
                <td class="label">JENIS KELAMIN</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
            </tr>
            <tr>
                <td class="label">TEMPAT/TANGGAL LAHIR</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="label">PROGRAM</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->program }}</td>
            </tr>
            <tr>
                <td class="label">AGAMA</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->agama }}</td>
            </tr>
            <tr>
                <td class="label">PENGIRIMAN</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->pengiriman ?: '-' }}</td>
            </tr>
            <tr>
                <td class="label">NO. TELFON</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->no_telfon_siswa ?: '-' }}</td>
            </tr>
            <tr>
                <td colspan="3" class="section-title">DATA ORANG TUA KANDUNG</td>
            </tr>
            <tr>
                <td class="label">NAMA AYAH</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->nama_ayah }}</td>
            </tr>
            <tr>
                <td class="label">PEKERJAAN AYAH</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->pekerjaan_ayah ?: '-' }}</td>
            </tr>
            <tr>
                <td class="label">NAMA IBU</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->nama_ibu }}</td>
            </tr>
            <tr>
                <td class="label">PEKERJAAN IBU</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->pekerjaan_ibu ?: '-' }}</td>
            </tr>
            <tr>
                <td class="label">NO TELFON ORANG TUA</td>
                <td class="colon">:</td>
                <td class="value">{{ $pendaftaran->no_telfon_orang_tua ?: '-' }}</td>
            </tr>
            <tr>
                <td colspan="3" class="signature">
                    <div class="signature-text">TANDA TANGAN</div>
                    <div class="signature-line"></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
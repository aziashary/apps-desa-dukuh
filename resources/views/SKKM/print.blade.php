<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Surat Keterangan Keluarga Miskin</title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 330mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: F4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body>
<div class="book">
    <div class="page">
      <table style="border: none;width:477.0pt;margin-left:5.4pt;border-collapse:collapse;">
    <tbody>
        <tr>
            @foreach($data as $skkm)
            <td style="width: 75pt;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:-14.4pt;text-indent:9.0pt;'>&nbsp;
                    <img src="{{ asset ('assets/images/logo/logo.png')}}" alt="image" style="width: 82px;"></span></p>

            </td>
            <td style="width: 411pt;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-size:19px;font-family:"Arial",sans-serif;color:#0D0D0D;'>PEMERINTAH KABUPATEN &nbsp;BOGOR</span></p>
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-size:19px;font-family:"Arial",sans-serif;color:#0D0D0D;'>KECAMATAN CIBUNGBULANG</span></p>
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><strong><span style='font-size:24px;font-family:"Arial",sans-serif;color:#0D0D0D;'>DESA GIRIMULYA</span></strong></p>
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-size:13px;font-family:"Arial",sans-serif;color:#0D0D0D;'>Jln. Raya H. Baimin Rt 002/001 No.2 Cibungbulang Bogor 16630</span></p>
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><strong><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p __cpp="1"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAApoAAAAGAQMAAABZ+aytAAAAAXNSR0ICQMB9xQAAAAZQTFRFAAAAAAAApWe5zwAAAAF0Uk5TAEDm2GYAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAZdEVYdFNvZnR3YXJlAE1pY3Jvc29mdCBPZmZpY2V/7TVxAAAAFElEQVQoz2OQ/09t8I9hCIGR7X0AXvOjmeULeJQAAAAASUVORK5CYII=" alt="" __cpp="1" width="666" height="6"></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><strong><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></strong></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><strong><u><span style='font-size:19px;font-family:"Arial",sans-serif;color:#0D0D0D;'>SURAT KETERANGAN</span></u></strong><strong><u><span style='font-size:19px;font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;KELUARGA MISKIN</span></u></strong></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>Nomor : {{ $skkm->no_skkm }}</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><br></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Yang bertanda tangan di bawah ini Kepala Desa Girimulya Kecamatan Cibungbulang Kabupaten Bogor, menerangkan bahwa :</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'><br></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <strong>{{ $skkm->wargas->nama_warga }}</strong></span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Tempat, tgl lahir&nbsp; &nbsp; &nbsp; : {{ $skkm->wargas->tempat_lahir }}, {{ date('d-m-Y', strtotime($skkm->wargas->tanggal_lahir)) }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>NIK &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $skkm->wargas->nik }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Jenis Kelamin&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $skkm->wargas->jenis_kelamin }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Agama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $skkm->wargas->agama }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Pekerjaan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $skkm->wargas->jenis_pekerjaan }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>NIK&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $skkm->wargas->nik }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Alamat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $skkm->wargas->alamat}}</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>Nama tersebut diatas adalah benar warga kami dan menurut catatan dalam Buku Induk kami nama tersebut diatas berasal dari &nbsp; &nbsp;: <strong><em> {{ $skkm->keterangan }}</em></strong> &nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>Surat Keterangan ini dipergunakan untuk &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <strong><em>{{ $skkm->usulan_surat }}</em></strong></span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>Demikian surat keterangan ini di buat dengan sebenarnya, kepada pihak yang berkepentingan agar mengetahui dan maklum adanya &nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-indent:36.0pt;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Girimulya, {{ date('d-m-Y', strtotime($skkm->created_at)) }}</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:36.0pt;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>TKSK Kec.Cibungbulang &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; a/n &nbsp;Kepala Desa Girimulya</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp; &nbsp; &nbsp; EDI SUKARYA &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ENDANG SUTISNA</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>Mengetahui,</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>CAMAT CIBUNGBULANG</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#0D0D0D;'>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</span></p>
</div>
</div>
</body>
</html>
@endforeach
<script type="text/javascript">window.print();</script>
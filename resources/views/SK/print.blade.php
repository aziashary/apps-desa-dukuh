<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Surat Keterangan Usaha</title>
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
        <table style="border: none;width:486.0pt;margin-left:-3.6pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    @foreach($data as $sk)
                    <td style="width: 68.95pt;background: white;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:-14.4pt;text-align:center;text-indent:9.0pt;'><span style="margin-left:1px;margin-top:1px;width:73px;height:84px;">
                            <img src="{{ asset ('assets/images/logo/logo.png')}}" alt="image" style="width: 75px; height: 80px;"></span></p>
                    </td>
                    <td style="width: 417.05pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><strong><span style='font-size:19px;font-family:"Arial",sans-serif;color:#1D1B11;'>PEMERINTAH KABUPATEN &nbsp;BOGOR</span></strong></p>
                        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><strong><span style='font-size:19px;font-family:"Arial",sans-serif;color:#1D1B11;'>KECAMATAN CIBUNGBULANG</span></strong></p>
                        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><strong><span style='font-size:21px;font-family:"Arial",sans-serif;color:#1D1B11;'>DESA GIRIMULYA</span></strong></p>
                        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:#1D1B11;'>Jln. Raya &nbsp;H. Baimin Rt &nbsp;No.2 02/01 Cibungbulang Kabupaten Bogor</span><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;- 16630</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAo4AAAAGAQMAAAB3vI0/AAAAAXNSR0ICQMB9xQAAAAZQTFRFAAAAAAAApWe5zwAAAAF0Uk5TAEDm2GYAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAZdEVYdFNvZnR3YXJlAE1pY3Jvc29mdCBPZmZpY2V/7TVxAAAAGUlEQVQoz2Ow/09lcICBBkbSAAwNV1IfAADVDfIOdts4BwAAAABJRU5ErkJggg==" alt="" width="654" height="6"></span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><br></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><strong><u><span style='font-size:19px;font-family:"Arial",sans-serif;color:#1D1B11;'>SURAT KETERANGAN USAHA&nbsp;</span></u></strong></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>Nomor : {{ $sk->no_sk }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-family:&quot;Arial&quot;,sans-serif;color:#1D1B11;"></span><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><strong><span style='font-size:19px;font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></strong></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>Yang bertanda tangan dibawah ini Kepala Desa Girimulya Kecamatan Cibungbulang Kabupaten Bogor menerangkan dengan sebenarnya bahwa :</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-indent:36.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <strong>{{ $sk->wargas->nama_warga }}</strong></span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Tempat, tgl lahir&nbsp; &nbsp; &nbsp; : {{ $sk->wargas->tempat_lahir }}, {{ date('d-m-Y', strtotime($sk->wargas->tanggal_lahir)) }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>NIK &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $sk->wargas->nik }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Jenis Kelamin&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $sk->wargas->jenis_kelamin }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Agama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $sk->wargas->agama }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Pekerjaan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $sk->wargas->jenis_pekerjaan }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>NIK&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $sk->wargas->nik }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;text-indent:36.0pt;line-height:150%;'><span style='line-height:150%;font-family:"Tahoma",sans-serif;color:#1D1B11;'>Alamat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $sk->wargas->alamat}}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:144.0pt;text-indent:-108.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:35.45pt;text-indent:-1.65pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>Nama tersebut diatas adalah benar warga kami yang &nbsp;mempunyai usaha sebagaimana tersebut dibawah ini &nbsp;:</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:144.0pt;text-indent:-108.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>Jenis Usaha&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <strong>&nbsp;{{ $sk->keterangan_1 }}</strong></span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:144.0pt;text-indent:-108.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>Alamat Usaha &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;{{ $sk->keterangan_2}}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:144.0pt;text-indent:-108.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;text-align:justify;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Demikian Surat Keterangan Usaha ini &nbsp;kami buat dan untuk di pergunakan sebagai mana mestinya,</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:36.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:36.0pt;line-height:150%;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Girimulya, {{ date('d-m-Y', strtotime($sk->created_at)) }}</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:144.0pt;text-indent:36.0pt;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; a/n Kepala Desa Girimulya</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:252.0pt;text-indent:36.0pt;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sekretaris Desa</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:252.0pt;text-indent:36.0pt;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;margin-left:144.0pt;text-indent:36.0pt;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p style='margin:0cm;margin-bottom:.0001pt;font-size:16px;font-family:"Times New Roman",serif;'><span style='font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp;</span></p>
        <p><span style='font-size:16px;font-family:"Arial",sans-serif;color:#1D1B11;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>OKTOBA SYAEFUL ADAM, S.Kom.</strong></span></p>
        @endforeach
</div>
</div>
</body>
</html>
<script type="text/javascript">window.print();</script>
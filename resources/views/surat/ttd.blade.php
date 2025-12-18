<div style="margin-top:60px;">
    <div style="float:right; text-align:center;">
        Cimanggu I, {{ $tanggal }}<br>
        {{ $jabatan_penandatangan }}<br><br>

        @if(!empty($ttd_image))
            <img src="{{ public_path($ttd_image) }}" width="120"><br>
        @else
            <br><br><br>
        @endif

        <strong>{{ $nama_penandatangan }}</strong>
    </div>
</div>

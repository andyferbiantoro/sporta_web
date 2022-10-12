@component('mail::message')

Pembayaran Anda Telah Ditolak Oleh Admin. <br>
Silhkan periksa kembali pembayaran anda
<br>
Nominal Pembayaran = Rp. <?=number_format($cancel->nominal_pembayaran, 0, ".", ".")?>,00

@endcomponent
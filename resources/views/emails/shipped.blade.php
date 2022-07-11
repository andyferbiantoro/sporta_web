@component('mail::message')

Pembayaran Anda Sudah Terverifikasi
Terima Kasih
<br>
Nominal Pembayaran = Rp. <?=number_format($confirm->nominal_pembayaran, 0, ".", ".")?>,00

@endcomponent
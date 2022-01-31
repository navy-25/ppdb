<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="generator" content="HubSpot">

        <meta name="author" content="ViProject | Muhammad Nafi Maula Hakim">
        <meta name="description" content="Aplikasi voting berbasis web, mempermudah pengelola untuk melakukan pemilihan umum (voting) secara custom, realtime, akurat dan terstruktur">
        <meta name="robots" content="noindex,nofollow">

        <link rel="kanonik" href="" >
        <title>
            Surat Pernyataan alon Peserta Didik Baru - {{ $data->nama_lengkap }}
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            html,body{
                font-family: 'Times New Roman' !important;
                font-size:12px !important;
            }
            td{
                border:none !important;
                padding-left:15px;
                padding-bottom:5px
            }
            table{
                border:none !important;
                padding:10px;
            }
            .t-bottom{
                border-style: dotted  !important;
                border-width: 0px 0px 1.5px 0px !important;
            }
        </style>
        <script>
            var css = '@page { size: A4 potrait; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');
            style.type = 'text/css';
            style.media = 'print';
            if (style.styleSheet){
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }
            head.appendChild(style);
            window.print();
        </script>
    </head>
    <body>
        <table class="w-100 mb-2 ">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="placeholder" style="float:right:object-fit: cover !important;width:60px !important;height:60px !important;">
                    </td>
                    <td>
                        <p class="mb-0 fw-bold h2 text-center">KEMENTRIAN AGAMA</p>
                        <p class="mb-0 fw-bold h4 text-center">MADRASAH ALIYAH NEGERI 1 HULU SUNGAI TENGAH</p>
                        <P class="mb-0 text-center">Jl. Damanhuri Komp, Mesjid Agung No. Telp. (0517) 41308 Barabai Kab. HS. Tengah</P>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-style: double!important;border-width: 0px 0px 4px 0px !important;"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="row m-0">
            <div class="col-12">
                @php
                    $tahun = date('Y');
                @endphp
                <h4 class="text-center">
                    <u class="fw-bold">SURAT PERNYATAAN CALON PESERTA DIDIK BARU</u>
                    <br> TAHUN PELAJARAN {{ $tahun }}/{{ $tahun+1 }}
                </h4>
            </div>
            <div class="col-12">
                <br>
                <h6 class="mb-2">Yang bertanda tangan dibawah ini :</h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width: 10px">1.</td>
                            <td style="width:40%">Nama</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">2.</td>
                            <td>NISN</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nisn}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">3.</td>
                            <td>Tempat, Tanggal Lahir</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->tempat_lahir }}, {{ $date = date('d M Y', strtotime($data->tanggal_lahir)); }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">4.</td>
                            <td>Jenis Kelamin</td>
                            <td style="width: 5px">:</td>
                            <td>{{  $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">5.</td>
                            <td>Agama</td>
                            <td style="width: 5px">:</td>
                            <td>Islam</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">6.</td>
                            <td>Nomor Tes/Pendaftaran</td>
                            <td style="width: 5px">:</td>
                            <td>.............................................................................................</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">7.</td>
                            <td>Diterima di Kelas/Peminatan</td>
                            <td style="width: 5px">:</td>
                            <td>X - .......................................................................................</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">8.</td>
                            <td>Nama Orang Tua / Wali</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">9.</td>
                            <td>Pekerjaan Orang Tua</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">10.</td>
                            <td>Agama Orang Tua</td>
                            <td style="width: 5px">:</td>
                            <td>Islam</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">11.</td>
                            <td>Nama Wali</td>
                            <td style="width: 5px">:</td>
                            <td>.............................................................................................</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">12.</td>
                            <td>Pekerjaan Wali</td>
                            <td style="width: 5px">:</td>
                            <td>.............................................................................................</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">13.</td>
                            <td>Hubungan Keluarga dengan Wali</td>
                            <td style="width: 5px">:</td>
                            <td>.............................................................................................</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">14.</td>
                            <td>Alamat Orang Tua / Wali</td>
                            <td style="width: 5px">:</td>
                            <td>Jln. ......................................................................................</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>.............................................................................................</td>
                        </tr>
                        <tr>
                            <td style="width: 10px"></td>
                            <td>Nomor telepon/HP</td>
                            <td style="width: 5px">:</td>
                            <td>.............................................................................................</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="mb-2">Dengan ini kami menyatakan dengan sesungguhnya, bahwa selama di Madrasah ini:</h6>
                <h6 class="ps-2">1. &nbsp;Akan belajar dengan tekun, sungguh-sungguh dan penuh semangat;</h6>
                <h6 class="ps-2">2. &nbsp;Akan menjaga nama baik diri sendiri, keluarga, masyarakat dan madrasah;</h6>
                <h6 class="ps-2">3. &nbsp;Sanggup mentaati seluruh tata tertib dan peraturan yang berlaku, mematuhi pelaksanaan wiyata mandala termasuk berpakaian seragam madrasah, OSIS dan lain lain;</h6>
                <h6 class="ps-2">4. &nbsp;Siap menerima sanksi sesuai dengan ketentuan madrasah;</h6>
                <h6 class="mb-2">Demikian surat pernyataan ini kami buat dengan sebenarnya dan penuh rasa tanggung jawab.</h6><br>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 50%">Mengetahui</td>
                            <td class="text-center" style="width: 50%">Barabai, .......... {{ date('M') }} {{ date('Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 50%">Orang Tua/Wali Peserta Didik</td>
                            <td class="text-center" style="width: 50%">Yang Membuat Pernyataan</td>
                        </tr>
                        <tr>
                            <td style="width: 50%"><br><br><br><br></td>
                            <td style="width: 50%"><br><br><br><br></td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 50%">( .............................................. )</td>
                            <td class="text-center" style="width: 50%">( .............................................. )</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h6 class="mb-2">Catatan : </h6>
                <h6 class="mb-1">Semua isian data harus diisi dengan lengkap dan jelas.</h6>
                <h6 class="mb-1">Penulisan nama Peserta Didik dan Orang Tua harus jelas dan sesuai dengan (Ijazah, Akta Kelahiran, Kartu Keluarga).</h6>
                <h6 class="mb-1">No. HP Orang Tua/Wali Siswa yang bisa dihubungi (aktif) ...............................</h6>
            </div>
        </div>
    </body>
</html>

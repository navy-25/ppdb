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
            Kartu Peserta - {{ $data->nama_lengkap }}
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
                        <p class="mb-0 fw-bold h2 text-center">E-CARD / KARTU ELEKTRONIK</p>
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
            <div class="col-9">
                <h4 class="mb-2">Data peserta :</h4>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width: 10px">1.</td>
                            <td style="width:40%">Nama Lengkap</td>
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
                            <td>Nomor Peserta</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->no_peserta}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">6.</td>
                            <td>Alamat</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h4 class="mb-2">Data Orang Tua :</h4>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width: 10px">1.</td>
                            <td style="width:40%">Nama Ayah</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">2.</td>
                            <td>Telepon Ayah</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->telepon_ayah }}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">3.</td>
                            <td>Nama Ibu</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nama_ibu}}</td>
                        </tr>
                        <tr>
                            <td style="width: 10px">4.</td>
                            <td>Telepon Ibu</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->telepon_ibu }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3">
                @if ($data->photo == '' || $data->photo == null)
                    <img src="{{ asset('assets/images/80x80.png')}}" alt="placeholder" style="object-fit: cover !important;width:100% !important;">
                @else
                    <img src="{{ asset('assets/uploads/calon siswa/' . $data->photo)}}" alt="{{ $data->photo }}" style="object-fit: cover !important;width:100% !important;">
                @endif
            </div>
        </div>
        <br>
        <div class="row m-0">
            <div class="col-12">
                <h4 class="mb-2">Data pendaftaran :</h4>
                <table class="w-100 mb-2 table-bordered">
                    <thead>
                        <tr>
                            <td style="border:0.1px solid black !important">No. Pendaftaran</td>
                            <td style="border:0.1px solid black !important">Jalur</td>
                            <td style="border:0.1px solid black !important">Jurusan</td>
                            <td style="border:0.1px solid black !important">Soal Tes</td>
                            <td style="border:0.1px solid black !important">Tanggal daftar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border:0.1px solid black !important">{{ $data->no_pendaftaran }}</td>
                            <td style="border:0.1px solid black !important">{{ $data->jalur }}</td>
                            <td style="border:0.1px solid black !important">{{ $data->jurusan }}</td>
                            <td style="border:0.1px solid black !important">
                                @if ($data->jalur == "Regular")
                                    @php
                                        $jadwal_tes = \App\Models\JadwalTest::first();
                                        if($jadwal_tes == null){
                                            $jt = 'Belum diatur';
                                        }else{
                                            $jt = date('d M Y', strtotime($jadwal_tes->tanggal_mulai)).'(Pukul '.$jadwal_tes->jam_mulai.') s/d '.date('d M Y', strtotime($jadwal_tes->tanggal_selesai)).' (Pukul '.$jadwal_tes->jam_selesai.')';

                                        }
                                    @endphp
                                    {{$jt}}
                                @else
                                    Tidak ada
                                @endif
                            </td>
                            <td style="border:0.1px solid black !important">{{ date('d M Y', strtotime($data->created_at)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row m-0">
            <div class="col-12">
                <table class="w-100 mb-2 table-bordered">
                    <thead>
                        <tr>
                            <td style="border:0.1px solid black !important">Catatan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border:0.1px solid black !important">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 50%">Mengetahui</td>
                            <td class="text-center" style="width: 50%">Barabai, .......... {{ date('M') }} {{ date('Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 50%">Yang Membuat Pernyataan</td>
                            <td class="text-center" style="width: 50%">Petugas/Panitia PPDB</td>
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
            </div>
        </div>
    </body>
</html>

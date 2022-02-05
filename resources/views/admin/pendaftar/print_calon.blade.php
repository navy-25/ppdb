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
            Cetak Biodata Peserta Didik Baru - {{ config('app.name') }}
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            html,body{
                font-family: 'Times New Roman' !important;
                font-size:11px !important;
            }
            td{
                border-bottom: 0.2px solid black;
                padding-left:15px;
            }
            table{
                border: 2px solid black;
                padding:10px;
            }
            /* .photo{
                width: 3cm;
                height: 4cm;
                float: right;
                border: 0.5px solid black;
                margin-top: 20px;
            } */
        </style>
        <script>
            var css = '@page { size: landscape; }',
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
        <div class="row m-0">
            <div class="col-12">
                @php
                    $tahun = date('Y');
                @endphp
                <h4 class="text-center fw-bold">Biodata Peserta Didik Baru {{ $tahun }}/{{ $tahun+1 }}</h4>
            </div>
            <div class="col-6">
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Nama Lengkap (Sesuai dengan ijazah)</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->tempat_lahir }}, {{ $date = date('d M Y', strtotime($data->tanggal_lahir)); }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nisn}}</td>
                            <td>(10 digit)</td>
                        </tr>
                        <tr>
                            <td>NIK (Nomor Induk Kependudukan)</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->nis}}</td>
                            <td>(16 digit)</td>
                        </tr>
                        <tr>
                            <td>Alamat Email</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->email}}</td>
                        </tr>
                        <tr>
                            <td>No. Telp/HP</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->telepon}}</td>
                        </tr>
                        <tr>
                            <td>Hobi</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->hobi}}</td>
                        </tr>
                        <tr>
                            <td>Cita-cita</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->cita_cita}}</td>
                        </tr>
                        <tr>
                            <td>Anak Ke-</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->anak_ke}} dari {{ $data->jumlah_saudara}} Bersaudara</td>
                        </tr>
                        <tr>
                            <td>Asal Madrasah/Sekolah</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->asal_sekolah}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Madrasah/Sekolah</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->jenis_sekolah}}</td>
                        </tr>
                        <tr>
                            <td>NPSN Asal Madrasah/Sekolah</td>
                            <td style="width: 5px">:</td>
                            <td>{{ $data->npsn_asal_sekolah}}</td>
                            <td>(8 digit)</td>
                        </tr>
                        <tr>
                            <td>Pernah Mengikuti PAUD</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->mengikuti_paud}}</td>
                        </tr>
                        <tr>
                            <td>Pernah Mengikuti TK/RA</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->mengikuti_tk}}</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="text-center mb-2"><b>INFORMASI TEMPAT TINGGAL SISWA SEKARANG</b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Alamat</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Desa/Kelurahan</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->desa_kelurahan}}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->kecamatan}}</td>
                        </tr>
                        <tr>
                            <td>Kab./Kota</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->kab_kota}}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->provinsi}}</td>
                        </tr>
                        <tr>
                            <td>Jarak Tempat Tinggal Siswa</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->jarak_tempat_tinggal}}</td>
                        </tr>
                        <tr>
                            <td>Transportasi ke Madrasah</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->transportasi}}</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="text-center mb-2"><b>PROGRAM INDONESIA PINTAR </b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Status Penerima PIP/BSM </td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->status_penerimaan_pip_bsm }}</td>
                        </tr>
                        <tr>
                            <td>Alasan Menerima PIP/BSM</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->alasan_menerima_pip_bsm}}</td>
                        </tr>
                        <tr>
                            <td>Periode Menerima PIP/BSM</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->periode_menerima_pip_bsm}}</td>
                        </tr>
                        <tr>
                            <td>Transportasi ke Madrasah</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->transportasi}}</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="text-center mb-2"><b>PRESTASI TERTINGGI YANG PERNAH DIRAIH SISWA</b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Bidang Prestasi </td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->bidang_prestasi }}</td>
                        </tr>
                        <tr>
                            <td>Tingkat Prestasi</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->tingkat_prestasi}}</td>
                        </tr>
                        <tr>
                            <td>Peringkat yang diraih</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->peringkat}}</td>
                        </tr>
                        <tr>
                            <td>Tahun meraih prestasi</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->tahun}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h6 class="text-center mb-2"><b>BEASISWA YANG DITERIMA TAHUN {{ $tahun-1 }}</b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Status Beasiswa</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->status_beasiswa }}</td>
                        </tr>
                        <tr>
                            <td>Sumber Beasiswa</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->sumber_beasiswa}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Beasiswa</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->jenis_beasiswa}}</td>
                        </tr>
                        <tr>
                            <td>Jangka Waktu (Bulan)</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->jangka_waktu}}</td>
                        </tr>
                        <tr>
                            <td>Besar Uang diterima (Rp)</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ "Rp. " . number_format($data->besaran_uang, 0, ".", ".")}}</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="text-center mb-2"><b>INFORMASI ORANG UTA KANDUNG/WALI SISWA</b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody class="mb-2">
                        <tr>
                            <td style="width:55%">No. Kartu Keluarga</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->no_kk }}</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="text-center mb-2"><b>AYAH KANDUNG</b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Nama Lengkap</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nama_ayah}}</td>
                        </tr>
                        <tr>
                            <td>NIK/Nomor KTP</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nik_ayah}}</td>
                        </tr>
                        <tr>
                            <td>Pendidikan Terakhir</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->pendidikan_terakhir_ayah}}</td>
                        </tr>
                        <tr>
                            <td>No .Telp/HP</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->telepon_ayah}}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->pekerjaan_ayah }}</td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="text-center mb-2"><b>IBU KANDUNG</b></h6>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Nama Lengkap</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nama_ibu}}</td>
                        </tr>
                        <tr>
                            <td>NIK/Nomor KTP</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nik_ibu}}</td>
                        </tr>
                        <tr>
                            <td>Pendidikan Terakhir</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->pendidikan_terakhir_ibu}}</td>
                        </tr>
                        <tr>
                            <td>No .Telp/HP</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->telepon_ibu}}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->pekerjaan_ibu}}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table  class="w-100 mb-2 ">
                    <tbody>
                        <tr>
                            <td style="width:55%">Rata-rata penghasilan Orang tua per Bulan</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ "Rp. " . number_format($data->penghasilan_perbulan, 0, ".", ".")}}</td>
                        </tr>
                        <tr>
                            <td>Nomor KSS/KPS</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nomor_kss_kps}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Kartu PKH (Penerima Kartu Harapan)</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nomor_pkh}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Kartu Indoensia Pintar (KIP)</td>
                            <td style="width: 5px">:</td>
                            <td colspan="2">{{ $data->nomor_kip}}</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <div class="photo d-flex">
                    <h6 class="m-auto">3x4</h6>
                </div> --}}
            </div>
        </div>
    </body>
</html>

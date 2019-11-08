@extends('master')
@section('konten')
<!-- BEGIN::Konten Utama -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- BEGIN::Header & Breadcrumb -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-aperture bg-blue"></i>
                            <div class="d-inline">
                                <h5>Kelola</h5>
                                <span>Halaman kelola Data Inovasi</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="/inovasi">Kelola</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Inovasi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END::Header & Breadcrumb -->

            <!-- BEGIN::Detail Inovasi -->
            <div class="card">
                <div class="card-header d-block">
                    <h3>Detail Data inovasi</h3>
                    <span>Rincian Data Inovasi <code>{{ $inovasi->name }}</code> dijelaskan pada tabel di bawah</span>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="5">{{ $inovasi->name }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Perangkat Daerah</th>
                                    <td>{{$inovasi->institute->short_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Inovasi</th>
                                    <td>{{$inovasi->Type->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pilar Smart City</th>
                                    <td>{{$inovasi->Pilar->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Penjelasan Singkat Inovasi</th>
                                    <td>{{$inovasi->description}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Manfaat Inovasi</th>
                                    <td>{{$inovasi->benefit}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Keunikan/Kreativitas</th>
                                    <td>{{$inovasi->unique_creativity}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Potensi Pengembangan Inovasi</th>
                                    <td>{{$inovasi->potency}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Strategi Menjaga Keberlangsungan</th>
                                    <td>{{$inovasi->strategy}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Analisis Risiko</th>
                                    <td>{{$inovasi->risk_analysis}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sumber Daya yang Digunakan</th>
                                    <td>{{$inovasi->resource}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Anggaran</th>
                                    <td>{{$inovasi->date}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END::Detail Inovasi -->

            <!-- BEGIN::Tahapan Inovasi -->
            <div class="card">
                <div class="card-header d-block">
                    <h3>Tahapan Inovasi</h3>
                    <span>Setiap Inovasi memiliki <code>6 Tahapan</code> yang harus dilaksanakan</span>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahapan</th>
                                    <th>Progres Inovasi (%)</th>
                                    <th>File</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($step as $ino_step)
                                <tr>
                                    <th scope="row"><?php echo "$no"; ?></th>
                                    <td>{{$ino_step->step->name}}</td>
                                    <td>{{$ino_step->progress_persentage}}</td>
                                    <td>File</td>
                                    <td>{{$ino_step->explaination}}</td>
                                </tr>
                                <?php $no = $no +1 ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END::Tahapan Inovasi -->

            <!-- BEGIN::Kemitraan -->
            <div class="card">
                <div class="card-header d-block">
                    <h3>Kemitraan</h3>
                    <span>Setiap Inovasi dapat memiliki <code>Lebih dari 1 Mitra</code> yang dapat diajak kerjasama</span>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Bentuk</th>
                                    <th>Bidang Usaha</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($partner as $ino_partner)
                                <tr>
                                    <th scope="row"><?php echo "$no"; ?></th>
                                    <td>{{$ino_partner->partner->name}}</td>
                                    <td>{{$ino_partner->partner->form}}</td>
                                    <td>{{$ino_partner->partner->specialization}}</td>
                                    <td>{{$ino_partner->partner->address}}</td>
                                </tr>
                                <?php $no = $no +1 ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END::Kemitraan -->

        </div>
    </div>
<!-- END::Konten Utama -->
@endsection

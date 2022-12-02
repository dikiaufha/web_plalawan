<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ url('assets/dashboard/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Admin</span>
                    <span class="text-secondary text-small">Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#data-master" aria-controls="data-master">
                <span class="menu-title">Data Dasar</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="data-master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/apotik"> Apotik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/kecamatan"> Kecamatan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/jenis-organisasi"> Jenis Organisasi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/konsentrasi-nakes"> Konsentrasi Nakes </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/spesialis-dokter"> Spesialis Dokter </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/penyakit"> Penyakit </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/tahun"> Tahun </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/kondisiaset-pertahun"> Kondisi Aset Pertahun </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/status-kawin"> Status Perkawinan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/agama"> Agama </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/desa">
                <span class="menu-title">Desa</span>
                <i class="mdi mdi-houzz menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/organisasi">
                <span class="menu-title">Organisasi</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/jenis-aset">
                <span class="menu-title">Jenis Aset</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tahun-aset">
                <span class="menu-title">Tahun Aset</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kartu-keluarga">
                <span class="menu-title">Kartu Keluarga</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/status-dalamkeluarga">
                <span class="menu-title">Status Dalam Keluarga</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/keluarga">
                <span class="menu-title">Keluarga</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/alat-kontrasepsi">
                <span class="menu-title">Alat Kontrasepsi</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tenaga-kesehatan">
                <span class="menu-title">Tenaga Kesehatan</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/bidang-ilmu">
                <span class="menu-title">Bidang Ilmu</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/asn">
                <span class="menu-title">ASN</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/penggunaan-obat">
                <span class="menu-title">Penggunaan Obat</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/penyakit-menonjol">
                <span class="menu-title">Sepuluh Penyakit Menonjol</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/penggunaan-kontrasepsi">
                <span class="menu-title">Penggunaan Kontrasepsi</span>
                <i class="mdi mdi-home-variant menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>

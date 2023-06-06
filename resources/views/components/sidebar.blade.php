<div id="sidebar-menu">

    <ul id="side-menu">

        <!-- <li class="menu-title">Navigation</li> -->

        <li>
            <a href="{{ route('home') }}">
                <i data-feather="home" class="icon-dual-info"></i>
                <span> Dasbor </span>
            </a>
        </li>

        <li class="menu-title">Klasifikasi</li>
        <li>
            <a href="{{ route('klasifikasi.index') }}">
                <i data-feather="message-square" class="icon-dual-danger"></i>
                <span> No. Klasifikasi </span>
            </a>
        </li>
        <li class="menu-title">Surat</li>
        <li>
            <a href="{{ route('templatesurat.index') }}">
                <i data-feather="file-text" class="icon-dual-secondary"></i>
                <span> Template Surat </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i data-feather="inbox" class="icon-dual-warning"></i>
                <span> Surat Masuk </span>
            </a>
        </li>

        <li>
            <a href="{{ route('surat.keluar') }}">
                <i data-feather="briefcase" class="icon-dual-success"></i>
                <span> Surat Keluar </span>
            </a>
        </li>
        <li class="menu-title">Propagasi</li>
        <li>
            <a href="{{ route('siswa.index') }}">
                <i data-feather="trello" class="icon-dual-danger"></i>
                <span> Daftar Siswa </span>
            </a>
        </li>
        <li>
            <a href="{{ route('guru.index') }}">
                <i data-feather="users" class="icon-dual-secondary"></i>
                <span> Daftar Guru </span>
            </a>
        </li>
        <li>
            <a href="{{ route('pengaturan.index') }}">
                <i data-feather="settings" class="icon-dual-primary"></i>
                <span> Pengaturan </span>
            </a>
        </li>
    </ul>

</div>

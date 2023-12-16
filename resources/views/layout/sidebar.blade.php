<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel" style="height: 100vh;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Payroll App</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('absensi') ? 'active' : '' }}"
                        aria-current="page" href="/absensi">
                        <i class="bi bi-clipboard-check"></i>
                        Absensi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('master_gaji') ? 'active' : '' }}"
                        href="/master_gaji">
                        <i class="bi bi-currency-dollar"></i>
                        Master Gaji
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('master_pegawai') ? 'active' : '' }}"
                        href="/master_pegawai">
                        <i class="bi bi-file-earmark-person"></i>
                        Master Pegawai
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('master_hari_kerja') ? 'active' : '' }}"
                        href="/master_hari_kerja">
                        <i class="bi bi-calendar2-event"></i>
                        Master Waktu Kerja
                    </a>
                </li>
            </ul>

            <hr class="my-3">
        </div>
    </div>
</div>

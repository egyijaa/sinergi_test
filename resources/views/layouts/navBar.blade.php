<!--**********************************
            Sidebar start
        ***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('home') }}">Daftar Transanksi</a>
                    </li>
                    <li><a href="{{ route('transaksi.formInput') }}">Transanksi Baru</a></li>
                </ul>
            </li>

            <li class="nav-label">Master</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Data Master</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('barang.index') }}">Barang</a></li>
                    <li><a href="{{ route('customer.index') }}">Customer</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
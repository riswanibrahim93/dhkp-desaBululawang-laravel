<div class="page-sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
        <div>
            <img class="img-50 rounded-circle" src="{{ URL::asset('assets/images/user.png') }}" alt="#">
        </div>
        <h6 class="mt-3 f-12">Bululawang</h6>
    </div>
    <ul class="sidebar-menu">

        <li class="active">
            <div class="sidebar-title">DHKP</div>
            <a href="#" class="sidebar-header {{ Request::is('dashboard')? 'active': '' }}">
                <i class="icon-desktop"></i><span>Daftar Himpunan Ketetapan & Pembayaran PBB P2</span>
            </a>
        </li>
    </ul>
    <br><br><br><br>
    <div class="sidebar-widget text-center">
        <div class="sidebar-widget-top">
            <h6 class="mb-2 fs-14">Ada Kendala?</h6>
            <i class="icon-bell"></i>
        </div>
        <div class="sidebar-widget-bottom p-20 m-20">
            <p><a href="https://api.whatsapp.com/send?phone=6285700830240" target="_blank">Whatsapp</a>
                <br><a href="mailto:ariffudinnotresponding@gmail.com" target="_blank" style="color: #000">Email</a>
                <br><strong>KKM UIN Malang 2020/2021</strong>
            </p>            
        </div>
    </div>
</div>
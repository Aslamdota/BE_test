<div class="sidebar d-flex flex-column position-relative">
    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
             class="rounded-circle mb-2" width="70" alt="profile">
        <h6 class="mb-0 text-white">HADI SLIBAW</h6>
        <small class="text-secondary">Admin</small>
    </div>

    <ul class="nav flex-column px-2">
        <li><a href="/dashboard" class="nav-link active"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="/users" class="nav-link"><i class="fa fa-users"></i> Kelola Pengguna</a></li>
        <li><a href="/orders" class="nav-link"><i class="fa fa-box"></i> Kelola Pesanan</a></li>
        <li><a href="/profile" class="nav-link"><i class="fa fa-user-cog"></i> Profil Admin</a></li>
        <li><a href="/help" class="nav-link"><i class="fa fa-question-circle"></i> Bantuan</a></li>
    </ul>

    <div class="sidebar-footer px-3">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger w-100"><i class="fa fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</div>

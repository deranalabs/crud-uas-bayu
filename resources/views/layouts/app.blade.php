<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            font-family: "Nunito", sans-serif;
            background-color: #f8f9fa;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #2f4050;
            color: #fff;
            transition: all 0.3s;
            height: 100vh;
            position: fixed;
        }
        #sidebar .nav-link {
            color: #a7b1c2;
        }
        #sidebar .nav-link.active, #sidebar .nav-link:hover {
            color: #fff;
            background: #1ab394;
        }
        #content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }
        .topbar {
            height: 56px;
            background: #fff;
            border-bottom: 1px solid #e7eaec;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: calc(100% - 250px);
            left: 250px;
            top: 0;
            z-index: 1030;
        }
        .topbar .search-box input {
            border: 1px solid #e7eaec;
            border-radius: 4px;
            padding: 6px 12px;
            width: 250px;
        }
        .topbar .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .topbar .user-info img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
        }
        footer.footer {
            background: #fff;
            border-top: 1px solid #e7eaec;
            padding: 15px 20px;
            text-align: center;
            color: #999;
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px);
            left: 250px;
        }
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                margin-left: 0;
            }
            .topbar {
                width: 100%;
                left: 0;
            }
            footer.footer {
                width: 100%;
                left: 0;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div id="sidebar">
        <div class="p-3">
            <div class="text-center">
                
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/bayu_bank_logo.png') }}" style="max-width: 120px; height:auto;" alt="">
            </a>

            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item mb-1">
                    <a href="{{ route('dashboard') }}" class="nav-link @if(request()->routeIs('dashboard')) active @endif">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('penarikan_dana.index') }}" class="nav-link @if(request()->routeIs('penarikan_dana.*')) active @endif">
                        <i class="bi bi-people"></i> Data Penarikan Dana
                    </a>
                </li>
        </div>
    </div>

    <div id="content">
        <div class="topbar">
            <div class="search-box">
                <input type="text" placeholder="Search..." />
            </div>
            <div class="user-info">
                <span>Bayumlyn</span>
                <img src="https://ui-avatars.com/api/?name=Afif" alt="User Avatar" />
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-secondary btn-sm">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>

        <div class="pt-5 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>

            <h1 class="mb-4">@yield('title', 'Dashboard')</h1>

            @yield('content')
        </div>

        <footer class="footer">
            2025 © Bayumlyn - Universitas Pamulang
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

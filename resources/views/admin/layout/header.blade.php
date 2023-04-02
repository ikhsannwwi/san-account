<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - ikhsannawawi Admin</title>
    
    <link rel="stylesheet" href="{{asset('admin/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('images/snow.ico')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('images/snow.ico')}}" type="image/png">
    
<link rel="stylesheet" href="{{asset('admin/css/shared/iconly.css')}}">

<style>
    .data-overflow{
        overflow-x: auto;
    }
</style>

{{-- Datatable --}}
<link rel="stylesheet" href="{{asset('admin/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/pages/datatables.css')}}">

{{-- fontawesome --}}
<link rel="stylesheet" href="{{asset('admin/extensions/@fortawesome/fontawesome-free/css/all.min.css')}}">

{{-- toastr CSS --}}
<link href="{{asset('toastr/build/toastr.min.css')}}" rel="stylesheet"/>

{{-- sweetalert CSS --}}
<link href="{{asset("sweetalert2/dist/sweetalert2.css")}}" rel="stylesheet">

{{-- Choices CSS --}}
<link rel="stylesheet" href="{{asset('admin/extensions/choices.js/public/assets/styles/choices.css')}}">

@yield('css')

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="/"><span class="fs-2 fw-2">ikhsan</span></a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                    <label class="form-check-label" ></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
            
                class="sidebar-item {{request()->is(
                    'app',
                ) ? 'active' : ''}} @stack('active_app')">
                <a href="/app" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>App</span>
                </a>
            </li>
            
            
            
            @if (auth()->user())
            <li class="sidebar-title">Raise Support</li>
            
            <li
                class="sidebar-item  {{request()->is(
                    'admin/account',
                    'admin/account/add-account',
                    'admin/account/edit-account/{id}',
                ) ? 'active' : ''}}">
                <a href="/admin/account" class='sidebar-link'>
                    <i class="bi bi-upc-scan"></i>
                    <span>Account App</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  {{request()->is(
                    'admin/app',
                    'admin/app/add-app',
                ) ? 'active' : ''}}">
                <a href="/admin/app" class='sidebar-link'>
                    <i class="bi bi-app"></i>
                    <span>App</span>
                </a>
            </li>

                
            @if (auth()->user()->role_user->role == 'Moderator')
            <li
                class="sidebar-item  has-sub {{request()->is(
                'admin/user',
                'admin/user/add-user',

                'admin/role-user',
                'admin/role-user/add-role-user',
                ) ? 'active' : ''}}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Users</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item {{request()->is('admin/user',
                    'admin/user/add-user',
                    'admin/user/edit-user/{id}',
                    ) ? 'active' : ''}}">
                        <a href="/admin/user">User</a>
                    </li>
                    <li class="submenu-item {{request()->is('admin/role-user',
                    'admin/role-user/add-role-user',
                    'admin/role-user/edit-role-user/{id}',
                    ) ? 'active' : ''}}">
                        <a href="/admin/role-user">Role User</a>
                    </li>
                </ul>
            </li>
            @endif
            @endif
            @if (auth()->user())
            <li
                class="sidebar-item">
                <a href="/admin/logout" class='sidebar-link'>
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
            @else
            <li
                class="sidebar-item">
                <a href="/admin/login" class='sidebar-link'>
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Login</span>
                </a>
            </li>
            @endif
            
            
            
        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            


            @yield('content')




            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 - {{date('Y')}} &copy; Mochammad Ikhsan Nawawi</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ikhsannawawi.epizy.com">Mochammad Ikhsan Nawawi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
		<script src="{{asset("jquery/dist/jquery.js")}}" ></script>

    <script src="{{asset('admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>
    
<!-- Need: Apexcharts -->
<script src="{{asset('admin/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/js/pages/dashboard.js')}}"></script>

{{-- toastr JS --}}
<script src="{{asset('toastr/build/toastr.min.js')}}"></script>

{{-- sweetalert JS --}}
<script src="{{asset("sweetalert2/dist/sweetalert2.min.js")}}"></script>

 
{{-- DataTables JS --}}
<script src="{{asset('admin/extensions/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/extensions/datatables.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script> --}}
<script src="{{asset('admin/js/pages/datatables.js')}}"></script>

{{-- Choices JS --}}
<script src="{{asset('admin/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
<script src="{{asset('admin/js/pages/form-element-select.js')}}"></script>
@yield('js')

@stack('script')
</body>

</html>

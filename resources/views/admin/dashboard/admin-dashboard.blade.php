<h1>
    This is Admin Dashboard
</h1>

<h1>
    Hello {{ Auth::guard('admin')->user()->name }}
</h1>

<h1>
    <a href="{{ route('admin.auth.logout') }}">
        Logout
    </a>
</h1>

<ul class="nav nav-pills mb-2">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('account/profile') ? 'active' : '' }}" href="{{ route('account.profile') }}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">{{ __('Profil') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('account/setting') ? 'active' : '' }}" href="{{ route('account.setting') }}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">{{ __('Pengaturan') }}</span>
        </a>
    </li>
</ul>

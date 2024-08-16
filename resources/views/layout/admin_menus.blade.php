@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'home'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.home' ? 'active-nav' : '' }}"
            href="{{ route('admin.home') }}">
            <iconify-icon icon="majesticons:home-line" class="fs-4 me-2"></iconify-icon>
            <span>Home </span>
        </a>
    </li>
@endif
@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'services'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.services.index' ? 'active-nav' : '' }}"
            href="{{ route('admin.services.index') }}">
            <iconify-icon icon="arcticons:services" class="fs-4 me-2"></iconify-icon>
            <span>Services </span>
        </a>
    </li>
@endif
@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'blogs'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.blogs.index' ? 'active-nav' : '' }}"
            data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <iconify-icon icon="carbon:blog" class="fs-4 me-2"></iconify-icon><span>Blog</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('admin.blogs.index') }}">
                    <iconify-icon icon="material-symbols:text-ad-outline-sharp" class="fs-4 me-2">
                    </iconify-icon><span>Blogs</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <iconify-icon icon="material-symbols:category-search-outline-rounded" class="fs-4 me-2">
                    </iconify-icon><span>Category</span>
                </a>
            </li>
        </ul>
    </li>
@endif
@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'testimonials'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.testimonials.index' ? 'active-nav' : '' }}"
            href="{{ route('admin.testimonials.index') }}">
            <iconify-icon icon="material-symbols:reviews-outline" class="fs-4 me-2">
            </iconify-icon>
            <span>Testimonials</span>
        </a>
    </li>
@endif
@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'meta'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.meta.index' ? 'active-nav' : '' }}"
            href="{{ route('admin.meta.index') }}">
            <iconify-icon icon="ri:seo-line" class="fs-4 me-2">
            </iconify-icon>
            <span>Meta</span>
        </a>
    </li>
@endif
@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'users'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.users.index' ? 'active-nav' : '' }}"
            href="{{ route('admin.users.index') }}">
            <iconify-icon icon="mdi:user-outline" class="fs-4 me-2"></iconify-icon>
            <span>User Permissions </span>
        </a>
    </li>
@endif
@if (Illuminate\Support\Facades\Auth::user()->permissions->contains('name', 'setting'))
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::currentRouteName() == 'admin.setting.edit' ? 'active-nav' : '' }}"
            href="{{ route('admin.setting.edit') }}">
            <iconify-icon icon="material-symbols-light:settings-outline" class="fs-4 me-2"></iconify-icon>
            <span>Setting</span>
        </a>
    </li>
    <!-- End Components Nav -->
@endif

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('configuracion_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/bancos*") ? "c-show" : "" }} {{ request()->is("admin/tipo-cuenta-bancaria*") ? "c-show" : "" }} {{ request()->is("admin/estado-documento-comercials*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-check-double c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.configuracion.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('banco_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.bancos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bancos") || request()->is("admin/bancos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-piggy-bank c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.banco.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tipo_cuenta_bancarium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tipo-cuenta-bancaria.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tipo-cuenta-bancaria") || request()->is("admin/tipo-cuenta-bancaria/*") ? "c-active" : "" }}">
                                <i class="fa-fw table_view c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tipoCuentaBancarium.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('estado_documento_comercial_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.estado-documento-comercials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/estado-documento-comercials") || request()->is("admin/estado-documento-comercials/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.estadoDocumentoComercial.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('cuenta_bancarium_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.cuenta-bancaria.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cuenta-bancaria") || request()->is("admin/cuenta-bancaria/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cuentaBancarium.title') }}
                </a>
            </li>
        @endcan
        @can('tipo_documento_comercial_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.tipo-documento-comercials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tipo-documento-comercials") || request()->is("admin/tipo-documento-comercials/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tipoDocumentoComercial.title') }}
                </a>
            </li>
        @endcan
        @can('proveedore_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.proveedores.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/proveedores") || request()->is("admin/proveedores/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-sellsy c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.proveedore.title') }}
                </a>
            </li>
        @endcan
        @can('documento_comercial_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.documento-comercials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/documento-comercials") || request()->is("admin/documento-comercials/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.documentoComercial.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
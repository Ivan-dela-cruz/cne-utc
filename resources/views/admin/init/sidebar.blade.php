<div class="col-md-3">
    <div class="fixed-bar fl-wrap">
        <div class="user-profile-menu-wrap fl-wrap">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Principales</h3>
                <ul>
                    @can('read_position')
                        <li>
                            <a class="{{ (request()->is('dashboard/positions')) ? 'user-profile-act' : '' }}"
                               href="{{route('positions.index')}}"><i
                                    class="fa fa-unlock-alt"></i>Cargos</a></li>
                    @endcan
                    @can('read_organization')
                        <li>
                            <a class="{{ (request()->is('dashboard/organizations')) ? 'user-profile-act' : '' }}"
                               href="{{route('organizations.index')}}"><i
                                    class="fa fa-gears"></i>Organizaciones</a>
                        </li>
                    @endcan
                    @can('read_candidate')
                        <li>
                            <a class="{{ (request()->is('dashboard/candidates')) ? 'user-profile-act' : '' }}"
                               href="{{route('candidates.index')}}"><i
                                    class="fa fa-user-o"></i> Candidatos</a></li>
                    @endcan

                    @can('read_enclosure')
                        <li>
                            <a class="{{ (request()->is('dashboard/enclosures')) ? 'user-profile-act' : '' }}"
                               href="{{route('enclosures.index')}}">
                                <i
                                    class="fa fa-calendar-check-o"></i> Recintos</a>
                        </li>
                    @endcan
                    @can('read_location')
                        <li>
                            <a class="{{ (request()->is('dashboard/locations')) ? 'user-profile-act' : '' }}"
                               href="{{route('locations.index')}}"><i
                                    class="fa fa-th-list"></i>
                                Ubicaciones </a></li> @endcan

                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Configuración</h3>
                <ul>
                    @can('read_user')
                        <li>
                            <a class="{{ (request()->is('dashboard/users')) ? 'user-profile-act' : '' }}"
                               href="{{route('users.index')}}"><i
                                    class="fa fa-unlock-alt"></i>Usuarios</a></li>
                    @endcan
                    @role('Administrador')
                    <li>
                        <a class="{{ (request()->is('dashboard/roles')) ? 'user-profile-act' : '' }}"
                           href="{{route('roles.index')}}"><i
                                class="fa fa-envelope-o"></i>
                            Roles</a></li>


                    <li>
                        <a class="{{ (request()->is('dashboard/enclosures')) ? 'user-profile-act' : '' }}"
                           href="{{route('enclosures.index')}}">
                            <i
                                class="fa fa-calendar-check-o"></i> Aplicación</a>
                    </li>
                    @endrole
                    @can('read_user')
                        <li>
                            <a class="{{ (request()->is('dashboard/enclosures')) ? 'user-profile-act' : '' }}"
                               href="{{route('enclosures.index')}}">
                                <i
                                    class="fa fa-calendar-check-o"></i> Contraseñas</a>
                        </li>
                    @endcan
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <a class="log-out-btn" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </div>
</div>

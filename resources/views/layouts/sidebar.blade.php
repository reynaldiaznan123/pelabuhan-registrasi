<aside class="app-side-drawer" data-position="left">
    <div class="app-side-drawer--heading">
        {{-- asda --}}
    </div>
    <div class="app-side-drawer--content">
        <ul class="c-list">
            <div class="c-subheader">Application</div>
            {{-- <li class="c-list-group">
                <div class="c-list-item">
                    <div class="c-list-item__icon">
                        <i class="c-icon material-icons">
                            home
                        </i>
                    </div>
                    <a class="/">Home</a>
                </div>
                <ul class="c-list-group__items">
                    <li class="c-list-item">Anggota</li>
                    <li class="c-list-item">Pendidikan</li>
                    <li class="c-list-item">Authentication</li>
                    <li class="c-list-item">Pengaturan</li>
                </ul>
            </li> --}}
            <li class="c-list-item" data-url="{{ route('dashboard') }}">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        home
                    </i>
                </div>
                <div class="c-list-item__title">Dashboard</div>
            </li>
            <li class="c-list-item" data-url="{{ route('employe::index') }}">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        people
                    </i>
                </div>
                <div class="c-list-item__title">Anggota</div>
            </li>
            <li class="c-list-item" data-url="{{ route('employe::tkbm') }}">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        people
                    </i>
                </div>
                <div class="c-list-item__title">Daftar TKBM</div>
            </li>
            <li class="c-list-item" data-url="{{ route('employe::index') }}">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        event_note
                    </i>
                </div>
                <div class="c-list-item__title">Rekapitulasi</div>
            </li>
            {{-- <li class="c-list-item" data-url="">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        assignment
                    </i>
                </div>
                <div class="c-list-item__title">Resgitrasi</div>
            </li>
            <li class="c-list-item" data-url="">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        offline_pin
                    </i>
                </div>
                <div class="c-list-item__title">Verifikasi</div>
            </li> --}}
            @if(auth()->user()->perm === 1)
            <li class="c-list-item" data-url="{{ route('pendidikan::index') }}">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        school
                    </i>
                </div>
                <div class="c-list-item__title">Pendidikan</div>
            </li>
            <li class="c-list-item" data-url="">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        public
                    </i>
                </div>
                <div class="c-list-item__title">Serikat</div>
            </li>
            <li class="c-list-group" data-active="false">
                <div class="c-list-item c-list-item__toggle">
                    <div class="c-list-item__icon">
                        <i class="c-icon material-icons">
                            fingerprint
                        </i>
                    </div>
                    <div class="c-list-item__title">Authentication</div>
                    <div class="c-list-item__icon">
                        <i class="c-icon material-icons">
                            keyboard_arrow_down
                        </i>
                    </div>
                </div>
                <ul class="c-list-group__items">
                    <li class="c-list-item">
                        <div class="c-list-item__icon">
                            <i class="c-icon material-icons">
                                trending_flat
                            </i>
                        </div>
                        <div class="c-list-item__title">Role dan Permissions</div>
                    </li>
                    <li class="c-list-item">
                        <div class="c-list-item__icon">
                            <i class="c-icon material-icons">
                                trending_flat
                            </i>
                        </div>
                        <div class="c-list-item__title">Monitoring</div>
                    </li>
                    <li class="c-list-item" data-url="{{ route('authentication::index') }}">
                        <div class="c-list-item__icon">
                            <i class="c-icon material-icons">
                                trending_flat
                            </i>
                        </div>
                        <div class="c-list-item__title">Pengguna</div>
                    </li>
                </ul>
            </li>
            <li class="c-list-item" data-url="">
                <div class="c-list-item__icon">
                    <i class="c-icon material-icons">
                        settings_applications
                    </i>
                </div>
                <div class="c-list-item__title">Pengaturan</div>
            </li>
            @endif
        </ul>
    </div>
    <div class="app-side-drawer--footer d-flex justify-content-center py-4">
        <div class="btn-group">
            <button type="type" class="btn btn-light">
                <i class="c-icon material-icons">close</i>
            </button>
            <button type="type" class="btn btn-light">
                <i class="c-icon material-icons">close</i>
            </button>
            <button type="type" class="btn btn-light">
                <i class="c-icon material-icons">close</i>
            </button>
        </div>
    </div>
</aside>

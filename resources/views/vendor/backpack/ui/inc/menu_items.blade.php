{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Bettings" icon="la la-question" :link="backpack_url('betting')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="devtools" icon="la la-question" :link="backpack_url('devtools')" />
<x-backpack::menu-item title='Settings' icon='la la-cog' :link="backpack_url('setting')" />
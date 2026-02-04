    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <a href="/" class="dashboard-logo mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white">
            Laravel
            <i class="material-icons " role="presentation">whatshot</i>
            Material
        </a>
        <div class="demo-drawer-header">
            <div class="image">
                <img src="{{ asset('theme/images/user.png') }}" width="48" height="48" alt="User" />
            </div>
            <span itemprop="image" style="display:none;">{{ Auth::user()->email }}</span>
            <!-- <i class="material-icons mdl-list__item-avatar">face</i> -->
            <div class="demo-avatar-dropdown">
                <span>
                    {{ Auth::user()->name }}
                </span>
                <div class="mdl-layout-spacer"></div>
                @include('partials.account-nav')
            </div>
        </div>
   </div>

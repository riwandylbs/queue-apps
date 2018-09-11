<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li> -->

                <?php $menu = \App\Http\Model\AccessMenu::hasAccessMenu(); ?>

                @if($menu->isSuccess && !empty($menu->data) )
                    @foreach($menu->data as $itemMenu)

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route($itemMenu['route']) }}" aria-expanded="false"><i class="mdi {{ $itemMenu['icon'] }}"></i><span class="hide-menu">{{ $itemMenu['name'] }}</span></a></li>

                    @endforeach
                @endif
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
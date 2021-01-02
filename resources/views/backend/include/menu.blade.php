<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">
    <li class="br-menu-item">
      <a href="{{ route('dashboard') }}" class="br-menu-link active">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->

    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Ecommerce Funcionalities</label>

    <!-- Brand Menu Item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Brands</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('brand.create') }}" class="sub-link">Add New Brand</a></li>
        <li class="sub-item"><a href="{{ route('brand.manage') }}" class="sub-link">Manage All Brands</a></li>
      </ul>
    </li>

    <!-- Category Menu Item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Categories</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('category.create') }}" class="sub-link">Add New Category</a></li>
        <li class="sub-item"><a href="{{ route('category.manage') }}" class="sub-link">Manage All Categories</a></li>
      </ul>
    </li>

  </ul><!-- br-sideleft-menu -->
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
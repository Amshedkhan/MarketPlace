<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      @can('isBuyer')
      <li class="nav-item">
        <a href="{{route('buyer.product')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Products Buy
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('order.all')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
           Orders
          </p>
        </a>
      </li>
      @endcan
      @can('isSeller')
      <li class="nav-item">
        <a href="{{route('product.index')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Product
          </p>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <form action="{{route('auth.logout')}}" method="POST">
          @csrf
          <button type="submit" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </button>
        </form>
       
      </li>
    </ul>
  </nav>
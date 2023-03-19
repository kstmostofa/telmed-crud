<div class="sidebar">
    <div class="site-width">
        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown active"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                <ul>
                    <li class="{{ request()->route()->getName() === 'agent.dashboard'? 'active': '' }}">
                        <a href=""><i class="icon-rocket"></i> Dashboard</a>
                    </li>
                    <li class="{{ request()->route()->getName() === 'agent.patients.index'? 'active': '' }}">
                        <a href="{{ route('agent.patients.index') }}"><i class="icon-rocket"></i> Patient's</a>
                    </li>

                </ul>
            </li>

            {{-- <li class="dropdown"><a href="#"><i class="icon-support mr-1"></i> Settings</a>
                <ul>
                    <li class="dropdown"><a href="#"><i class="icon-map"></i>Map</a>
                        <ul class="sub-menu">
                            <li><a href="map-google.html"><i class="icon-map"></i> Google Map</a></li>
                            <li><a href="map-vector.html"><i class="icon-vector"></i> Vector Map</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-pencil"></i>Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-list.html"><i class="icon-plus"></i> Blog List</a></li>
                            <li><a href="blog-single.html"><i class="icon-tag"></i> Blog Post</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-bag"></i>Ecommerce</a>
                        <ul class="sub-menu">
                            <li><a href="ecommerce-product-list.html"><i class="icon-grid"></i> Products List</a>
                            </li>
                            <li><a href="ecommerce-product-detail.html"><i class="icon-plus"></i> Product
                                    Detail</a></li>
                            <li><a href="ecommerce-cart.html"><i class="icon-badge"></i> Cart</a></li>
                            <li><a href="ecommerce-checkout.html"><i class="icon-plus"></i> Checkout</a></li>
                            <li><a href="ecommerce-orders.html"><i class="icon-basket"></i> Orders</a></li>
                            <li><a href="ecommerce-order-view.html"><i class="icon-equalizer"></i> Order View</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
        <!-- END: Menu-->
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>

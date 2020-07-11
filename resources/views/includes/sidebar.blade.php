            <div class="col-lg-3 order-2 order-lg-1">
                <!--=======  sidebar area  =======-->

                <div class="sidebar-area">
                    <!--=======  single sidebar  =======-->

                    {{--  <div class="sidebar mb-35">
                        <h3 class="sidebar-title">Exclude products</h3>
                        <ul class="product-categories">
                            <li><a class="active" href="shop-left-sidebar.html">Milk</a></li>
                            <li><a class="active" href="shop-left-sidebar.html">Soja</a></li>
                        </ul>
                    </div>  --}}

                    <div class="sidebar mb-35">
                        <h3 class="sidebar-title">PRODUCT CATEGORIES</h3>
                        <ul class="product-categories">
                            @foreach($categories as $category)
                            <li><a href="{{route('category',$category->name)}}">{{$category->name}}({{$category->products->count()}})</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>

                <!--=======  End of sidebar area  =======-->
            </div>

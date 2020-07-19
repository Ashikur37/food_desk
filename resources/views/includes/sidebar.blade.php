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
                        <h3 class="sidebar-title">{{ __('f.productCategories') }}</h3>
                        <ul class="product-categories">
                            @foreach($categories as $category)
                            <li><a href="{{route('category',$category->name)}}">{{$category->name}}({{$category->products->count()}})</a>
                            @if($category->subCategories->count()>0)
                                <a href="javascript::void()" style="width:10px"   data-toggle="collapse" data-target="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}"  >
                                <i class="fa fa-arrow-right" onclick="collapse(this)"></i>
                                </a>
                                <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="headingOne" >
                                   <ul class="product-categories">
                                    @foreach($category->subCategories as $subcat)
                                    <li><a href="{{route('subcategory',$subcat->name)}}">{{$subcat->name}}({{$subcat->products->count()}})
                                    </a></li>
                                    @endforeach
                                   </ul>
                                </div>
                            @endif
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
                <script>
                     collapse=(el)=>{
                         console.log(el)
                        if(el.classList[1]=='fa-arrow-right'){
                        el.classList="fa fa-arrow-down";
                        }
                        else{
                            el.classList="fa fa-arrow-right";
                        }
                    }
                </script>
                <!--=======  End of sidebar area  =======-->
            </div>

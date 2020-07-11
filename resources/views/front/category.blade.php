@extends('layouts.front') @section('content')
<!--=============================================
    =            breadcrumb area         =
    =============================================-->

<div class="breadcrumb-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li  class="active"><a href="{{route('category',$category->name)}}">{{$category->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of breadcrumb area  ======-->


<!--=============================================
	=            Shop page container         =
	=============================================-->

<div class="shop-page-container mb-50">
    <div class="container">
        <div class="row">
            @include('includes.sidebar')
            <div class="col-lg-9 order-1 order-lg-2 mb-sm-35 mb-xs-35">

                <!--=======  shop page banner  =======-->

                <div class="shop-page-banner mb-35">
                    <a href="shop-left-sidebar.html">
                        <img src="assets/images/banners/shop-banner.jpg" class="img-fluid" alt="">
                    </a>
                </div>

                <!--=======  End of shop page banner  =======-->

                <!--=======  Shop header  =======-->

                <div class="shop-header mb-35">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 d-flex align-items-center">
                            <!--=======  view mode  =======-->

                            <div class="view-mode-icons mb-xs-10">
                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                            </div>

                            <!--=======  End of view mode  =======-->

                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
                            <!--=======  Sort by dropdown  =======-->

                            <div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
                                <p class="mr-10">Seach by: </p>
                                <select name="sort-by" id="sort-by" class="nice-select">
                                    <option value="product_name_dch">Name</option>
                                    <option value="fid">ID</option>
                                </select>
                                <input id="val" type="text" placeholder="" onkeyup="filterCategory(this.value)">
                            </div>



                            <!--=======  End of Sort by dropdown  =======-->

                            <p class="result-show-message" id="result"></p>
                        </div>
                    </div>
                </div>

                <!--=======  End of Shop header  =======-->

                <!--=======  Grid list view  =======-->



                <div id="categoryContainer">
                    <div class="shop-product-wrap grid row mb-35">
                        @include('includes.subCategoryFilter')


                    </div>
                </div>




                <!--=======  End of Grid list view  =======-->



            </div>
        </div>
    </div>
</div>

<!--=====  End of Shop page container  ======-->
@endsection @section('script')
<script>
    function filterCategory(val) {
        let mode="grid";
        if(viewMode){
            mode=viewMode;
        }
        $.ajax({
            url: `{{URL::to('filter-product')}}?mode=${mode}&subcat=0&val=${val}&key=${$("#sort-by").val()}`,
            success: function(result) {
                $("#categoryContainer").html(result);
            }
        });
    }

    function paginate(val) {
        let mode="grid";
        if(viewMode){
            mode=viewMode;
        }
        $.ajax({
            url: `{{URL::to('filter-product')}}?mode=${mode}&subcat=0&page=${val}&val=${$("#val").val()}&key=${$("#sort-by").val()}`,
            success: function(result) {
                $("#categoryContainer").html(result);
            }
        });
    }
</script>
@endsection

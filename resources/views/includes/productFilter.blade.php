<div class="shop-product-wrap grid row mb-35" id="categoryContainer">

    @foreach($products as $product)
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
        <!--=======  Grid view product  =======-->

        <div class="gf-product shop-grid-view-product mb-30">
            <div class="image">
                <a href="single-product.html">
											<img src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$product->image}}&h=350&w=350" class="img-fluid" alt="">
										</a>
                <div class="product-hover-icons">
                    <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                    <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                    <a href="#" data-tooltip="Quick view" data-toggle="modal" data-target="#quick-view-modal-container{{$product->fid}}"> <span class="icon_search"></span> </a>
                </div>
            </div>
            <div class="product-content">
                <h3 class="product-title"><a href="single-product.html">{{$product->product_name_dch}}</a></h3>
                <div class="price-box">
                    <span class="discounted-price">$80.00/UNIT</span>
                </div>
            </div>
        </div>

        <!--=======  End of Grid view product  =======-->

        <!--=======  Shop list view product  =======-->

        <!--=======  Shop list view product  =======-->
        <div class="gf-product shop-list-view-product">
            <div class="cart-table table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$product->image}}&h=350&w=350" class="img-fluid" alt="Product"></a></td>
                            <td class="pro-title"><a href="#">Cillum dolore tortor nisl fermentum</a></td>
                            <td class="pro-subtotal"><span>$29.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="1"></div>
                                <select name="sort-by" id="sort-by" class="nice-select">
														<option value="0">GR</option>
														<option value="0">KG</option>
													</select>
                            </td>
                            <td class="pro-remove">

                                <div class="list-product-icons">
                                    <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--=============================================
	=            Quick view modal         =
	=============================================-->

    <div class="modal fade quick-view-modal-container" id="quick-view-modal-container{{$product->fid}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-5 col-md-6 col-xs-12">
                            <!-- product quickview image gallery -->
                            <div class="product-image-slider">
                                <!--Modal Tab Content Start-->
                                <div class="tab-content product-large-image-list" id="myTabContent">
                                    <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                        <!--Single Product Image Start-->
                                        <div class="single-product-img img-full">
                                            <img src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$product->image}}&h=350&w=350" class="img-fluid" alt="">
                                        </div>
                                        <!--Single Product Image End-->
                                    </div>
                                </div>
                                <!--Modal Content End-->
                            </div>
                            <!-- end of product quickview image gallery -->
                        </div>
                        <div class="col-lg-7 col-md-6 col-xs-12">
                            <!-- product quick view description -->
                            <div class="product-feature-details">
                                <h2 class="product-title mb-15">Kaoreet lobortis sagittis laoreet</h2>

                                <h2 class="product-price mb-15">
                                    <span class="main-price">$12.90</span>
                                    <span class="discounted-price"> $10.00</span>
                                </h2>

                                <p class="product-description mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis
                                    vulputate, tristique ut lectus</p>


                                <div class="cart-buttons mb-20">
                                    <div class="pro-qty mr-10">
                                        <input type="text" value="1">
                                    </div>
                                    <div class="add-to-cart-btn">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>


                                <div class="social-share-buttons">
                                    <h3>share this product</h3>
                                    <ul>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end of product quick view description -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--=====  End of Quick view modal  ======-->
    @endforeach
</div>

<div class="pagination-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  pagination-content  =======-->

                <div class="pagination-content text-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        @for($i=1;$i<=$products->lastPage();$i++)
                        <li><a  data-href="#">{{$i}}</a></li>

                        @endfor
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>

                <!--=======  End of pagination-content  =======-->
            </div>
        </div>
    </div>
</div>

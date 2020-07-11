@extends('layouts.front') @section('content')
    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
						<li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active" ><a href="{{route('wishlist')}}">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            Wishlist page content         =
    =============================================-->


    <div class="page-section section mb-50">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<form action="#">
							<!--=======  cart table  =======-->

							<div class="cart-table table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="pro-thumbnail">Image</th>
											<th class="pro-title">Product</th>

											<th class="pro-remove">Remove</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($products as $product)
										<tr>
											<td class="pro-thumbnail"><a href="#"><img src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$product->image}}&h=350&w=350" class="img-fluid" class="img-fluid" alt="Product"></a></td>
											<td class="pro-title"><a href="#">{{$product->product_name_dch}}</a></td>

											<td class="pro-remove"><a href="javascript:void(0)" onclick="removeFromWishList({{$product->fid}},this)"><i class="fa fa-trash-o"></i></a></td>
										</tr>
                                    @endforeach
									</tbody>
								</table>
							</div>

							<!--=======  End of cart table  =======-->

						</form>
					</div>
				</div>
			</div>
		</div>
@endsection
<script>
removeFromWishList=(id,el)=>{
    $.ajax({
            url: "{{URL::to('remove-wishlist')}}/"+id,
            success: function(result) {
                el.parentElement.parentElement.remove();
            }
        });
}
</script>



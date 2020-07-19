<h4 class="checkout-title">Billing Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.firstName') }}*</label>
											<input
                                                value="{{$user->firstname}}"
                                             name="firstname" type="text" placeholder="{{ __('f.firstName') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.lastName') }}*</label>
											<input value="{{$user->lastname}}" name="lastname" type="text" placeholder="{{ __('f.lastName') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.emailAddress') }}*</label>
											<input value="{{$user->email}}" name="email" type="email" placeholder="{{ __('f.emailAddress') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.phoneNumber') }}*</label>
											<input value="{{$user->phone}}" type="text" name="phone" placeholder="{{ __('f.phoneNumber') }}">
										</div>

										<div class="col-12 mb-20">
											<label>{{ __('f.companyName') }}</label>
											<input  type="text" name="company" placeholder="{{ __('f.companyName') }}">
										</div>

										<div class="col-12 mb-20">
											<label>{{ __('f.address') }}*</label>
											<input
                                            value="{{$user->address1}}"
                                             name="address1" type="text" placeholder="{{ __('f.addressLine') }} 1">
											<input
                                            value="{{$user->address2}}"
                                             name="address2" type="text" placeholder="={{ __('f.addressLine') }} 2">
										</div>


										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.town') }}/{{ __('f.city') }}*</label>
											<input
                                            value="{{$user->town}}"
                                             name="town" type="text" placeholder="{{ __('f.town') }}/{{ __('f.city') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.zipCode') }}*</label>
											<input
                                            value="{{$user->zip}}"
                                             name="zip" type="text" placeholder="{{ __('f.zipCode') }}">
										</div>

										<div class="col-12 mb-20">
                                        @guest
											<div class="check-box">
												<input type="checkbox"
                                                name="create_account"
                                                id="create_account" onclick="createAccount(this.checked)">
												<label for="create_account">{{ __('f.createAnAccount') }}?</label>
                                                <input name="password" style="display:none" id="accountPassword" placeholder="Enter the password" type="password" class="my-2 form-control">
											</div>
                                            <script>
                                                let createAccount=(checked)=>{
                                                    if(checked){
                                                        document.getElementById("accountPassword").style.display="";
                                                    }
                                                    else{
                                                        document.getElementById("accountPassword").style.display="none";
                                                    }

                                                }
                                            </script>
                                            @endguest
											<div class="check-box">
												<input type="checkbox"
                                                name="shipping_different"
                                                id="shiping_address" data-shipping>
												<label for="shiping_address">{{ __('f.shipToDifferentAddress') }}</label>
											</div>
										</div>

									</div>

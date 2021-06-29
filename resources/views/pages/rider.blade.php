@extends('layouts.app')
@section('content')
    <head>
        <!-- SPECIFIC CSS -->
        <link href="css/wizard.css" rel="stylesheet">
    </head>
	<main>
		<div class="hero_single inner_pages background-image" data-background="url(img/riderBg.jpg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>Become a PoliTask Rider</h1>
							<p>Flexible work, competitive fees</p>
							<a href="#apply" class="btn_1 gradient btn_scroll">Apply Now</a>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<div class="wave hero gray"></div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
			<div class="container margin_30_40">
			<div class="main_title center">
				<span><em></em></span>
				<h2>Why Work with Us</h2>
				<p>You set your own pace. Earn as you help the community!</p>
			</div>

			<div class="row justify-content-center add_bottom_45">
				<div class="col-lg-4 col-md-6">
					<div class="box_topic submit">
						<figure><img src="img/icon_submit_1.svg" alt="" width="110" height="100"></figure>
						<h3>Your compensation</h3>
						<p>What you earn per order depends on your experience and ratings.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box_topic submit">
						<figure><img src="img/icon_submit_2.svg" alt="" width="110" height="100"></figure>
						<h3>Choose when to work</h3>
						<p>You’ll be self-employed and free to work to your own availability.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box_topic submit">
						<figure><img src="img/icon_submit_3.svg" alt="" width="110" height="100"></figure>
						<h3>You will only need</h3>
						<p>Your vehicle (motorcycle, bike or car), an iPhone or Android device.</p>
					</div>
				</div>
			</div>
			<!-- /row -->

			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="main_title center">
						<h3 style="margin-bottom: 0;">Frequent questions</h3>
						<p>Here you'll be able find answers your questions</p>
					</div>

					<div role="tablist" class="add_bottom_15 accordion_2" id="accordion_group">
						<div class="card">
							<div class="card-header" role="tab">
								<h5>
									<a data-toggle="collapse" href="#collapseOne" aria-expanded="true"><i class="indicator icon_minus-06"></i>Where can I work?</a>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" role="tabpanel" data-parent="#accordion_group">
								<div class="card-body">
									<p>You pick your own schedule. As long as there are orders you can open the app and start earning.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5>
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
										<i class="indicator icon_plus"></i>How do I get paid?
									</a>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" role="tabpanel" data-parent="#accordion_group">
								<div class="card-body">
									<p>You get paid every week depending on your earning. If you passed a certain threshold then the money will be wired to you.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5>
									<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
										<i class="indicator icon_plus"></i>Can I bring friends?
									</a>
								</h5>
							</div>
							<div id="collapseThree" class="collapse" role="tabpanel" data-parent="#accordion_group">
								<div class="card-body">
									<p>Of course you can! Each friend you refer will add an extra 2% to your payout.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
					</div>
					<!-- /accordion group -->
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_40" id="apply">

			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="main_title center">
						<span><em></em></span>
						<h2>Apply Now</h2>
						<p>Note that you must be over 18 years old</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
					</div>

					<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form method="POST" action="{{URL::to('join-riders')}}" enctype="multipart/form-data">
                            @csrf
							<input id="website" name="website" type="text" value="">
{{--							XHR PROTECTION--}}
							<div id="middle-wizard">

								<div class="step">
									<h3 class="main_question"><strong>1/5</strong>Where would you like to work?</h3>
									<div class="form-group">
										<div class="custom_select clearfix">
											<select class="wide required" name="location">
												<option value="">Your City</option>
												<option value="Bucharest">Bucharest</option>
												<option value="Timisoara">Timisoara</option>
												<option value="Brasov">Brasov</option>
											</select>
										</div>
									</div>
								</div>

								<div class="step">
									<h3 class="main_question"><strong>2/5</strong>What's your vehicle type?</h3>
									<div class="form-group">
										<label class="container_radio version_2">Bicycle
											<input type="radio" name="vehicle" value="Bicycle" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Scooter
											<input type="radio" name="vehicle" value="Scooter" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Car
											<input type="radio" name="vehicle" value="Car" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<p>
										<strong><i class="icon_info"></i> Note</strong><br>
										The payout is not different from one vehicle to another but you must provide a valid driver's license for the specific category in order for you to be accepted.
									</p>
								</div>
								<!-- /step-->

								<div class="step">
									<h3 class="main_question"><strong>3/5</strong>How did you hear about us?</h3>
									<div class="form-group">
										<label class="container_check version_2">Google Search Engine
											<input type="checkbox" name="how_hear[]" value="Google Search Engine" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">A friend of mine
											<input type="checkbox" name="how_hear[]" value="A friend of mine" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Print Advertise
											<input type="checkbox" name="how_hear[]" value="Print Advertise" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Newspaper
											<input type="checkbox" name="how_hear[]" value="Newspaper" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Other
											<input type="checkbox" name="how_hear[]" value="Other" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->

                                <div class="step">
                                    <h3 class="main_question"><strong>4/5</strong>We need some important documents</h3>
                                    <p>They will be used to verify your identity and skils</p>
                                    <div class="form-group">
                                        <label class="container_check version_2">Image of your ID
                                            <input type="file" name="idImage" class="form-control">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="container_check version_2">Image of your driver's license
                                            <input type="file" name="licenseImage" class="form-control">
                                        </label>
                                    </div>
                                </div>

								<div class="submit step">
									<h3 class="main_question"><strong>5/5</strong>Tell us about yourself</h3>
                                    <input type="hidden" name="type" value="rider">
									<div class="form-group">
										<input type="text" name="name" class="form-control required" placeholder="First Name">
									</div>
                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control required" placeholder="Last Name">
                                    </div>
									<div class="form-group">
										<input type="email" name="email" class="form-control required" placeholder="Your Email">
									</div>
									<div class="form-group">
										<input type="text" name="telephone" class="form-control required" placeholder="Your Telephone">
									</div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control required" placeholder="Your Password">
                                    </div>
									<div class="row">
										<div class="col-3">
											<div class="form-group">
												<input type="text" name="age" class="form-control required" placeholder="Age">
											</div>
										</div>
										<div class="col-9">
											<div class="form-group radio_input">
												<label class="container_radio">Male
													<input type="radio" name="gender" value="Male" class="required">
													<span class="checkmark"></span>
												</label>
												<label class="container_radio">Female
													<input type="radio" name="gender" value="Female" class="required">
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
									</div>
									<!-- /row -->
									<div class="form-group terms">
										<label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->

							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backward">Prev</button>
								<button type="button" name="forward" class="forward">Next</button>
								<button type="submit" name="process" class="submit">Submit</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

	</main>
	<!-- /main -->
@endsection

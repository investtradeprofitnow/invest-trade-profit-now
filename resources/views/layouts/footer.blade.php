<footer>
    <h3 class="text-center pt-3">Quick Links</h3>
	<section class="">
		<div class="container text-center mt-3">
			<div class="row">			
				<div class="col-md-4 col-12 mt-3">
					<h4>Services</h4>
					<p>
						<a href="{{route('strategy-list')}}" class="footer-links<?php echo Route::currentRouteName()=='strategy-list'?' links-active':''?>">Strategy List</a>
					</p>
				</div>
				<div class="col-md-4 col-12 mt-3">
					<h4>Company</h4>
					<p>
						<a href="{{route('about-us')}}" class="footer-links<?php echo Route::currentRouteName()=='about-us'?' links-active':''?>">About Us</a>
					</p>	
					<p>
						<a href="{{route('contact-us')}}" class="footer-links<?php echo Route::currentRouteName()=='contact-us'?' links-active':''?>">Contact Us</a>
					</p>
				</div>			
				<div class="col-md-4 col-12 mt-3">
					<h4>Support</h4>
					<div class="row">
						<div class="col-md-6 col-12">
							<p>
								<a href="{{route('terms-and-conditions')}}" class="footer-links<?php echo Route::currentRouteName()=='terms-and-conditions'?' links-active':''?>">Terms and Conditions</a>
							</p>
							<p>
								<a href="{{route('privacy-policy')}}" class="footer-links<?php echo Route::currentRouteName()=='privacy-policy'?' links-active':''?>">Privacy Policy</a>
							</p>
						</div>
						<div class="col-md-6 col-12">
							<p>
								<a href="{{route('disclaimer')}}" class="footer-links<?php echo Route::currentRouteName()=='disclaimer'?' links-active':''?>">Disclaimer</a>
							</p>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</section>
	<div class="text-center p-2">
		Copyright © <?php echo date("Y"); ?>. All Rights Reserved
	</div>
</footer>
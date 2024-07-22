<?php
/*
* Template Name: HR Benefits
*
*
* @package astra-child
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();  ?>

<main style="flex-basis: 100%">
	<div class="container">
		<div>
			<h1>
				<?php echo esc_html_e('Human Resources & Benefits', 'astra-child'); ?>
			</h1>

			<div class="row">
				<div class="col-md-6">

				</div>
				<div class="col-md-6">
					<div class="hr-benefits-grid rj-employee-portals-bg">
						<a href="https://www.dayforcehcm.com/mydayforce/login.aspx" target="_blank">
							<?php echo esc_html_e('Dayforce', 'astra-child'); ?>
						</a>
						<a href="#">
							<?php echo esc_html_e('Company Policies', 'astra-child'); ?>
						</a>
						<a href="<?php echo esc_url(get_permalink(get_page_by_title('New vendor'))); ?>">
							<?php echo esc_html_e('New Vendor Request', 'astra-child'); ?>
						</a>

						<button id="" data-bs-toggle="modal" href="#rj-dte-benefits" role="button">
							<?php echo esc_html_e('DTE Benefits', 'astra-child'); ?>
						</button>

						<div class="modal fade" id="rj-dte-benefits" aria-hidden="true" aria-labelledby="rj-dte-benefitsLabel" tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="rj-dte-benefitsLabel">
											<?php echo esc_html_e('Choose Language', 'astra-child'); ?>
										</h3>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<h4 class="modal-title">
													<?php echo esc_html_e('ENGLISH', 'astra-child'); ?>
												</h4>	

												<div class="d-flex flex-column" style="display: flex; flex-direction: column;">
													<a href="<?php echo esc_url(get_permalink(get_page_by_title('DTE Benefits'))); ?>">
														<?php echo esc_html_e('DTE Benefits', 'astra-child'); ?>
													</a>
													<a href="">
														<?php echo esc_html_e('ICARE Perks', 'astra-child'); ?>
													</a>
													<a href="">
														<?php echo esc_html_e('ADP', 'astra-child'); ?>
													</a>
												</div>

											</div>
											<div class="col-md-6">
												<h4 class="modal-title">
													<?php echo esc_html_e('ESPANOL', 'astra-child'); ?>
												</h4>	

												<div class="d-flex flex-column" style="display: flex; flex-direction: column;">
													<a href="">
														<?php echo esc_html_e('DTE Benefits', 'astra-child'); ?>
													</a>
													<a href="">
														<?php echo esc_html_e('ICARE Perks', 'astra-child'); ?>
													</a>
													<a href="">
														<?php echo esc_html_e('ADP', 'astra-child'); ?>
													</a>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							


						<a href="https://dtelandscape.com/employee-benefits/" target="_blank">
						<?php echo esc_html_e('DTE Benefits', 'astra-child'); ?>
						</a>
						<a href="https://dtebenefits.com/" target="_blank">
							<?php echo esc_html_e('ICARE Perks', 'astra-child'); ?>
						</a>
						
						<button>
							<?php echo esc_html_e('HR Forms', 'astra-child'); ?>
						</button>
					</div>
				</div>
			</div>


		</div>
	</div>
</main>
<?php get_footer(); 
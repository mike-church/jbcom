<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$serving_size = rwmb_meta( 'nutrition_serving_size' );
$serving_weight = rwmb_meta( 'nutrition_serving_weight' );
$servings_per_container = rwmb_meta( 'nutrition_servings_per_container' );
$calories = rwmb_meta( 'nutrition_calories' );
$calories_from_fat = rwmb_meta( 'nutrition_calories_from_fat' );
$fact_values = rwmb_meta( 'nutrition_facts' );
$vitamin_values = rwmb_meta( 'nutrition_vitamins' );
$ingredients = rwmb_meta( 'nutrition_ingredients' );
$allergens = rwmb_meta( 'nutrition_allergens' );
$info = rwmb_meta( 'nutrition_additional_notes' );


?>

<?php if ( ! empty( $calories ) ) { ?>
	
	<div class="row">
		<div class="col-sm-8">
			<h3>Description</h3>
			<?php the_content(); ?>
			<?php if ( ! empty( $ingredients) ) { ?>
				<div class="margin-bottom-30">
					<h4 class="margin-bottom-15">Ingredients</h4>
					<?php echo $ingredients;?>
				</div>
			<?php } ?>
			<?php if ( ! empty( $allergens) ) { ?> 
				<div class="margin-bottom-30">
					<h4 class="margin-bottom-15">Allergens</h4>
					<?php echo $allergens;?>
				</div>
			<?php } ?>
			<?php if ( ! empty( $info) ) { ?>
				<div class="margin-bottom-30"> 
					<h4 class="margin-bottom-15">Additional Info</h4>
					<?php echo $info;?>
				</div>
			<?php } ?>
		</div>
		<div class="col-sm-4">
			<div id="nutritionals" class="nutritional-info-container">
				<h3>Nutrtional Facts</h3>
				<ul>
				<?php if ( ! empty( $serving_size) ) { ?> <li>Serving Size <?php echo $serving_size;?> (<?php echo $serving_weight;?>)</li> <?php } ?>
				<?php if ( ! empty( $servings_per_container) ) { ?> <li>Servings Per Container <?php echo $servings_per_container;?></li> <?php } ?>				
				</ul>

				<table class="nutrition-table nutrition-top">
					<thead>
						<tr>
							<th colspan="2">Amount/Serving</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Calories <?php echo $calories;?></td>
							<td class="text-right">Calories from Fat <?php echo $calories_from_fat;?></td>
						</tr>
					</tbody>
				</table>
				<table class="nutrition-table nutrition-middle">
					<thead>
						<tr>
							<th class="text-right" colspan="2">%Daily Value*</th>
						</tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $fact_values ) ) {
							foreach ( $fact_values as $fact_value ) {
							$fact = isset( $fact_value['nutrition_fact'] ) ? $fact_value['nutrition_fact'] : '';
							$weight = isset( $fact_value['nutrition_fact_weight'] ) ? $fact_value['nutrition_fact_weight'] : '';
							$daily_value = isset( $fact_value['nutrition_fact_dv'] ) ? $fact_value['nutrition_fact_dv'] : '';
							?>
							<tr>
								<td><?php echo $fact;?> <?php echo $weight;?></td>
								<td class="text-right"><?php if ( is_numeric( $daily_value ) ) { echo "$daily_value %"; } ?></td>
							</tr>
							<?php
							}
						} ?>
					</tbody>
				</table>				
				<table class="nutrition-table nutrition-bottom">
					<tbody>
						<?php if ( ! empty( $vitamin_values ) ) {
							foreach ( $vitamin_values as $vitamin_value ) {
							$vitamin = isset( $vitamin_value['nutrition_vitamin'] ) ? $vitamin_value['nutrition_vitamin'] : '';
							$vitamin_percent = isset( $vitamin_value['nutrition_vitamin_percent'] ) ? $vitamin_value['nutrition_vitamin_percent'] : '';
							?>
							<tr>
								<td><?php echo $vitamin;?></td>
								<td class="text-right"><?php if ( is_numeric( $vitamin_percent ) ) { echo "$vitamin_percent %"; } ?></td>
							</tr>
							<?php
							}
						} ?>
					</tbody>
				</table>
				<div class="margin-top-15"><small>*Percent Daily Values are based on a 2,000 calorie diet</small></div>	
			</div>
		</div>
	</div>

<?php } else { ?>

	<h3>Description</h3>
	<?php the_content(); ?>

<?php } ?>



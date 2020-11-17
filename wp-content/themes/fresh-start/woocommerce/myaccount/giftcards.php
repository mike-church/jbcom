<?php
/**
 * Gift Cards
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/giftcards.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce Gift Cards
 * @version 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_gc_before_account_giftcards', $has_giftcards ); ?>

<div class="col-12">
	<h2><?php esc_html_e( 'Your Balance', 'woocommerce-gift-cards' ); ?></h2>
	<div class="woocommerce-Giftcards woocommerce-MyAccount-Giftcards-balance-amount"><?php echo wc_price( $balance ); ?></div>

	<form method="POST" class="mb-5">
		<?php wp_nonce_field( 'customer_redeems_gift_card' ); ?>
		<h2><?php esc_html_e( 'Add a Gift Card?', 'woocommerce-gift-cards' ); ?></h2>
		<p>If you have received a Julian Bakery Gift Card, enter the code below to track your balance and activity. Purchase new <a href="/gift-cards">gift cards here</a>.</p>
		<div class="woocommerce-Giftcards d-flex flex-row justify-content-start">
			<input type="text" name="wc_gc_redeem_code" placeholder="<?php esc_attr_e( 'Enter code&hellip;', 'woocommerce-gift-cards' ); ?>" class="p-2 mr-1" style="box-sizing:border-box; outline:0; width:auto; font-size:1rem;"/>
			<button name="wc_gc_redeem_save" value="wc_gc_redeem_save" class="woocommerce-Button button"><?php esc_html_e( 'Add Card', 'woocommerce-gift-cards' ); ?></button>
		</div>
	</form>

	<h2><?php esc_html_e( 'Active Gift Cards', 'woocommerce-gift-cards' ); ?></h2>

	<table class="table woocommerce-orders-table woocommerce-giftcards-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table mb-5">
		<thead>
			<tr>
				<th>
					<?php esc_html_e( 'Date', 'woocommerce-gift-cards' ); ?>
				</th>
				<th>
					<?php esc_html_e( 'Code', 'woocommerce-gift-cards' ); ?>
				</th>
				<th>
					<?php esc_html_e( 'Available Balance', 'woocommerce-gift-cards' ); ?>
				</th>
				<th>
					<?php esc_html_e( 'Expires', 'woocommerce-gift-cards' ); ?>
				</th>
			</tr>
		</thead>
		<tbody>

			<?php if ( $has_giftcards ) : ?>

				<?php foreach ( $giftcards as $giftcard ) : ?>
					<tr>
					<td>
						<?php echo esc_html( date_i18n( wc_date_format(), $giftcard->get_date_redeemed() ) ); ?>
					</td>
					<td>
						<?php echo wc_gc_mask_codes( 'account' ) ? esc_html( wc_gc_mask_code( $giftcard->get_code() ) ) : esc_html( $giftcard->get_code() ); ?>
					</td>
					<td>
						<?php echo wc_price( $giftcard->get_balance() ); ?>
					</td>
					<td>
						<?php echo ! empty( $giftcard->get_expire_date() ) ? esc_html( date_i18n( wc_date_format(), $giftcard->get_expire_date() ) ) : esc_html__( 'Never', 'woocommerce-gift-cards' ); ?>
					</td>
					</tr>
				<?php endforeach; ?>

			<?php else : ?>

				<td colspan="4"><?php esc_html_e( 'You have no active Gift Cards at the moment', 'woocommerce-gift-cards' ); ?></td>

			<?php endif; ?>
		</tbody>
	</table>

	<h2><?php esc_html_e( 'Activity', 'woocommerce-gift-cards' ); ?></h2>

	<table class="table woocommerce-orders-table woocommerce-giftcards-activity-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<th>
					<?php esc_html_e( 'Date', 'woocommerce-gift-cards' ); ?>
				</th>
				<th>
					<?php esc_html_e( 'Description', 'woocommerce-gift-cards' ); ?>
				</th>
				<th>
					<?php esc_html_e( 'Amount', 'woocommerce-gift-cards' ); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if ( $has_activities ) : ?>

				<?php foreach ( $activities as $activity ) : ?>
					<tr>
					<td>
						<?php echo esc_html( date_i18n( wc_date_format(), $activity->get_date() ) ); ?>
					</td>
					<td>
						<?php echo wp_kses_post( wc_gc_get_activity_description( $activity ) ); ?>
					</td>
					<td>
						<?php echo wc_price( $activity->get_amount() ); ?>
					</td>
					</tr>
				<?php endforeach; ?>

			<?php else : ?>

				<td colspan="3"><?php esc_html_e( 'No activity recorded just yet', 'woocommerce-gift-cards' ); ?></td>

			<?php endif; ?>
		</tbody>
</table>

<?php if ( 1 < $total_pages ) : ?>
	<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
		<?php if ( 1 !== $current_page ) : ?>
			<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'giftcards', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
		<?php endif; ?>

		<?php if ( intval( $total_pages ) !== $current_page ) : ?>
			<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'giftcards', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_gc_after_account_giftcards', $has_giftcards ); ?>
</div>

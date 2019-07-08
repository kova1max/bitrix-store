<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @global CMain $APPLICATION */
/** @global array $arParams */
/** @global array $arResult */
CJSCore::Init(array("image"));

$iblockId = (isset($_REQUEST['IBLOCK_ID']) && is_string($_REQUEST['IBLOCK_ID']) ? (int)$_REQUEST['IBLOCK_ID'] : 0);
$elementId = (isset($_REQUEST['ELEMENT_ID']) && is_string($_REQUEST['ELEMENT_ID']) ? (int)$_REQUEST['ELEMENT_ID'] : 0);
$arUser = CUser::GetByID(CUser::GetID())->GetNext();
$rat = array();

?>

<div class="reviews">
	<div class="container container-xs">
		<div class="reviews_title title_under">Последние отзывы</div>
		<div class="reviews_list">

			<? if(count($arResult['CommentsResult'])){ ?>

			<!-- COMMENTS -->
			<?foreach($arResult['CommentsResult'][0] as $arItem):?>

			<? 
					$date = DateTime::createFromFormat('d.m.Y H:i:s', $arItem['DATE_CREATE'])->format('d.m.Y'); 
					$link = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_COMMENTS_LINK']['ENTITY_VALUE_ID'], "UF_COMMENTS_LINK");
					$file = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_BLOG_COMMENT_DOC");
					$rating = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_RATING");

					$rat[] = $rating;
				?>

			<div class="reviews_item">
				<div class="reviews_item_top">
					<a href="#" class="reviews_item_img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/reviews_item.jpg" alt=""></a>
					<div class="reviews_item_content">
						<?if($rating > 0):?>

						<div class="reviews_item_star">
							<?for($i = 0; $i < $rating; $i++):?>
							<i class="svg-star"></i>
							<?endfor;?>
							<?for($i = 0; $i < 5 - $rating; $i++):?>
							<i class="svg-star-o"></i>
							<?endfor;?>
						</div>

						<?endif;?>
						<a href="#" class="reviews_item_link">Матрас Венето Family Style 120х190 см</a>
						<div class="btn btn_blue">8 500 руб.</div>
					</div>
				</div>
				<p class="reviews_item_text"><?= $arItem['POST_TEXT'] ?></p>
				<div class="reviews_item_bottom">
					<div class="reviews_item_photo"><i class="svg-avatar"></i></div>
					<div class="reviews_item_info">
						<div class="reviews_item_name"><?= $arItem['AuthorName'] ?></div>
						<div class="reviews_item_date"><?= $date ?></div>
					</div>
				</div>
			</div>

			<?endforeach;
			} else { ?>
			<p>Еще не было добавлено комментариев.</p>
			<?}?>

		</div>
	</div>
</div>
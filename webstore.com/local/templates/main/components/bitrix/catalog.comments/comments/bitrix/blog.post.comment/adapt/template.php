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


<div class="cart_sidebar">

	<!-- TITLE -->
	<div class="otzivi-title clearfix">
		<h2>Отзывы</h2>
		<a href="#" class="btn show_comments">Оставить отзыв</a>
	</div>

	<!-- ADD COMMENT SECTION -->

	<?if($arResult['CanUserComment']):?>

	<form method="POST" name="form_comment" id="<?= $component->createPostFormId() ?>" action="<?= $ajaxPath ?>">
		<input class="rating" type="hidden" name="UF_RATING" value="1">
		<input type="hidden" name="parentId" id="parentId" value="0">
		<input type="hidden" name="edit_id" id="edit_id" value="0">
		<input type="hidden" name="act" id="act" value="add">
		<input type="hidden" name="post" value="Y">
		<input type="hidden" name="IBLOCK_ID" value="<?= $iblockId; ?>">
		<input type="hidden" name="ELEMENT_ID" value="<?= $elementId; ?>">
		<?= bitrix_sessid_post() ?>
		<input type="hidden" name="ENTITY_ID" value="<?= $elementId; ?>">
		<input type="hidden" name="ENTITY_TYPE" value="BG">

		<div class="show_comments__wrap">
			<div class="review_head">Добавить отзыв</div>
			<div class="review_content">

			<?
				$eventHandlerID = false;
				$eventHandlerID = AddEventHandler('main', 'system.field.edit.file', array('CBlogTools', 'blogUFfileEdit'));
				foreach($arResult["COMMENT_PROPERTIES"]["DATA"] as $FIELD_NAME => $arPostField){
			?>
					<div class="c-fields" id="blog-comment-user-fields-<?= $FIELD_NAME ?>"><?= ($FIELD_NAME == CBlogComment::UF_NAME ? "" : $arPostField["EDIT_FORM_LABEL"] . ":") ?>
					
					<? $APPLICATION->IncludeComponent(
					"bitrix:system.field.edit",
					$arPostField["USER_TYPE"]["USER_TYPE_ID"],
					array("arUserField" => $arPostField), 
					NULL, array("HIDE_ICONS" => "Y")); ?>
					</div>
			<?
				} if ($eventHandlerID !== false && ( intval($eventHandlerID) > 0 ))
					RemoveEventHandler('main', 'system.field.edit.file', $eventHandlerID);
			?>

			<script>
				$('.c-fields').css('display', 'none');
			</script>

				<!-- RATING -->
				<div class="review_stars">
					<a class="rating-item">
						<i class="svg-star"></i></a>
					<a class="rating-item">
						<i class="svg-star-o"></i></a>
					<a class="rating-item">
						<i class="svg-star-o"></i></a>
					<a class="rating-item">
						<i class="svg-star-o"></i></a>
					<a class="rating-item">
						<i class="svg-star-o"></i></a>
				</div>

				<!-- COMMENT -->
				<div class="review_item">
					<label>Коментарий<span class="sup">*</span>
						<textarea name="comment" id="POST_MESSAGE"></textarea>
					</label>
				</div>

				<!-- ADVANTAGE & DISADVANTAGE -->
				<div class="review_item">
					<label>Достоинства
						<input type="text" name="UF_ADVANTAGES">
					</label>
				</div>
				<div class="review_item">
					<label>Недостатки
						<input type="text" name="UF_DISADVANTAGES">
					</label>
				</div>

				

				<!-- FILES -->
				<div class="review_materials">
					<span>Добавить материалы</span>
					<div class="review_materials_item show_link">
						<i class="svg-file-audio"></i>
					</div>
					<div class="review_materials_item">
						<i class="svg-file"></i>
						<input name="UF_BLOG_COMMENT_DOC_2" OnClick="
							if($('.file-selectdialog-switcher').trigger('click')) { 
								$('.file-fileUploader').trigger('click'); return false;
							}	
							">
					</div>
				</div>

				<!-- IN/OUT VIDEO SECTION -->
				<div class="review_item unlink_wrap">
					<label class="unlink">
						<input type="text" name="UF_COMMENTS_LINK" placeholder="Введите сылку на видео">
						<span class="icons-unlink"></span>
					</label>
				</div>


				
				<!-- UNREGISTERED NEEDS TO FILL -->
				<div class="review_item">
					<label>Ваше имя<span class="sup">*</span>
						<input type="text" <?if($USER->IsAuthorized()) echo "disabled value='" . $arUser['NAME'] . " " . $arUser['LAST_NAME'] . "' "?>>
					</label>
				</div>
				<div class="review_item">
					<label>Эл. почта<span class="sup">*</span>
						<input type="text" <?if($USER->IsAuthorized()) echo "disabled value='" . $arUser['EMAIL'] . "' "?>>
					</label>
				</div>

				<!-- PRODUCT SUBSCRIBE -->
				<div class="review_item">
					<label>
						<input type="checkbox" class="checkbox">Уведомлять об ответах по эл. почте
					</label>
				</div>

				<!-- SUBMIT -->
				<div class="review_item">
					<button type="submit" class="btn">Оставить отзыв</button>
				</div>
			</div>
		</div>
	</form>

	<?endif;?>



	<!-- COMMENTS -->
	<?foreach($arResult['CommentsResult'][0] as $arItem):?>

	<? 
		$date = DateTime::createFromFormat('d.m.Y H:i:s', $arItem['DATE_CREATE'])->format('d.m.Y'); 
		$adv = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_ADVANTAGES']['ENTITY_VALUE_ID'], "UF_ADVANTAGES");
		$dis = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_DISADVANTAGES");
		$link = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_COMMENTS_LINK']['ENTITY_VALUE_ID'], "UF_COMMENTS_LINK");
		$file = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_BLOG_COMMENT_DOC");
		$rating = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_RATING");

		$rat[] = $rating;
		setcookie('comments_count', count($arResult['CommentsResult'][0]));
	?>

	<div class="comments_item">
		<div class="comments_head">

			<span class="time"><?= $date ?></span>
			<h3><?= $arItem['AuthorName'] ?></h3>

			<?if($rating > 0):?>
			<div class="cart_info_star">
				<?for($i = 0; $i < $rating; $i++):?>
				<i class="svg-star"></i>
				<?endfor;?>
				<?for($i = 0; $i < 5 - $rating; $i++):?>
				<i class="svg-star-o"></i>
				<?endfor;?>
			</div>
			<?endif;?>

		</div>

		<div class="comments_body">
			<p><?= $arItem['POST_TEXT'] ?></p>

			<div class="rating">
				<?if($adv):?>
				<p><strong>Достоинства:</strong> <?= $adv ?></p>
				<?endif;?>
				<?if($dis):?>
				<p><strong>Недостатки:</strong> <?= $dis ?></p>
				<?endif;?>
			</div>


			<?if($link):?>
			<div class="comments_video">
				<div class="comments_video__item">
					<iframe class="img-responsive" src="<?= $link ?>" frameborder="0" allowfullscreen></iframe>
					<div class="links">
						<a href="<?= $link ?>" class="video"></a>
					</div>
				</div>
			</div>
			<?endif;?>

			<?if($file):?>
			<div class="comments_foto">
				<?foreach($file as $i):?>
				<a href="<?= CFile::GetPath($i) ?>" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?= CFile::GetPath($i) ?>" alt=""></a>
				<?endforeach;?>
			</div>
			<?endif;?>

			<!-- DOESN'T WORK -->
			<div class="likes">
				<a href=""><span class="icons-like"></span></a>
				<a href=""><span class="icons-dislike"></span></a>
			</div>
			<div class="ansver">
				<span class="icons-arrowleft"></span><a href="#">Ответить</a>
			</div>

		</div>
	</div>
	<?endforeach;?>

	<?


	for($i = 0; $i < count($rat); $i++ ){
		$result += $rat[$i];
	}
	$cr = $result / count($rat);

	setcookie('comments_rating', round($cr));
	?>
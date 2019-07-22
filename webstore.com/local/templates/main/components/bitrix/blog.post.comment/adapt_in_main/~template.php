<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @global CMain $APPLICATION */
/** @global array $arParams */
/** @global array $arResult */
CJSCore::Init(array("image"));

$iblockId = (isset($_REQUEST['IBLOCK_ID']) && is_string($_REQUEST['IBLOCK_ID']) ? (int)$_REQUEST['IBLOCK_ID'] : 0);
$elementId = (isset($_REQUEST['ELEMENT_ID']) && is_string($_REQUEST['ELEMENT_ID']) ? (int)$_REQUEST['ELEMENT_ID'] : 0);
$arUser = CUser::GetByID(CUser::GetID())->GetNext();

// ADD COMMENT BUTTON

/*<a class="bx_medium bx_bt_button" href="javascript:void(0)" onclick="return editCommentNew('0', <?= $arParams["ID"] ?>)"><b><?= GetMessage("B_B_MS_ADD_COMMENT") ?></b></a> */

?>

<script>

function customSubmit(element) {
	var form = $(element).parents('form');
	$.ajax({
		method: "POST",
			url: $(form).attr('action'),
			data: $(form).serialize()
			})
			.done(function( msg ) {
				console.log(form.serialize());
			});
}

</script>


<div class="cart_sidebar">

	<!-- TITLE -->
	<div class="otzivi-title clearfix">
		<h2>Отзывы</h2>
		<a href="#" class="btn show_comments">Оставить отзыв</a>
	</div>
	

	<!-- ADD COMMENT SECTION -->

	<?if($arResult['CanUserComment']):?>

	<form method="POST" name="form_comment" id="<?= $component->createPostFormId() ?>" action="<?= $ajaxPath; ?>">

		<input class="rating" type="hidden" name="UF_RATING" value="1">

		<input type="hidden" name="parentId" id="parentId" value="0">
		<input type="hidden" name="edit_id" id="edit_id" value="0">
		<input type="hidden" name="act" id="act" value="add">
		<input type="hidden" name="post" value="Y">
		<input type="hidden" name="IBLOCK_ID" value="<?= $iblockId; ?>">
		<input type="hidden" name="ELEMENT_ID" value="<?= $elementId; ?>">
		<?=bitrix_sessid_post()?>


		<input type="hidden" name="ELEMENT_ID" value="<?= $elementId; ?>">
		<input type="hidden" name="ENTITY_ID" value="<?= $elementId; ?>">
		<input type="hidden" name="ENTITY_TYPE" value="BG">

		<div class="show_comments__wrap">
			<div class="review_head">Добавить отзыв</div>
			<div class="review_content">
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
				<div class="review_item">
					<label>Коментарий<span class="sup">*</span>
						<textarea name="comment" id="POST_MESSAGE"></textarea>
					</label>
				</div>
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
				<div class="review_materials">
					<span>Добавить материалы</span>
					<div class="review_materials_item show_link">
						<i class="svg-file-audio"></i>
					</div>
					<div class="review_materials_item">
						<i class="svg-file"></i>
						<input type="file" name="UF_BLOG_COMMENT_DOC" multiple="multiple">
					</div>

				</div>

				<!-- <div class="review_item unlink_wrap">
					<label class="unlink">
						<input type="text" placeholder="Введите сылку на видео">
						<span class="icons-unlink"></span>
					</label>
				</div> -->


				<div class="review_item">
					<label>Ваше имя<span class="sup">*</span>
						<input type="text" <?if($USER->IsAuthorized()) echo "disabled value='" . $arUser['NAME'] . " " . $arUser['LAST_NAME'] . "' "?>>
					</label>
				</div>
				<div class="review_item" >
					<label>Эл. почта<span class="sup">*</span>
						<input type="text" <?if($USER->IsAuthorized()) echo "disabled value='" . $arUser['EMAIL'] . "' "?>>
					</label>
				</div>
				<div class="review_item">
					<label>
						<input type="checkbox" class="checkbox">Уведомлять об ответах по эл. почте
					</label>
				</div>
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
			$file = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_BLOG_COMMENT_DOC");
			$rating = GetUserField("BLOG_COMMENT", $arItem['COMMENT_PROPERTIES']['DATA']['UF_DISADVANTAGES']['ENTITY_VALUE_ID'], "UF_RATING");
		?>

		<div class="comments_item">
			<div class="comments_head">

				<span class="time"><?= $date ?></span>
				<h3><?= $arItem['AuthorName'] ?></h3>

				<?if($rating > 0):?>
					<div class="cart_info_star">
						<?for($i = 0; $i < $rating /* MAX 5 */; $i++):?>
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
						<p><strong>Достоинства:</strong> <?=$adv?></p>
					<?endif;?>
					<?if($dis):?>
						<p><strong>Недостатки:</strong> <?=$dis?></p>
					<?endif;?>
				</div>


					<!-- <div class="comments_video"> -->
						<!-- <div class="comments_video__item">
							<iframe class="img-responsive" src="https://www.youtube.com/embed/BfFK1oQaO80" frameborder="0" allowfullscreen></iframe>
							<div class="links">
								<a href="https://www.youtube.com/embed/BfFK1oQaO80" class="video"></a>
							</div>
						</div> -->
					<!-- </div> -->
					
				<?if(is_array($file)):?>
					<div class="comments_foto">
						<?foreach($file as $i):?>
							<a href="<?= CFile::GetPath($i)?>" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?= CFile::GetPath($i)?>" alt=""></a>
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

	<div class="certificates">
		<div class="certificates_title">Сертификаты: </div>
		<div class="certificates_list">
			<a href="img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="img/certificates_1.jpg" alt=""></a>
			<a href="img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="img/certificates_1.jpg" alt=""></a>
			<a href="img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="img/certificates_1.jpg" alt=""></a>
			<a href="img/certificates_1.jpg" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="img/certificates_1.jpg" alt=""></a>
		</div>
	</div>

</div>
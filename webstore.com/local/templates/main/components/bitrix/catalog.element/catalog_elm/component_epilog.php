<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
CModule::IncludeModule("iblock");

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateFolder.'/themes/'.$templateData['TEMPLATE_THEME'].'/style.css');
	$APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/'.$templateData['TEMPLATE_THEME'].'/style.css', true);
}

if (!empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;

	if (!empty($templateData['CURRENCIES']))
	{
		$loadCurrency = Loader::includeModule('currency');
	}

	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
		?>
<script>
	BX.Currency.setCurrencies(<?= $templateData['CURRENCIES'] ?>);
</script>
<?
	}
}

if (isset($templateData['JS_OBJ']))
{
	?>
<script>
	BX.ready(BX.defer(function() {
		if (!!window.<?= $templateData['JS_OBJ'] ?>) {
			window.<?= $templateData['JS_OBJ'] ?>.allowViewedCount(true);
		}
	}));
</script>

<?
	// check compared state
	if ($arParams['DISPLAY_COMPARE'])
	{
		$compared = false;
		$comparedIds = array();
		$item = $templateData['ITEM'];

		if (!empty($_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]))
		{
			if (!empty($item['JS_OFFERS']))
			{
				foreach ($item['JS_OFFERS'] as $key => $offer)
				{
					if (array_key_exists($offer['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
					{
						if ($key == $item['OFFERS_SELECTED'])
						{
							$compared = true;
						}

						$comparedIds[] = $offer['ID'];
					}
				}
			}
			elseif (array_key_exists($item['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
			{
				$compared = true;
			}
		}

		if ($templateData['JS_OBJ'])
		{
			?>
<script>
	BX.ready(BX.defer(function() {
		if (!!window.<?= $templateData['JS_OBJ'] ?>) {
			window.<?= $templateData['JS_OBJ'] ?>.setCompared('<?= $compared ?>');

			<
			?
			if (!empty($comparedIds)): ? >
				window.<?= $templateData['JS_OBJ'] ?>.setCompareInfo(<?= CUtil::PhpToJSObject($comparedIds, false, true) ?>); <
			?
			endif ? >
		}
	}));
</script>
<?
		}
	}

	// select target offer
	$request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
	$offerNum = false;
	$offerId = (int)$this->request->get('OFFER_ID');
	$offerCode = $this->request->get('OFFER_CODE');

	if ($offerId > 0 && !empty($templateData['OFFER_IDS']) && is_array($templateData['OFFER_IDS']))
	{
		$offerNum = array_search($offerId, $templateData['OFFER_IDS']);
	}
	elseif (!empty($offerCode) && !empty($templateData['OFFER_CODES']) && is_array($templateData['OFFER_CODES']))
	{
		$offerNum = array_search($offerCode, $templateData['OFFER_CODES']);
	}

	if (!empty($offerNum))
	{
		?>
<script>
	BX.ready(function() {
		if (!!window.<?= $templateData['JS_OBJ'] ?>) {
			window.<?= $templateData['JS_OBJ'] ?>.setOffer(<?= $offerNum ?>);
		}
	});
</script>

<?}}?>

<?

$Characteristics = [12, 13 , 14, 15];

$offer = current( CCatalogSKU::getOffersList( $arResult['ID'] )[$arResult['ID']] );

$res = CIBlockElement::GetList(
	Array("SORT" => "DESC"), 
	Array("IBLOCK_ID"=>15, "ID" => $offer['ID']), 
	false, 
	false, 
	Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*")
);

while( $ob = $res->GetNextElement() ): ?>

<?

	$arField = $ob->GetFields();  
	$arProp = $ob->GetProperties();

?>

<?
foreach($this->elements as $item):
?>

<div class="container">
	<div class="cart_tabs">
		<div class="cart_tabs_nav">
			<a href="#" data-tabs="1" class="active">Описание и Характеристики</a>
			<a href="#" data-tabs="2">Доставка и гарантия</a>
		</div>

		<div class="cart_content">
			<div class="cart_tabs_content">
				<div class="cart_tabs_item active" data-tabs="1">
					<div class="cart_description">
						<div class="cart_description_content">
							<?= $item['DETAIL_TEXT'] ?>
						</div>
						<div class="cart_description_more">ЕЩЕ</div>
					</div>
					<div class="cart_characteristics">
						<h2><span>Характеристики</span> <?= $arField['NAME'] ?></h2>
						<div class="cart_characteristics_list">

							<?foreach($item['DISPLAY_PROPERTIES'] as $property){
								
								if(($property['PROPERTY_TYPE'] == "S") && ($property['USER_TYPE'] != "HTML")){?>

									<div class="cart_characteristics_item">
										<div class="cart_characteristics_left">
											<?=$property['NAME']?>
											<i class="svg-question">
												<span>
													<img class="callout" src="img/callout2.png" />
													<?=$property['DESCRIPTION']?>
												</span>
											</i>
										</div>
										<span></span>
										<div class="cart_characteristics_right"> <?=$property['DISPLAY_VALUE']?></div>
									</div>

							<?}}?>
							
						</div>
					</div>
				</div>
				<div class="cart_tabs_item" data-tabs="2">

					<h2><span>Доставка</span> <?= $arField['NAME'] ?></h2>
					<?echo $item['PROPERTIES']['DELIVERY']['VALUE']['TEXT']?>
					<h2><span>Гарантия</span> <?= $arField['NAME'] ?></h2>
					<?echo $item['PROPERTIES']['GUARANTEE']['VALUE']['TEXT']?>

				</div>
			</div>

			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.comments",
				"comments",
				Array(
					"BLOG_TITLE" => "Комментарии",
					"BLOG_URL" => "catalog_comments",
					"BLOG_USE" => "Y",
					"CACHE_TIME" => "0",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "N",
					"COMMENTS_COUNT" => "5",
					"ELEMENT_CODE" => "",
					"ELEMENT_ID" => $arParams['ELEMENT_ID'],
					"EMAIL_NOTIFY" => "N",
					"FB_USE" => "N",
					"IBLOCK_ID" => "14",
					"IBLOCK_TYPE" => "catalog",
					"PATH_TO_SMILE" => "/bitrix/images/blog/smile/",
					"RATING_TYPE" => "standart",
					"SHOW_DEACTIVATED" => "N",
					"SHOW_RATING" => "Y",
					"SHOW_SPAM" => "Y",
					"TEMPLATE_THEME" => "blue",
					"URL_TO_COMMENT" => "",
					"VK_USE" => "N",
					"WIDTH" => ""
				)
			);?>
			<div class="cart_sidebar">
				<div class="certificates">
					<div class="certificates_title">Сертификаты: </div>
					<div class="certificates_list">

						<?
								$certificate = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], Array(), Array("CODE" => "CERTIFICATES"));
								while($c = $certificate->fetch()):
							?>
						<a href="<?= CFile::GetPath($c['VALUE']) ?>" data-fancybox-group="gallery2" class="certificates_item fancybox"><img src="<?= CFile::GetPath($c['VALUE']) ?>" alt=""></a>
						<?
								endwhile;
							?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?endforeach;?>


<?endwhile;?>
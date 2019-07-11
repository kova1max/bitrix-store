<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global	$PARAMS;
		$IBlock = 14;
?>

<!-- FIXME: БАГ ІКОНОК ТА ЛІНКІВ -->

<?if((CModule::IncludeModule("iblock")) && (!empty($arResult))):?>
	<div class="menu">
		<div class="container">
			<ul class="menu_list">
				<?
				// FIXME: УБРАТЬ PRINT_R
				print_r('<pre style="text-align: left;color: red;">');
				print_r($res_array);
				print_r('</pre>');
				?>
			</ul>
		</div>
	</div>
<?endif?>
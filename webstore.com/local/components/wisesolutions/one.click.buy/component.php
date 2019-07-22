<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule('sale')
	|| !CModule::IncludeModule('iblock')
	|| !CModule::IncludeModule('catalog')
	|| !CModule::IncludeModule('currency'))
	return;
if (intval($arParams['PRICE_ID']) < 1)
   return;
if (empty($arParams['INSERT_ELEMENT']))
  $arParams['INSERT_ELEMENT'] = '.catalog-detail-buttons';
else {
	$first_char = substr($arParams['INSERT_ELEMENT'], 0, 1);
	if ($first_char != '#' && $first_char != '.')
		$arParams['INSERT_ELEMENT'] = '#'.$arParams['INSERT_ELEMENT'];
}
if (intval($arParams['CACHE_TIME'])<0)
	$arParams['CACHE_TIME'] = 864000;
if ($arParams['SEF_FOLDERIX']=='')
  $arParams['SEF_FOLDERIX'] = '/catalog/';
if (strlen($arParams['DEFAULT_CURRENCY'])!= 3)
  $arParams['DEFAULT_CURRENCY'] = COption::GetOptionString('sale', 'default_currency', 'RUB');
$arParams['USE_SKU'] = $arParams['USE_SKU'] == 'Y';
$arParams['USE_JQUERY'] = $arParams['USE_JQUERY'] == 'Y';
if (empty($arParams['ORDER_FIELDS']))
	$arParams['ORDER_FIELDS'] = array('FIO', 'PHONE', 'EMAIL');
if (empty($arParams['REQUIRED_ORDER_FIELDS']))
	$arParams['REQUIRED_ORDER_FIELDS'] = array('FIO', 'PHONE');
if (!empty($arParams['DUPLICATE_LETTER_TO_EMAILS']))
	foreach ($arParams['DUPLICATE_LETTER_TO_EMAILS'] as $item)
		$arParams['DUB'] .= $item;
$arParams['ELEMENT_ID'] = intval($arParams['ELEMENT_ID']);
// используем в качестве параметра кеша компонента текущий урл страницы:
$arParams['PAGE_URI'] = $APPLICATION->GetCurPage();


if($_REQUEST["new_order"]['FIO']=='' && !in_array('FIO', $arParams['REQUIRED_ORDER_FIELDS'])) {
	$_REQUEST["new_order"]['FIO']=GetMessage('GUEST');
}

if (!function_exists('json_encode')) {
	function json_encode($array) {
		if (!is_array($array) || empty($array)) return '';
		$json_string = '{';
		foreach ($array as $k=>$v)
			$json_string .= '"' . $k . '":"' . str_replace('"', '\"', $v) . '",';
		$json_string = substr($json_string, 0, strlen($json_string)-1).'}';
		return $json_string;
	}
}

function parseFIOString($fio_string) {
	$fio_string = trim($fio_string);
	if (!strpos($fio_string, ' ')) return array($fio_string);
	$fio_parts = explode(' ', $fio_string);
	return array($fio_parts[0], $fio_parts[1]);
}


$res_element = CIBlockElement::GetByID($arParams['ELEMENT_ID']);
if($ar_res_element = $res_element->GetNext()) {
	$arParams['IBLOCK_ID']=$ar_res_element['IBLOCK_ID'];
}

//get value for buy
if ($_REQUEST['submit_form']==1) {
	global $USER, $APPLICATION;


    $newUserRegister = false;
	$sendLetterToUser = false;

	$_REQUEST['new_order']['FIO'] = $_REQUEST['new_order']['PHONE'];
	if (empty($_REQUEST['new_order']['FIO'])) {
		$arResult['ERRORS']['FIO'] = GetMessage('1CB_NO_FIO');
	}
	if (empty($_REQUEST['new_order']['PHONE'] || mb_strlen($_REQUEST['new_order']['PHONE']) != '19')
		&& !preg_match('/^[+0-9\-\(\)\s]+$/', $_REQUEST['new_order']['PHONE'])) {
		$arResult['ERRORS']['PHONE']=GetMessage('1CB_NO_PHONE');
	}
	if (empty($_REQUEST['new_order']['PHONE'])) {
		$arResult['ERRORS']['PHONE']=GetMessage('1CB_NO_PHONE');
	}
	if (preg_match('/_/', $_REQUEST['new_order']['PHONE'])) {
		$arResult['ERRORS']['PHONE']=GetMessage('1CB_NO_PHONE');
	}


	if (!empty($_REQUEST['new_order']['EMAIL'])
		&& !preg_match('/^[0-9a-zA-Z\-_\.]+@[0-9a-zA-Z\-]+[\.]{1}[0-9a-zA-Z\-]+[\.]?[0-9a-zA-Z\-]+$/', $_REQUEST['new_order']['EMAIL'])) {
		$arResult['ERRORS']['EMAIL']=GetMessage('1CB_BAD_EMAIL_FORMAT');
	}


	//error element
	$Element = CIBlockElement::GetList(array(),array("ID"=>$_REQUEST['id']),false,false,array("ID"))->Fetch();

	if($Element<=0){
		$arResult['ERRORS']["ELEMENT"] = GetMessage("ERROR_ELEMENT");
		$message = "/local/components/wisesolutions/oneclickbuy/component = element_id=".$_REQUEST['id'];
		mail("vp@wise-solutions.com.ua",'rchobby - error element',$message);
	}



	if (strlen($_REQUEST['currencyCode']) != 3)
		$_REQUEST['currencyCode'] = COption::GetOptionString('sale', 'default_currency', 'RUB');

	$currencyData = CCurrencyLang::GetByID($_REQUEST['currencyCode'], LANGUAGE_ID);
	if (!$currencyData) {
		$arResult['ERROR'].=GetMessage('1CB_CURRENCY_NOT_FOUND');
	}
	$currencyName = $currencyData['FORMAT_STRING'];

	$basketUserID = CSaleBasket::GetBasketUserID();

	if(empty($arResult['ERRORS']['PHONE'])){
	if (!$USER->IsAuthorized()) {
		if (!isset($_REQUEST['new_order']['EMAIL'])
			|| $_REQUEST['new_order']['EMAIL'] == '') {
			$login = 'user_' . (microtime(true) * 100);
			$server_name = strlen(SITE_SERVER_NAME)>0? SITE_SERVER_NAME: 'server.com';
			$_REQUEST['new_order']['EMAIL'] = $login . '@' . $server_name;
			$newUserRegister = true;
		} else {
			$dbUser = CUser::GetList(($by = 'ID'), ($order = 'ASC'), array('=EMAIL' => $_REQUEST['new_order']['EMAIL']));
			if ($dbUser->SelectedRowsCount() == 0) {
				$login = 'user_' . (microtime(true) * 100);
				$newUserRegister = true;
			} elseif ($dbUser->SelectedRowsCount()==1) {
				$ar_user = $dbUser->Fetch();
				$registeredUserID = $ar_user['ID'];
			} else {
				$arResult['ERROR'].=GetMessage('1CB_TOO_MANY_USERS');
			}
			$sendLetterToUser = true;
		}

		if ($newUserRegister) {
			$use_captcha = COption::GetOptionString("main", "captcha_registration", "N");
			if ($use_captcha == 'Y')
				COption::SetOptionString("main", "captcha_registration", "N");
			$userPassword = randString(10);
			$userFIO = parseFIOString($_REQUEST['new_order']['FIO']);


			if(strcmp($userFIO[0],GetMessage('GUEST'))==0){

				$userFIO[0] .= " ".$_REQUEST['new_order']['PHONE'];
			}

			$newUser = $USER->Register(
				$login,
				$userFIO[0],
				$userFIO[1],
				$userPassword,
				$userPassword,
				$_REQUEST['new_order']['EMAIL'].'.ru'
			);

			if ($use_captcha == 'Y')
				COption::SetOptionString("main", "captcha_registration", "Y");
			if ($newUser['TYPE'] == 'ERROR') {
				$arResult['ERROR'].=GetMessage('1CB_USER_REGISTER_FAIL');
			}
			$registeredUserID = $USER->GetID();
			if (!empty($_REQUEST['new_order']['PHONE']))
				$userUpd = $USER->Update($registeredUserID, array('PERSONAL_PHONE' => $_REQUEST['new_order']['PHONE']));
            $USER->Logout();
		}
	} else {
		$sendLetterToUser = true;
		$registeredUserID = $USER->GetID();
		if (!empty($_REQUEST['new_order']['PHONE']))
				$userUpd = $USER->Update($registeredUserID, array('PERSONAL_PHONE' => $_REQUEST['new_order']['PHONE']));
	}
	}

	if($arResult['ERROR']=='' && count($arResult['ERRORS'])<=0) {
		$newOrder = array(
			'LID' => SITE_ID,
			'PERSON_TYPE_ID' => intval($_REQUEST['personTypeId'])>0? $_REQUEST['personTypeId']: 1,
			'PAYED' => 'N',
			'CURRENCY' => $_REQUEST['currencyCode'],
			'USER_ID' => $registeredUserID,
			'COMMENTS' => $_REQUEST['comm']
		);
		if ($_REQUEST['deliveryId'] !=0 )
			$newOrder['DELIVERY_ID'] = $_REQUEST['deliveryId'];
		if ($_REQUEST['paysystemId'] !=0 )
			$newOrder['PAY_SYSTEM_ID'] = $_REQUEST['paysystemId'];

		$newOrderID = CSaleOrder::Add($newOrder);


		// $newOrderDB = CSaleOrder::GetList(array("ID" => "DESC"), array("ID"=>$newOrderID))->Fetch();

		// $userUpd = $USER->Update($registeredUserID, array('NAME' => $newOrderDB["ACCOUNT_NUMBER"]),'LAST_NAME'=>$newOrderID);

		if ($newOrderID == false) {
			$strError = '';
			if($ex = $APPLICATION->GetException())
				$strError = $ex->GetString();

			$arResult['ERROR'].=GetMessage('1CB_ORDER_CREATE_FAIL');
		}

		$dbOrderProperties = CSaleOrderProps::GetList(
			array("SORT" => "ASC"),
			array("PERSON_TYPE_ID" => 1, "ACTIVE" => "Y", "UTIL" => "N"),
			false,
			false,
			array("ID", "TYPE", "NAME", "CODE", "USER_PROPS", "SORT")
		);

		$_REQUEST["new_order"]['START_NAME']=$_REQUEST["new_order"]['FIO'];
		$_REQUEST["new_order"]['CURR_PHONE']=$_REQUEST["new_order"]['PHONE'];

		while ($arOrderProperties = $dbOrderProperties->Fetch()) {
			$curVal = $_REQUEST["new_order"][trim($arOrderProperties['CODE'])];
			$arFields = array(
					"ORDER_ID" => $newOrderID,
					"ORDER_PROPS_ID" => $arOrderProperties["ID"],
					"NAME" => $arOrderProperties["NAME"],
					"CODE" => $arOrderProperties["CODE"],
					"VALUE" => $curVal
				);


			CSaleOrderPropsValue::Add($arFields);
			if ($curVal!='') {
				$PROPuser .= $arOrderProperties["NAME"].":".$curVal."\n";
			}
		}

		$db_basket_items = CSaleBasket::GetList(
			array('SORT' => 'DESC'),
			array(
				"FUSER_ID" => $basketUserID,
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL",
				"DELAY" => "N"
			)
		);


		$addProduct = true;
		$orderPrice = 0;
		$currency = '';
		$orderList = '';
		if ($_REQUEST['buyMode'] == 'ALL') {
			while ($ar_tmp = $db_basket_items->Fetch()) {

				if ($ar_tmp['PRODUCT_ID'] == $_REQUEST['id'])
					$addProduct = false;
				if ($ar_tmp["CAN_BUY"] == "Y") {
					if ($ar_tmp['CURRENCY'] != $_REQUEST['currencyCode'])
						$ar_tmp["PRICE"] = CCurrencyRates::ConvertCurrency($ar_tmp['PRICE'], $ar_tmp['CURRENCY'], $_REQUEST['currencyCode']);
						CSaleBasket::Update(
								$ar_tmp["ID"],
								array('ORDER_ID' => $newOrderID, 'PRICE' => $ar_tmp["PRICE"], 'FUSER_ID' => $registeredUserID)
					);
					$curPrice = roundEx($ar_tmp["PRICE"], SALE_VALUE_PRECISION) * DoubleVal($ar_tmp["QUANTITY"]);
					$orderPrice += $curPrice;
					$orderList .= GetMessage('ITEM_NAME') . $ar_tmp['NAME']
						. GetMessage('ITEM_PRICE') . str_replace('#', $ar_tmp['PRICE'], $currencyName)
						. GetMessage('ITEM_QTY') . $ar_tmp["QUANTITY"]
						. GetMessage('ITEM_TOTAL') . str_replace('#', $curPrice, $currencyName) . "\n";
				}
			}
		} else {
			CSaleBasket::DeleteAll($basketUserID);
		}

		if ($addProduct) {
			$db_product = CIBlockElement::GetByID($_REQUEST['id']);
			$arProduct = $db_product->GetNext();
			if ($useSku)
				$arProduct['DETAIL_PAGE_URL'] = getSKUOfferParentDetailUrl($arProduct['IBLOCK_ID'], $_REQUEST['id']);

			$dbPrice = CPrice::GetList(
				array(),
				array(
					'PRODUCT_ID' => $_REQUEST['id'],
					'CAN_BUY'=>'Y'
				)
			);
			$arPrice['PRICE']='1000000';
			while($PRICE=$dbPrice->GetNext()) {
				if ($PRICE['PRICE']<$arPrice['PRICE']) {
					$arPrice=$PRICE;
				}
			}

			$arProps = false;
			$iblockID = intval($_REQUEST['iblockId']);
			$product_desc_string = '';
			$useSku = (isset($_REQUEST['useSku']) && $_REQUEST['useSku']=='Y');

			if ($useSku && $iblockID>0) {
				$skuCodes = explode('|', $_REQUEST['skuCodes']);
				if (is_array($skuCodes)) {
					foreach ($skuCodes as $k=>$v)
						if ($v === "")
							unset($skuCodes[$k]);
					$product_properties = array();
					if (!empty($skuCodes))
						$product_properties = CIBlockPriceTools::GetOfferProperties($_REQUEST['id'], $iblockID, $skuCodes);
					if (!empty($product_properties)) {
						$product_desc_string = ' (';
						foreach ($product_properties as $cur_property) {
							$product_desc_string .= $cur_property["NAME"] . ': ' . $cur_property["VALUE"] . ', ';
							$arProps[] = array(
								"NAME" => $cur_property["NAME"],
								"CODE" => $cur_property["CODE"],
								"VALUE" => $cur_property["VALUE"],
								"SORT" => $cur_property["SORT"]
							);
						}
						$product_desc_string = substr($product_desc_string, 0, strlen($product_desc_string)-2) . ')';
					}
				}
			}
			if ($_REQUEST['quantity']>0) {
				$quant=$_REQUEST['quantity'];
			}
			else {
				$quant=1;
			}
			//add

			/*change for by_order*/
			//if(isset($_REQUEST['by_order'])){
				$opt = COption::GetOptionString("catalog", "default_can_buy_zero");
				if($opt=="N"){
					$new_opt = COption::SetOptionString("catalog", "default_can_buy_zero", "Y");
				}
			//}

			/*change for by_order*/
			$add = Add2BasketByProductID($_REQUEST['id'], $quant, false);


			if (!$add) {
				$strError = '';
				if($ex = $APPLICATION->GetException())
					$strError = $ex->GetString();
				$arResult['ERROR'].=GetMessage('1CB_ITEM_ADD_FAIL').'<br>';
			}
			//update basket
			$dbBasketList = CSaleBasket::GetList(
				array("PRICE" => "DESC"),
				array("FUSER_ID" => CSaleBasket::GetBasketUserID(),
					"ORDER_ID" => NULL)
				);
			while ($arBasketItems = $dbBasketList->Fetch()) {

				$arFields_to_arr["FUSER_ID"] = $registeredUserID;
				$arFields_to_arr["ORDER_ID"] = $newOrderID;
				CSaleBasket::Update($arBasketItems["ID"], $arFields_to_arr);
			}

			//update order
			$dbBasketList = CSaleBasket::GetList(
				array("PRICE" => "DESC"),
				array("FUSER_ID" => $registeredUserID,
					"ORDER_ID" => $newOrderID)
				);
			while ($arBasketItems = $dbBasketList->Fetch()) {
				CCatalogProduct::QuantityTracer($arBasketItems['PRODUCT_ID'], $arBasketItems["QUANTITY"]);

				if ($arBasketItems['CURRENCY'] != $_REQUEST['currencyCode'])
					$arBasketItems['PRICE'] = CCurrencyRates::ConvertCurrency($arBasketItems['PRICE'], $arBasketItems['CURRENCY'], $_REQUEST['currencyCode']);

				$orderPrice2 += roundEx($arBasketItems["PRICE"], SALE_VALUE_PRECISION) * DoubleVal($arBasketItems["QUANTITY"]);

				$orderList2 .= GetMessage('ITEM_NAME') . $arBasketItems['NAME'] . $product_desc_string
					. GetMessage('ITEM_PRICE') . str_replace('#', $arBasketItems['PRICE'], $currencyName)
					. GetMessage('ITEM_QTY') . $quant
					. GetMessage('ITEM_TOTAL') . str_replace('#', $arBasketItems['PRICE'], $currencyName) . "\n";
				unset($ar_tmp);
			}
		}
		$_SESSION["SALE_BASKET_NUM_PRODUCTS"][SITE_ID] = 0;

		$orderUpdate = CSaleOrder::Update(
			$newOrderID,
			array('PRICE' => $orderPrice2)
		);

		$email = '';
		$bcc = array();
		$duplicate = "N";
		if (isset($_REQUEST['dubLetter']) && strlen($_REQUEST['dubLetter'])>0) {
			if (strpos($_REQUEST['dubLetter'], 'a') !== false) {
				$admin_email = COption::GetOptionString('main', 'email_from', '');
				if (!empty($admin_email))
					$bcc[] = $admin_email;
			}
			if (strpos($_REQUEST['dubLetter'], 's') !== false) {
				$sales_email = COption::GetOptionString('sale', 'order_email', '');
				if (!empty($sales_email))
					$bcc[] = $sales_email;
			}
			if (strpos($_REQUEST['dubLetter'], 'd') !== false) {
				$dub_email = COption::GetOptionString('main', 'all_bcc', '');
				if (!empty($dub_email))
					$duplicate = "Y";
			}
		}
		$bcc = array_unique($bcc);

		if($new_opt=="Y"){
			$type_event = "BY_ORDER";
			$event_name  = "NEW_ORDER_ONE_CLICK_BY";
		}
		else{
			$type_event = "SALE_NEW_ORDER";
			$event_name  = "SALE_NEW_ORDER";
		}


		if($type_event == "BY_ORDER"){
			if (empty($bcc)) {
				if ($duplicate == 'Y')
					$email = COption::GetOptionString('main', 'all_bcc', '');
			} else
				$email = array_shift($bcc);
		}
		elseif (($sendLetterToUser)&&(isset($_REQUEST['new_order']['EMAIL']))&&($_REQUEST['new_order']['EMAIL'] !=""))
			$email = $_REQUEST['new_order']['EMAIL'];
		else {
			if (empty($bcc)) {
				if ($duplicate == 'Y')
					$email = COption::GetOptionString('main', 'all_bcc', '');
			} else
				$email = array_shift($bcc);
		}
		$orderName = CSaleOrder::GetByID($newOrderID);
		if (strlen($email) > 0)	{



			$letterFields = array(
				'GURT'=>'',
				'DELIVERY'=>'',
				'DELIVERY_D'=>'',
				'PAY'=>'',
				'PAY_D'=>'',
				'PROPUSER'=>$PROPuser,
				'USER_DESCRIPTION'=>'',
				'ORDER_ID' => $newOrderID,
				'ORDER_NAME' => $orderName['ACCOUNT_NUMBER'],
				'ORDER_DATE' => date('d.m.Y'),
				'ORDER_USER' => $_REQUEST['new_order']['FIO'],
				'ORDER_PHONE' => $_REQUEST['new_order']['PHONE'],
				'PRICE' => str_replace('#', $orderPrice, $currencyName),
				'EMAIL' => $email,
				'BCC' => !empty($bcc)? implode(',', $bcc) : '',
				'ORDER_LIST' => $orderList2,
				'ORDER_LIST_WIDE' => $orderList2,
				'QUANTITY'=>$quant,
				'SALE_EMAIL' => COption::GetOptionString('sale', 'order_email', 'order@'.SITE_SERVER_NAME),
			);

			CEvent::Send($event_name, SITE_ID, $letterFields, $duplicate);

			//$type_event
		}

		$arOrder = CSaleOrder::GetByID($newOrderID);

		$arBasketItems = array();
		$dbBasketItems = CSaleBasket::GetList(
				array(
						"NAME" => "ASC",
						"ID" => "ASC"
					),
				array(
						"LID" => SITE_ID,
						"ORDER_ID" => $arOrder['ID']
					),
				false,
				false,
				array("ID", 'NAME', "PRODUCT_ID", "QUANTITY", "PRICE", "WEIGHT")
			);
		while ($arItems = $dbBasketItems->Fetch()) {

			$arBasketItems[] = $arItems;
		}
		$arOrder['BACKET']=$arBasketItems;

		if (IntVal($arOrder["PAY_SYSTEM_ID"]) > 0)
		{
			$dbPaySysAction = CSalePaySystemAction::GetList(
					array(),
					array(
							"PAY_SYSTEM_ID" => $arOrder["PAY_SYSTEM_ID"],
							"PERSON_TYPE_ID" => $arOrder["PERSON_TYPE_ID"]
						),
					false,
					false,
					array("NAME", "ACTION_FILE", "NEW_WINDOW", "PARAMS", "ENCODING")
				);
			if ($arPaySysAction = $dbPaySysAction->Fetch())
			{
				$arPaySysAction["NAME"] = htmlspecialcharsEx($arPaySysAction["NAME"]);
				if (strlen($arPaySysAction["ACTION_FILE"]) > 0)
				{
					if ($arPaySysAction["NEW_WINDOW"] != "Y")
					{
						CSalePaySystemAction::InitParamArrays($arOrder, $ID, $arPaySysAction["PARAMS"]);

						$pathToAction = $_SERVER["DOCUMENT_ROOT"].$arPaySysAction["ACTION_FILE"];

						$pathToAction = str_replace("\\", "/", $pathToAction);
						while (substr($pathToAction, strlen($pathToAction) - 1, 1) == "/")
							$pathToAction = substr($pathToAction, 0, strlen($pathToAction) - 1);

						if (file_exists($pathToAction))
						{
							if (is_dir($pathToAction) && file_exists($pathToAction."/payment.php"))
								$pathToAction .= "/payment.php";

							$arPaySysAction["PATH_TO_ACTION"] = $pathToAction;
						}

						if(strlen($arPaySysAction["ENCODING"]) > 0)
						{
							define("BX_SALE_ENCODING", $arPaySysAction["ENCODING"]);
							AddEventHandler("main", "OnEndBufferContent", "ChangeEncoding");
							function ChangeEncoding($content)
							{
								global $APPLICATION;
								header("Content-Type: text/html; charset=".BX_SALE_ENCODING);
								$content = $APPLICATION->ConvertCharset($content, SITE_CHARSET, BX_SALE_ENCODING);
								$content = str_replace("charset=".SITE_CHARSET, "charset=".BX_SALE_ENCODING, $content);
							}
						}
					}
				}
				$arResult["PAY_SYSTEM"] = $arPaySysAction;
			}
		}
		$arResult["ORDER"]=$arOrder;
		$arResult["ORDER_ID"]=$arOrder['ID'];
		$arResult["USER_VALS"]["CONFIRM_ORDER"]='Y';
		$arResult["CONFIRM_ORDER"] = "Y";
		$arResult['FINAL_STEP']='Y';
	}
}

//get data for view
if ($this->StartResultCache()) {
	if ($arParams['ELEMENT_ID'] < 1) {	// парсим ЧПУ
		$elementUrl = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'DETAIL_PAGE_URL');
		$elementUrl = str_replace('/' . $arParams["SEF_FOLDERIX"], '', $elementUrl);
		$arUrlTemplates = array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => $elementUrl,
			"compare" => "compare/"
		);

		if (stripos($elementUrl, '#ELEMENT_CODE#'))	{
			$arVariables = array();
			$page = CComponentEngine::ParseComponentPath($arParams["SEF_FOLDERIX"], $arUrlTemplates, $arVariables);
			if (isset($arVariables['ELEMENT_CODE']) && !empty($arVariables['ELEMENT_CODE'])) {
				$dbItem = CIBlockElement::GetList(
					array('SORT' => 'ASC'),
					array(
						'ACTIVE' => 'Y',
						'IBLOCK_ID' => $arParams['IBLOCK_ID'],
						'=CODE' => $arVariables['ELEMENT_CODE']
					)
				);
				if ($dbItem->SelectedRowsCount()==1) {
					$ar_tmp = $dbItem->Fetch();
					$arParams['ELEMENT_ID'] = $ar_tmp['ID'];
					$arParams['ELEMENT_NAME'] = $ar_tmp['NAME'];
				} else {
					$this->AbortResultCache();
					return;
				}
			} else {
				$this->AbortResultCache();
				return;
			}
		} elseif (stripos($elementUrl, '#ELEMENT_ID#')) {
			$arVariables = array();
			$page = CComponentEngine::ParseComponentPath($arParams["SEF_FOLDERIX"], $arUrlTemplates, $arVariables);
			if (isset($arVariables['ELEMENT_ID']) && $arVariables['ELEMENT_ID'] > 0) {
				$arParams['ELEMENT_ID'] = (int) $arVariables['ELEMENT_ID'];
			} else {
				$this->AbortResultCache();
				return;
			}
		} else {
			$this->AbortResultCache();
			return;
		}
	}
	if ($arParams['USE_SKU'] && $arParams['ELEMENT_ID']>0 && !empty($arParams['SKU_PROPERTIES_CODES'])) {
		// получим название товара для отображения в названии товарного предложения
        $dbItemData = CIBlockElement::GetByID($arParams['ELEMENT_ID']);
		if ($arItemData = $dbItemData->GetNext())
			$arParams['ELEMENT_NAME'] = $arItemData['NAME'];

		function GenerateOfferString(&$offerData, &$offerProps, &$elementName) {
			$string = $elementName . '(';
			foreach ($offerProps as $cur_prop) {
				if (array_key_exists($cur_prop, $offerData['PROPERTIES'])) {
					$curPropData = $offerData['PROPERTIES'][$cur_prop];
					switch($curPropData['PROPERTY_TYPE']) {
						case 'S':
						case 'L':
							if (!empty($curPropData['VALUE']))
								$string .= $curPropData['NAME'] . ': ' . $curPropData['VALUE'] . ', ';
							break;
						case 'E':
						case 'G':
						case 'F':
						default:
							break;
					}
				}
			}
			$string = substr($string, 0, strlen($string)-2) . ')';
			return $string;
		}

		$arResult['SKU_PROPERTIES_STRING'] = implode('|', $arParams['SKU_PROPERTIES_CODES']);
		$arPrice = CCatalogGroup::GetById($arParams['PRICE_ID']);
		$arPrices = CIBlockPriceTools::GetCatalogPrices($arParams['IBLOCK_ID'], array($arPrice['NAME']));
		$arOffers = CIBlockPriceTools::GetOffersArray(
			$arParams['IBLOCK_ID'],
			$arParams['ELEMENT_ID'],
			array("ID"=>"DESC"),
			array(),
			$arParams['SKU_PROPERTIES_CODES'],
			intval($arParams['SKU_COUNT'])>0? intval($arParams['SKU_COUNT']): false,
			$arPrices,
			false
		);
		foreach($arOffers as $arOffer)
			$arResult['OFFERS'][$arOffer['ID']] = GenerateOfferString($arOffer, $arParams['SKU_PROPERTIES_CODES'], $arParams['ELEMENT_NAME']);
		 unset($arOffers);
	}

	$arResult['USER_PHONE'] = '';
	// пользователь авторизован - его телефон в сессии
	if ($USER->IsAuthorized()) {
		if (!isset($_SESSION['OCB_USER_PHONE'])) {
			global $USER;
			$dbUser = $USER->GetByID($USER->GetID());
			$arUser = $dbUser->Fetch();
			$_SESSION['OCB_USER_PHONE'] = $arUser['PERSONAL_PHONE'];
		}
		$arResult['USER_PHONE'] = $_SESSION['OCB_USER_PHONE'];
	}

	// получим путь к компоненту, взяв подстроку с символа, следующего за документ_рутом
	$arResult['SCRIPT_PATH'] = substr(dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT']));

	/*change for by_order*/
		$opt = COption::GetOptionString("catalog", "default_can_buy_zero");
		if($opt=="Y"){
			$new_opt = COption::SetOptionString("catalog", "default_can_buy_zero", "N");

		}
	/*change for by_order*/

	$this->IncludeComponentTemplate();
}
?>

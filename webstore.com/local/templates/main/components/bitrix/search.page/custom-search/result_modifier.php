<?
$sections = array();

// Выборка по элементам
foreach($arResult['SEARCH'] as $num => $arElement) {

    // Поиск нужной ссылки типа "/catalog/section/id/"
    preg_match("~/[a-z]+/[0-9]+/[0-9]+/~", $arElement['URL_WO_PARAMS'], $isNeeded);

    // Если ссылка не та то:
    if(!$isNeeded[0]){

        // Удалить елемент
        unset($arResult['SEARCH'][$num]);

    // Иначе
    } else {

        // Получение SECTION.ID и SECTION
        preg_match("~[0-9]+~", $arElement['URL_WO_PARAMS'], $section_id);
        $section = CIBlockSection::GetByID($section_id[0])->fetch();

        // Формирование массива SECTIONS
        $sections[$section_id[0]][] = array(
            'NAME' => $section['NAME'],
            'URL' => '/catalog/' . $section['ID'] . '/'
        );
    }

}

// Обьеденить массив и записать кол-во елементов
foreach($sections as $section_id => $section) {
    $count = count($sections[$section_id]);
    $sections[$section_id] = array_unique($sections[$section_id]);
    $sections[$section_id] = array(
        'NAME' => $sections[$section_id][0]['NAME'],
        'COUNT' => $count,
        'URL' => $sections[$section_id][0]['URL']
    );
}
?>
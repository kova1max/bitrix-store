<?

$dblist = CIBlockSection::GetList (
	Array("SORT"=>"ASC"), 
	Array('IBLOCK_ID' => 14), 
	false, 
	Array(), 
    false
);



while ( $elm = $dblist->GetNext() ) {

	$aMenuLinks[] = array(
        $elm['NAME'], 
        $elm['SECTION_PAGE_URL'],
        array(),
        array(),
        ""
    );

}
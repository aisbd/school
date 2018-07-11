<?php
// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	die("dfdfs");
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/Marks.php");
	include("$currDir/Marks_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('Marks');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "Marks";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`Marks`.`id`" => "id",
		"`Marks`.`name`" => "name",
		"IF(    CHAR_LENGTH(`units1`.`name`), CONCAT_WS('',   `units1`.`name`), '') /* Unit */" => "unit",
		"IF(    CHAR_LENGTH(`students1`.`name`), CONCAT_WS('',   `students1`.`name`), '') /* Student */" => "student",
		"IF(    CHAR_LENGTH(`students1`.`regno`), CONCAT_WS('',   `students1`.`regno`), '') /* Regno */" => "regno",
		"IF(    CHAR_LENGTH(`students1`.`year`), CONCAT_WS('',   `students1`.`year`), '') /* Year */" => "year",
		"`Marks`.`marks`" => "marks",
		"`Marks`.`grade`" => "grade",
		"IF(    CHAR_LENGTH(`academic_year1`.`name`), CONCAT_WS('',   `academic_year1`.`name`), '') /* Academicyear */" => "academicyear",
		"`Marks`.`semester`" => "semester",
		"if(`Marks`.`date`,date_format(`Marks`.`date`,'%m/%d/%Y'),'')" => "date"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`Marks`.`id`',
		2 => 2,
		3 => '`units1`.`name`',
		4 => '`students1`.`name`',
		5 => '`students1`.`regno`',
		6 => '`students1`.`year`',
		7 => '`Marks`.`marks`',
		8 => 8,
		9 => 9,
		10 => 10,
		11 => '`Marks`.`date`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`Marks`.`id`" => "id",
		"`Marks`.`name`" => "name",
		"IF(    CHAR_LENGTH(`units1`.`name`), CONCAT_WS('',   `units1`.`name`), '') /* Unit */" => "unit",
		"IF(    CHAR_LENGTH(`students1`.`name`), CONCAT_WS('',   `students1`.`name`), '') /* Student */" => "student",
		"IF(    CHAR_LENGTH(`students1`.`regno`), CONCAT_WS('',   `students1`.`regno`), '') /* Regno */" => "regno",
		"IF(    CHAR_LENGTH(`students1`.`year`), CONCAT_WS('',   `students1`.`year`), '') /* Year */" => "year",
		"`Marks`.`marks`" => "marks",
		"`Marks`.`grade`" => "grade",
		"IF(    CHAR_LENGTH(`academic_year1`.`name`), CONCAT_WS('',   `academic_year1`.`name`), '') /* Academicyear */" => "academicyear",
		"`Marks`.`semester`" => "semester",
		"if(`Marks`.`date`,date_format(`Marks`.`date`,'%m/%d/%Y'),'')" => "date"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`Marks`.`id`" => "ID",
		"`Marks`.`name`" => "Name",
		"IF(    CHAR_LENGTH(`units1`.`name`), CONCAT_WS('',   `units1`.`name`), '') /* Unit */" => "Unit",
		"IF(    CHAR_LENGTH(`students1`.`name`), CONCAT_WS('',   `students1`.`name`), '') /* Student */" => "Student",
		"IF(    CHAR_LENGTH(`students1`.`regno`), CONCAT_WS('',   `students1`.`regno`), '') /* Regno */" => "Regno",
		"IF(    CHAR_LENGTH(`students1`.`year`), CONCAT_WS('',   `students1`.`year`), '') /* Year */" => "Year",
		"`Marks`.`marks`" => "Marks",
		"`Marks`.`grade`" => "Grade",
		"IF(    CHAR_LENGTH(`academic_year1`.`name`), CONCAT_WS('',   `academic_year1`.`name`), '') /* Academicyear */" => "Academicyear",
		"`Marks`.`semester`" => "Semester",
		"`Marks`.`date`" => "Date"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`Marks`.`id`" => "id",
		"`Marks`.`name`" => "name",
		"IF(    CHAR_LENGTH(`units1`.`name`), CONCAT_WS('',   `units1`.`name`), '') /* Unit */" => "unit",
		"IF(    CHAR_LENGTH(`students1`.`name`), CONCAT_WS('',   `students1`.`name`), '') /* Student */" => "student",
		"IF(    CHAR_LENGTH(`students1`.`regno`), CONCAT_WS('',   `students1`.`regno`), '') /* Regno */" => "regno",
		"IF(    CHAR_LENGTH(`students1`.`year`), CONCAT_WS('',   `students1`.`year`), '') /* Year */" => "year",
		"`Marks`.`marks`" => "marks",
		"`Marks`.`grade`" => "grade",
		"IF(    CHAR_LENGTH(`academic_year1`.`name`), CONCAT_WS('',   `academic_year1`.`name`), '') /* Academicyear */" => "academicyear",
		"`Marks`.`semester`" => "semester",
		"if(`Marks`.`date`,date_format(`Marks`.`date`,'%m/%d/%Y'),'')" => "date"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'unit' => 'Unit', 'student' => 'Student');

	$x->QueryFrom = "`Marks` LEFT JOIN `units` as units1 ON `units1`.`id`=`Marks`.`unit` LEFT JOIN `students` as students1 ON `students1`.`regno`=`Marks`.`student` LEFT JOIN `academic_year` as academic_year1 ON `academic_year1`.`id`=`students1`.`academicyear` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "Marks_view.php";
	$x->RedirectAfterInsert = "Marks_view.php?SelectedID=#ID#";
	$x->TableTitle = "Marks";
	$x->TableIcon = "resources/table_icons/chart_line_add.png";
	$x->PrimaryKey = "`Marks`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Name", "Unit", "Student", "Regno", "Year", "Marks", "Grade", "Academicyear", "Semester", "Date");
	$x->ColFieldName = array('name', 'unit', 'student', 'regno', 'year', 'marks', 'grade', 'academicyear', 'semester', 'date');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11);

	// template paths below are based on the app main directory
	$x->Template = 'templates/Marks_templateTV.html';
	$x->SelectedTemplate = 'templates/Marks_templateTVS.html';
	$x->TemplateDV = 'templates/Marks_templateDV.html';
	$x->TemplateDVP = 'templates/Marks_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Marks`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='Marks' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Marks`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='Marks' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`Marks`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: Marks_init
	$render=TRUE;
	if(function_exists('Marks_init')){
		$args=array();
		$render=Marks_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: Marks_header
	$headerCode='';
	if(function_exists('Marks_header')){
		$args=array();
		$headerCode=Marks_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: Marks_footer
	$footerCode='';
	if(function_exists('Marks_footer')){
		$args=array();
		$footerCode=Marks_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>
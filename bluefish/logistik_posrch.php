<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "logistik_poinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$logistik_po_search = new clogistik_po_search();
$Page =& $logistik_po_search;

// Page init processing
$logistik_po_search->Page_Init();

// Page main processing
$logistik_po_search->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var logistik_po_search = new ew_Page("logistik_po_search");

// page properties
logistik_po_search.PageID = "search"; // page ID
var EW_PAGE_ID = logistik_po_search.PageID; // for backward compatibility

// extend page with validate function for search
logistik_po_search.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_tanggal"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Tanggal");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	for (var i=0;i<fobj.elements.length;i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
logistik_po_search.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
logistik_po_search.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
logistik_po_search.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
logistik_po_search.ValidateRequired = false; // no JavaScript validation
<?php } ?>

// search highlight properties
logistik_po_search.ShowHighlightText = "Show highlight"; 
logistik_po_search.HideHighlightText = "Hide highlight";

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker">Search <h3><b>Purchase Order</b></h3><br><br>
<!--a href="<?php echo $logistik_po->getReturnUrl() ?>">Back to List</a-->
<input type="button" value="Kembali" onclick="window.location='<?php echo $logistik_po->getReturnUrl() ?>';">
</span></p>
<?php $logistik_po_search->ShowMessage() ?>
<form name="flogistik_posearch" id="flogistik_posearch" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return logistik_po_search.ValidateSearch(this);">
<p>
<input type="hidden" name="t" id="t" value="logistik_po">
<input type="hidden" name="a_search" id="a_search" value="S">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr<?php echo $logistik_po->actionlink->RowAttributes ?>>
		<td class="ewTableHeader"></td>
		<td<?php echo $logistik_po->actionlink->CellAttributes() ?>><span class="ewSearchOpr">contains<input type="hidden" name="z_actionlink" id="z_actionlink" value="LIKE"></span></td>
		<td<?php echo $logistik_po->actionlink->CellAttributes() ?>>
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<textarea name="x_actionlink" id="x_actionlink" cols="35" rows="4"<?php echo $logistik_po->actionlink->EditAttributes() ?>><?php echo $logistik_po->actionlink->EditValue ?></textarea>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="  Search  ">
<input type="button" name="Reset" id="Reset" value="   Reset   " onclick="ew_ClearForm(this.form);">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$logistik_po_search->Page_Terminate();
?>
<?php

//
// Page Class
//
class clogistik_po_search {

	// Page ID
	var $PageID = 'search';

	// Table Name
	var $TableName = 'logistik_po';

	// Page Object Name
	var $PageObjName = 'logistik_po_search';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $logistik_po;
		if ($logistik_po->UseTokenInUrl) $PageUrl .= "t=" . $logistik_po->TableVar . "&"; // add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show Message
	function ShowMessage() {
		if ($this->getMessage() <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		global $objForm, $logistik_po;
		if ($logistik_po->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($logistik_po->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($logistik_po->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function clogistik_po_search() {
		global $conn;

		// Initialize table object
		$GLOBALS["logistik_po"] = new clogistik_po();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'search', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'logistik_po', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $logistik_po;

		// Global page loading event (in userfn6.php)
		Page_Loading();

		// Page load event, used in current page
		$this->Page_Load();
	}

	//
	//  Page_Terminate
	//  - called when exit page
	//  - if URL specified, redirect to the URL
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page unload event, used in current page
		$this->Page_Unload();

		// Global page unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close Connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			ob_end_clean();
			header("Location: $url");
		}
		exit();
	}

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsSearchError, $logistik_po;
		$objForm = new cFormObj();
		if ($this->IsPageRequest()) { // Validate request

			// Get action
			$logistik_po->CurrentAction = $objForm->GetValue("a_search");
			switch ($logistik_po->CurrentAction) {
				case "S": // Get Search Criteria

					// Build search string for advanced search, remove blank field
					$this->LoadSearchValues(); // Get search values
					if ($this->ValidateSearch()) {
						$sSrchStr = $this->BuildAdvancedSearch();
					} else {
						$sSrchStr = "";
						$this->setMessage($gsSearchError);
					}
					if ($sSrchStr <> "") {
						$sSrchStr = $logistik_po->UrlParm($sSrchStr);
						$this->Page_Terminate("logistik_polist.php" . "?" . $sSrchStr); // Go to list page
					}
			}
		}

		// Restore search settings from Session
		if ($gsSearchError == "")
			$this->LoadAdvancedSearch();

		// Render row for search
		$logistik_po->RowType = EW_ROWTYPE_SEARCH;
		$this->RenderRow();
	}

// Build advanced search
function BuildAdvancedSearch() {
	global $logistik_po;
	$sSrchUrl = "";
	$this->BuildSearchUrl($sSrchUrl, $logistik_po->actionlink); // actionlink
	return $sSrchUrl;
}

// Function to build search URL
function BuildSearchUrl(&$Url, &$Fld) {
	global $objForm;
	$sWrk = "";
	$FldParm = substr($Fld->FldVar, 2);
	$FldVal = $objForm->GetValue("x_$FldParm");
	$FldOpr = $objForm->GetValue("z_$FldParm");
	$FldCond = $objForm->GetValue("v_$FldParm");
	$FldVal2 = $objForm->GetValue("y_$FldParm");
	$FldOpr2 = $objForm->GetValue("w_$FldParm");
	$FldVal = ew_StripSlashes($FldVal);
	if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
	$FldVal2 = ew_StripSlashes($FldVal2);
	if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
	$FldOpr = strtoupper(trim($FldOpr));
	if ($FldOpr == "BETWEEN") {
		$IsValidValue = ($Fld->FldDataType <> EW_DATATYPE_NUMBER) ||
			($Fld->FldDataType == EW_DATATYPE_NUMBER && is_numeric($FldVal) && is_numeric($FldVal2));
		if ($FldVal <> "" && $FldVal2 <> "" && $IsValidValue) {
			$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
				"&y_" . $FldParm . "=" . urlencode($FldVal2) .
				"&z_" . $FldParm . "=" . urlencode($FldOpr);
		}
	} elseif ($FldOpr == "IS NULL" || $FldOpr == "IS NOT NULL") {
		$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
			"&z_" . $FldParm . "=" . urlencode($FldOpr);
	} else {
		$IsValidValue = ($Fld->FldDataType <> EW_DATATYPE_NUMBER) ||
			($Fld->FldDataType = EW_DATATYPE_NUMBER && is_numeric($FldVal));
		if ($FldVal <> "" && $IsValidValue && ew_IsValidOpr($FldOpr, $Fld->FldDataType)) {

			//$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
				"&z_" . $FldParm . "=" . urlencode($FldOpr);
		}
		$IsValidValue = ($Fld->FldDataType <> EW_DATATYPE_NUMBER) ||
			($Fld->FldDataType = EW_DATATYPE_NUMBER && is_numeric($FldVal2));
		if ($FldVal2 <> "" && $IsValidValue && ew_IsValidOpr($FldOpr2, $Fld->FldDataType)) {

			//$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			if ($sWrk <> "") $sWrk .= "&v_" . $FldParm . "=" . urlencode($FldCond) . "&";
			$sWrk .= "&y_" . $FldParm . "=" . urlencode($FldVal2) .
				"&w_" . $FldParm . "=" . urlencode($FldOpr2);
		}
	}
	if ($sWrk <> "") {
		if ($Url <> "") $Url .= "&";
		$Url .= $sWrk;
	}
}

	// Convert search value for date
	function ConvertSearchValue(&$Fld, $FldVal) {
		$Value = $FldVal;
		if ($Fld->FldDataType == EW_DATATYPE_DATE && $FldVal <> "")
			$Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
		return $Value;
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $logistik_po;

		// Load search values
		// actionlink

		$logistik_po->actionlink->AdvancedSearch->SearchValue = $objForm->GetValue("x_actionlink");
		$logistik_po->actionlink->AdvancedSearch->SearchOperator = $objForm->GetValue("z_actionlink");

		// pono
		$logistik_po->pono->AdvancedSearch->SearchValue = $objForm->GetValue("x_pono");
		$logistik_po->pono->AdvancedSearch->SearchOperator = $objForm->GetValue("z_pono");

		// tanggal
		$logistik_po->tanggal->AdvancedSearch->SearchValue = $objForm->GetValue("x_tanggal");
		$logistik_po->tanggal->AdvancedSearch->SearchOperator = $objForm->GetValue("z_tanggal");

		// kode_pekerjaan
		$logistik_po->kode_pekerjaan->AdvancedSearch->SearchValue = $objForm->GetValue("x_kode_pekerjaan");
		$logistik_po->kode_pekerjaan->AdvancedSearch->SearchOperator = $objForm->GetValue("z_kode_pekerjaan");

		// mrno
		$logistik_po->mrno->AdvancedSearch->SearchValue = $objForm->GetValue("x_mrno");
		$logistik_po->mrno->AdvancedSearch->SearchOperator = $objForm->GetValue("z_mrno");

		// qrno
		$logistik_po->qrno->AdvancedSearch->SearchValue = $objForm->GetValue("x_qrno");
		$logistik_po->qrno->AdvancedSearch->SearchOperator = $objForm->GetValue("z_qrno");

		// createby
		$logistik_po->createby->AdvancedSearch->SearchValue = $objForm->GetValue("x_createby");
		$logistik_po->createby->AdvancedSearch->SearchOperator = $objForm->GetValue("z_createby");

		// tahuby
		$logistik_po->tahuby->AdvancedSearch->SearchValue = $objForm->GetValue("x_tahuby");
		$logistik_po->tahuby->AdvancedSearch->SearchOperator = $objForm->GetValue("z_tahuby");

		// setujuby
		$logistik_po->setujuby->AdvancedSearch->SearchValue = $objForm->GetValue("x_setujuby");
		$logistik_po->setujuby->AdvancedSearch->SearchOperator = $objForm->GetValue("z_setujuby");
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $logistik_po;

		// Call Row_Rendering event
		$logistik_po->Row_Rendering();

		// Common render codes for all row types
		// actionlink

		$logistik_po->actionlink->CellCssStyle = "";
		$logistik_po->actionlink->CellCssClass = "";
		if ($logistik_po->RowType == EW_ROWTYPE_VIEW) { // View row

			// actionlink
			$logistik_po->actionlink->ViewValue = $logistik_po->actionlink->CurrentValue;
			$logistik_po->actionlink->CssStyle = "";
			$logistik_po->actionlink->CssClass = "";
			$logistik_po->actionlink->ViewCustomAttributes = "";

			// pono
			$logistik_po->pono->ViewValue = $logistik_po->pono->CurrentValue;
			$logistik_po->pono->CssStyle = "";
			$logistik_po->pono->CssClass = "";
			$logistik_po->pono->ViewCustomAttributes = "";

			// tanggal
			$logistik_po->tanggal->ViewValue = $logistik_po->tanggal->CurrentValue;
			$logistik_po->tanggal->ViewValue = ew_FormatDateTime($logistik_po->tanggal->ViewValue, 7);
			$logistik_po->tanggal->CssStyle = "";
			$logistik_po->tanggal->CssClass = "";
			$logistik_po->tanggal->ViewCustomAttributes = "";

			// kode_pekerjaan
			$logistik_po->kode_pekerjaan->ViewValue = $logistik_po->kode_pekerjaan->CurrentValue;
			$logistik_po->kode_pekerjaan->CssStyle = "";
			$logistik_po->kode_pekerjaan->CssClass = "";
			$logistik_po->kode_pekerjaan->ViewCustomAttributes = "";

			// mrno
			$logistik_po->mrno->ViewValue = $logistik_po->mrno->CurrentValue;
			$logistik_po->mrno->CssStyle = "";
			$logistik_po->mrno->CssClass = "";
			$logistik_po->mrno->ViewCustomAttributes = "";

			// qrno
			$logistik_po->qrno->ViewValue = $logistik_po->qrno->CurrentValue;
			$logistik_po->qrno->CssStyle = "";
			$logistik_po->qrno->CssClass = "";
			$logistik_po->qrno->ViewCustomAttributes = "";

			// createby
			if (strval($logistik_po->createby->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nama` FROM `user_account` WHERE `username` = '" . ew_AdjustSql($logistik_po->createby->CurrentValue) . "'";
				$sSqlWrk .= " ORDER BY `nama` ";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$logistik_po->createby->ViewValue = $rswrk->fields('nama');
					$rswrk->Close();
				} else {
					$logistik_po->createby->ViewValue = $logistik_po->createby->CurrentValue;
				}
			} else {
				$logistik_po->createby->ViewValue = NULL;
			}
			$logistik_po->createby->CssStyle = "";
			$logistik_po->createby->CssClass = "";
			$logistik_po->createby->ViewCustomAttributes = "";

			// tahuby
			if (strval($logistik_po->tahuby->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nama` FROM `user_account` WHERE `username` = '" . ew_AdjustSql($logistik_po->tahuby->CurrentValue) . "'";
				$sSqlWrk .= " ORDER BY `nama` ";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$logistik_po->tahuby->ViewValue = $rswrk->fields('nama');
					$rswrk->Close();
				} else {
					$logistik_po->tahuby->ViewValue = $logistik_po->tahuby->CurrentValue;
				}
			} else {
				$logistik_po->tahuby->ViewValue = NULL;
			}
			$logistik_po->tahuby->CssStyle = "";
			$logistik_po->tahuby->CssClass = "";
			$logistik_po->tahuby->ViewCustomAttributes = "";

			// setujuby
			if (strval($logistik_po->setujuby->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nama` FROM `user_account` WHERE `username` = '" . ew_AdjustSql($logistik_po->setujuby->CurrentValue) . "'";
				$sSqlWrk .= " ORDER BY `nama` ";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$logistik_po->setujuby->ViewValue = $rswrk->fields('nama');
					$rswrk->Close();
				} else {
					$logistik_po->setujuby->ViewValue = $logistik_po->setujuby->CurrentValue;
				}
			} else {
				$logistik_po->setujuby->ViewValue = NULL;
			}
			$logistik_po->setujuby->CssStyle = "";
			$logistik_po->setujuby->CssClass = "";
			$logistik_po->setujuby->ViewCustomAttributes = "";

			// actionlink
			$logistik_po->actionlink->HrefValue = "";
		} elseif ($logistik_po->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// actionlink
			$logistik_po->actionlink->EditCustomAttributes = "";
			$logistik_po->actionlink->EditValue = ew_HtmlEncode($logistik_po->actionlink->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		$logistik_po->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $logistik_po;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($logistik_po->tanggal->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Tanggal";
		}

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $logistik_po;
		$logistik_po->actionlink->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_actionlink");
		$logistik_po->pono->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_pono");
		$logistik_po->tanggal->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_tanggal");
		$logistik_po->kode_pekerjaan->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_kode_pekerjaan");
		$logistik_po->mrno->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_mrno");
		$logistik_po->qrno->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_qrno");
		$logistik_po->createby->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_createby");
		$logistik_po->tahuby->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_tahuby");
		$logistik_po->setujuby->AdvancedSearch->SearchValue = $logistik_po->getAdvancedSearch("x_setujuby");
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>

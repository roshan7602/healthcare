<?php 
include 'session.php';
require_once('Connections/nfconx.php'); 
require_once('Connections/nfconxi.php'); 
include 'includes/functions/functions.php';
include 'includes/functions/functions_html_output.php';
include 'includes/functions/functions_user.php'; 
include('includes/functions/function_access_control.php');
include('includes/functions/functions_cybersource.php');
include 'includes/functions/functions_goemerchant.php';
include 'includes/functions/function_output_file_types.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-gb" xml:lang="en-gb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php echo page_characters($_GET['do'], "page_title"); ?> - <?php echo $NF_config['app_name']; ?> - <?php echo $NF_config['client_name']; ?>
</title>

<meta name="description" content="Netfunda Custom ERP Solution built on Open Source technologies empowers Netfunda Custom ERP Solution for <?php echo $NF_config['client_name']; ?>" />
<meta name="keywords" content="Netfunda, Netfunda Technologies, ERP, Netfunda Custom ERP Solution for <?php echo $NF_config['client_name']; ?>" />
<link rel="SHORTCUT ICON" href="images/favicon.ico" />

<link type="text/css" href="lib/jquery-ui-1.7.2/css/custom-theme/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="Styles/blue/theme/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="Styles/facebox.css" type="text/css" />

<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="Styles/ie.css" />
<![endif]-->

<script type="text/javascript" src="javascript/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="lib/jquery-ui-1.7.2/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="javascript/js.js"></script>
<script type="text/javascript" src="javascript/vtip-min.js"></script>

<link rel="stylesheet" href="Styles/vtip.css" type="text/css" media="print"/>

<script type="text/javascript" src="javascript/facebox.js"></script>
<script type="text/javascript" src="javascript/menudrop.js"></script>
<script type="text/javascript" src="javascript/general.js"></script>
<script type="text/javascript" src="javascript/lib.js"></script>
<script type="text/javascript" src="javascript/ui.core.js"></script>
<script type="text/javascript" src="javascript/tooltip.js"></script>

<link rel="stylesheet" href="Styles/print.css" type="text/css" media="print"/>

<script type="text/javascript" src="Styles/blue/template/ca_scripts.js"></script>
<script src="javascript/tbl_change.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="javascript/jquery.form.js"></script> 

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loading_image : 'loading.gif',
        close_image   : 'closelabel.gif'
      }) 
    })
</script>

<link rel="stylesheet" type="text/css" href="css/superfish.css" media="screen">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

</head>

<body class="ltr">

<a name="top"></a>

<?php include 'includes/header.inc.php'; ?>

<?php
{
	//include 'includes/menu.inc.php'; 
}
?>

<?php
$current_page_service_group_id = get_val_col(services, service_group_id, service_id, $_GET['do']);
?>

<?php
if ($current_page_service_group_id == "2")
{
?>

<div id="content" style="clear:left;">

    <table border="0" cellspacing="0" cellpadding="0" width="100%" id="maintable" align="center">
        <tr>
            <td id="contentrow">
                <div style="min-height:380px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="100%" valign="top">
                                <?php include 'includes/message_alert.inc.php'; ?>
                                <?php include 'includes/notice.inc.php'; ?>
                                <?php include page_characters($_GET['do'], "default_include_file"); ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

</div>

<?php	
}
else
{
?>

<div id="content" style="clear:left;">

    <table border="0" cellspacing="0" cellpadding="0" width="100%" id="maintable" align="center">
        <tr>
            <td id="contentrow">
                <div style="min-height:380px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td valign="top">
                                <?php include 'includes/message_alert.inc.php'; ?>
                                <?php include 'includes/notice.inc.php'; ?>
                                <?php include page_characters($_GET['do'], "default_include_file"); ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

<?php
}
?>
</div>
</body>
</html>

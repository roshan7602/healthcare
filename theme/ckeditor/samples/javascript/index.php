<?php 
include 'session.php';
require_once('Connections/nfconx.php');
require_once('Connections/nfconxi.php'); 
include 'includes/functions/functions.php';
include 'includes/functions/functions_html_output.php';
include 'includes/functions/functions_user.php'; 
include('includes/functions/function_access_control.php');
include('lib/phpgraphlib.php');

//secret_question_status($_SESSION['NF_Username']);
//initiate_payment_method_wizard($_SESSION['NF_Username']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-gb" xml:lang="en-gb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index - <?php echo $NF_config['app_name']; ?> - <?php echo $NF_config['client_name']; ?></title>
<meta name="description" content="Netfunda Custom ERP Solution built on Open Source technologies empowers Netfunda Custom ERP Solution for <?php echo $NF_config['client_name']; ?>" />
<meta name="keywords" content="Netfunda, Netfunda Technologies, ERP, Netfunda Custom ERP Solution for <?php echo $NF_config['client_name']; ?>" />

<link rel="SHORTCUT ICON" href="images/favicon.ico" />

<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="Styles/ie.css" />
<![endif]-->

<link rel="stylesheet" href="Styles/blue/theme/stylesheet.css" type="text/css" />

<script type="text/javascript" src="javascript/jquery-latest.pack.js"></script>
<script type="text/javascript" src="javascript/js.js"></script>
<script type="text/javascript" src="javascript/sorter.js"></script>
<script type="text/javascript" src="javascript/menudrop.js"></script>
<script type="text/javascript" src="javascript/general.js"></script>
<script type="text/javascript" src="javascript/jquery.calendar.js"></script>

<link rel="stylesheet" href="Styles/calendar.css">
<link rel="stylesheet" href="Styles/print.css" type="text/css" media="print"/>

<script type="text/javascript" src="Styles/blue/template/ca_scripts.js"></script>
<script src="javascript/swfobject_modified.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="css/superfish.css" media="screen">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

</head>

<body class="ltr">

<a name="top"></a>

<?php include 'includes/header.inc.php'; ?>

<?php //include 'includes/menu.inc.php'; ?>

<div id="content" style="clear:left;">

    <table border="0" cellspacing="0" cellpadding="0" width="100%" id="maintable" align="center">
    	<tr>
        	<td id="contentrow">
            
                <div style="min-height:380px">
                
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td align="center" valign="middle">
    
                                <?php 
                                if (get_val_col(users,user_type,userid,$_SESSION['NF_Username']) == "Donor")
                                {
                                    include 'includes/forms/homepage_donor.php';
                                }
                                if (get_val_col(users,user_type,userid,$_SESSION['NF_Username']) == "Location Administrator")
                                {
                                    include 'includes/forms/homepage_bmminor.php';
									//include 'includes/forms/homepage_superadmin.php';
                                }
                                if (get_val_col(users,user_type,userid,$_SESSION['NF_Username']) == "Admin")
                                {
                                    include 'includes/forms/homepage_superadmin.php';
									//include 'includes/forms/homepage_bmminor.php';
                                }
                                ?>
                                
                            </td>
                        </tr>
                    </table>
                    
                </div>
                
                <?php include 'includes/footer.inc.php'; ?>
            
            </td>
        </tr>
    </table>
</div>

</body>
</html>
<?php 
require_once('Connections/nfconx.php');
include 'config.inc.php';
include 'Connections/class_connection.php';

$type=$_GET['type'];
$year=$_GET['year'];
$month=$_GET['month'];

$year_frm=$_GET['year_frm'];
$month_frm=$_GET['month_frm'];

if($month<10)
{
	$month='0'.$month;
}

if($month_frm<10)
{
	$month_frm='0'.$month_frm;
}

/*
class MyConnection
{ 
	var $db_host = 'localhost';
	var $db_user = 'mywork7_vinod';
	var $db_password = 'upreti';
	var $db_name = 'mywork7_cgintranet';
	var $connection;

	function Connect()
	{
		$this->connection = @mysqli_connect($this->db_host, $this->db_user, $this->db_password) 
		or 
		die("Error: ".mysqli_connect_error());
		mysqli_select_db($this->connection, $this->db_name);
		mysqli_query($this->connection, "SET NAMES 'utf8'");
	}

	function Disconnect()
	{
		mysqli_close($this->connection);
	}

	function ExecSQL($query)
	{
		$result = mysqli_query($this->connection, $query)
		or
		die('Error: '.mysqli_error($this->connection));
		return $result;
	} 
}
*/
?>


<div id="general_div" style="padding-top:10px; float:left; width:100%">
						
	<table id="gdZones" class="data_table" cellspacing="0" cellpadding="3" border="0" style="margin-left:0px;border-collapse: collapse;" align="center" width="100%">
                    
	<?php
    if($type=="4")
    {
        $procedure ="call dashboard_participation_savings('".$year_frm."-".$month_frm."','".$year."-".$month."')";
        $conn2 = new MyConnection;
        $conn2->Connect();
        $rs2 = $conn2->ExecSQL($procedure);
    ?>
													
		<tr class="header_tr" align="center" style="">
			<?php
            $fields = mysqli_fetch_fields($rs2);
            foreach ($fields as $val)
            {
            ?>	
            <td><strong><?php echo $val->name; ?></strong></td>
            <?php
            }
            ?>	
		</tr>
									
		<?php
        $total_rows=$rs2->num_rows;
        $total_col_find=1;
        
        while($row2 = $rs2->fetch_object())
        {
            if($total_col_find==$total_rows)
            {
                echo '<tr class="header_tr">';
            }
            else
            {
                echo '<tr align="center">';
            }
                
            foreach($fields as $val)
            {
                $col_name = $val->name;
                
                if(($col_name == "zone") )
                {
                        echo '<td>'.$row2->$col_name.'</td>';	
                }
                else
                {
                    setlocale(LC_MONETARY, 'en_US');
                    $format = money_format('%i', round($row2->$col_name));
                    $format = str_replace(".00","",$format);
                    $format = number_format($format);
                    echo '<td>$'.$format.'</td>';
                }                                            
            }
            $total_col_find++;
            echo '</tr>';  
        }
                                
        $conn2->Disconnect();
									
		echo '</table>';
		
		}
		
		else
		{
			if($type=="1")
			{
						$procedure  = "select zone as Zone, count as Count, books as Books, cleaning as Cleaning, fleet as Fleet, maintenance as Maint, `office supplies` as 'Office Supplies', pcard as Pcard,wireless as Wireless, copyprint as Copyprint, wireline as Wireline, shipping as Shipping, energy as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, `5 or more` as '5+',`7 or more` as '7+' from  vicariate_program_general  where month='".$year.'-'.$month."' order by zone";
                                          
			}
			else if($type=="2")
			{
						$procedure  = "select zone as Zone, count as Count, books as Books, cleaning as Cleaning, fleet as Fleet, maintenance as Maint, `office supplies` as 'Office Supplies', pcard as Pcard,wireless as Wireless, copyprint as Copyprint, wireline as Wireline, shipping as Shipping, energy as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, `5 or more` as '5+',`7 or more` as '7+' from  vicariate_program_school  where month='".$year.'-'.$month."' order by zone";
			}
			else if($type=="3")
			{
						$procedure = "select zone as Zone, count as Count, books1 as Books, cleaning1 as Cleaning, fleet1 as Fleet, maintenance1 as Maint, officesupplies1 as 'Office Supplies', pcard1 as Pcard,wireless1 as Wireless , copyprint1 as Copyprint, wireline1 as Wireline,shipping1 as Shipping, energy1 as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, prog51 as '5+', prog71 as '7+' from DASHBOARD_PARTICIPATION_TOTAL where month='".$year.'-'.$month."'";
			}
			
			else if($type=="5")
			{
						$procedure  = "select zone as Zone, count as Count, books as Books, cleaning as Cleaning, fleet as Fleet, maintenance as Maint, `office supplies` as 'Office Supplies', pcard as Pcard,wireless as Wireless, copyprint as Copyprint, wireline as Wireline, shipping as Shipping, energy as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, `5 or more` as '5+',`7 or more` as '7+' from  vicariate_program_general  where month='".$year.'-'.$month."' order by zone";
			}
			
			else if($type=="6")
			{
												
				$procedure  = "select zone as Zone, count as Count, books as Books, cleaning as Cleaning, fleet as Fleet, maintenance as Maint, `office supplies` as 'Office Supplies', pcard as Pcard,wireless as Wireless, copyprint as Copyprint, wireline as Wireline, shipping as Shipping, energy as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, `5 or more` as '5+',`7 or more` as '7+' from  vicariate_program_lastfiscalyear  order by zone";
			}
																						
										else if($type=="7")
										{
													$procedure  = "select zone as Zone, count as Count, books as Books, cleaning as Cleaning, fleet as Fleet, maintenance as Maint, `office supplies` as 'Office Supplies', pcard as Pcard,wireless as Wireless, copyprint as Copyprint, wireline as Wireline, shipping as Shipping, energy as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, `5 or more` as '5+',`7 or more` as '7+' from  vicariate_program_last12mnth  order by zone";
										}
										else if($type=="8")
										{
													$procedure = "select zone as Zone, count as Count, books as Books, cleaning as Cleaning, fleet as Fleet, maintenance as Maint, `office supplies` as 'Office Supplies', pcard as Pcard,wireless as Wireless, copyprint as Copyprint, wireline as Wireline, shipping as Shipping, energy as Energy, tuition as Tuition, pymtproc as GiveCentral, printing as Printing, `5 or more` as '5+',`7 or more` as '7+' from  vicariate_program_currentfiscalyear  order by zone";
										}
										
												
												
			
									$conn2 = new MyConnection;
									$conn2->Connect();
									$rs2 = $conn2->ExecSQL($procedure);
				?>
													
									<tr class="header_tr" align="center" style="">
				<?php
										//echo $rs2;
										$fields = mysqli_fetch_fields($rs2);
										
										
										foreach ($fields as $val)
										{
				?>	
								<td><strong><?php echo $val->name; ?></strong></td>
				<?php
										}
				?>	
									</tr>
									
				<?php
									$total_rows=$rs2->num_rows;
									$total_col_find=1;
									
									while($row2 = $rs2->fetch_object())
									{
									
										if($total_col_find==$total_rows)
										{
											echo '<tr class="header_tr" align="center" style="">';
										}
										else
										{
											echo '<tr>';
										}
											foreach($fields as $val)
											{
													$col_name = $val->name;
													
													if(($col_name == "Zone") || ($col_name == "Count") )
													{
															echo '<td>'.$row2->$col_name.'</td>';	
													}
													else
													{
														if(($row2->$col_name)>=60 && ($total_col_find<>$total_rows))
														{
															echo '<td style="background-color:SkyBlue;">'.$row2->$col_name.'%</td>';															
														}
														else
														{
															if(($row2->$col_name)=="")
															{
																echo '<td>0%</td>';
															}
															else
															{
																echo '<td>'.$row2->$col_name.'%</td>';
															}
														}

													}                                            
											}
										echo '</tr>'; 
										$total_col_find++;
									}
															
									$conn2->Disconnect();


						}
                   ?>
                            
			                         
                    
                        </table>
                        </div>
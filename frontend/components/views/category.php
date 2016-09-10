<?php
use frontend\models\CategoryModel;
?>

<div class="col-md-12 leftsidebar">
    <div id="accordion-first" class="clearfix">
        <div class="accordion" id="accordion2">
            <?php
                $obj_main=new CategoryModel;
                $resultmain=$obj_main->maincategory();
                $count_main=count($resultmain);
                for($maini=0;$maini<$count_main;$maini++){ ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle collapsed maincategorylst" data-toggle="collapse">
                            <em class="icon-fixed-width fa fa-plus icon_plus_minus"></em><?php echo $resultmain[$maini]['CategoryName']; ?>
                          </a>
                        </div>
                        <div class="accordion-body collapse category_list">
                            <div class="accordion-inner">
                            <ul class="nav nav-list">
                                <?php
                                    $obj_category=new CategoryModel;
                                    $resultcategory=$obj_category->Relationcategory($resultmain[$maini]['id']);
                                    $count_category=count($resultcategory);
                                    $cat_x='';
                                    for($cati=0;$cati<$count_category;$cati++){ 
                                        $cat_x.="<li id='".$resultcategory[$cati]['category_id']."' class='category_check'><a>".$resultcategory[$cati]['name']."</a></li>";
                                    }
                                    echo $cat_x;
                                ?>
                            </ul>
                            </div>
                        </div>
                    </div>
          <?php }?><input type="hidden" id="catid"/>
        </div><!-- end accordion -->
    </div>
</div>
<?php
    $this->registerJsFile('../../js/accordion.js');
?>                                             
<?
$models_per_page = 48;          // never make this 0, never
$max_page_show = 15;
$model_order = 'order by RAND()';
          if (!isset($_GET['page'])) {
                $page=1;
                $query_add = " $model_order limit ".($page-1).", $models_per_page";
          } else {
                $page = $_GET['page'];
                $query_add = " $model_order limit ".(($page-1)*$models_per_page).",$models_per_page";
          }
	$select="SELECT * FROM chatmodels WHERE 1" ;
        $result = mysql_query($select);
        $nTotal=mysql_num_rows($result);
        mysql_free_result($result);
        if ($max_page_show >= $nTotal) {
                $start_from = 1;
                $loop_till = ceil($nTotal/$models_per_page);
        } else {
                if ($page > $max_page_show) {
                        $start_from = $page;
                } else {
                        $start_from = 1;
                }
                $loop_till = ($max_page_show+$page);
        }
?>


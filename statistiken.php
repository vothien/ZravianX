<?php 
#################################################################################
##                                                                             ##
##              -= YOU MUST NOT REMOVE OR CHANGE THIS NOTICE =-                ##
##                                                                             ##
## --------------------------------------------------------------------------- ##
##                                                                             ##
##  Project:       ZravianX                                                    ##
##  Version:       2011.11.07                                                  ##
##  Filename:      statistiken.php                                             ##
##  Developed by:  Dzoki                                                       ##
##  Reworked by:   ZZJHONS                                                     ##
##  License:       Creative Commons BY-NC-SA 3.0                               ##
##  Copyright:     ZravianX (c) 2011 - All rights reserved                     ##
##  URLs:          http://zravianx.zzjhons.com                                 ##
##  Source code:   http://www.github.com/ZZJHONS/ZravianX                      ##
##                                                                             ##
#################################################################################

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['rank'])){ $_POST['rank']==$_GET['rank']; }
$ranking->procRankReq($_GET);
$ranking->procRank($_POST);
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	header("Location: ".$_SERVER['PHP_SELF']);
}

include ("Templates/head.tpl");
include ("Templates/body.tpl");
?>
<div id="content"  class="statistics">
    <h1>Statistics</h1>           	
    <div id="textmenu">
   <a href="statistiken.php" <?php if(!isset($_GET['id']) || (isset($_GET['id']) && ($_GET['id'] == 1 || $_GET['id'] == 31 || $_GET['id'] == 32 || $_GET['id'] == 7))) { echo "class=\"selected \""; } ?>>Player</a>
 | <a href="statistiken.php?id=4" <?php if(isset($_GET['id']) && ($_GET['id'] == 4 || $_GET['id'] == 41 || $_GET['id'] == 42 || $_GET['id'] == 47)) { echo "class=\"selected \""; } ?>>Alliances</a>
 | <a href="statistiken.php?id=2" <?php if(isset($_GET['id']) && $_GET['id'] == 2) { echo "class=\"selected \""; } ?>>Villages</a>
 | <a href="statistiken.php?id=8" <?php if(isset($_GET['id']) && $_GET['id'] == 8) { echo "class=\"selected \""; } ?>>Heroes</a>
 | <a href="statistiken.php?id=0" <?php if(isset($_GET['id']) && $_GET['id'] == 0) { echo "class=\"selected \""; } ?>>General</a>
 <?php if(WW == true) { echo '|'; } else { echo ''; } ?>
 <a href="statistiken.php?id=99" <?php if(isset($_GET['id']) && $_GET['id'] == 99) { echo "class=\"selected \""; } ?>><?php if(WW == true) { echo 'WW'; } else { echo ''; }?></a>
    </div>
	<?php
		if(isset($_GET['id'])) {
			switch($_GET['id']) {
				 case 31:
				include("Templates/Ranking/player_attack.tpl");
				break;
				case 32:
				include("Templates/Ranking/player_defend.tpl");
				break;
				case 7:
				include("Templates/Ranking/player_top10.tpl");
				break;
				case 2:
				include("Templates/Ranking/villages.tpl");
				break;
				case 4:
				include("Templates/Ranking/alliance.tpl");
				break;
				case 8:
				include("Templates/Ranking/heroes.tpl");
				break;
				case 11:
				include("Templates/Ranking/player_1.tpl");
				break;
				case 12:
				include("Templates/Ranking/player_2.tpl");
				break;
				case 13:
				include("Templates/Ranking/player_3.tpl");
				break;
				case 41:
				include("Templates/Ranking/alliance_attack.tpl");
				break;
				case 42:
				include("Templates/Ranking/alliance_defend.tpl");
				break;
				case 43:
				include("Templates/Ranking/ally_top10.tpl");
				break;
				case 0:
				include("Templates/Ranking/general.tpl");
				break;
				case 1:
				default:
				include("Templates/Ranking/overview.tpl");
				break;
				case 99:
				default:
				include("Templates/Ranking/ww.tpl");
				break;
			}
		}
		else {
			include("Templates/Ranking/overview.tpl");
		}
	?>
</div>
			</td>
		</tr>
	</table>
</div>
<?php include ("Templates/end.tpl"); ?>
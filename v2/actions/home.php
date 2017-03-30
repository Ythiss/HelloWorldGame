<?php
/**
 * Created by PhpStorm.
 * User: Amaïa
 * Date: 29/09/2016
 * Time: 09:31
 */
require __DIR__.'/../config/init.php';
require_once PATH_TEMPLATE . 'header.php';
//
// if($_GET['msg']) {
//
//   switch ($_GET['msg']
// ) {
//     case 'errorNotConnected':
//       $message = 'Vous n\'avez pas le droit d\'accèder à cette page ! ;)';
//       $display = '';
//       break;
//
//     default:
//       # code...
//       break;
//   }


//}
?>
<div id="homepage">
    <div id="homepageImg">
        <div class="container">
            <div class="row flex-items-xs-middle">
                <div class="col-xs">
                    <div id="homeGame">
                        <h1>Hello World! Game</h1>
                        <div id="buttonPlay">
                            <a class="btn btn-primary" href="game.php">Jouer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once PATH_TEMPLATE . 'footer.php';

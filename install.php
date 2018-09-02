<?php
/*
    install.php
    A file that installs the basic data for Dragon Knight.
*/

require_once('resources/scripts/library.php');
require_once('resources/classes/database.php');
require_once('resources/classes/modello.php');
require_once('resources/classes/installer.php');

$db = new Database();
$in = new Installer($db);
$mo = new Modello('resources/templates/install');

$mo->setBatch([
    'master' => 'master.tmp',
    'first' => 'first.tmp',
    'second' => 'second.tmp',
    'third' => 'third.tmp',
    'fourth' => 'fourth.tmp'
]);

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page == 2) { second($in, $mo); }
    elseif ($page == 3) { third($mo); }
    elseif ($page == 4) { fourth($in, $mo); }
    elseif ($page == 5) { fifth(); }
    else { first($mo); }
} else {
    first($mo);
}

// First page; show initial notes and ask for type of install
function first($mo)
{
    $mo->setValues(['content' => $mo->output('first')], 'master');
    echo $mo->output('master');
}

// Second page; set up the database tables and supply data if requested
function second($in, $mo)
{
    $result = '';
    
    function add(&$source, $string) { $source .= $string . '<br><br>'; }

    $result .= '<h3>Creating database tables...</h3>';
    add($result, $in->create('babble', 'createBabble'));
    add($result, $in->create('settings', 'createSettings'));
    add($result, $in->create('drops', 'createDrops'));
    add($result, $in->create('forums', 'createForums'));
    add($result, $in->create('items', 'createItems'));
    add($result, $in->create('levels', 'createLevels'));
    add($result, $in->create('monsters', 'createMonsters'));
    add($result, $in->create('news', 'createNews'));
    add($result, $in->create('spells', 'createSpells'));
    add($result, $in->create('towns', 'createTowns'));
    add($result, $in->create('users', 'createUsers'));

    $result .= '<h3>Populating database tables...</h3>';
    add($result, $in->populate('settings', 'populateSettings') .'<br>(will always populate)');
    add($result, $in->populate('news', 'populateNews') .'<br>(will always populate)');
    if (isset($_GET['complete']) && $_GET['complete'] == 'true') {
        add($result, $in->populate('drops', 'populateDrops'));
        add($result, $in->populate('items', 'populateItems'));
        add($result, $in->populate('levels', 'populateLevels'));
        add($result, $in->populate('monsters', 'populateMonsters'));
        add($result, $in->populate('spells', 'populateSpells'));
        add($result, $in->populate('towns', 'populateTowns'));
    }

    $mo->setValues(['result' => $result], 'second');
    $mo->setValues(['content' => $mo->output('second')], 'master');
    echo $mo->output('master');
}

function third($mo)
{
    $mo->setValues(['content' => $mo->output('third')], 'master');
    echo $mo->output('master');
}

function fourth($in, $mo)
{
    extract($_POST);

    if (!isset($username)) { die('Username needs to be submitted.'); }
    if (!isset($password)) { die('You need a password.'); }
    if (!isset($email)) { die('You need an email address.'); }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $in->createAdmin($username, $hashed, $email, $charclass, $difficulty);

    $mo->setValues(['username' => $username], 'fourth');
    $mo->setValues(['content' => $mo->output('fourth')], 'master');
    echo $mo->output('master');
}
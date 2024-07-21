<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/4/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'app']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="flex justify-center p-4 space-x-4">
        <a href="/" class="font-me px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Home</a>
        <a href="/demos" class="font-me px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Demo</a>
        <a href="#" class="font-me px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Projects</a>
        <a href="#" class="font-me px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Reports</a>
    </nav>
    <div class="container mx-auto p-2">
        <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
            <h1 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Tailwind in Cakephp</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
                This is a container in the homepage using Tailwind!
            </p>
        </div>
    </div>

</body>

</html>
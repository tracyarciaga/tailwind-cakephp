<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Other[]|\Cake\Collection\CollectionInterface $others
 */

$this->assign('title', __('その他'));
?>
<div class="container mx-auto p-2">
    <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
        <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
            This is a container in the index page using Tailwind!
        </p>
        <button class="btn-primary">
            Save changes
        </button>
    </div>
</div>
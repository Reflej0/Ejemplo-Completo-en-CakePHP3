<div id="totalajax">
    <table class='w3-table-all w3-hoverable' cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="sorter" scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th class="sorter" scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetas as $receta): ?>
            <tr>
                <td><?= h($receta->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $receta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $receta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $receta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')]) ?></p>
    </div>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Thêm mới cài đặt'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-bordered table-inverse nomargin">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('body') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->Flash->render();?>

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
                        <th scope="col" width="15%"><?= $this->Paginator->sort('type') ?></th>
                        <th scope="col" width="55%"><?= $this->Paginator->sort('body') ?></th>
                        <th scope="col" width="25%"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col" width="5%" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($settings as $key => $setting): ?>
                    <tr>
                        <?php 
                            switch ($setting->type) {
                                case 'introduce':
                                    $setting->type = "Giới thiệu";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'vision':
                                    $setting->type = "Tầm nhìn";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'mission':
                                    $setting->type = "Sứ mệnh";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'cover-product':
                                    $setting->type = "Cover sản phẩm";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'cover-news':
                                    $setting->type = "Cover tin tức";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'cover-lib':
                                    $setting->type = "Cover thư viện";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'cover-contact':
                                    $setting->type = "Cover liên hệ";
                                    $setting->body = '<img src="'.$setting->body.'" width="30%" />';
                                    break;
                                case 'company':
                                    $setting->type = "Tên công ty";
                                    break;
                                case 'address':
                                    $setting->type = "Địa chỉ";
                                    break;
                                case 'phone':
                                    $setting->type = "Số điện thoại";
                                    break;
                                case 'email':
                                    $setting->type = "Email";
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                        ?>
                        <td><?= $setting->type ?></td>
                        <td><?= $setting->body ?></td>
                        <td><?= $setting->created ?></td>
                        <td class="actions" align="center">
                            <button class="btn btn-danger btn-icon" onclick="location.href=('<?= $this->Url->build([
                                "action" => "delete",
                                $setting->id
                            ]); ?>')"><i class="fa fa-remove"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php if ($this->session->flashdata('success')) { ?>
             <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>

<?php                   foreach($orders as $order):                   ?>
                            <tr class="rounded bg-white">
                                <td class="order-color text-center"><a href="/order/<?=$order['id']?>" class="text-decoration-none fw-bold"><?=$order['id']?></a></td>
                                <td><?=$order['name']?></td>
                                <td><?=$order['created_at']?></td>
                                <td><?=$order['bill_address']?> <?=$order['bill_city']?>, <?=$order['bill_state']?>, <?=$order['bill_zipcode']?></td>
                                <td>₱<?=$order['total']?></td>
                                <td>
                                    <form action="/Admins/update_status" method="post">
                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                        <input type="hidden" name="order_id" value="<?=$order['id']?>">
                                        <select class="form-select form-select-sm btn btn-success btn-sm" aria-label=".form-select-sm example" name="status">
                                            <option selected><?=$order['status']?></option>
                                            <option value="1">Order in Process</option>
                                            <option value="2">Shipped</option>
                                            <option value="3">Cancelled</option>
                                        </select>

                                    </form>
                                </td>
                            </tr>
<?php                   endforeach;                                 ?>
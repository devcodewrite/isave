<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-happy-itmeo"></i>
                </div>
                <div>Reporting Refundable Balances
                    <div class="page-title-subheading">Reporting refundable balances.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="from">Association</label>
                            <div class="form-group">
                                <select name="association_id" class="form-control select2-associations1" required>
                                    <option value=""></option>
                                    <?php if ($association) { ?>
                                        <option value="<?= $association->id ?>" selected><?= $association->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <table style="width: 100%;" id="dt-transactions" class="table table-hover table-striped table-bordered">
                        <thead class="text-uppercase">
                            <tr>
                                <th class="text-center">Account</th>
                                <?php
                                $colTotal = [];
                                foreach ($columns as $i => $col) {
                                    $colTotal[$i] = 0.00;
                                ?>
                                    <th><?= $col->label ?></th>
                                <?php } ?>
                                <th>Total (GHS)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $members = [];
                            $grandTotal = 0;
                            if (isset($association)) {
                                $where = ['accounts.association_id' => $association->id, 'ownership' => 'individual'];
                                $accounts = $this->account->all()->where($where)->get()->result();
                                foreach ($accounts as $row) {
                                    $rowTotal = 0;
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $row->name; ?> <br>[<?= $row->passbook ?>]</td>
                                        <?php foreach ($columns as $i => $col) {
                                            $rowTotal += ($row->acc_type_id === $col->id ? $row->balance : 0.00);
                                            $colTotal[$i] += ($row->acc_type_id === $col->id ? $row->balance : 0.00);
                                        ?>
                                            <td><?= $row->acc_type_id === $col->id ? ($row->balance < 0 ? "(" . number_format(abs($row->balance), 2) . ")" : number_format($row->balance, 2)) : "0.00"; ?></td>
                                        <?php } ?>
                                        <td><?= $rowTotal < 0 ? "(" . number_format(abs($rowTotal), 2) . ")" : number_format($rowTotal, 2) ?></td>
                                    </tr>
                            <?php
                                    $grandTotal += $rowTotal;
                                }
                            } ?>
                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                                <th>Account</th>
                                <?php foreach ($columns as $i => $col) { ?>
                                    <th><?= $colTotal[$i] < 0 ? "(" . number_format(abs($colTotal[$i]), 2) . ")" : number_format($colTotal[$i], 2) ?></th>
                                <?php } ?>
                                <th>GHS <?= $grandTotal < 0 ? "(" . number_format(abs($grandTotal), 2) . ")" : number_format($grandTotal, 2) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/reportings/refundable-balances.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
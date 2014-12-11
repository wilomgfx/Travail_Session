<?php include '../view/header.php'; ?>
    <h2>Rapports quotidiens</h2>
    <form action="." method="post">
        <table>
            <tr class="headerDeTable">
                <th>Entrainement</th>
                <th>Nombre de Calories / entrainement</th>
                <th>Max Battement par minute</th>
                <th>Calories Ingérées</th>
                <th>Date</th>
                <th>VO2 Max</th>
                <th>Poids</th>
            </tr>
            <?php foreach( $_SESSION['cart12'] as $key => $item ) :
                $cost  = number_format($item['cost'],  2);
                $total = number_format($item['total'], 2);
                ?>
                <tr>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td class="right">
                        $<?php echo $cost; ?>
                    </td>
                    <td class="right">
                        <input type="text" class="cart_qty"
                               name="newqty[<?php echo $key; ?>]"
                               value="<?php echo $item['qty']; ?>"/>
                    </td>
                    <td class="right">
                        $<?php echo $total; ?>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="product_delete_name" value="<?php echo $item['name'] ?>" />
                            <input type="submit" name="action" value="Remove" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr id="cart_footer_start">
                <td colspan="4"><b>Subtotal</b></td>
                <td>$<?php echo get_subtotal(); ?></td>
            </tr>
            <tr class="cart_footer">
                <td colspan="4"><b>TPS</b></td>
                <td>$<?php
                    $priceTPS = calculate_tps(get_subtotal2());
                    echo number_format((float)$priceTPS, 2, '.', '');
                    ?></td>
            </tr>
            <tr class="cart_footer">
                <td colspan="4"><b>TVQ</b></td>
                <td>$<?php
                    $priceTVQ =  calculate_tvq(get_subtotal2());
                    echo number_format((float)$priceTVQ, 2, '.', '');
                    ?></td>
            </tr>
            <tr class="cart_footer">
                <td colspan="4"><b>Total des taxes</b></td>
                <td>$<?php
                    $priceTAXES = (calculate_tps(get_subtotal2()) + calculate_tvq(get_subtotal2()));
                    echo number_format((float)$priceTAXES, 2, '.', '');
                    ?></td>
            </tr>
            <tr class="cart_footer">
                <td colspan="4"><b>Grand total</b></td>
                <td>$<?php
                    $price = calculate_taxes(get_subtotal2());
                    echo number_format((float)$price, 2, '.', '');
                    ?></td>
            </tr>
            <tr class="cart_footer">
                <td colspan="5" class="right">
                    <input type="submit" name="action" value="Update Cart"/>
                </td>
            </tr>
        </table>
        <p>Click "Update Cart" to update quantities in your
            cart. Enter a quantity of 0 to remove an item.
        </p>
    </form>

<?php include '../view/footer.php'; ?>
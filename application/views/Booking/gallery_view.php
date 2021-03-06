<?php $this->load->view('Shared/header_view'); ?>
	<table style="text-align: center;" align="center" border="1">
		<thead>
			<tr><td colspan="2"><h2>Gallery of <?= $PackageTitle ?></h2></td></tr>
        </thead>
        <tbody>
            <tr>
            <?php $count = 0; ?>
            <?php foreach ($ImageList as $key => $value) :?>
                <td>
                    <?php ++$count ?>
                    <img id="Image" height='300' width='400' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
                    <br/>
                    <?php
                        preg_match("/_(\d+)\./", $value, $matches);
                    ?>
                    <a href="/travel_agency/Packages/RemoveImage/<?=$ID?>/<?=$matches[1]?>">Remove</a>
                    <?php if( $count === 2): ?>
                        <?php $count = 0; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </td>
            <?php endforeach; ?>
            </tr>
            <tr>
                <td colspan="2"><a href="/travel_agency/Packages/AllPackages">Back</a></td>
            </tr>
        </tbody>
    </table>
<?php $this->load->view('Shared/footer_view'); ?>
<?php if (isset($_COOKIE['id'])){ ?>
	<div class="block_top_menu">
		<a href="<?=__L_PERSONAL_ACCOUNT__?>" onMouseOver="tm_pa_t()" onMouseOut="tm_pa_f()"><img src="image/tm_pa_f.png" name="tm_pa" /></a>
		<a href="<?=__L_GUEST_BOOK__?>" onMouseOver="tm_gb_t()" onMouseOut="tm_gb_f()"><img src="image/tm_gb_f.png" name="tm_gb" /></a>
		<a href="<?=__L_FORUM__?>" onMouseOver="tm_forum_t()" onMouseOut="tm_forum_f()"><img src="image/tm_forum_f.png" name="tm_forum" /></a>
		<a href="<?=__L_IN_MESSAGE__?>" onMouseOver="tm_um_t()" onMouseOut="tm_um_f()"><img src="image/tm_um_f.png" name="tm_um" /></a>
	</div>
<?php }else{?>
	<div class="block_top_menu">
		<a href="<?=__L_ENTRANCE__?>" onMouseOver="tm_ent_t()" onMouseOut="tm_ent_f()"><img src="image/tm_ent_f.png" name="tm_ent" /></a>
		<a href="<?=__L_GUEST_BOOK__?>" onMouseOver="tm_gb_t()" onMouseOut="tm_gb_f()"><img src="image/tm_gb_f.png" name="tm_gb" /></a>
		<a href="<?=__L_FORUM__?>" onMouseOver="tm_forum_t()" onMouseOut="tm_forum_f()"><img src="image/tm_forum_f.png" name="tm_forum" /></a>
		<a href="<?=__L_REGISTRATION__?>" onMouseOver="tm_reg_t()" onMouseOut="tm_reg_f()"><img src="image/tm_reg_f.png" name="tm_reg" /></a>
	</div>
<?php } ?>
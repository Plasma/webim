<?php
/*
 * This file is part of Mibew Messenger project.
 * 
 * Copyright (c) 2005-2009 Mibew Messenger Community
 * All rights reserved. The contents of this file are subject to the terms of
 * the Eclipse Public License v1.0 which accompanies this distribution, and
 * is available at http://www.eclipse.org/legal/epl-v10.html
 * 
 * Alternatively, the contents of this file may be used under the terms of
 * the GNU General Public License Version 2 or later (the "GPL"), in which case
 * the provisions of the GPL are applicable instead of those above. If you wish
 * to allow use of your version of this file only under the terms of the GPL, and
 * not to allow others to use your version of this file under the terms of the
 * EPL, indicate your decision by deleting the provisions above and replace them
 * with the notice and other provisions required by the GPL.
 * 
 * Contributors:
 *    Evgeny Gryaznov - initial API and implementation
 */

$page['title'] = getlocal("page.translate.title");

function tpl_content() { global $page, $webimroot, $errors;
?>

	<?php if( $page['saved'] ) { ?>
	<?php echo getlocal("page.translate.done") ?>

	<script><!--
		if(window.opener && window.opener.location) {
			window.opener.location.reload();
		} 
		setTimeout( (function() { window.close(); }), 500 );
	//--></script>
<?php } ?>
<?php if( !$page['saved'] ) { ?>

<?php echo getlocal("page.translate.one") ?>
<br/>
<br/>
<?php 
require_once('inc_errors.php');
?>

<form name="translateForm" method="post" action="<?php echo $webimroot ?>/operator/translate.php">
<input type="hidden" name="key" value="<?php echo $page['key'] ?>"/>
<input type="hidden" name="target" value="<?php echo $page['target'] ?>"/>
	<div class="mform"><div class="formtop"><div class="formtopi"></div></div><div class="forminner">

	<div class="fieldForm">
		<div class="field">
			<div class="flabel"><?php echo $page['title1'] ?></div>
			<div class="fvaluenodesc">
				<textarea name="original" disabled="disabled" cols="20" rows="5" class="wide"><?php echo form_value('original') ?></textarea>
			</div>
		</div>

		<div class="field">
			<div class="flabel"><?php echo $page['title2'] ?></div>
			<div class="fvaluenodesc">
				<textarea name="translation" cols="20" rows="5" class="wide"><?php echo form_value('translation') ?></textarea>
			</div>
		</div>
	
		<div class="fbutton">
			<input type="image" name="save" value="" src='<?php echo $webimroot.getlocal("image.button.save") ?>' alt='<?php echo getlocal("button.save") ?>'/>
		</div>
	</div>
	
	</div><div class="formbottom"><div class="formbottomi"></div></div></div>
</form>

<?php } ?>

<?php 
} /* content */

require_once('inc_main.php');
?>
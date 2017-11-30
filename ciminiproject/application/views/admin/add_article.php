<?php include('admin_header.php'); ?>
<div class="container">
	<?= form_open('admin/save_article', 'class="form-horizontal"'); ?> 
	  <?= form_hidden('user_id', $this->session->userdata('user_id'))?>
		  <fieldset>
			<legend>Add Article</legend>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Title :</label>
						<div class="col-lg-10">
						<?= form_input( ['name'=>'title', 'class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Enter Title', 'value'=>set_value('title')])?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('title','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					  <label for="textArea" class="col-lg-2 control-label">Body :</label>
					  <div class="col-lg-10">
					  	<?= form_textarea( ['name'=>'body', 'class'=>'form-control', 'id'=>'textArea', 'rows'=>'3', 'value'=>set_value('body')])?>
						<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
					  </div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('body','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					<?= form_reset('reset', 'Reset', ['class'=>'btn btn-default']) ?>
					<?= form_submit('submit', 'Submit', ['class'=>'btn btn-primary']) ?>
				  </div>
			</div>
		</fieldset>
	</form>

</div>
<?php include('admin_footer.php'); ?>
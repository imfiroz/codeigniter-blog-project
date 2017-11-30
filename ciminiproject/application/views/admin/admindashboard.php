<?php include('admin_header.php');?>
<div class="container">
	<?php if($feedback_msg = $this->session->flashdata('feedback')): ?>
			<div class="row">
				<div class="col-lg-9">
					<div class="alert alert-dismissible  <?= $this->session->flashdata('feedback_class') ?>">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?= $feedback_msg ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-6">
			<?= anchor('admin/add_article','Add Article',['class'=>'btn btn-primary pull-right'])  ?>
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<th>Sr.no</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php if(count($articles)):
				$count = $this->uri->segment(3);
			 	foreach($articles as $article): 
		?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= $article->title ?></td>
					<td>
						<div class="row">
							<div class="col-lg-2">
								<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=> 'btn btn-info']) ?>
							</div>
							<div class="col-lg-2">
								<?=
									form_open('admin/delete_article'),
									form_hidden('article_id', $article->id),
									form_submit(['name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-danger']),
									form_close();
								?>
							</div>
						</div>
						
					</td>
				</tr>
		<?php 	endforeach;
				
		 	 else: 
		?>
				<tr>
					<td colspan="3">
						<p>No records found</p>
					</td>
				</tr>
		<?php endif;?>
		</tbody>
	</table>
	<?=  $this->pagination->create_links(); ?> 
</div>
<?php include('admin_footer.php');?>
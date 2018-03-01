<div class="wrapper site-wrapper">
	<div class="container site-container">

<div class="col-md-12 post-index">
	
<div class="col-md-9">
	
<?php 

$page = $this->input->get('p') ? $this->input->get('p') : 'bilar';
 ?>
		<?php if (isset($posts)): ?>
			<?php if (is_array($posts)): ?>
				<?php foreach ($posts as $key): ?>
					<div class="post">
						<div class="col-md-6 post-featured-img">
							<div class="year"><?=$key->post_year;?></div>
							<div class="month"><?=$key->post_month;?></div>
							<div class="day"><?=$key->post_day;?></div>
							<div class="blured">
								<a href="<?=site_url("site/read/$key->site_path/$key->slug");?>">

									
									<?php if ($img_link = $this->post_m->get_featuredImg($key->post_id)): ?>
										
									<div class="tiles">
										<div class="tile" data-scale="1.1" data-image="<?=base_url($img_link)?>"></div>
									</div>
											<?php else: ?>
									<div class="tiles">
										<div class="tile" data-scale="1.1" data-image="<?=base_url('public/images/post-img.png')?>"></div>
									</div>
										<?php endif ?>
							</div>
							
						</div>
						<div class="col-md-6 post-content">
							<div class="post-title"><a href="<?=site_url("site/read/$key->site_path/$key->slug");?>" title='<?=$key->post_title?>'><h4><?=$this->auto_m->limit_title($key->post_title);?></h4></a></div>
							<div class="post-content-desc"><?=$this->auto_m->limit_300($key->post_content)?></div>
							<div class="post-options">
								<div class="posted-by"><?php echo ucfirst($key->site_path); /*$this->post_m->posted_by($key->user_id); */
								?></div>
								<div class="post-category"><?php 

								if($category = $this->post_m->get_categories($key->post_id)){
									foreach ($category as $cat) {
										
										echo "<span class='category-item'>$cat->cat_name</span> ";
									}
								}

								?></div>
								<div class="post-details"><a href="<?=site_url("site/read/$key->site_path/$key->slug");?>" class="btn btn-default">Details <i class="fa fa-angle-right"></i></a href="#"></div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		<?php endif ?>
<div class="col-md-12"><?=$pagination;?></div>
</div>
<div class="col-md-3 side-bar">
	<div class="panel panel-search">
	<div class="panel-body" style="padding: 0;">
		<input class="form-control" placeholder="Search" id="search" name="q" /><i class="fa fa-search pul"></i></div>
	</div>
	<div class="panel">
		<div class="panel-heading"><h4>RECENT POST</h4></div>
		<div class="panel-body">
			<ul class="recent-post">
				<?php echo $this->auto_m->recent_post(5); ?>
			</ul>
		</div>


	</div>

	<div class="panel">
		<div class="panel-heading"><h4>SHARE US NOW <?php /*
			<div style="background: #fff;padding:5px;display: inline-block;margin-top: -5px;border-radius: 0 5px 0 5px;" class="pull-right"><div class="fb-share-button pull-right" data-href="<?=site_url();?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=site_url();?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></div></h4>
			*/ ?>
		</div>
	</div>

</div>
</div>
	</div>
</div>


<div class="contentdiv pull-left" style="padding-left:40px;padding-right:50px;width:70%">
			<small><ol class="breadcrumb">
			  <li><a href="<?php echo base_url();?>">Feedback</a></li>
			  <li><a href="<?php echo base_url() . 'home/category/' . $idea->categoryid . "/" . str_replace(" ", "-", $categories[$idea->categoryid]->name); ?>"><?php echo $categories[$idea->categoryid]->name;?></a></li>
			  <li class="active"><?php echo $idea->title; ?></li>
			</ol></small>
			<div class="row" style="margin-top:15px;">
				<div class="pull-left" style="margin-right:-5%">
					<div style="width:80px;height:60px;text-align:center;border-style:solid;border-width:1px;border-color:#3498DB;border-radius:5px;padding-top:7px;margin-bottom:2px">
						<span style="color:#3498DB;margin-top:-10px">
						<b><?php if($idea->votes <= 99999) {
								if($idea->votes < 1000) echo $idea->votes;
								else echo number_format($idea->votes);
							} elseif($idea->votes < 1000000){ 
								echo (int) ($idea->votes / 1000); echo "k";
							} else { 
							echo (int) ($idea->votes / 1000000); 
							$t = (int) ($idea->votes / 1000000);
							if((int) ($idea->votes / 100000) - $t*10 > 0)
								echo "," . (((int) ($idea->votes / 100000)) - $t*10);
							echo "m";
							}?>
							</b></span><br>
						<div style="margin-top:-10px"><small>Votes</small></div>
					</div>
					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="width:100%">Vote</button>
					  <span class="dropdown-arrow dropdown-arrow-inverse"></span>
					  <ul class="dropdown-menu dropdown-inverse">
					    <li><a href="<?php echo base_url() . "action/vote/1/" . $idea->id;?>">1 Vote</a></li>
					    <li><a href="<?php echo base_url() . "action/vote/2/" . $idea->id;?>">2 Votes</a></li>
					    <li><a href="<?php echo base_url() . "action/vote/3/" . $idea->id;?>">3 Votes</a></li>
					  </u>
					</div>
				</div>
				<div style="margin-top:-10px;margin-left:90px">
					<h6><?php echo $idea->title; ?></h6>
					<span style="color:#34495E"><small><?php echo $idea->content; ?></small></span>
					<div> 
					<ul class="nav-pills" style="list-style:none;margin-left:-40px">
					<li style="padding-right:10px"><span class="label label-<?php
				switch ($idea->status) {
					case 'considered':
						echo 'default';
						break;
					case 'declined':
						echo 'danger';
						break;
					case 'started':
						echo 'success';
						break;
					case 'planned':
						echo 'warning';
						break;
					case 'completed':
						echo 'info';
						break;
					case 'new':
						echo 'default';
						break;
				}
				?>"><small><?php
				switch ($idea->status) {
					case 'considered':
						echo 'Considered';
						break;
					case 'declined':
						echo 'Declined';
						break;
					case 'started':
						echo 'Started';
						break;
					case 'planned':
						echo 'Planned';
						break;
					case 'completed':
						echo 'Completed';
						break;
					case 'new':
						echo 'Under Review';
						break;
				}
				?></small></span></li>
					<li style="padding-right:10px"><small><?php echo $idea->comments;?> Comments</small></li>
					<li style="padding-right:10px"><a href="<?php echo base_url() . 'home/category/' . $idea->categoryid . '/' . str_replace(" ", "-", $categories[$idea->categoryid]->name); ?>"><small><?php echo $categories[$idea->categoryid]->name;?></small></a></li>
					</ul><br><br>
					<small><span class="glyphicon glyphicon-user"></span> <a href="<?php echo base_url() . 'home/profile/' . $idea->authorid . '/' . str_replace(" ", "-", $idea->user); ?>"><?php echo $idea->user; ?></a> <i>shared this idea</i> <span style='color:#555;margin-left:30px;'>September 21, 2013</span></small>
					</div>
				</div>
			</div>
			<?php if(isset($_SESSION['isadmin']) && $_SESSION['isadmin']): ?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top:10px">
				<ul class="nav-pills" style="list-style:none;margin-left:-40px;">
				<li>
					<?php if($idea->status == 'new'): ?>
						<a href="<?php echo base_url() . 'adminaction/approveidea/' . $idea->id; ?>" target="_blank"><button type="submit" class="btn btn-success btn-sm" style="width:130px">Approve Idea</button></a>
					<?php elseif($idea->status != 'completed' && $idea->status != 'declined'): ?>
						<div class="dropdown">
						  <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" style="width:130px">Change status</button>
						  <span class="dropdown-arrow dropdown-arrow-inverse"></span>
						  <ul class="dropdown-menu dropdown-inverse">
						    <li><a href="<?php echo base_url() . "adminaction/ideastatus/declined/" . $idea->id;?>">Declined</a></li>
						    <li><a href="<?php echo base_url() . "adminaction/ideastatus/considered/" . $idea->id;?>">Under Consideration</a></li>
						    <li><a href="<?php echo base_url() . "adminaction/ideastatus/planned/" . $idea->id;?>">Planned</a></li>
						    <li><a href="<?php echo base_url() . "adminaction/ideastatus/started/" . $idea->id;?>">Started</a></li>
						    <li><a href="<?php echo base_url() . "adminaction/ideastatus/completed/" . $idea->id;?>">Completed</a></li>
						  </u>
						</div>
					<?php endif; ?>
				</li>
				<li>
					<button type="submit" class="btn btn-danger btn-sm" style="width:130px" <?php $temp = base_url() . 'adminaction/deleteidea/' . $idea->id;?>onclick="popup_sure('Are you sure you want to delete this idea?','<?php echo $temp; ?>');">Delete Idea</button>
				</li>
				<li>
					<a href="<?php echo base_url() . 'admin/users/' . $idea->authorid; ?>" target="_blank"><button type="submit" class="btn btn-danger btn-sm" style="width:130px">Ban User</button></a>
				</li>
				
				</ul>
				</div>
			</div>
			<?php endif; ?>
			<?php if(isset($_SESSION['userid'])): ?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top:10px">
					<form role="form" method="post" action="<?php echo base_url() . 'action/comment/' . $idea->id; ?>">
						<div class="form-group">
						  <label>Comment</label>
						    <textarea class="form-control" rows="4" name="content"></textarea>
						  </div>
						  <input type="hidden" name="ideaname" value="<?php echo str_replace(" ", "-", $idea->title); ?>">
						  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
			<?php endif; ?>
			<?php foreach ($comments as $comment) : ?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top:10px;border-style:solid;border-color:#C0C0C0;border-width:1px;border-radius:2px;padding-left:5px;padding-top:3px;">
					 <span class="glyphicon glyphicon-comment" style="margin-right:5px"></span>
					 <a href="<?php echo base_url() . 'home/profile/' . $comment->userid . '/' . str_replace(" ", "-", $comment->user); ?>"><?php echo $comment->user; ?></a>
					 <span style="margin-left:15px;color:#555"><?php echo $comment->date; ?></span>
					  <span style="margin-left:15px;margin-right:5px">
					  	<?php if(isset($_SESSION['isadmin']) && $_SESSION['isadmin']): ?>
					  	<?php $temp = base_url() . 'adminaction/deletecomment/' . $comment->id; ?>
					  		<a style="color:#E25F5F" href="#" onclick="popup_sure('Are you sure you want to delete this comment?','<?php echo $temp; ?>');"><i><small>delete commment</small></i></a>
					  	<?php else: ?>
					  		<a style="color:#E25F5F" href="<?php echo base_url() . 'action/flag/'. $comment->id . '/' . $idea->id . '/' . str_replace(" ", "-", $idea->title);?>"><i><small>flag comment</small></i></a>
					  	<?php endif;?>
					  </span>
					 <div style="padding-left:10px">
					 	<small><?php echo $comment->content;?></small>
					 </div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
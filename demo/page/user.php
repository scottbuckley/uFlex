<?php

$uid = getVar("id");

if($uid){
	//Display single users

	$select = (intval($uid)!=0) ? "user_id" : "username";

	$data = $user->getRow(Array($select => $uid));

	if($data): ?>

		<div class="row">
			<div class="col-xs-12 col-sm-offset-1">
				<h3>User Profile</h3>
				<div class="row">
					<div class="col-sm-2">
						<div class="center-block userBox">
							<?php echo gravatar($data['email']); ?>
							<span class='label label-primary center-block'><?php echo $data['username']?></span>
						</div>
					</div>
					<div class="col-sm-8 col-lg-7">
						<table class="table table-hover">
							<?php foreach($data as $name=>$value):
								if( in_array($name, array('email','password', 'confirmation'))) continue; ?>
								<tr>
									<th width="100"><?php echo $name?></th>
									<td><?php echo $value?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php else:
		p("User doesn't exists", 2);
	endif;
}
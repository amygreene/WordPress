<?php
/* 
Plugin Name: Evergreen Batch Deletion
Plugin URI: http://www.google.com
Description: This should work. Yeah.
Author: Nate
Version: 0.1
Author URI: http://failhorn.com 
*/  

function ev_batch_menu() {
	add_options_page('Batch Delete Options', 'Batch Delete', 'manage_network_users', 'batch-delete', 'ev_batch_admin');  
}

function ev_batch_admin() {
?><div class="wrap">  
		<?php  if ($_REQUEST['submit']) {
		ev_batchdel(); 
		} ?>
		<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">  
		        <input type="hidden" name="batchdel" value="Y">
			<p>Clicking this button will pull a list of blogs. It will run through the users of those blogs and check which still have valid TESC accounts. If a user does not have a valid TESC account, xir user_status is set to reflect this. If a blog consists solely of users without TESC accounts, the blog is archived.</p>
		        <p class="submit">  
		                <input type="submit" name="submit" value="Archive old blogs" />  
		        </p>  
		</form>  
	</div>
	<div class="wrap">  
                <?php  if ($_REQUEST['submit']) {
                ev_userarchive(); 
                } ?>
                <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">  
                        <input type="hidden" name="user_archive" value="Y">
                        <p>Clicking this button will output a list of userids which no longer exist on the campus network. It will not make any changes.</p>
                        <p class="submit">  
                                <input type="submit" name="submit" value="List archived users" />  
                        </p>  
                </form>  
        </div>

<?php

}

function ev_userarchive() {
        //this line is here for debugging. Set the flag to TRUE to output verbose error messages.
        $debug = FALSE;
        global $wpdb;
        if ( $_REQUEST['user_archive'] == "Y" ) {
                $users = $wpdb->get_results($wpdb->prepare("SELECT user_login FROM wp_users WHERE user_status = 42"));
               echo "These users are candidates for deletion. If they are members of a blog that is not a candidate for deletion, contact the blog owner. <br /> <hr />";
                foreach ( $users as $user ) {
                        echo $user->user_login . "<br />";
                }
                echo "<hr />";
        }
}



function ev_batchdel() {
	//this line is here for debugging. Set the flag to TRUE to output verbose error messages.
	$debug = FALSE;
	global $wpdb;

	if ( $_REQUEST['batchdel'] == "Y" ) {
		$userdel = 42; // if the user should be deleted. 42 is a nice round number, don't you think?
		$bloglist = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_blogs ORDER BY blog_id"));
		foreach ($bloglist AS $blog) {
			if ( $debug == TRUE ) { echo "Currently in blog " . $blog->blog_id . ", which is at " . $blog->path . "<br />"; }
			$blogid = $blog->blog_id;
			if(is_archived($blogid) == 0) {
				if ( $debug == TRUE ) { echo "BlogID " . $blogid . " is not archived. <br />"; }
				//^^ there's no point in running all this if the blog is already archived.
				$args = "blog_id=" . $blogid;
				$userlist = get_users( $args );
				if ( $debug == TRUE ) { echo "Userlist = " .  print_r($userlist, TRUE) . "<br />"; }
				foreach ($userlist AS $user) {
					if ( $debug == TRUE ) { echo "Now testing " . print_r($user,TRUE) . ". <br />"; }
					//test if user exists. There's no way to disable users and I'm worried that
					//deleting the only user of a blog will be a problem. The user_status column
					//in wp_blogs is not used so I'm setting that to $userdel if the blog user 
					//should be deleted. 
					$uid=$user->ID;
					$usernicename = $user->user_nicename;
					if ( $debug == TRUE ) { echo "UID = " . $uid . " && nicename = " . $usernicename . "<br />"; }
					if ( $debug == TRUE ) { echo "Results of exec " . $usernicename . exec("id $usernicename") . "<br />"; }
					if (exec("id $usernicename") == "") {
						//user does not exist. Set their status to $userdel
						//the usage example for this function on the codex is weird but I'm
						//following it so I don't get into trouble
						if ($user->user_status != $userdel) {
							//added this extra if to minimize Db writes since they're slow;
							// echo "output of update_user: " .  wp_update_user( array ('ID' => $uid, 'user_status' => $userdel));
							update_user_status($uid, 'user_status', $userdel);
							echo "Successfully archived " . $usernicename . "<br />\n";
							// the next few lines are too much info, even for debug mode. 
							/* $args = "blog_id=" . $blogid;
							$debuguserlist = get_users($args);
							echo print_r($debuguserlist,TRUE); */ 
						}
					}
				}
				//All the disabled users are now flagged. Now I'm re-pulling the list of users
				//so that I have their current status.
				unset($userlist);
				if ( $debug == TRUE ) { "For the record, we're on blog_id=" . $blogid . "<br />\n"; }
				$userlist = get_users("blog_id=$blogid");
				$archive_this_blog=TRUE; //Unless we hear otherwise, this blog will be archived
				//Go through the users of the blog. If any one of them is active, don't archive.
				foreach ($userlist AS $user) {
					if ($user->user_status != $userdel) {
						//One of the users is still active! Abort! Abort!
						$archive_this_blog=FALSE;
						if ( $debug == TRUE ) { echo "User " . $user->user_nicename . " caused abort  <br />"; } 
						//since we can't archive, we may not want to bother testing the rest of the users. This is a
						//good candidate for a break; statement but I'm not sure it's worth possible unexpected behavior.
					}
				}
				if ($archive_this_blog==TRUE) {
					//archive the blog
					echo "Archiving blog #" . $blogid . "<br /> \n";
					update_archived($blogid, 1);
					echo "Successfully archived <br />";
				}
				
				if ( $debug == TRUE ) { echo "############################################################## <br />"; }
			} else if (is_archived($blogid) == 1) { // this second if should be extraneous but better safe than sorry
			/*	//blog is already archived. Contemplate deletion.
				//Check if it's been 6 months since last update.
				//if so, delete users then delete blog.

				$lastupdate = get_blog_status($blogid, 'last_updated');
				// echo "In the loop <br />";

				//convert it into a usable timestamp. I won't be surprised if this doesn't work and I 
				//need to do some fancy hax to get it into unix time. try strtotime() if necessary.

				$lastupdate = date_format($lastupdate, 'U'); //I will be so surprised if this works. << but it does!
				if (time() - $lastupdate >= 15552000) { //180 days == 15552000 seconds.
					//time to delete the shit out of this thing.
					//delete all users first, then delete the blog. 
					$deleteusers = get_users("blog_id=$blogid");
					foreach ($deleteusers AS $deleteuser) {
						$delete_uid=$deleteuser->ID;
						$deleteusernicename = $deleteuser->user_nicename;
						if (exec("id $deleteuser_nicename") == "") {
							// ^^ this is just in case they've been re-activated since archiving. It could happen.
							if ($delete_uid != 1) { 
								// UID 1 is ac_admin, which we shouldn't delete even though it's unused 
								echo "Deleting user " . $deleteusernicename . ", who has UID " . $delete_uid . " <br />";
								wpmu_delete_user($delete_uid);
							}
						}
					}
					// All users have been deleted. Kill the blog.
					echo "Deleting blog " . $blogid . " <br />";
					wpmu_delete_blog($blogid, TRUE); // This function exists but isn't documented. 90% sure it works this way.

				} */ 
			}
		}  
		echo "<br /> Finished. If no output above this line, no changes were made. <hr />";
	}
}
add_action('admin_menu', 'ev_batch_menu');
?>
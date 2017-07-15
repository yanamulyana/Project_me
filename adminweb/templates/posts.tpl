{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'post' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Posts
				<small>Edit Post Status</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="posts.php"><i class="fa fa-dashboard"></i> Posts</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="posts.php?mod=post&act=update">
			<input type="hidden" name="postID" value="{$commentID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Thread</td>
					<td width="10">:</td>
					<td><a href="../showthread-{$threadID}-{$threadRef}-1-{$title_seo}.html" target="_blank">{$title}</a></td>
				</tr>
				<tr valign="top">
					<td>Created By</td>
					<td>:</td>
					<td><a href="../profile-{$memberID}-{$username}.html" target="_blank">{$username}</a></td>
				</tr>
				<tr valign="top">
					<td>Created Date</td>
					<td>:</td>
					<td>{$createdDate}</td>
				</tr>
				<tr valign="top">
					<td>Post</td>
					<td>:</td>
					<td>{$comment}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>
						<select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" {if $status == 'Y'}SELECTED{/if}>Active</option>
							<option value="N" {if $status == 'N'}SELECTED{/if}>Not Active</option>
						</select>
					</td>
				</tr>
			</table>	
			<button type="submit" class="btn btn-success">SAVE</button>
			</form>
		</section>
	
	{elseif $module == 'post' AND $act == 'search'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Posts
				<small>List of Post</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="posts.php"><i class="fa fa-dashboard"></i> Posts</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="posts.php">
				<input type="hidden" name="mod" value="post">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="100">Find Posts :</td>
						<td>
							<input type="text" value="{$q}" class="form-control" name="q" placeholder="Post comment" style="width: 300px;" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<p>{$numsPost} results for <i>{$q}</i></p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th width="250">Thread <i class="fa fa-sort"></i></th>
						<th width="400">Comment/Post <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Created By <i class="fa fa-sort"></i></th>
						<th>Created Date <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataPost loop=$dataPost}
						<tr>
							<td>{$dataPost[dataPost].no}</td>
							<td><a href="../showthread-{$dataPost[dataPost].threadID}-{$dataPost[dataPost].threadRef}-1-{$dataPost[dataPost].title_seo}.html" target="_blank">{$dataPost[dataPost].title}</a></td>
							<td>{$dataPost[dataPost].comment}</td>
							<td>{$dataPost[dataPost].status}</td>
							<td><a href="../profile-{$dataPost[dataPost].memberID}-{$dataPost[dataPost].username}.html" target="_blank">{$dataPost[dataPost].username}</a></td>
							<td>{$dataPost[dataPost].createdDate}</td>
							<td>
								<a href="posts.php?mod=post&act=edit&postID={$dataPost[dataPost].commentID}" title="Edit Status">
									<img src="../../oaseast.com/images/edit.png" width="20">
								</a>
								<a href="posts.php?mod=post&act=delete&postID={$dataPost[dataPost].commentID}" title="Delete" onClick="return confirm('Are you sure want to delete this post?')">
									<img src="../../oaseast.com/images/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Posts
				<small>List of Post</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="posts.php"><i class="fa fa-dashboard"></i> Posts</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="posts.php">
				<input type="hidden" name="mod" value="post">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="100">Find Posts :</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Post comment" style="width: 300px;" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			{if $msg == '1'}
				<p style="color: #5cb85c;">Post was updated successfully.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Post was deleted successfully.</p>
			{/if}
			<p>Total post : {$numsPost}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th width="250">Thread <i class="fa fa-sort"></i></th>
						<th width="400">Comment/Post <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Created By <i class="fa fa-sort"></i></th>
						<th>Created Date <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataPost loop=$dataPost}
						<tr>
							<td>{$dataPost[dataPost].no}</td>
							<td><a href="../showthread-{$dataPost[dataPost].threadID}-{$dataPost[dataPost].threadRef}-1-{$dataPost[dataPost].title_seo}.html" target="_blank">{$dataPost[dataPost].title}</a></td>
							<td>{$dataPost[dataPost].comment}</td>
							<td>{$dataPost[dataPost].status}</td>
							<td><a href="../profile-{$dataPost[dataPost].memberID}-{$dataPost[dataPost].username}.html" target="_blank">{$dataPost[dataPost].username}</a></td>
							<td>{$dataPost[dataPost].createdDate}</td>
							<td>
								<a href="posts.php?mod=post&act=edit&postID={$dataPost[dataPost].commentID}" title="Edit Status">
									<img src="../../oaseast.com/images/edit.png" width="20">
								</a>
								<a href="posts.php?mod=post&act=delete&postID={$dataPost[dataPost].commentID}" title="Delete" onClick="return confirm('Are you sure want to delete this post?')">
									<img src="../../oaseast.com/images/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}